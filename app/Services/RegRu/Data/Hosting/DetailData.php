<?php
namespace App\Services\RegRu\Data\Hosting;

use Spatie\LaravelData\Data;

class DetailData extends Data
{
    public function __construct(
        public int $service_id,
        public string $state,
        public string $type,
        public string $subtype,
        public string $creation_date,
        public string $expiration_date,

    ) {}

    public static function fromJson(array $json): self|bool
    {
        print_r($json);
        die();

        /*
        [123] => Array
        (
            [commonname] => Web-хостинг
            [extparams] => Array
                (
                    [archive] => yes
                    [category] => vip
                    [cpu] => 200
                    [db] => unlim
                    [dblimit] => 4096
                    [dbnotify] => 3072
                    [disk] => 70GB
                    [free_ssl] => 1
                    [hosting_type] => ispmgr5_vip
                    [mysqlcpu] => 100
                    [name] => VIP-4
                    [php] => 1
                    [reqlimit] => 150
                    [site] => unlim
                    [yametrika] => st-order-host-vip-4
                    [yametrika2] => st-order-host-btrx4
                )

            [is_renewable] => 1
            [periods_new] => 1-60
            [periods_renew] => 1-60
            [price_new] => 3529
            [price_renew] => 3529
            [servtype] => srv_hosting_ispmgr
            [subtype] => VIP-4-1019
            [unit] => month
         */

        return false;
    }
}
