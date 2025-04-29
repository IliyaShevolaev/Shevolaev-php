<?php

namespace App\Services\Users;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class UserService 
{
    public function all() : Collection
    {
        return User::all();
    }

    public function store(array $userData) : User
    {
        Log::channel('model-changing')->info('New comment was created with data:' . json_encode($userData));

        return User::create($userData);
    }

    public function update(array $userData, User $user) : User
    {
        Log::channel('model-changing')->info('Post was updated: ' . json_encode($user->toArray()) . ' to new data: ' . json_encode($userData));

        $user->update($userData);

        return $user;
    }
}
