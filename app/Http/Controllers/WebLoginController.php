<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        // Validate the login form data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to log in the user
        if (auth()->attempt($credentials)) {
            // Authentication successful, redirect to dashboard or desired page
            return redirect('/');
        }

        // Authentication failed, redirect back to login form with error message
        return redirect()->route('login')->withErrors(['message' => 'Invalid credentials']);
    }
}
