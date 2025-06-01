<?php

namespace App\Services;

use App\Services\GreetingServiceInterface;

class CasualGreetingService implements GreetingServiceInterface
{
    public function greet(): string
    {
        return "Hey there! What's up?";
    }
}
