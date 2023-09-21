<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\interfaces\smsInterface;
use App\traits\smsTrait;
class smsController extends Controller
{
    use smsTrait;

    public function SendMessage(smsInterface $smsService,
    string $to, string|null $message, $header)
    {
        return $smsService->send($to,$message, $header);
    }

}
