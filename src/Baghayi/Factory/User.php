<?php
namespace Baghayi\Factory;

use Baghayi\User as UserValueObject;

final class User extends Factory {


    public function register(array $data) : UserValueObject
    {
        $response = $this->make('createUser', [
            'username' => $data['username'],
            'nickname' => $data['first_name'],
            'password' => $data['password'],
            'email' => $data['email'],
            'fname' => $data['first_name'],
            'lname' => $data['last_name'],
            'is_public' => true,
        ]);

        $result = json_decode($response->getBody(), true);

        if($result['ok'] === true) {
            return new UserValueObject($result['result']);
        }

        // handle errors :D
    }
}
