<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use App\Models\User;
use App\services\signUpService;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as r;
class newUserController extends Controller
{

    public function __invoke(Request $request)
    {
        $header = [
            'Cookie' => $request->header('Cookie'),
            'Postman-Token' => $request->header('Postman-Token'),
            'Content-Type' => $request->header('Content-Type'),
            'Host' => $request->header('Host'),
            'User-Agent' => $request->header('User-Agent'),
            'Accept-Encoding' => $request->header('Accept-Encoding'),
            'Connection' => $request->header('Connection'),
            'Accept' => $request->header('Accept')
        ];

        $signUpService = new signUpService($request->name,
                $request->email,
                $request->password, $header);

        $response = $signUpService->signup();

        return $response;

    }
}
