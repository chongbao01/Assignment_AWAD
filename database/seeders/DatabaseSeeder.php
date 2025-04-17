<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            // UserSeeder::class,
            ProjectSeeder::class,
            // BidSeeder::class,
            // MilestoneSeeder::class,
            // PaymentSeeder::class,
        ]);
    }
}
