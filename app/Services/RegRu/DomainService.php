<?php
namespace App\Services\RegRu;

use App\Services\RegRu\Data\DomainData;
use App\Services\RegRu\Data\TldData;

use Reg;

class DomainService
{
    public function getDomains()
    {
        if ($data = Reg::send('service/get_list', ['servtype' => 'domain'])) {
            return array_map(fn (array $data) => DomainData::fromJson($data), $data['services']);
        }

        return false;
    }

    public function getTlds()
    {
        if ($data = Reg::send('domain/get_prices', ['show_renew_data' => 1, 'show_update_data' => 1])) {
            array_walk( $data['prices'], fn (array &$data, $tld) => $data['tld'] = $tld);
            return array_map(fn (array $data) => TldData::from($data), $data['prices']);
        }

        return false;
    }
}
