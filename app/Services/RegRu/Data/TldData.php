<?php
namespace App\Services\RegRu\Data;

use Spatie\LaravelData\Data;

class TldData extends Data
{
    public function __construct(
        public string $tld,
        public bool $idn,
        public int $reg_min_period,
        public int $reg_max_period,
        public int $renew_min_period,
        public int $renew_max_period,
        //public $extcreate_price_eq_renew,
        public $prices,
    ) {}

    public static function from(mixed ...$payloads): static
    {
        $data = current($payloads);

        return new self(
            $data['tld'],
            $data['idn'],
            $data['reg_min_period'],
            $data['reg_max_period'],
            $data['renew_min_period'],
            $data['renew_max_period'],
            // $data['extcreate_price_eq_renew'],
            PriceData::from($data)
        );
    }
}
