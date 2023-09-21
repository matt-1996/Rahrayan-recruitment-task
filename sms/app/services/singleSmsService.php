<?php

namespace App\services;
use Http;
class singleSmsService
{
    private $to , $message, $header;
    public function __construct(string $to,
    string|null $message,
    array $header)
    {
        if(!isset($message))
        {
            $message = 'باتشکر از شما بزودی با شما تماس خواهیم گرفت لغو ۱۱';
        }
        $this->to = $to;
        $this->message = $message;
        $this->header = $header;
    }

    public function send()
    {

        $url = config('services.sms.base_uri') . config('services.sms.single');

        $response = Http::withHeaders([
            'Cookie' => $this->header['Cookie'],
            'Postman-Token' => $this->header['Postman-Token'],
            'Content-Type' => $this->header['Content-Type'],
            'Host' => $this->header['Host'],
            'User-Agent' => $this->header['User-Agent'],
            'Accept-Encoding' => $this->header['Accept-Encoding'],
            'Connection' => $this->header['Connection'],
            'Accept' => $this->header['Accept']
        ])->get($url,[
                'to' => $this->to,
                'message' => $this->message
            ]);

        return $response;
    }
}
