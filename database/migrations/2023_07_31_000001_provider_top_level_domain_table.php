<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_top_level_domain', function (Blueprint $table) {
            $table->foreignId('provider_id')
                ->constrained('providers')
                ->cascadeOnDelete()
                ->comment('Идентификатор поставщика');

            $table->foreignId('top_level_domain_id')
                ->constrained('top_level_domains')
                ->cascadeOnDelete()
                ->comment('Идентификатор домена верхнего уровня');

            $table->decimal('cost_new_price', '12')->comment('Стоимость регистрации');
            $table->decimal('cost_renew_price', '12')->comment('Стоимость продления регистрации');

            $table->decimal('retail_new_price', '12')->comment('Розничная стоимость регистрации');
            $table->decimal('retail_renew_price', '12')->comment('Розничная стоимость продления регистрации');

            $table->decimal('new_price', '12')->nullable()->comment('Cтоимость регистрации');
            $table->decimal('renew_price', '12')->nullable()->comment('Cтоимость продления регистрации');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider_top_level_domain');
    }
};
