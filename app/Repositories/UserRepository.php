<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Exceptions\ErrorsException;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

    /**
     * Get all users
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllUsers()
    {
        return $this->getAll();
    }

    /**
     * Find user by ID
     * @param $id
     * @return mixed
     * @throws ErrorsException
     */
    public function findUserById($id)
    {
        $user = $this->find($id);
        if (!$user) {
            throw new ErrorsException('User not found', 404);
        }
        return $user;
    }

    /**
     * Create a new user
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data)
    {
        return $this->create($data);
    }

    /**
     * Update an existing user
     * @param $id
     * @param array $data
     * @return mixed
     * @throws ErrorsException
     */
    public function updateUser($id, array $data)
    {
        $user = $this->find($id);
        if (!$user) {
            throw new ErrorsException('User not found', 404);
        }
        return $this->update($id, $data);
    }

    /**
     * Delete a user
     * @param $id
     * @return bool
     * @throws ErrorsException
     */
    public function deleteUser($id)
    {
        $user = $this->find($id);
        if (!$user) {
            throw new ErrorsException('User not found', 404);
        }
        return $this->delete($id);
    }
}