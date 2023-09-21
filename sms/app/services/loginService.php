<?php

namespace App\services;
use Http;
class loginService
{

    private $email , $password, $header;
    public function __construct(string $email, string $password, $header)
    {
        $this->email = $email;
        $this->password = $password;
        $this->header = $header;
    }

    public function login()
    {
        $token = Http::withHeaders([
            // 'Cookie' => $this->header['Cookie'],
            // 'Postman-Token' => $this->header['Postman-Token'],
            // 'Content-Type' => $this->header['Content-Type'],
            // 'Host' => $this->header['Host'],
            // 'User-Agent' => $this->header['User-Agent'],
            // 'Accept-Encoding' => $this->header['Accept-Encoding'],
            // 'Connection' => $this->header['Connection'],
            // 'Accept' => $this->header['Accept']
        ])->post(config('services.auth.base_uri') . config('services.auth.login'), [
            'email' => $this->email,
            'password' => $this->password
        ]);

        return $token;
    }
}
