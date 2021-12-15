<?php
namespace App\Controller;

use App\Service\DataService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController
{
    /**
     * @Route("/user", methods={"POST"})
     */
    public function create(Request $request, DataService $dataService): Response
    {
        $httpResponseStatus = $dataService->createUser($request->getContent());

        return new Response('', $httpResponseStatus);
    }

    /**
     * @Route("/user/{id}", methods={"GET","HEAD"})
     */
    public function read(DataService $dataService, int $id): Response
    {
        $user = $dataService->readUser($id);

        return new JsonResponse($user);
    }

    /**
     * @Route("/user/{id}", methods={"PUT"})
     */
    public function update(Request $request, DataService $dataService, int $id): Response
    {
        $dataService->updateUser($id, $request->getContent());

        return new Response();
    }

    /**
     * @Route("/user/{id}", methods={"DELETE"})
     */
    public function delete(DataService $dataService, int $id): Response
    {
        $dataService->deleteUser($id);

        return new Response();
    }
}
