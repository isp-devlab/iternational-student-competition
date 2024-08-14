<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Jack Martin',
            'email' => 'jury@example.com',
            'role' => 'jury',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Jane natan',
            'email' => 'team@example.com',
            'phone_number' => '+628991177229',
            'role' => 'team',
            'password' => Hash::make('password'),
        ]);
    }
}
