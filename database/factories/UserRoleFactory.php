<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserRole>
 */
class UserRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        // $role = fake()->randomElement(['Admin', 'Recruiter', 'Job Seeker'])
        return [
            [
                'Roles' => 'Admin',
            ],
            [
                'Roles' => 'Recruiter',
            ],
            [
                'Roles' => 'Job Seeker'
            ]
        ];
    }
}
