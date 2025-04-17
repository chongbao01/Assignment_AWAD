<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bid;
use Illuminate\Support\Facades\DB;

class BidSeeder extends Seeder
{
    public function run()
    {
        Bid::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks
        Bid::truncate(); // Truncate the bids table
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Enable foreign key checks

        Bid::create([
            'project_id' => 2,
            'freelancer_id' => 3,
            'bid_amount' => 5000,
            'msg' => 'I am interested in this project.',
        ]);
        
        Bid::create([
            'project_id' => 4,
            'freelancer_id' => 5,
            'bid_amount' => 6000,
            'msg' => 'I can complete this project within a 2 month.',
        ]);

        Bid::create([
            'project_id' => 4,
            'freelancer_id' => 2,
            'bid_amount' => 7000,
            'msg' => 'I have experience in this field.',
        ]);

        Bid::create([
            'project_id' => 4,
            'freelancer_id' => 7,
            'bid_amount' => 8000,
            'msg' => 'I can deliver high-quality work.',
        ]);

        Bid::create([
            'project_id' => 3,
            'freelancer_id' => 4,
            'bid_amount' => 9000,
            'msg' => 'I am available to start immediately.',
        ]);

        Bid::create([
            'project_id' => 6,
            'freelancer_id' => 6,
            'bid_amount' => 10000,
            'msg' => 'I have a strong portfolio in this area.',
        ]);

        Bid::create([
            'project_id' => 8,
            'freelancer_id' => 8,
            'bid_amount' => 11000,
            'msg' => 'I can work within your budget.',
        ]);
        
        Bid::create([
            'project_id' => 7,
            'freelancer_id' => 4,
            'bid_amount' => 12000,
            'msg' => 'I have a proven track record of success.',
        ]);

        Bid::create([
            'project_id' => 5,
            'freelancer_id' => 7,
            'bid_amount' => 13000,
            'msg' => 'I am committed to delivering quality work.',
        ]);

        Bid::create([
            'project_id' => 5,
            'freelancer_id' => 10,
            'bid_amount' => 14000,
            'msg' => 'I can provide references upon request.',
        ]);

        Bid::create([
            'project_id' => 5,
            'freelancer_id' => 9,
            'bid_amount' => 15000,
            'msg' => 'I am passionate about this project.',
        ]);
        Bid::reguard();
    }
}

