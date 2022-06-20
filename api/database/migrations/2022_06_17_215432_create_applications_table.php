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
    public function up() : void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('application_number')->unique();
            $table->foreignId('user_id');
            $table->foreignId('course_id');
            $table->string('title');
            $table->tinyInteger('status')->default(0);

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
        Schema::dropIfExists('applications');
    }
};
