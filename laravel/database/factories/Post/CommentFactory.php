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
        $user = User::inRandomOrder()->first() ?? User::factory()->create();

        return [
            'content' => $this->faker->sentence(),
            'user_id' => $user,
            'post_id' => Post::factory(),
        ];
    }
}
