<?php
namespace App\Services\RegRu\Data;

use Spatie\LaravelData\Data;

class TopLevelDomainData extends Data
{
    public function __construct(
        //public $extcreate_price_eq_renew,
        public string $domain,
        public bool $idn,
        public int $new_min_period,
        public int $new_max_period,
        public int $renew_min_period,
        public int $renew_max_period,
        public float $new_price,
        public float $renew_price,
        public float $retail_new_price,
        public float $retail_renew_price,
    ) {}

    public static function from(mixed ...$payloads): static
    {
        $data = current($payloads);

        return new self(
            // $data['extcreate_price_eq_renew'],
            $data['domain'],
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
