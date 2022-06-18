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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->datetime('birth_date')->nullable();
            $table->enum('gender', ['m', 'f'])->nullable();
            $table->string('phone_number')->nullable();
            $table->string('avatar')->nullable();
            $table->string('signature')->nullable();
            $table->string('residential_address')->nullable();
            $table->foreignId('state_of_residence')->constrained()->onDelete('cascade');
            $table->foreignId('state_of_origin')->constrained()->onDelete('cascade');
            $table->foreignId('lga_of_origin')->constrained()->onDelete('cascade');

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
        Schema::dropIfExists('user_details');
    }
};
