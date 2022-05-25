<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Test User', 
            'email' => 'user@test.com', 
            'password' => bcrypt('password'), 
            'email_verified_at' => now(), 
            'avatar' => 'avatar-1.jpg', 
            'created_at' => now(),
        ]);
    }
}
