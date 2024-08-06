<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\TopLevelDomain;
use App\Services\RegRu\DomainService;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;


class DomainController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $domains = $user->domains()
            ->paginate(25); // ->paginate(2, ['*'], 'page')

        return view('home.domain.index', compact('domains'));
    }

    public function check(Request $request, $domain = null)
    {
        if ($request->has('domain')) {
            return redirect(route('home.domain.check', $request->get('domain')));
        }

        if ($domain) {
            $validator = Validator::make(['domain' => $domain], [
                'domain' => ['required', 'string', function (string $attribute, mixed $value, Closure $fail) {
                    // Проверка доступности регистрации
                    if ('available' !== ($result = $this->isAvailableDomainName($value))) {
                        switch ($result) {
                            case 'exception': $fail("Сервис регистратора гаситься где-то. Приходи со своим запросом позже.");
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
        }



        return view('home.domain.check', compact('domain'));
    }

    private function isValidDomainName($domain): bool
    {
        return (strpos($domain, '.') // проверка на наличие точки
            && preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain) // проверка на допустимые символы
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

        $allowedDomains = ['ru'];

        if (!in_array($tld, $allowedDomains) ||
            !($tld = (new TopLevelDomain())->whereDomain($tld)->first()) ||
            !($prodiver = $tld->providers()->withPivot('new_price')->where('name', 'REG.RU')->first())) {
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
}
