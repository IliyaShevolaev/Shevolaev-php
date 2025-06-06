<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()->count(1)->create();

        foreach ($users as $user) {
            $user->assignRole('user');
        }
    }
}
