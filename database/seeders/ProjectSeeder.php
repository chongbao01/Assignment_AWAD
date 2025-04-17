<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        Project::unguard();

        // Clear existing projects
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks
        Project::truncate(); // Truncate the projects table
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Enable foreign key checks

        // Create 15 new projects with random data
        for ($i = 0; $i < 15; $i++){
            Project::create([
                'owner_id' => $faker->numberBetween(1, 10), // Random owner_id between 1 and 10
                'freelancer_id' => 0, // Null freelancer_id
                'title' => $faker->sentence(3), // Random project title
                'description' => $faker->paragraph, // Random project description
                'budget' => $faker->numberBetween(1000, 10000), // Random budget between 1000 and 10000
                'status' => 'open', // All projects with 'open' status
            ]);
        }

        Project::reguard();
    }
}
