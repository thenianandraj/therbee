<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function about(){
        return view('Frontend.about');
    }
    public function productSingle($id){
        $product = Product::with('category')->find($id);
        // dd($product);

        $relatedProducts = Product::all();
        $categories = Category::all();
        return view('Frontend.Product.product_single',compact('product', 'categories', 'relatedProducts'));
    }
}

