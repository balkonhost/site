<?php
namespace App\Console\Commands\RegRu;

use App\Models\Provider;
use App\Models\TopLevelDomain;
use App\Services\RegRu\Data\TopLevelDomainData;
use App\Services\RegRu\DomainService;
use Exception;
use Illuminate\Console\Command;

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
    protected $description = 'Получение списка доменов верхнего уровня в REG.RU';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(DomainService $domainService, Provider $provider, TopLevelDomain $tld)
    {
        if ($provider = $provider->where('name', 'reg.ru')->first()) {
            $prices = $domainService->getPrices(['show_renew_data' => true]);
            if ('RUR' == array_shift($prices) && '169/175' == array_shift($prices)) {

                $domains = array_shift($prices);
                array_walk($domains, fn (array &$data, $domain) => $data['domain'] = $domain);
                $domains = array_map(fn ($domain) => TopLevelDomainData::from($domain), $domains);

                // Обновление данных по доменам
                collect($domains)->each(function ($item) use ($provider, $tld) {
                    $domain = $tld->updateOrCreate(['domain' => $item->domain], $item->toArray());

                    $provider->toplevelDomains()->sync([$domain->id => [
                        'retail_new_price' => $item->retail_new_price,
                        'retail_renew_price' => $item->retail_renew_price,
                        'new_price' => $item->new_price,
                        'renew_price' => $item->renew_price
                    ]], false);
                });

                // Удаление не используемых доменов
                if ($names = array_column($domains, 'domain')) {
                    $provider->toplevelDomains()->whereNotIn('domain', $names)->each(function ($item) {
                        $item->delete();
                    });
                }

            } else {
                throw new Exception('Не выбран тариф 169/175');
            }
        }
    }
}
