<?php

namespace App\Interfaces;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function getAllUsers();
    public function findUserById($id);
    public function createUser(array $data);
    public function updateUser($id, array $data);
    public function deleteUser($id);
}