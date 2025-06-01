<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'William', 'email' => 'william@example.com', 'password' => bcrypt('password123')],
            ['name' => 'Nia', 'email' => 'nia@example.com', 'password' => bcrypt('password123')],
        ]);
    
        DB::table('products')->insert([
            ['name' => 'Laptop', 'price' => 1000],
            ['name' => 'Phone', 'price' => 600],
        ]);
    
        DB::table('orders')->insert([
            ['user_id' => 1, 'product_id' => 1, 'quantity' => 2],
            ['user_id' => 1, 'product_id' => 2, 'quantity' => 1],
            ['user_id' => 2, 'product_id' => 1, 'quantity' => 1],
        ]);
    }
}
