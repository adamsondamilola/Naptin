<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['draft', 'published', 'submitted'];
        return [
            'uuid' => Str::uuid(),
            'course_code' => $this->faker->word,
            'trainer_id' => 1,
            'course_type_id' => rand(1, 5),
            'program_type_id' => rand(1, 4),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'course_image' => $this->faker->imageUrl,
            'program_category' => $this->faker->word,
            'start_date' => now(),
            'duration' => rand(1, 5).' month',
            'cost' => rand(1500000, 240500200),
            'no_of_installments' => rand(1, 3),
            'min_deposit' => rand(10000, 200000),
            'status' => $statuses[array_rand($statuses)],
            'published_date' => $this->faker->date,
            'ad_close_date' => $this->faker->date,
            'pay_close_date' => $this->faker->date,
            'projected_start_date' => $this->faker->date,
            'actual_start_date' => $this->faker->date,
            'projected_end_date' => $this->faker->date,
            'actual_end_date' => $this->faker->date
        ];
    }
}
