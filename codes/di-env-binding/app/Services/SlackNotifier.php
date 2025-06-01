<?php

namespace App\Services;

use App\Services\NotifierInterface;

class SlackNotifier implements NotifierInterface
{
    public function notify(): string
    {
        return "Notification sent via Slack.";
    }
}
