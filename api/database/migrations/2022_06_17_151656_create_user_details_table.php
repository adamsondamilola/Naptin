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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['m', 'f'])->nullable();
            $table->string('phone_number')->nullable();
            $table->string('avatar')->nullable();
            $table->string('signature')->nullable();
            $table->string('residential_address')->nullable();
            $table->unsignedInteger('state_of_residence')->nullable();
            $table->unsignedInteger('state_of_origin')->nullable();
            $table->unsignedBigInteger('lga_of_origin')->nullable();


            $table->foreign('state_of_residence')->references('id')->on('states')->restrictOnDelete();
            $table->foreign('state_of_origin')->references('id')->on('states')->restrictOnDelete();
            $table->foreign('lga_of_origin')->references('id')->on('local_areas')->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
