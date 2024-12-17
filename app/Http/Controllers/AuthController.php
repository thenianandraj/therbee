<?php

namespace App\Http\Controllers;
use App\Models\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = Auth::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    auth()->login($user);

    return response()->json(['message' => 'User registered successfully'], 201);
}
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Use the custom model and authentication guard
    if (auth('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
        return response()->json(['message' => 'Login successful']);
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
}

public function logout(Request $request)
{
    // Log the user out
    auth('web')->logout();

    // Invalidate the session
    $request->session()->invalidate();

    // Regenerate the session token
    $request->session()->regenerateToken();

    // Redirect to the login page
    return redirect('/login'); // Adjust the URL if needed
}

public function showLoginForm()
{
    return view('login'); // Replace with your login view
}
}
