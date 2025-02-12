<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
    }
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return redirect()->route('loginPage');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginPage');
    }
}
