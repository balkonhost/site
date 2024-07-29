<?php
namespace App\Console\Commands\RegRu;

use App\Models\Domain;
use App\Models\Provider;
use App\Services\RegRu\Data\DomainData;
use App\Services\RegRu\DomainService;
use Illuminate\Console\Command;

class Domains extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reg-ru:domains';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Получение списка зарегистрированных доменов в REG.RU';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(DomainService $domainService, Provider $provider, Domain $domain): void
    {
        if ($provider = $provider->whereName('REG.RU')->first()) {
            $domains = array_map(fn (array $domain) => DomainData::prepare($domain), $domainService->getDomains());
            // Обновление данных по доменам
            collect($domains)->each(function ($item) use ($provider, $domain) {
                $domain = $domain->updateOrCreate(['domain' => $item->domain], $item->toArray());
                if ($domain->wasRecentlyCreated === true) {
                    $provider->domains()->attach([$domain->id], ['service_id' => $item->service_id]);
                }
            });

            // Удаление не используемых доменов
            if ($names = array_column($domains, 'domain')) {
                $provider->domains()->whereNotIn('domain', $names)->each(function ($item) {
                    $item->delete();
                });
            }
        }
    }
}
