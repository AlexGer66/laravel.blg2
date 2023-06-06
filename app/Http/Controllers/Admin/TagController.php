<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tags::paginate(4);
        return view('admin.tags.index', compact('tags'));
        //  return 'dkfjdlkfjd';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        Tags::create($request->all());
//        $request->session()->flash('success', 'Категория добавлена');
        return redirect()->route('tags.index')->with('success', 'Категория добавлена');
    
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tags = Tags::find($id);
        return view('admin.tags.edit', compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $tags = Tags::find($id);
//        $tags->slug = null;
        $tags->update($request->all());
        return redirect()->route('tags.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tags::destroy($id);
        return redirect()->route('tags.index')->with('success', 'Категория удалена');
    }
}
