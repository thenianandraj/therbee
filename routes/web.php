<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    CategoryController,
    ProductController,
};

use App\Http\Controllers\Frontend\{
    HomeController,
    FrontendController,
    OrderController,
    WishlistController,
    CartController
};



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



//------------------------------------Auth------------------------------------------//
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//------------------------------------FrontEnd--------------------------------------------//
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('welcome');
Route::get('/category_single{category}', [App\Http\Controllers\Frontend\HomeController::class, 'categorySingle'])->name('category.single');



//-------------------------------------About------------------------------------------------//
Route::get('/about', [App\Http\Controllers\Frontend\FrontendController::class, 'about'])->name('about');
Route::get('/product_single{id}', [App\Http\Controllers\Frontend\FrontendController::class, 'productSingle'])->name('product.single');

//------------------------------------Order----------------------------------------------------//
Route::get('/list_cart', [App\Http\Controllers\Frontend\OrderController::class, 'listCart'])->name('cart.list');
Route::get('/cart', [App\Http\Controllers\Frontend\OrderController::class, 'list'])->name('cart');


//----------------------wishlist-------------------------------------------//
Route::get('/wishListAdd/{id}',[App\Http\Controllers\Frontend\WishlistController::class,'Add'])->name('wishlist.add')->middleware('auth.custom');
Route::get('/remove-wishlist/{id}',[App\Http\Controllers\Frontend\WishlistController::class,'removeWishlist']);
Route::get('/wishlist' ,[App\Http\Controllers\Frontend\WishlistController::class, 'wishlist']);

//-----------------------------------------Cart----------------------------------------------------//
Route::post('/add_cart' ,[App\Http\Controllers\Frontend\CartController::class, 'addcart']);




//----------------------------------------Category-----------------------------------------//

Route::get('/category_list',[App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.list');
Route::get('/category_create',[App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');
Route::post('/category_store',[App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
Route::get('/category_edit{id}',[App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category_update/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
Route::get('/category_delete{id}',[App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('category.delete');



//-----------------------------------------Product------------------------------------------//
Route::get('/product_list',[App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product.list');
Route::get('/product_create',[App\Http\Controllers\Admin\ProductController::class, 'create'])->name('product.create');
Route::post('/product_store',[App\Http\Controllers\Admin\ProductController::class, 'store'])->name('product.store');
Route::get('/product_edit{id}',[App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('product.edit');
Route::put('/product_update/{id}',[App\Http\Controllers\Admin\ProductController::class, 'update'])->name('product.update');
Route::get('/product_delete{id}',[App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('product.delete');



