<?php
namespace App\Tests\Unit\Entity;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{
    public function testConstructOk(): void
    {
        $user = new User(42, 'John', 'Doe');

        $this->assertEquals(42,     $user->id);
        $this->assertEquals('John', $user->firstName);
        $this->assertEquals('Doe',  $user->lastName);
    }

    public function testCreateFromRequestOk(): void
    {
        $user = User::createFromRequestBody(
            json_encode(
                array(
                    'id'        => 42,
                    'firstName' => 'John',
                    'lastName'  => 'Doe',
                )
            )
        );

        $this->assertEquals(42,     $user->id);
        $this->assertEquals('John', $user->firstName);
        $this->assertEquals('Doe',  $user->lastName);
    }

    /**
     * @dataProvider provideBadRequestBodies
     */
    public function testCreateFromRequestFailsBodyEmpty($requestBody): void
    {
        $user = User::createFromRequestBody($requestBody);

        $this->assertNull($user);
    }

    public function provideBadRequestBodies(): array
    {
        return [ [ '' ], [ '{id' ], [ '[]' ]];
    }
}
