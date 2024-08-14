<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\TopLevelDomain;
use App\Services\RegRu\Data\PersonalData;
use App\Services\RegRu\DomainService;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DomainController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $domains = $user->domains()->paginate(25); // ->paginate(2, ['*'], 'page')

        return view('home.domain.index', compact('domains'));
    }

    public function registration(Request $request, $domain = null)
    {
        if ($request->has('domain')) {
            return redirect(route('home.domain.check', $request->get('domain')));
        }

        $view = view('home.domain.registration');

        if ($domain) {
            $data = array_merge($request->all(), ['domain' => $domain]);
            $view->with('domain', $domain);

            if ($price = $this->prices($domain)->where('name', 'REG.RU')->first()) {
                $view->with('price', (integer) $price->pivot->new_price);
            }

            $validator = Validator::make($data, [
                'domain' => ['required', 'string', function (string $attribute, mixed $value, Closure $fail) use ($domain, $view) {
                    // Проверка доступности регистрации
                    if ('available' != ($result = $this->isAvailableDomainName($value))) {
                        switch ($result) {
                            case 'exception': $fail("Сервис регистратора гаситься где-то. Приходи с запросом позже.");
                                break;
                            case 'invalid_domain_name': $fail("Какое-то станное доменное имя.");
                                break;
                            case 'domain_already_exists': $fail("Тебя опередили, доменное имя уже занято.");
                                break;
                            case 'tld_disabled': $fail("Регистрация домена в заданной зоне не доступна.");
                                break;
                            default: $fail("Регистрация выбранного домена не доступна. Код ошибки {$result}. Хотя мало вероятно, что знание кода тебе поможет.");
                        }
                    }
                }]
            ]);

            if (!$request->session()->get('fails') && $validator->fails()) {
                return redirect(route('home.domain.check', $domain))
                    ->with('fails', true)
                    ->withErrors($validator)
                    ->withInput();
            }

            if ('POST' == $request->getMethod()) {
                $validator->addRules([
                    'email' => ['required', 'email:rfc,dns', 'min:6', 'max:255'], // ncc@test.ru\ntest@test.ru
                    'phone' => ['required', 'string', 'min:8', 'max:255'], // ncc@test.ru\ntest@test.ru

                    'last_name' => ['required', 'string', 'max:32'],
                    'first_name' => ['required', 'string', 'max:32'],
                    'middle_name' => ['nullable', 'string', 'max:32'],

                    'passport_number' => ['required', 'string', 'min:6', 'max:30'],
                    'passport_place' => ['required', 'string', 'min:3', 'max:200'],
                    'passport_date' => ['required', 'date_format:d.m.Y'],
                    'birthdate' => ['required', 'date_format:d.m.Y'],

                    'zip_code' => ['required', 'digits_between:2,15'],
                    'region' => ['nullable', 'string', 'min:3', 'max:65'],
                    'city' => ['required', 'string', 'min:3', 'max:25'],
                    'address' => ['required', 'string', 'min:5', 'max:105'],
                ]);
                $validator->validate();

                $data = [
                    'type' => 'newal',
                    'domain' => $domain,
                    'contacts' => PersonalData::forDomain($validator->getData())
                ];

                if ($transaction = $this->transaction($price->pivot->new_price, $data)) {
                    return redirect(route('home.balance.transaction', $transaction));
                }

                /*$data = [
                    'domain_name' => $domain,
                    //'period' =>
                    'enduser_ip' => $request->getClientIp(),
                    'contacts' => PersonalData::from($validator->getData())->forDomain($domain),
                    //'profile_type' =>
                    //'profile_name' =>
                    'nss' => [
                        'ns0' => 'obschaga1.balkon.host',
                        'ns1' => 'vahter.obschaga1.balkon.host',
                    ],
                    //'not_delegated' =>
                    //'user_servid' =>
                    //'comment' =>
                    //'admin_comment' =>
                    'pay_type' => 'prepay',

                    //'subtype' =>
                    //'reg_premium' =>

                    //'folder_name' =>
                    //'folder_id' =>
                    //'no_new_folder' =>
                ];

                $this->registrationDomain($data);*/
            }
        }

        return $view;
    }


    private function isValidDomainName($domain): bool
    {
        return (strpos($domain, '.') // проверка на наличие точки
            //&& preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain) // проверка на допустимые символы
            && preg_match("/^.{1,253}$/", $domain) // проверка общей длины
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain)); // проверка длины каждого имени
    }

    private function isAvailableDomainName($domain): string
    {
        $domain = strtolower($domain);

        // Начальная проверка на корректность доменного имени
        if (!$this->isValidDomainName($domain)) {
            return 'invalid_domain_name';
        }

        // Проверка возможности регистрации в заданной зоне
        $parts = explode('.', $domain);
        array_shift($parts);
        $tld = join('.', $parts);

        $allowedDomains = ['ru', 'su', 'рф'];
        if (!in_array($tld, $allowedDomains)) {
            return 'tld_disabled';
        }

        // Проверка системой регистрации
        $service = new DomainService();
        try {
            if (($answer = $service->check(['domain_name' => $domain])) && isset($answer['domains'])) {
                $data = current($answer['domains']);
                return strtolower($data['error_code'] ?? $data['result']);
            }
        } catch (Exception $exception) {}

        return 'exception';
    }

    protected function transaction($amount, $data)
    {
        $user = auth()->user();
        return $user->withdraw($amount, $data, false);
    }

    /*protected function registrationDomain(array $data)
    {
        $service = new DomainService();
        try {
            if ($answer = $service->create($data)) {
                dd($answer);
            }
        } catch (Exception $exception) {}
    }*/

    private function prices($domain)
    {
        $parts = explode('.', $domain);
        array_shift($parts);
        $tld = join('.', $parts);

        if ($tld = (new TopLevelDomain())->whereDomain($tld)->first()) {
            return $tld->providers()->withPivot('new_price')->get();
        }

        return false;
    }
}
