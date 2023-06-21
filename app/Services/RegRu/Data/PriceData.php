<?php
namespace App\Services\RegRu\Data;

use Spatie\LaravelData\Data;

class PriceData extends Data
{
    public function __construct(
        public float $reg_price,
        public float $renew_price,
        public float $retail_reg_price,
        public float $retail_renew_price,
    ) {}
}
