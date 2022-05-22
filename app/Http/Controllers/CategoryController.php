<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function store()
    {
        request()->validate([
            'name' => ['required','min:2',Rule::unique('categories', 'name')],
            'c_slug' => ['required','min:2',Rule::unique('categories', 'slug')],
        ]);

        Category::create([
            'name' => request('name'),
            'slug' => request('c_slug')
        ]);
        return back()->with('create_success', request('name')." is create successfully");
    }
}
