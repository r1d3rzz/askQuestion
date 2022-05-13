<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class QuestionController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }
}
