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
}
