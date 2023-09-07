<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index(){
      
      
      $categories = Category::latest()->paginate(1);
      return view('Adminpanel.Category.list', compact('categories'));
   }
   public function create() {
      return view('Adminpanel.Category.create');
   }
   public function store(Request $request){
        $file = $request->file('image');
        $destinationPath = 'uploads/category';
        $name = $file->move($destinationPath, $file->getClientOriginalName());

        Category::create([
         'name' => strtoupper($request->input('name')),
         'description' => ucwords($request->input('description')),
         'image' => $destinationPath . "/" . $file->getClientOriginalName(),
     ]);
        return back()->with('success', 'Category Created Successfully');
   }
}
