<?php

namespace app\services;

use App\interfaces\smsInterface;
use GuzzleHttp\Client;
use Exception;
use Http;
class rahrayanSms implements smsInterface
{
     private $username;
     private $password;
     private $from;

     public function __construct() {
        $this->username = env('RayanSmsUsername', 'null');
        $this->password = env('RayanSmsPassword', 'null');
        $this->from = env('RayanSmsFrom', 'null');
    }

    function send(string $to, string|null $message, $header)
    {
        if(!isset($message)){
            $message = 'باتشکر از شما بزودی با شما تماس خواهیم گرفت لغو ۱۱';
        }

        $message = urlencode($message);


        $optURL = "http://sms20.ir/send_via_get/send_sms.php";

        $response = Http::withHeaders([
            // 'Cookie' => $header['Cookie'],
            // 'Postman-Token' => $header['Postman-Token'],
            // 'Content-Type' => $header['Content-Type'],
            // 'Host' => $header['Host'],
            // 'User-Agent' => $header['User-Agent'],
            // 'Accept-Encoding' => $header['Accept-Encoding'],
            // 'Connection' => $header['Connection'],
            // 'Accept' => $header['Accept']
        ])->get($optURL,[
            "username" => $this->username,
            "password" => $this->password,
            "sender_number" => $this->from,
            "receiver_number" => $to,
            "note" => $message
        ]);


        return $response;
    }
}
