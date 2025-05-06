<?php

namespace Database\Seeders\Post;

use App\Models\Post\Comment;
use App\Models\Post\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory()->has(Comment::factory()->count(10))->count(10)->create();

        foreach ($posts as $post) {
            $image = storage_path('app/public/test-images/test-image.png');
            $post->addMedia($image)->preservingOriginal()->toMediaCollection('posts-images');
        }
    }
}
