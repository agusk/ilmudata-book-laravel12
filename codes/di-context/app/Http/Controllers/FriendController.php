<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GreetingServiceInterface;

class FriendController extends Controller
{
    protected GreetingServiceInterface $greetingService;

    public function __construct(GreetingServiceInterface $greetingService)
    {
        $this->greetingService = $greetingService;
    }

    public function greet()
    {
        $message = $this->greetingService->greet();
        return view('greeting', ['message' => $message]);
    }
}
