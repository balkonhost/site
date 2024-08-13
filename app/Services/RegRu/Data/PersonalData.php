<?php

namespace App\Services\RegRu\Data;

use Illuminate\Support\Str;
use Spatie\LaravelData\Data;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Resolvers\DataFromSomethingResolver;

class PersonalData extends Data
{
    public function __construct(
        public string $email,
        public string $phone,

        public string $last_name,
        public string $first_name,
        public ?string $middle_name,

        public string $passport_number,
        public string $passport_place,
        public string /*CarbonImmutable*/ $passport_date,
        public string /*CarbonImmutable*/ $birthdate,

        public int $zip_code,
        public ?string $region,
        public string $city,
        public string $address,
    ) {}

    public static function forDomain(mixed ...$payloads)
    {
        $that = app(DataFromSomethingResolver::class)->execute(static::class, ...$payloads);

        if ($method = $that->method($payloads)) {
            if (method_exists($that, $method)) {
                return call_user_func(array($that, $method));
            }
        }

        return false;
    }

    protected function method($data)
    {
        if ($domain = current(array_column($data, 'domain'))) {
            $parts = array_map(function ($part) {
                return ucfirst(ltrim(idn_to_ascii($part), 'xn--'));
            }, explode('.', $domain));
            array_shift($parts);

            return lcfirst(join('', $parts));
        }

        return false;
    }

    protected function ru(): array
    {
        return [
            //'descr' =>
            //'sms_security_number' => ,
            'p_addr_zip' => $this->zip_code,
            'p_addr_area' => $this->region,
            'p_addr_city' => $this->city,
            'p_addr_addr' => $this->address,
            'p_addr_recipient' => mb_substr($this->first_name, 0, 1) .". {$this->last_name}",
            'phone' => $this->phone,
            //'fax' =>
            'e_mail' => $this->email,
            'person' => ucwords(
                Str::slug(
                    $this->first_name . ($this->middle_name ? ' '. mb_substr($this->middle_name, 0, 1) .' ' : ' ') . $this->last_name
                    , ' '
                )
            ),
            'person_r_surname' => $this->last_name,
            'person_r_name' => $this->first_name,
            'person_r_patronimic' => $this->middle_name,
            'passport_number' => $this->passport_number,
            'passport_place' => $this->passport_place,
            'passport_date' => $this->passport_date,
            'birth_date' => $this->birthdate,
            'country' => 'RU',
            //'code' =>
        ];
    }

    protected function su()
    {
        return $this->ru();
    }

    // .РФ
    protected function p1ai()
    {
        return $this->ru();
    }
}
