<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('course_code');
            $table->foreignId('trainer_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('course_type_id')->constrained()->restrictOnDelete();
            $table->foreignId('program_type_id')->constrained()->restrictOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('course_image');
            $table->string('program_category');
            $table->string('advert_code')->nullable();
            $table->date('start_date');
            $table->string('duration');
            $table->bigInteger('cost');
            $table->integer('no_of_installments');
            $table->bigInteger('min_deposit');
            $table->enum('status', ['draft', 'published', 'submitted']);
            $table->date('published_date');
            $table->date('ad_close_date');
            $table->date('pay_close_date');
            $table->date('projected_start_date');
            $table->date('actual_start_date');
            $table->date('projected_end_date');
            $table->date('actual_end_date');
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
        Schema::dropIfExists('courses');
    }
};
