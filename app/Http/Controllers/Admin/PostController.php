<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Models\Tags;
use App\Models\Posts;
use App\Models\Categories;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Posts::with('category', 'tags')->paginate(20);
        return view('admin.posts.index', compact('posts'));
        // dd($posts);00001122
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Categories::pluck('title', 'id')->all();
        $tags = Tags::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules=[
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image',
        ];
        $messages=[
            'title.required' => 'поле  обяз',  
        'content.required' => 'поле содерж обяз',
        'description.required' => 'поле описание обяз',
        'category_id.required'=> 'надо выбрать катеорию',
        ];

         Validator::make($request->all(), $rules, $messages )->validate() ;
        

        $data = $request->all();

        $data['thumbnail'] = Posts::uploadImage($request);

        $post = Posts::create($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Статья добавлена');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        $categories = Categories::pluck('title', 'id')->all();
        $tags = Tags::pluck('title', 'id')->all();
        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image',
        ]);

        $post = Posts::find($id);
        $data = $request->all();

        
        if ($file = Posts::uploadImage($request, $post->thumbnail)) {
            $data['thumbnail'] = $file;
        }

        $post->update($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Изменения сохранены');
       

        // $data['thumbnail'] = Posts::uploadImage($request, $post->thumbnail);

        // $post->update($data);
        // $post->tags()->sync($request->tags);

        // return redirect()->route('posts.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $post->tags()->sync([]);
        Storage::delete($post->thumbnail);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }
}
