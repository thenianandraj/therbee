<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
// use App\Models\UserAddress;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        if (Auth::check()) {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'qty' => $request->quantity,
            ]);
    
            return redirect()->back();
        } else {
            return view('auth.login');
        }
    }
    public function list(){
        if (Auth::user()) {
            $user = Auth::user();
    
            $categories = Category::all();        
            $products = Product::all();    
            $cartItems = $user->cartItems()
            ->select('carts.*', 'products.*')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->get();
    
            // Retrieve the user's addresses
            // $userAddresses = $user->addresses;
    
            return view('Frontend.Cart.cart_list')->with('users', $cartItems)
                               ->with('product', $products)
                               ->with('category', $categories);
        } else {
            return view('auth.login');
        }
       
    }
}
