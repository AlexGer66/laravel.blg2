<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MainController extends Controller
{
    public function index()
    {
        /* # code...прверка плагина sluggebl
        $tag = new Tags();
        $tag->title = 'Привет мир';
        $tag->save(); */


        return View('admin.index') ;
    }
}
