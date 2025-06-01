<?php

namespace App\Services;

interface NotifierInterface
{
    public function notify(): string;
}
