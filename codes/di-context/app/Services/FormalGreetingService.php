<?php

namespace App\Services;

use App\Services\GreetingServiceInterface;

class FormalGreetingService implements GreetingServiceInterface
{
    public function greet(): string
    {
        return "Good day, dear guest.";
    }
}
