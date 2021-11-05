<?php
namespace App\Tests\Application\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class UserControllerTest extends WebTestCase
{
    public function testCreateOk(): void
    {
        $client = static::createClient();
        $client->jsonRequest('POST', '/user', array('firstName' => 'Jane', 'lastName' => 'Doe'));
        $response = $client->getResponse();

        $this->assertSame(Response::HTTP_CREATED, $response->getStatusCode());
    }

    public function testReadOk(): void
    {
        $client = static::createClient();
        $client->request('GET', '/user/321');
        $response = $client->getResponse();

        $expectedJson = json_encode(
            array('id' => 321, 'firstName' => 'firstName321', 'lastName' => 'lastName321'),
        );

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertJson($response->getContent());
        $this->assertJsonStringEqualsJsonString($expectedJson, $response->getContent());
    }

    public function testUpdateOk(): void
    {
        $client = static::createClient();
        $client->jsonRequest('PUT', '/user/42', array('firstName' => 'John', 'lastName' => 'Doe'));
        $response = $client->getResponse();

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
    }

    public function testDeleteOk(): void
    {
        $client = static::createClient();
        $client->request('DELETE', '/user/75');
        $response = $client->getResponse();

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
    }
}
