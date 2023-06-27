<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recruiters>
 */
class RecruitersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::get('id');
        return [
            'organisation_name' => fake()->company(),
            'location' => fake()->country(),
            'about'=>fake()->paragraph(3),
            'industry'=>fake()->name(),
            'website'=>'https://sampleWebsite.com',
            'email'=>fake()->companyEmail(),
            'userId'=>$users
        ];
    }
}
