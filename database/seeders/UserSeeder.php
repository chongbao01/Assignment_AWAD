<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Kevin Hart',
            'email' => 'kevinhart@example.com',
            'password' => Hash::make('kevinsecure'),
            'bio' => 'Comedian and Actor',
            'skill' => 'CEO of Laugh Factory'
        ]);
        User::create([
            'name' => 'Laura Adams',
            'email' => 'lauraadams@example.com',
            'password' => Hash::make('laurapass'),
            'bio' => 'Digital Marketer',
            'skill' => 'Director of Marketing Solutions'
        ]);
        User::create([
            'name' => 'Michael Scott',
            'email' => 'michaelscott@example.com',
            'password' => Hash::make('michael123'),
            'bio' => 'Regional Manager',
            'skill' => 'CEO of Dunder Mifflin'
        ]);
        User::create([
            'name' => 'Nancy Drew',
            'email' => 'nancydrew@example.com',
            'password' => Hash::make('nancysecure'),
            'bio' => 'Detective',
            'skill' => 'Python, JavaScript',
        ]);
        User::create([
            'name' => 'Oscar Wilde',
            'email' => 'oscarwilde@example.com',
            'password' => Hash::make('oscarpass'),
            'bio' => 'Writer and Poet',
            'skill' => 'Director of Literary Arts',
        ]);
        User::create([
            'name' => 'Pam Beesly',
            'email' => 'pambeesly@example.com',
            'password' => Hash::make('pamsecure'),
            'bio' => 'Graphic Designer',
            'skill' => 'Java, C++',
        ]);
        User::create([
            'name' => 'Quincy Jones',
            'email' => 'quincyjones@example.com',
            'password' => Hash::make('quincy123'),
            'bio' => 'Music Producer',
            'skill' => 'CEO of Music World',
        ]);
        User::create([
            'name' => 'Rachel Green',
            'email' => 'rachelgreen@example.com',
            'password' => Hash::make('rachelpass'),
            'bio' => 'Fashion Designer',
            'skill' => 'Director of Fashion Inc.',
        ]);
        User::create([
            'name' => 'Steve Rogers',
            'email' => 'steverogers@example.com',
            'password' => Hash::make('captain123'),
            'bio' => 'Super Soldier',
            'skill' => 'C#, PHP',
        ]);
        User::create([
            'name' => 'Tina Fey',
            'email' => 'tinafey@example.com',
            'password' => Hash::make('tinafey123'),
            'bio' => 'Comedian and Writer',
            'skill' => 'CEO of Comedy Writers',
        ]);
        User::create([
            'name' => 'Uma Thurman',
            'email' => 'umathurman@example.com',
            'password' => Hash::make('umapass'),
            'bio' => 'Actress',
            'skill' => 'JavaScript, Ruby',
        ]);
        User::create([
            'name' => 'Victor Hugo',
            'email' => 'victorhugo@example.com',
            'password' => Hash::make('victorpass'),
            'bio' => 'Novelist and Poet',
            'skill' => 'Director of Literary Works',
        ]); 
    }
}
