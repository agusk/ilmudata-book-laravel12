<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function handleForm(Request $request)
    {
        $customMessages = [
            'name.required' => 'We need to know your name!',
            'email.required' => 'Your email is important to us.',
            'email.email' => 'Hmm... that doesn’t look like a valid email.',
            'password.required' => 'Don’t forget to set a password.',
            'password.min' => 'Password must be at least :min characters.',
            'username.regex' => 'Username must contain only letters and numbers.',
        ];

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'username' => ['required', 'regex:/^[a-zA-Z0-9]+$/'],
            'password' => 'required|min:6',
        ], $customMessages);

        return redirect()->route('register.show')->with('success', 'Registration successful!');
    }
}
