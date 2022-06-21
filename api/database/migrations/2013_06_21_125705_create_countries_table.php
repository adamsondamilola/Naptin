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
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sortname', 3);
            $table->string('name', 150);
            $table->integer('phonecode');
        });

        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->integer('country_id')->default(1);
        });

        Schema::create('local_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('state_id');
            $table->string('name');
        });

        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'CountryStateLocalSeeder']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
        Schema::dropIfExists('states');
        Schema::dropIfExists('local_areas');
    }
};
