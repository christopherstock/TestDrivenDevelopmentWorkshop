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

    public function createUser(string $requestBody): int
    {
        $userDataFromRequest = User::createFromRequestBody($requestBody);
        if ($userDataFromRequest === null) {
            return Response::HTTP_BAD_REQUEST;
        }

        $success = $this->db->createUser($userDataFromRequest->firstName, $userDataFromRequest->lastName);
        if (!$success) {
            return Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return Response::HTTP_CREATED;
    }

    public function readUser(int $id): User
    {
        return $this->db->readUser($id);
    }

    public function updateUser(int $id, string $requestBody): bool
    {
        $userDataFromRequest = User::createFromRequestBody($requestBody);

        return $this->db->updateUser($id, $userDataFromRequest->firstName, $userDataFromRequest->lastName);
    }

    public function deleteUser(int $id): bool
    {
        return $this->db->deleteUser($id);
    }
}
