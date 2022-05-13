<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class QuestionController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'auth_user' => Auth::user()
        ]);
    }

    public function detail()
    {
        return Inertia::render('QuestionDetail');
    }
}
