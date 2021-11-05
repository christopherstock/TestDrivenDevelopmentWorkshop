<?php
namespace App\Entity;

class User
{
    public int    $id;
    public string $firstName;
    public string $lastName;

    public function __construct(int $id, string $firstName, string $lastName) {
        $this->id        = $id;
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
    }

    public static function createFromRequestBody(string $requestBody) :?User
    {
        $json = json_decode($requestBody);
        if (!is_object($json)) return null;

        return new User(
            $json->id        ??= -1,
            $json->firstName ??= '',
            $json->lastName  ??= '',
        );
    }
}
