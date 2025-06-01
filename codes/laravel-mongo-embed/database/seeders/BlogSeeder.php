<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::truncate();

        Blog::create([
            'title' => 'First Blog Post',
            'content' => 'This is a blog post with comments.',
            'comments' => [
            ['author' => 'Kim', 'comment' => 'Great post!'],
            ['author' => 'Susi', 'comment' => 'Thanks for the info.']
            ]
        ]);

        Blog::create([
            'title' => 'Second Blog Post',
            'content' => 'Another post with more comments.',
            'comments' => [
            ['author' => 'Zahra', 'comment' => 'Very helpful!']
            ]
        ]);

        Blog::create([
            'title' => 'Third Blog Post',
            'content' => 'Insights from Europe.',
            'comments' => [
            ['author' => 'Liam', 'comment' => 'Fantastic read!'],
            ['author' => 'Emma', 'comment' => 'Loved the perspective.']
            ]
        ]);

        Blog::create([
            'title' => 'Fourth Blog Post',
            'content' => 'Thoughts from Africa.',
            'comments' => [
            ['author' => 'Kwame', 'comment' => 'Very inspiring!'],
            ['author' => 'Amina', 'comment' => 'Great insights, thank you!']
            ]
        ]);
    }
}
