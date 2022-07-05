<?php

namespace Tests\Feature;

use App\Enums\ApplicationStatus;
use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CourseApplicationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_new_application_for_a_course_is_successful(): void
    {
        $this->withoutExceptionHandling();

        Sanctum::actingAs(User::factory()->create());

        $this->artisan('db:seed', ['--class' => 'CourseSeeder']);
        $course = Course::find(1);

        $response = $this->post('/api/v1/application/create', [
            'courseUuid' => $course->uuid
        ]);

        $jsonResponse = $response->json();

        $this->assertArrayHasKey('applicationNumber', $jsonResponse['data']);
        $this->assertEquals(ApplicationStatus::PROSPECTIVE->value, $jsonResponse['data']['applicationStatus']);
        $this->assertDatabaseCount('applications', 1);
        $response->assertStatus(201);
    }
}
