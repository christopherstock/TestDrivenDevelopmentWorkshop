<?php
namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class DataService
{
    private UserRepository $db;

    public function __construct(UserRepository $db)
    {
        $this->db = $db;
    }

    public function createUser(string $requestBody): void
    {
        $userDataFromRequest = User::createFromRequestBody($requestBody);
        $success = $this->db->createUser($userDataFromRequest->firstName, $userDataFromRequest->lastName);
    }

    public function readUser(int $id): User
    {
        return $this->db->readUser($id);
    }

    public function updateUser(int $id, string $requestBody): void
    {
        $userDataFromRequest = User::createFromRequestBody($requestBody);
        $success =  $this->db->updateUser($id, $userDataFromRequest->firstName, $userDataFromRequest->lastName);
    }

    public function deleteUser(int $id): void
    {
        $success = $this->db->deleteUser($id);
    }
}
