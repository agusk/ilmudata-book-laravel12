<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            ['name' => 'Hiroshi', 'salary' => 5500, 'years_of_service' => 3],
            ['name' => 'Yuki', 'salary' => 7200, 'years_of_service' => 4],
            ['name' => 'Liam', 'salary' => 9500, 'years_of_service' => 6],
            ['name' => 'Emma', 'salary' => 11000, 'years_of_service' => 9],
        ]);
    }
}
