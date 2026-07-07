<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Login Page
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('product.indexProduct');
        }

        return view('login');
    }

    // Show Register Page
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('product.indexProduct');
        }

        return view('register.register');
    }

    // Register User
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
        ]);

        return redirect(route('login'))
            ->with('success', 'Registration successful! Please login.');
    }

    // Login User
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect(route('product.indexProduct'))
                ->with('success', 'Welcome!');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    // Logout User
    public function logout(Request $request)
{
    Auth::logout();

    // Destroy the session
    $request->session()->invalidate();

    // Generate a new CSRF token
    $request->session()->regenerateToken();

    return redirect()->route('login')
                     ->with('success', 'Logged out successfully.');
}
}