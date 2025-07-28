<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getUserById($id);
    public function updateUser(User $user, array $data);
}