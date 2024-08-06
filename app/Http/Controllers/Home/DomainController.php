<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
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
                    // Проверка на корректность доменного имени
                    if (!$this->isValidDomainName($value)) {
                        return $fail("Какое-то станное доменное имя.");
                    }

                    // Проверка возможности регистрации в заданной зоне

                    // Проверка доступности регистрации
                    switch ($this->isAvailableDomainName($value)) {
                        case 'exception': $fail("Сервис регистратора гаситься где-то. Приходи со своим запросом позже.");
                            break;
                        case 'invalid_domain_name': $fail("Какое-то станное доменное имя.");
                            break;
                        case 'domain_already_exists': $fail("Тебя опередили, доменное имя уже занято.");
                            break;
                        case 'tld_disabled':
                            break;
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
