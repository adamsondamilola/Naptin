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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('course_code');
            $table->foreignId('trainer_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('program_type_id')->constrained()->onDelete('cascade');
            $table->string('course_title');
            $table->text('description');
            $table->string('course_image');
            $table->string('program_category');
            $table->string('advert_code')->nullable();
            $table->date('start_date');
            $table->string('duration');
            $table->float('cost');
            $table->integer('no_of_installments');
            $table->float('min_deposit');
            $table->enum('pub_status', ['draft', 'published', 'submitted']);
            $table->date('pub_date');
            $table->date('ad_close_date');
            $table->date('pay_close_date');
            $table->date('projected_start_date');
            $table->date('actual_start_date');
            $table->date('projected_end_date');
            $table->date('actual_end_date');
            $table->string('no_of_installments');
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
        Schema::dropIfExists('courses');
    }
};
