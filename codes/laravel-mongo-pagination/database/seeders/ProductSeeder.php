<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();

        for ($i = 1; $i <= 100; $i++) {
            Product::create([
                'name' => "Product $i",
                'price' => rand(10, 500)
            ]);
        }
    }
}
