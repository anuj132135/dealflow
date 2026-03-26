<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login')->with('loggedoutSuccess', 'You\'ve been logged out.');
    }

    public function submitRegister(Request $req)
    {
        $credentials = $req->validate([
            'name' => 'required',
            'email' => 'required | unique:users,email',
            'password' => 'required | confirmed | min:6'
        ]);

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'You are registered successfully!');
        } else {
            return redirect()->route('register');
        }
    }

    public function submitLogin(Request $req)
    {
        $credentials = $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'You are logged in successfully!');
        } else {
            return back()->withErrors('Your email or password doesn\'t match');
        }
    }
}
