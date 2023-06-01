<?php
namespace App\Tests\Integration\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\DataService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DataServiceTest extends KernelTestCase
{
    public function testReadUserOk(): void
    {
        self::bootKernel();

        $userRepositoryMock = $this->createMock(UserRepository::class);
        $userRepositoryMock
            ->expects($this->once())
            ->method('readUser')
            ->with(42)
            ->willReturn(new User(42, 'John', 'Doe'));

        $container = static::getContainer();
        $container->set('App\Repository\UserRepository', $userRepositoryMock);

        /* @var DataService $dataService */
        $dataService = $container->get(DataService::class);

        $user = $dataService->readUser(42);

        $this->assertEquals(42, $user->id);
        $this->assertEquals('John', $user->firstName);
        $this->assertEquals('Doe', $user->lastName);
    }
}
