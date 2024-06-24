<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:engineer,supervisor',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('login')->with('success', 'Registration successful.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', ['user' => $user]);
    }
}
