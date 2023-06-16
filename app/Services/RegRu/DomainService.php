<?php
namespace App\Services\RegRu;

use App\Services\RegRu\Data\DomainData;
use Reg;

class DomainService
{
    public function getDomains()
    {
        if ($data = Reg::send('service/get_list', ['servtype' => 'domain'])) {
            return array_map(fn (array $el) => DomainData::fromJson($el), $data['services']);
        }

        return false;
    }
}
