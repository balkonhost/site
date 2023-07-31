<?php
namespace App\Console\Commands\RegRu;

use Illuminate\Console\Command;
use App\Services\RegRu\DomainService;
use App\Models\Provider;
use App\Models\Domain;

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
    public function handle(DomainService $domainService): void
    {
        $domains = $domainService->getDomains();

        if ($provider = Provider::find(1)) {
            // Обновление данных по доменам
            collect($domains)->each(function ($item) use ($provider) {
                $domain = Domain::updateOrCreate(['domain' => $item->domain], $item->toArray());
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
