<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NotifierInterface;

class NotificationController extends Controller
{
    public function notify(NotifierInterface $notifier)
    {
        $message = $notifier->notify();
        return view('notify', ['message' => $message]);
    }
}
