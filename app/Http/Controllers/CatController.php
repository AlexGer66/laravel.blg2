<?php

namespace App\Http\Controllers;

use App\Category;
use App\Models\Categories;
use Illuminate\Http\Request;

class CatController extends Controller
{

    public function show($slug)
    {
        $category = Categories::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->orderBy('id', 'desc')->paginate(2);
        return view('categories.show', compact('category', 'posts'));
    }

}
