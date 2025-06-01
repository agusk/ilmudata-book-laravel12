<?php

namespace App\Services;

use App\Services\MessageServiceInterface;

class StandardMessageService implements MessageServiceInterface
{
    public function getMessage(): string
    {
        return "Hello from StandardMessageService at " . now();
    }
}
