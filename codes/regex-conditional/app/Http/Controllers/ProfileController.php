<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showForm()
    {
        return view('profile');
    }

    public function handleForm(Request $request)
    {
        $request->validate([
            'username' => ['required', 'regex:/^[a-zA-Z0-9_]{5,20}$/'],
            'phone' => ['required', 'regex:/^08[0-9]{8,11}$/'],
            'contact_method' => 'required|in:email,phone',
            'email' => 'required_if:contact_method,email|nullable|email',
        ], [
            'username.regex' => 'Username must be 5–20 characters and contain only letters, numbers, or underscores.',
            'phone.regex' => 'Phone must start with 08 and be 10 to 13 digits long.',
            'email.required_if' => 'Email is required if contact method is email.',
        ]);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
