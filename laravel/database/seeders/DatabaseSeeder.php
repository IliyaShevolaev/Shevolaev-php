<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\Post\PostSeeder;
use Database\Seeders\Post\CommentSeeder;
use Database\Seeders\User\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            UserSeeder::class,
        ]);
    }
}
