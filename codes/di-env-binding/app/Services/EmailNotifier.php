<?php

namespace App\Services;

use App\Services\NotifierInterface;

class EmailNotifier implements NotifierInterface
{
    public function notify(): string
    {
        return "Notification sent via Email.";
    }
}
