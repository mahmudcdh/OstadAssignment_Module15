<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class CustomAuthController extends Controller
{
    public function Login()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {
            return redirect()->intended('dashboard')->with('success', 'Login successfully');
        }
        return redirect('login')->with('error', 'Credential does not match');
    }

    public function Register()
    {
        return view('auth.register');
    }

    public function customRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dashboard')->with('success', 'User Created Successfully!');
    }

    public function dashboard(Request $request)
    {
        if (Auth::check()) {
            return view('dashboard');
        }
        return redirect('login')->with('error', 'Un-authorize access does not allow');
    }

    public function logOut(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect("/");
    }
}
