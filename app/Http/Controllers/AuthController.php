<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

    public function setting()
    {
        return Inertia::render('Auth/Edit', [
            'auth_user' => Auth::user()
        ]);
    }

    public function user_update($user_id)
    {
        $user = auth()->user();

        $userAvatar = $user->avatar;

        if ($user->name === request('name') && $user->avatar === request('avatar') && request('password') === null) {
            return back()->withErrors([
                'errorNoti' => 'Nothing Change'
            ]);
        }

        if (request('avatar') !== $userAvatar) {
            $userAvatar = null;
        }

        if (request('name') !== $user->name) {
            request()->validate([
                'name' => ['min:3']
            ]);
        }

        if (request('password') !== null) {
            request()->validate([
                'password' => ['min:3']
            ]);
        }

        DB::table('users')->where('id', $user_id)->update([
            'name' => request('name') ? request('name') : $user->name,
            'avatar' => $userAvatar ? $userAvatar : request()->file('avatar')->store('Profile'),
            'password' => request('password') ? Hash::make(request('password')) : $user->password
        ]);

        return back()->with('success', 'updated Successfully');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/')->with('success', 'GoodBye');
    }
}
