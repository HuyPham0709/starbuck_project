<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register'); // Return the registration view
    }

    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255', // Validate name
            'username' => 'required|string|max:255|unique:users,username', // Ensure username is unique
            'email' => 'required|email|unique:users,email', // Ensure email is unique
            'password' => 'required|confirmed|min:8', // Validate password
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        return redirect()->route('login')->with('success', 'Registration successful!'); // Redirect with success message
    }
}
