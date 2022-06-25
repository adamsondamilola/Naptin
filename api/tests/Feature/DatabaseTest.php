<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test.
     *
     * @return void
     */
    public function test_the_course_model()
    {
        Course::create([
            'trainer_id' => 1,
            'program_type_id' => 1,
            'course_title' => 1,
            'description' => 1,
            'course_image' => 1,
            'program_category' => 1,
            'advert_code' => 1,
            'start_date' => 1,
            'duration' => 1,
            'cost' => 1,
            'no_of_installments' => 1,
            'min_deposit' => 1,
            'pub_status' => 1,
            'pub_date' => 1,
            'ad_close_date' => 1,
            'pay_close_date' => 1,
            'projected_start_date' => 1,
            'actual_start_date' => 1,
            'projected_end_date' => 1,
            'actual_end_date' => 1,
        ]);

        // $response->assertStatus(200);
        $this->assertDatabaseCount('courses', 1);
    }
}
