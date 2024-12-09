<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // dd($request->all());
        // sleep(1);

        // Validation
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users'
            ],
            'password' => ['required', 'confirmed']
        ]);

        // Create User
        $user = User::create($fields);

        // Login
        Auth::login($user);

        // Redirect
        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out of the application.
        $request->session()->invalidate(); // Invalidate the session.
        $request->session()->regenerateToken(); // Regenerate the CSRF token.
        return redirect()->route('home');
    }
}
