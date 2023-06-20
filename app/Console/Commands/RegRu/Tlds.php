<?php
namespace App\Console\Commands\RegRu;

use App\UserDomain;
use Illuminate\Console\Command;
use App\Services\RegRu\DomainService;
use App\Models\Provider;
use \App\Models\Tld;

class Tlds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reg-ru:tlds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting a list of TLDs with REG.RU';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(DomainService $domainService)
    {
        $tlds = $domainService->getTlds();

        if ($provider = Provider::find(1)) {
            // Обновление данных по доменам верхнего уровня
            collect($tlds)->each(function ($item) use ($provider) {
                $tld = Tld::updateOrCreate(['tld' => $item->tld], $item->toArray());
                $tld->prices()->updateOrCreate(
                    [
                        'tld_id' => $tld->id,
                        'provider_id' => $provider->id
                    ],
                    array_merge(
                        $item->prices->toArray(),
                        ['provider_id' => $provider->id]
                    )
                );
            });
        }
    }
}
