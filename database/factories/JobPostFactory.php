<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPost>
 */
class JobPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement([0, 1]);
        $type = fake()->randomElement(['Internship', 'Full Time']);
        return [
            'job_title' => fake()->jobTitle(),
            'position_title' => fake()->word(),
            'overview'=> fake()->paragraph(),
            'responsibilities'=>fake()->paragraph(4),
            'qualifications'=>fake()->paragraph(3),
            'organisation'=>3,
            'status'=>$status,
            'type'=>$type
        ];
    }
}
