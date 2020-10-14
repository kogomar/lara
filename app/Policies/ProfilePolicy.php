<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    public function index($user)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->role_id == User::ROLE_ADMIN;
    }

    public function show($user)
    {
        return true;
    }

    public function edit(User $user)
    {
        return $user->role_id === User::ROLE_ADMIN;
    }

    public function delete(User $user)
    {
        return $user->role_id === User::ROLE_ADMIN;
    }

}
