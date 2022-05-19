<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = [
            'auth_user' => Auth::user(),
            'categories' => Category::latest()->get(),
            'questions' => Question::with('category', 'likeUsers')->get(),
        ];

        // return $questions;

        if ($slug = request('category')) {
            $category = Category::where('slug', $slug)->first();
            $questions['questions'] = $category->questions()->with('category', 'likeUsers')->get();

            return Inertia::render('Home', $questions);
        }

        return Inertia::render('Home', $questions);
    }

    public function detail($slug)
    {
        $question = Question::with('category', 'likeUsers', 'comments.author')->firstWhere('slug', $slug);

        return Inertia::render('QuestionDetail', [
            'question' => $question,
            'categories' => Category::latest()->get(),
            'auth_user' => Auth::user(),
        ]);
    }

    public function likeBtn($question_id)
    {
        $question = Question::firstWhere('id', $question_id);

        if (User::find(auth()->id())->isLike($question->id)) {
            $question->unLike();
        } else {
            $question->like();
        }

        return back();
    }

    public function post_comment($question_id)
    {
        request()->validate([
            'comment' => ['required','min:3']
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'question_id' => $question_id,
            'body' => request('comment')
        ]);

        return back();
    }
}
