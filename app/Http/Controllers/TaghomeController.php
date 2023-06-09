<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Tag;
use Illuminate\Http\Request;

class TaghomeController extends Controller
{

    public function show($slug)
    {
        $tag = Tags::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->with('category')->orderBy('id', 'desc')->paginate(2);
        return view('tags.show', compact('tag', 'posts'));
    }

}
