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
        Schema::create('emails', function (Blueprint $table) {
            $table->id()->comment('Идентификатор');
            $table->string('email')->unique()->comment('Email адрес');

            $table->dateTime('sented_at')->nullable()->comment('Отправлено');
            $table->dateTime('readed_at')->nullable()->comment('Прочитано');
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
        Schema::dropIfExists('emails');
    }
};
