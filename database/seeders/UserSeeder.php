<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Seed a single user
        DB::table('users')->insert([
            'name' => 'Petugas',
            'email' => 'petugas@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'), // Use a secure password
            'remember_token' => Str::random(10),
        ]);

        // Seed multiple users using a loop
        $users = [
            [
                'name' => 'Staff',
                'email' => 'staff@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'pengguna',
                'email' => 'pengguna@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
