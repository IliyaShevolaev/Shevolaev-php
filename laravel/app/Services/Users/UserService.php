<?php

namespace App\Services\Users;

use App\Models\User;
use Illuminate\Support\Collection;

class UserService 
{
    public function all() : Collection
    {
        return User::all();
    }

    public function store(array $userData) : User
    {
        return User::create($userData);
    }

    public function update(array $userData, User $user) : User
    {
        $user->update($userData);

        return $user;
    }
}
