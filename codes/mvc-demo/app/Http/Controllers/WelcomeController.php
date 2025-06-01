<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function show()
    {
        $name = "Laravel Learner";
        return view('mywelcome', ['name' => $name]);
    }
}
