<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Update a user
     * @param int $id
     * @param arrray $data
     * @return json response
    */
    public function updateUser(int $id, array $data)
    {

        $user = $this->userRepository->getUserById($id);

        if (!$user) {
            return response()->json(['message' => 'User Not Found'], 404);
        }

        $this->userRepository->updateUser($user, $data);
        return response()->json(['message' => 'User Updated'], 200);
    }
}