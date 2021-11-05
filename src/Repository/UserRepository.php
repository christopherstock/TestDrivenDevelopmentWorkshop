<?php
namespace App\Repository;

use App\Entity\User;

class UserRepository
{
    public function createUser(string $firstName, string $lastName): bool
    {
        return true;
    }

    public function readUser(int $id): User
    {
        return new User(
            $id,
            'firstName' . $id,
            'lastName'  . $id
        );
    }

    public function updateUser(int $id, string $firstName, string $lastName): bool
    {
        return true;
    }

    public function deleteUser(int $id): bool
    {
        return true;
    }
}
