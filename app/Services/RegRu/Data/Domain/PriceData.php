<?php
namespace App\Services\RegRu\Data\Domain;

use Spatie\LaravelData\Data;

class PriceData extends Data
{
    public function __construct(
        //public $extcreate_price_eq_renew,
        public string $domain,
        public bool $idn,
        public int $reg_min_period,
        public int $reg_max_period,
        public int $renew_min_period,
        public int $renew_max_period,
        public float $price_reg,
        public float $price_renew,
        public float $retail_price_reg,
        public float $retail_price_renew,
    ) {}

    public static function from(mixed ...$payloads): static
    {
        $data = current($payloads);

        return new self(
            // $data['extcreate_price_eq_renew'],
            $data['tld'],
            $data['idn'],
            $data['reg_min_period'],
            $data['reg_max_period'],
            $data['renew_min_period'],
            $data['renew_max_period'],
            $data['reg_price'],
            $data['renew_price'],
            $data['retail_reg_price'],
            $data['retail_renew_price'],
        );
    }
}
