<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function about(){
        return view('Frontend.about');
    }
    public function productSingle(){
        return view('Frontend.product_single');
    }
}
