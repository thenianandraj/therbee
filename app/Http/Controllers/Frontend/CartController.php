<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

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
}
