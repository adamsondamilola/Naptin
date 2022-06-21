<?php

namespace Tests\Feature;

use App\Enums\Gender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
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
            'first_name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date,
            'gender' => array_rand(Gender::cases()),
            'email' => $this->faker->email,
            'phone' => '2348121442009',
            'password' => Hash::make('password'),
            'step' => 1
        ];

        $response = $this->post('/api/v1/auth/register', $registrationData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', ['email' => $registrationData['email']]);
        $this->assertDatabaseCount('users', 1);
    }
}
