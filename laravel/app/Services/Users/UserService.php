<?php

namespace App\Services\Users;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class UserService 
{
    public function all() : Collection
    {
        return User::with('roles')->get();
    }

    public function store(array $userData) : User
    {
        Log::channel('model-changing')->info('New comment was created with data:' . json_encode($userData));

        $userRole = $userData['role'];
        unset($userData['role']);

        $user = User::create($userData);
        $user->assignRole($userRole);

        return $user;
    }

    public function update(array $userData, User $user) : User
    {
        Log::channel('model-changing')->info('Post was updated: ' . json_encode($user->toArray()) . ' to new data: ' . json_encode($userData));

        $userNewRole = $userData['role'];
        unset($userData['role']);

        if (empty($userData['password'])) {
            unset($userData['password']);
        }

        $user->update($userData);

        $user->syncRoles([$userNewRole]);

        return $user;
    }
}
