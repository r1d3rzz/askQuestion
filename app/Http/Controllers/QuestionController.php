<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class QuestionController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'auth_user' => Auth::user(),
            'categories' => Category::latest()->get(),
            'questions' => Question::with('category')->get(),
        ]);
    }

    public function detail()
    {
        return Inertia::render('QuestionDetail');
    }
}
