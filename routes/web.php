<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    CategoryController,
    ProductController,
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

Route::get('/', function () {
    return view('Adminpanel.index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//----------------------------------------Category-----------------------------------------//

Route::get('/category_list',[App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.list');
Route::get('/category_create',[App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');


//-----------------------------------------Product------------------------------------------//
Route::get('/product_list',[App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product.list');
Route::get('/product_create',[App\Http\Controllers\Admin\ProductController::class, 'create'])->name('product.create');