<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseType;
use App\Models\ProgramType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        CourseType::factory(5)->create();
        ProgramType::factory(4)->create();
        Course::factory(10)->create();
    }
}
