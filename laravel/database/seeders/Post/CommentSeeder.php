<?php

namespace Database\Seeders\Post;

use App\Models\Post\Post;
use App\Models\Post\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = Post::factory()->create();
        $image = storage_path('app/public/test-images/test-image.png');
        $post->addMedia($image)->preservingOriginal()->toMediaCollection('posts-images');

        Comment::factory()->count(100)->for($post)->create();
    }
}
