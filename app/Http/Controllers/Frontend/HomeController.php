<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::where('add_product', 1)->get();
        
        return view('Frontend.home', compact('categories','products'));
    }
    public function header(){
        $categories = Category::all();
        return view('Frontend.partials.header', ['categories' => $categories]);
    }
    public function categorySingle($category){
        $getCategory = Category::all(); 
        $product = Product::where('category', $category)->get();
    
        return view('Frontend.category_single',compact('product','getCategory'));
    }
}
