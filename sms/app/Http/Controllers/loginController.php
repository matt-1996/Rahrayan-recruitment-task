<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\loginService;
class loginController extends Controller
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

        $loginService = new loginService($request->email,
                $request->password, $header);

                $response = $loginService->login();

            return $response;
        }
}
