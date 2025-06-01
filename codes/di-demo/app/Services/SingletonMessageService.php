<?php

namespace App\Services;

use App\Services\MessageServiceInterface;

class SingletonMessageService implements MessageServiceInterface
{
    public string $timestamp;

    public function __construct()
    {
        $this->timestamp = now();
    }

    public function getMessage(): string
    {
        return "Hello from SingletonMessageService at {$this->timestamp}";
    }
}
