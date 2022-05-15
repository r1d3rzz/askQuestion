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

    public function detail($slug)
    {
        $question = Question::with('category')->firstWhere('slug', $slug);
        return Inertia::render('QuestionDetail', [
            'question' => $question,
            'categories' => Category::latest()->get(),
            'auth_user' => Auth::user(),
        ]);
    }

    public function category($slug)
    {
        dd($slug);
    }
}
