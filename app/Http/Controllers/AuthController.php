<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Create');
    }

    public function post_create()
    {
        $fromData = request()->validate([
            "name" => ['required','min:3'],
            "username" => ['required','min:3',Rule::unique('users', 'username')],
            "email" => ['email',Rule::unique('users', 'email')],
            "avatar" => ['mimes:jpg,bmp,png,jepg'],
            "password" => ['required','min:3'],
        ]);

        $fromData['avatar'] = request()->file('avatar')->store('Profile');

        $user = User::create($fromData);

        auth()->login($user);

        return redirect('/')->with('success', 'Hello');
    }

    public function login()
    {
        return Inertia::render('Auth/Login');
    }

    public function post_login()
    {
        $fromData = request()->validate([
            "email" => ['required',Rule::exists('users', 'email')],
            "password" => ['required'],
        ]);

        if (auth()->attempt($fromData)) {
            return redirect('/')->with('success', 'Welcome Back');
        } else {
            return back()->withErrors([
                'password' => 'Wrong Email or Password'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/')->with('success', 'GoodBye');
    }
}
