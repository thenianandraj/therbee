<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   

    public function listCart()
    {
        if (Auth::user()) {
            $user_Id = Auth::user()->id;

            $categories = Category::all();

            $products = Product::all();
            
            $cartItems = Cart::where('user_id', $user_Id)
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->get();

            $addresses = UserAddress::where('user_id', $user_Id)->get();

            return view('cart', compact('addresses', 'cartItems', 'products', 'categories'));
        } else {
            return view('auth.login');
        }
    }
    public function list(){
        return view('Frontend.Cart.cart_list');
    }

}
