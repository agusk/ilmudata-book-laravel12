<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Tag; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // create a profile for each user
        foreach (User::all() as $user) {
            $user->profile()->create([
                'bio' => 'This is a bio for user ' . $user->id,
                'website' => 'https://ilmudata.id/user/' . $user->id,
            ]);
        }

        // create posts for each user
        foreach (User::all() as $user) {
            $user->posts()->create([
                'title' => 'Post Title for user ' . $user->id,
                'content' => 'This is the content of the post for user ' . $user->id,
            ]);
        }

        // create tags and associate them with posts
        foreach (Post::all() as $post) {
            $tag = Tag::create(['name' => 'Tag for post ' . $post->id]);
            $post->tags()->attach($tag->id);
        }        
    }
}
