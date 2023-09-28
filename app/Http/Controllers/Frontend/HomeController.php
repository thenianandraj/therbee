<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\UserProfile;

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
        $categories = Category::all(); 
        $product = Product::where('category', $category)->get();
    
        return view('Frontend.Product.category_single',compact('product','categories'));
    }
    public function addAddress(Request $request)
    {
        $userAddress = new UserProfile();
        $userAddress->user_id = auth()->user()->id;
        $userAddress->user_name = $request->input('full_name');
        $userAddress->user_mobile = $request->input('mobile_no');
        $userAddress->user_address = $request->input('address');
        $userAddress->landmark = $request->input('landmark');
        $userAddress->postal_code = $request->input('postal_code');
        $userAddress->is_default = $request->input('is_default');

        $userAddress->save();

        return back();
    }
}
