<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TaghomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoriController ;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
})->name('home'); */

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/article/{slug}',[HomeController::class, 'show'])->name('posts.single');
Route::get('/category/{slug}', [CatController::class, 'show'])->name('categories.single');
Route::get('/tag/{slug}', [TaghomeController::class, 'show'])->name('tags.single');
Route::get('/search', [SearchController::class, 'index'])->name('search');



Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('/categor', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/posts', PostController::class);

    /* Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', [MainController::class, 'index'])->name('admin.index'); */
});

Route::group(['middleware' => 'guest'], function () {

    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');

    // Route::resource('admin/categor', CategoryController::class);
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});



Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// товары

Route::get('/shop', [ShopController::class, 'index'])->name('shop.list');
Route::get('/shop/{slug}', [ShopController::class, 'shou'])->name('shop.shou');
Route::get('/cart/{id}', [ShopController::class, 'addToCart'])->name('shop.addtocart');

/* 
    + $routes->get('/', 'Main::index', ['as' => 'main.index']);
+ $routes->get('product/(:segment)', 'Product::show/$1', ['as' => 'product.show']);
$routes->get('category/(:segment)', 'Category::show/$1', ['as' => 'category.show']);

*/


//корзина
/* 
  $routes->get('cart/add/(:num)', 'Cart::add/$1', ['as' => 'cart.add']);
$routes->get('cart/delete/(:num)', 'Cart::delete/$1', ['as' => 'cart.delete']);
$routes->get('cart/clear', 'Cart::clear', ['as' => 'cart.clear']);
$routes->get('cart/show', 'Cart::show', ['as' => 'cart.show']);
$routes->get('cart/view', 'Cart::view', ['as' => 'cart.view']);
$routes->post('cart/checkout', 'Cart::checkout', ['as' => 'cart.checkout']);

*/