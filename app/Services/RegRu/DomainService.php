<?php
namespace App\Services\RegRu;

use App\Services\RegRu\Data\Domain\DomainData;
use App\Services\RegRu\Data\Domain\PriceData;
use Reg;

class DomainService
{
    /*
     * Получить стоимость регистрации доменов
     */
    public function getPrices(): array
    {
        if ($data = Reg::send('domain/get_prices', ['show_renew_data' => 1, 'show_update_data' => 1])) {
            array_walk( $data['prices'], fn (array &$data, $tld) => $data['tld'] = $tld);
            return array_filter(array_map(fn (array $data) => PriceData::from($data), $data['prices']));
        }

        return [];
    }

    /*
     * Получить список активных доменых имен
     */
    public function getDomains()
    {
        if ($data = Reg::send('service/get_list', ['servtype' => 'domain'])) {
            return array_filter(array_map(fn (array $data) => DomainData::fromJson($data), $data['services']));
        }

        return false;
    }
}
