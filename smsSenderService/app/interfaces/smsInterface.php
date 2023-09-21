<?php

namespace app\interfaces;

interface smsInterface
{
    public function send(string $to, string $message,array $header) ;
}
