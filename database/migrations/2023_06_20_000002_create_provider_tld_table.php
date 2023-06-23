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
        Schema::create('provider_tld', function (Blueprint $table) {
            $table->foreignId('provider_id')
                ->constrained('providers')
                ->cascadeOnDelete()
                ->comment('Идентификатор поставщика');

            $table->foreignId('tld_id')
                ->constrained('tlds')
                ->cascadeOnDelete()
                ->comment('Идентификатор домена');

            $table->decimal('reg_price', '12')->comment('Стоимость регистрации');
            $table->decimal('renew_price', '12')->comment('Стоимость продления регистрации');

            $table->unique(['provider_id', 'tld_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider_tld');
    }
};