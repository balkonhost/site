<?php
namespace App\Services\RegRu\Data;

use Spatie\LaravelData\Data;

class PriceData extends Data
{
    public function __construct(
        public int $reg_price,
        public int $renew_price,
        public int $retail_reg_price,
        public int $retail_renew_price,
    ) {}
}
