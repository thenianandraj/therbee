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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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


