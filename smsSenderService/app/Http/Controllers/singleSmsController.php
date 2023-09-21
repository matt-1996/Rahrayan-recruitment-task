<?php

namespace App\Http\Controllers;
use App\Http\Controllers\smsController;
use Illuminate\Http\Request;
use App\services\rahrayanSms;
class singleSmsController extends Controller
{
    public function index(rahrayanSms $smsService, Request $request)
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

        $smsController = new smsController;
        $response = $smsController->sendMessage($smsService,
        $request->to,
        $request->message,
        $header);

        return $response;
    }
}
