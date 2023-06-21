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
        Schema::create('tld_prices', function (Blueprint $table) {
            $table->id()->comment('Идентификатор');
            $table->foreignId('tld_id')->constrained('tlds')->cascadeOnDelete()->comment('Идентификатор домена');
            $table->foreignId('provider_id')->constrained('providers')->cascadeOnDelete()->comment('Идентификатор поставщика');
            $table->decimal('reg_price')->comment('Стоимость регистрации');
            $table->decimal('renew_price')->comment('Стоимость продления регистрации');
            $table->decimal('retail_reg_price')->comment('Розничная стоимость регистрации');
            $table->decimal('retail_renew_price')->comment('Розничная стоимость продления регистрации');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tld_prices');
    }
};
