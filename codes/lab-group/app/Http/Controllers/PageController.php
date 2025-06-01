<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $message = "Welcome to the homepage.";
        return view('pages.home', compact('message'));
    }

    public function about()
    {
        $message = "This is the about page.";
        return view('pages.about', compact('message'));
    }

    public function contact()
    {
        $message = "Reach us through the contact page.";
        return view('pages.contact', compact('message'));
    }
}
