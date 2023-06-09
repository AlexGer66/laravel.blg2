<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{



    public function index()
    {
        $posts = Posts::with('category')->orderBy('id', 'desc')->paginate(2);
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        return view('posts.show');
    }
}
