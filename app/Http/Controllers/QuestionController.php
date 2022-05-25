<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = [
            'auth_user' => Auth::user(),
            'categories' => Question::with('category')->latest()->get(),
            'questions' => Question::with('category', 'likeUsers', 'comments')->latest()->paginate(4),
        ];

        if ($slug = request('category')) {
            $category = Category::where('slug', $slug)->first();
            $questions['questions'] = $category->questions()->with('category', 'likeUsers', 'comments')->latest()->paginate(2)->withQueryString();

            return Inertia::render('Home', $questions);
        }

        return Inertia::render('Home', $questions);
    }

    public function detail($slug)
    {
        $question = Question::with('category', 'likeUsers', 'comments.author')->firstWhere('slug', $slug);

        return Inertia::render('QuestionDetail', [
            'question' => $question,
            'categories' => Question::with('category')->latest()->get(),
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

    public function create()
    {
        return Inertia::render('Questions/Create', [
            'auth_user' => auth()->user(),
            'categories' => Category::latest()->get()
        ]);
    }

    public function store()
    {
        $formData = request()->validate([
            'title' => ['required','min:5'],
            'slug' => ['required',Rule::unique('questions', 'slug')],
            'body' => ['required','min:5'],
            'category_id' => ['required',Rule::exists('categories', 'id')],
        ]);

        $formData['user_id'] = auth()->id();

        Question::create($formData);

        return back()->with('create_success', $formData['title'].' Uploaded successfully');
    }

    public function destroy($question_id)
    {
        DB::table('questions')->where('id', $question_id)->delete();

        return redirect('/')->with('danger', 'delete successfully');
    }

    public function user_questions()
    {
        return Inertia::render('Questions/UserQuestions', [
            'questions' => auth()->user()->questions,
            'auth_user' => auth()->user()
        ]);
    }
}
