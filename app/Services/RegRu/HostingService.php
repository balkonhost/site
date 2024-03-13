<?php
namespace App\Services\RegRu;

use App\Services\RegRu\Data\Hosting\HostingData;
use App\Services\RegRu\Data\Hosting\HostingTariffData;
use Reg;

class HostingService
{
    public function get()
    {
        if ($data = Reg::send('service/get_list')) {
            return array_filter(array_map(fn(array $data) => HostingData::fromJson($data), $data['services']));
        }

        return false;
    }

    /*
     * Получение цен и общих данных по хостингу
     */
    public function getDetails()
    {
        if ($data = Reg::send('service/get_servtype_details', [
            'servtype' => 'srv_hosting_ispmgr',
            'only_actual' => 1,
        ])) {
            print_r($data);
            die();

            return array_filter(array_map(fn(array $data) => HostingDetailsData::fromJson($data), $data['services']));
        }
    }

    public function getPrices()
    {
        if ($data = Reg::send('service/get_prices', ['show_renew_data' => 1])) {
            return array_filter(array_map(fn(array $data) => HostingTariffData::fromJson($data), $data['services']));
        }
    }
}
