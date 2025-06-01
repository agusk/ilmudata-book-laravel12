<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function home(Request $request)
    {
        $theme = session('theme', 'light');
        return view('home', compact('theme'));
    }

    public function switchTheme($theme, Request $request)
    {
        if (in_array($theme, ['light', 'dark'])) {
            session(['theme' => $theme]);
        }

        return redirect('/home');
    }
}
