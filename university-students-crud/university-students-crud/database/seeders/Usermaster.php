<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\User;
class Usermaster extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $user = [
            [
                
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        ];
        foreach ($user as $key => $user) {
            User::create($user);
        }
    }
}
