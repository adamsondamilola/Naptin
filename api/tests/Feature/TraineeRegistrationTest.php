<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TraineeRegistrationTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_trainee_can_register_step_one(): void
    {
        $this->withoutExceptionHandling();

        $registrationData = [
            'firstName' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'dateOfBirth' => $this->faker->date,
            'gender' => 'm',
            'email' => $this->faker->email,
            'phoneNumber' => '2348121442009',
            'password' => 'password',
            'password_confirmation' => 'password',
            'step' => 1
        ];

        $response = $this->post('/api/v1/auth/register', $registrationData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', ['email' => $registrationData['email']]);
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseCount('user_details', 1);
    }
}
