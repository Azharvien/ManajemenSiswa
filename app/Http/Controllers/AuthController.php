<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //


    public function showLogin(){
        return view('auth.login');
    }

    public function showRegister(){
        return view('auth.register');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:8'
        ]); 

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('siswa.index')->with('success', 'Login successful!');
        }

        throw ValidationException::withMessages([
            'password' => 'Email or Password is incorrect'
        ]);
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::create($validated);

        Auth::login($user);
        return redirect()->route('siswa.index')->with('success', 'Registration successful!');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login')->with('success', 'Logout successful!');
    }
}
