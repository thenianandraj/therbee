<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Wishlist;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
   
    public function add($id)
    {

        $user = Auth::user();

        if (!$user) {
            return redirect('/login'); 
        }
    
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
    
        $wishlistItem = Wishlist::where('product_id', $product->id)
            ->where('user_id', $user->id)
            ->first();
    
        if ($wishlistItem) {
            $wishlistItem->delete();
    
            return redirect()->back()->with('message', 'Item removed from wishlist');
        } else {
            Wishlist::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
            ]);
    
            return redirect()->back()->with('message', 'Item added to wishlist');
        }
    }

    public function wishlist()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $categories = Category::all();
            $products = Product::all();
            $wishlistItems = $user->wishlistItems;

            return view('Frontend.wishlist', compact('categories', 'products', 'wishlistItems'));
        } else {
            return view('auth.login');
        }
    }

    public function removeWishlist($id)
    {
        $wishlistItem = Wishlist::find($id);

        if ($wishlistItem) {
            $wishlistItem->delete();
        }

        return back();
    }
}
