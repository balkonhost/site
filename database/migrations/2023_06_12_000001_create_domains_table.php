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
        Schema::create('domains', function (Blueprint $table) {
            $table->id()->comment('Идентификатор');
            $table->string('domain')->unique('domain_unique')->comment('Доменное имя');
            $table->enum('state', ['active', 'inactive', 'suspended', 'deleted', 'moved'])->default('inactive')->comment('Состояние');
            $table->date('creation_date');
            $table->date('expiration_date');
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
        Schema::dropIfExists('domains');
    }
};
