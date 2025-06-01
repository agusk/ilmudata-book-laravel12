<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            ['title' => 'Clean Code', 'author' => 'Robert C. Martin', 'year' => 2008],
            ['title' => 'The Pragmatic Programmer', 'author' => 'Andy Hunt', 'year' => 1999],
            ['title' => 'Design Patterns', 'author' => 'Erich Gamma', 'year' => 1994],
        ]);
    }
}
