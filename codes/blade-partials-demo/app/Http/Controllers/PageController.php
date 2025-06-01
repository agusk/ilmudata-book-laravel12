<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $alertMessage = 'Welcome to the homepage!';
        return view('home', compact('alertMessage'));
    }

    public function about()
    {
        $alertMessage = 'This is the about page!';
        return view('about', compact('alertMessage'));
    }
}
