<?php

namespace Database\Factories\Post;

use App\Models\User;
use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->sentence(),
            'user_id' => User::factory(),
            'post_id' => Post::factory(),
        ];
    }
}
