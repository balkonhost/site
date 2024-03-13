<?php
namespace App\Console\Commands\RegRu;

use Illuminate\Console\Command;
use App\Services\RegRu\DomainService;
use App\Models\Provider;
use App\Models\TopLevelDomain;

class TopLevelDomains extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reg-ru:top-level-domains';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Получение списка доменов верхнего уровня в REG.RU для которых доступна регистрация.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(DomainService $domainService)
    {
        if ($provider = (new Provider())->where('name', 'reg.ru')->first()) {
            $domains = $domainService->getPrices();
            collect($domains)->each(function ($item) use ($provider) {
                $domain = TopLevelDomain::updateOrCreate(['domain' => $item->domain], $item->toArray());
                $provider->toplevelDomains()->updateExistingPivot($domain->id, [
                    'cost_new_price' => $item->cost_new_price,
                    'cost_renew_price' => $item->cost_renew_price,
                    'retail_new_price' => $item->retail_new_price,
                    'retail_renew_price' => $item->retail_renew_price,
                ]);
                die();
            });
        }


        die();



            // Обновление данных по доменам верхнего уровня

                $tld = TopLevelDomain::updateOrCreate(['domain' => $item->domain], $item->toArray());
                /*$tld->prices()->updateOrCreate(
                    [
                        'tld_id' => $tld->id,
                        'provider_id' => $provider->id
                    ],
                    array_merge(
                        $item->prices->toArray(),
                        ['provider_id' => $provider->id]
                    )
                );*/


    }
}
