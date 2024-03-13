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
        Schema::create('provider_domain', function (Blueprint $table) {
            $table->foreignId('provider_id')
                ->constrained('providers')
                ->cascadeOnDelete()
                ->comment('Идентификатор поставщика');

            $table->foreignId('domain_id')
                ->constrained('domains')
                ->cascadeOnDelete()
                ->comment('Идентификатор домена');

            $table->string('service_id')->comment('Идентификатор у поставщика услуг');

            $table->unique(['provider_id', 'domain_id']);
            $table->unique(['provider_id', 'service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider_domain');
    }
};
