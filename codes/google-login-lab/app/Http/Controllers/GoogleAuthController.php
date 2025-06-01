<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
    
        // Try to find the user by email
        $user = User::where('email', $googleUser->getEmail())->first();
    
        if ($user) {
            // If user exists but has no google_id, update it
            if (!$user->google_id) {
                $user->update([
                    'google_id' => $googleUser->getId(),
                ]);
            }
        } else {
            // No user with that email, create a new one
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt(str()->random(16)), // Placeholder
            ]);
        }
    
        Auth::login($user);
    
        return redirect('/profile');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
