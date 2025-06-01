<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@ilmudata.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
    
        User::create([
            'name' => 'Manager User',
            'email' => 'manager@ilmudata.id',
            'password' => Hash::make('password123'),
            'role' => 'manager',
        ]);
    
        User::create([
            'name' => 'General User',
            'email' => 'user@ilmudata.id',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}
