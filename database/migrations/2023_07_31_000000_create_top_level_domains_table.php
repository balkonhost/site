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
        Schema::create('top_level_domains', function (Blueprint $table) {
            $table->id()->comment('Идентификатор');
            $table->string('domain')->unique()->comment('Доменное имя');
            $table->boolean('idn')->comment('IDN');
            $table->unsignedInteger('new_min_period')->comment('Минимальный период регистрации');
            $table->unsignedInteger('new_max_period')->comment('Максимальный период регистрации');
            $table->unsignedInteger('renew_min_period')->comment('Минимальный период продления регистрации');
            $table->unsignedInteger('renew_max_period')->comment('Максимальный период продления регистрации');
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
        Schema::dropIfExists('top_level_domains');
    }
};
