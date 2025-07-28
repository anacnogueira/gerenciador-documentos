<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $entity;

    public function __construct(User $user)
    {
        $this->entity = $user;
    }

    /**
     * Select User by ID
     * @param int $id
     * @return object
    */
    public function getUserById($id)
    {
        return $this->entity->find($id);
    }

     /**
     * Update data of user
     * @param object $user
     * @param array $data
     * @return object
     */
    public function updateUser(User $user, array $data)
    {
        return $user->update($data);
    }
}