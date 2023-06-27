<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JobPost;
use App\Models\Recruiters;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // DB::table('user_roles')->insert([
        //     'Roles' => "Admin",
        // ]);
        // DB::table('user_roles')->insert([
        //     'Roles' => "Recruiter",
        // ]);
        // DB::table('user_roles')->insert([
        //     'Roles' => "Job Seeker",
        // ]);
        // User::factory(5)->create();
        // Recruiters::factory()->create([
        //     'organisation_name'=>'WorkWise',
        //     'location' => fake()->country(),
        //     'about'=>fake()->paragraph(3),
        //     'industry'=>'IT',
        //     'website'=>'http:/localhost:8000',
        //     'email'=>fake()->companyEmail(),
        //     'userId'=>5
        // ]);
        JobPost::factory(5)->create();
    }
}