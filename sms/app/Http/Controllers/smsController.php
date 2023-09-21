<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\rahrayanSms;
use App\services\singleSmsService;
class smsController extends Controller
{
    public function index(Request $request)
    {

        $request->validate([
            'to' => 'required|numeric',
            'message' => 'min:10|max:50'
        ]);

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

        $sendSingleSms = new singleSmsService($request->to,
        $request->message,
        $header);

        $response = $sendSingleSms->send();
        return $response;

        // return return response()->json($request->to, 200);
    }
}
