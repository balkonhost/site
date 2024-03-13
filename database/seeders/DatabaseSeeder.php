<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //$this->seedProviders();
    }

    public function seedProviders()
    {
        $providers = [
            ['id' => 1, 'name' => 'REG.RU'],
            ['id' => 2, 'name' => 'RU-CENTER'],
            ['id' => 3, 'name' => 'R01'],
        ];

        collect($providers)->each(function ($provider) {
            \App\Models\Provider::create($provider);
        });
    }
}
