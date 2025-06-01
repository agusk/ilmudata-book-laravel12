<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MessageServiceInterface;

class MessageController extends Controller
{
    protected MessageServiceInterface $service;

    // Constructor Injection
    public function __construct(MessageServiceInterface $service)
    {
        $this->service = $service;
    }

    // Method Injection
    public function show(Request $request)
    {
        $standard = app('standard.message');
        $singleton = app('singleton.message');

        $first = app('singleton.message')->getMessage();
        $second = app('singleton.message')->getMessage();

        return view('message', [
            'interfaceMsg' => $this->service->getMessage(),
            'standardMsg' => $standard->getMessage(),
            'singletonMsg' => $singleton->getMessage(),
            'first' => $first,
            'second' => $second,
        ]);
    }
}
