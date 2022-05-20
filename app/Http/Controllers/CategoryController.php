<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function store()
    {
        $formData = request()->validate([
            'name' => ['required','min:2',Rule::unique('categories', 'name')],
            'slug' => ['required','min:2',Rule::unique('categories', 'slug')],
        ]);

        Category::create($formData);
        return back()->with('create_success', request('name')." is create successfully");
    }
}
