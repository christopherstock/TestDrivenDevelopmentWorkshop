<?php
namespace App\Tests\Integration\Service;

use App\Repository\UserRepository;
use App\Service\DataService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\Response;

class DataServiceTest extends KernelTestCase
{
    public function testCreateUserFails(): void
    {
        self::bootKernel();

        $userRepositoryMock = $this->createMock(UserRepository::class);
        $userRepositoryMock
            ->expects($this->once())
            ->method('createUser')
            ->with('John', 'Doe')
            ->willReturn(false);

        $container = static::getContainer();
        $container->set('App\Repository\UserRepository', $userRepositoryMock);

        /* @var DataService $dataService */
        $dataService = $container->get(DataService::class);
        $requestBody = json_encode(array('firstName' => 'John', 'lastName' => 'Doe'));

        $responseStatus = $dataService->createUser($requestBody);

        $this->assertSame(Response::HTTP_INTERNAL_SERVER_ERROR, $responseStatus);
    }

    public function testReadUserOk(): void
    {
        self::bootKernel();

        $userRepositoryMock = $this->createMock(UserRepository::class);
        $userRepositoryMock
            ->expects($this->once())
            ->method('readUser')
            ->with(42);

        $container = static::getContainer();
        $container->set('App\Repository\UserRepository', $userRepositoryMock);

        /* @var DataService $dataService */
        $dataService = $container->get(DataService::class);

        $dataService->readUser(42);
    }
}
