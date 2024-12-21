<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ContentController;

use App\Http\Controllers\Admin\{
    CategoryController,
    ProductController,
};
use App\Http\Controllers\Auth\LoginController;
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



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected CRUD routes
Route::middleware('auth')->group(function () {

    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

//----------------------------------------Category-----------------------------------------------------------//
//Route::get('/',[App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.list');
Route::get('/category_list',[App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.list');
Route::get('/category_create',[App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');
Route::post('/category_store',[App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
Route::get('/category_edit{id}',[App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category_update/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
Route::get('/category_delete{id}',[App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('category.delete');



//-----------------------------------------Product--------------------------------------------------------//
Route::get('/product_list',[App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product.list');
Route::get('/product_create',[App\Http\Controllers\Admin\ProductController::class, 'create'])->name('product.create');
Route::post('/product_store',[App\Http\Controllers\Admin\ProductController::class, 'store'])->name('product.store');
Route::get('/product_edit{id}',[App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('product.edit');
Route::put('/product_update/{id}',[App\Http\Controllers\Admin\ProductController::class, 'update'])->name('product.update');
Route::get('/product_delete{id}',[App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('product.delete');


//-----------------------------------------Device Available--------------------------------------------------------//
Route::get('/device_list',[DeviceController::class, 'index']);
Route::get('/device_create',[DeviceController::class, 'create']);
Route::post('/devices_store',[DeviceController::class, 'store']);
Route::get('/devices_edit{id}',[DeviceController::class, 'edit']);
Route::post('/devices_update{id}',[DeviceController::class, 'update']);
Route::get('/devices_delete{id}',[DeviceController::class, 'destroy']);

//-----------------------------------------Device Available--------------------------------------------------------//
Route::get('/specific',[ContentController::class, 'index']);
Route::get('/specific_create',[ContentController::class, 'create']);
Route::post('/specific_store',[ContentController::class, 'store']);
Route::get('/specific_edit{id}',[ContentController::class, 'edit']);
Route::post('/specific_update{id}',[ContentController::class, 'update']);
Route::get('/specific_delete{id}',[ContentController::class, 'destroy']);
});

//------------------------------------Auth------------------------------------------------------------------//
Auth::routes();
Route::get('/', function () {
    return view('login');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


Route::resource('products', ProductController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//------------------------------------FrontEnd--------------------------------------------------------------//
Route::get('/home', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('welcome');
Route::post('/get_address',[App\Http\Controllers\Frontend\HomeController::class,'addAddress']);
Route::get('/category_single{category}', [App\Http\Controllers\Frontend\HomeController::class, 'categorySingle'])->name('category.single');
Route::get('/global_search', [App\Http\Controllers\Frontend\HomeController::class, 'search'])->name('search.global');



//-------------------------------------About-----------------------------------------------------------------//
Route::get('/about', [App\Http\Controllers\Frontend\FrontendController::class, 'about'])->name('about');
Route::get('/product_single{id}', [App\Http\Controllers\Frontend\FrontendController::class, 'productSingle'])->name('product.single');

//------------------------------------Order-------------------------------------------------------------------//
Route::get('/list_order', [App\Http\Controllers\Frontend\OrderController::class, 'listCart'])->name('cart.list');



