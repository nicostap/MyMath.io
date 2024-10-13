<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'rating' => 1500,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'),
                'rating' => 1600,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'password' => Hash::make('password123'),
                'rating' => 1400,
                'created_at' => Carbon::now(),
                'active' => false,
            ],
            [
                'name' => 'Alexander Evanh',
                'email' => 'evan@example.com',
                'password' => Hash::make('password123'),
                'rating' => 2316,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Judo Smith',
                'email' => 'judo@example.com',
                'password' => Hash::make('password123'),
                'rating' => 2299,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Johan',
                'email' => 'johan@example.com',
                'password' => Hash::make('password123'),
                'rating' => 2498,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Jane Ford',
                'email' => 'ford@example.com',
                'password' => Hash::make('password123'),
                'rating' => 2501,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Miguel Loli',
                'email' => 'miguel@example.com',
                'password' => Hash::make('password123'),
                'rating' => 2501,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'John By',
                'email' => 'john.by@example.com',
                'password' => Hash::make('password123'),
                'rating' => 3000,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Vinnie Hoffman',
                'email' => 'vinnie@example.com',
                'password' => Hash::make('password123'),
                'rating' => 3128,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Mike Bennett',
                'email' => 'mike@example.com',
                'password' => Hash::make('password123'),
                'rating' => 100,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Norman Bass',
                'email' => 'norman@example.com',
                'password' => Hash::make('password123'),
                'rating' => 30,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Hoffman',
                'email' => 'hoffman@example.com',
                'password' => Hash::make('password123'),
                'rating' => 3128,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Caroline Hughes',
                'email' => 'caroline@example.com',
                'password' => Hash::make('password123'),
                'rating' => 1000,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Sylvia Whitney',
                'email' => 'sylvia@example.com',
                'password' => Hash::make('password123'),
                'rating' => 4111,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Jared Kramer',
                'email' => 'jared@example.com',
                'password' => Hash::make('password123'),
                'rating' => 4256,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Esmee Brock',
                'email' => 'esmee@example.com',
                'password' => Hash::make('password123'),
                'rating' => 5678,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Frankie Mullen',
                'email' => 'frankie@example.com',
                'password' => Hash::make('password123'),
                'rating' => 6315,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Darcy Valdez',
                'email' => 'darcy@example.com',
                'password' => Hash::make('password123'),
                'rating' => 6499,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Alexia Ryan',
                'email' => 'alexia@example.com',
                'password' => Hash::make('password123'),
                'rating' => 6789,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Sidney Mcclain',
                'email' => 'sidney@example.com',
                'password' => Hash::make('password123'),
                'rating' => 7629,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
            [
                'name' => 'Harry Walls',
                'email' => 'harry@example.com',
                'password' => Hash::make('password123'),
                'rating' => 8888,
                'created_at' => Carbon::now(),
                'active' => true,
            ],
        ]);
    }
}
