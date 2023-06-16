<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public $products;

    function __construct()
    {

        $this->products = DB::table('products')
            ->select('products.*', 'categorys_products.title as categorys_name')
            ->join('categorys_products', 'products.category_id', '=', 'categorys_products.id')
            /* ->paginate(2) */;
    }
    public function index()
    {

        /*  $products = DB::table('products')
            ->select('products.*', 'categorys_products.title as categorys_name')
            ->join('categorys_products', 'products.category_id', '=', 'categorys_products.id')
            ->paginate(10); */

        // dd($products);
        $products = $this->products->paginate(4);
        return view('shop/index', [
            'title' => 'Интернет-магазин',
            'products' => $products,
        ]);
    }
    public function shou($slug)
    {

        /*  $products = DB::table('products')
            ->select('products.*', 'categorys_products.title as categorys_name')
            ->join('categorys_products', 'products.category_id', '=', 'categorys_products.id')
            ->paginate(10); */

        // dd($products);
        $products = $this->products->where(['products.slug' => $slug])->first();
        // dd($products);
        return view('shop/shou', [
            'title' => 'Интернет-магазин',
            'product' => $products

        ]);
    }


    public function addToCart($id)
    {
        $products = $this->products->where(['products.id' => $id])->first();

       session()->push(
        'cart',[

                'id' => $products->id,
                'title' => $products->title,
                'slug' => $products->slug,
                'price' => $products->price, 
                ]
        
       );

        // dd(session('cart')[1]['title']) ;
        // dd(session()->all()) ;


        return view('shop/cart', [
            'title' => 'корзина',
            'product' => $products
        ]);

        // dd($products);
    }
}


/* 

*/