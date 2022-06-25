<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /* public function test_course_can_be_created(): void
    {
        $this->withoutExceptionHandling();

        $courseData = [
            'course_title' => $this->faker->title,
            'description' => $this->faker->text,

        ];

        $response = $this->post('/api/v1/courses', $courseData);

        $response->assertStatus(200);
        $response->assertStatus(201)->assertJson(compact('courseData'));
        $this->assertDatabaseCount('courses', 1);
    } */

    /** @test*/
    public function canCreateACourse()
    {
        $data = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $response = $this->json('Course', '/api/v1/courses', $data);

        $response->assertStatus(201)
            ->assertJson(compact('data'));

        $this->assertDatabaseHas('courses', [
        // 'title' => $data['title'],
        // 'description' => $data['description']
        ]);
    }

}
