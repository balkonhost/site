<?php
namespace App\Services\RegRu;

use App\Services\RegRu\Data\HostingData;

use Reg;

class HostingService
{
    public function get()
    {
        if ($data = Reg::send('service/get_list')) {
            return array_filter(array_map(fn (array $data) => HostingData::fromJson($data), $data['services']));
        }

        return false;
    }
}
