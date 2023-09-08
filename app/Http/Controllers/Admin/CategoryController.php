<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index(){
      $categories = Category::latest()->paginate(5);
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

   public function edit($id){
      $category = Category::find($id);
      return view('Adminpanel.Category.update', compact('category'));
   }

   public function update(Request $request)
   {
      $id = $request->input('id');
      $category = Category::find($id);

      if ($request->hasFile('image')) {
         $file = $request->file('image');
         $destinationPath = 'uploads/category';
         $name = $file->move($destinationPath, $file->getClientOriginalName());

         if ($category->image) {
               Storage::delete($category->image);
         }

         $category->image = $destinationPath . "/" . $file->getClientOriginalName();
      }

      if ($request->filled('name')) {
         $category->name = strtoupper($request->input('name'));
      }

      if ($request->filled('description')) {
   
         $category->description = $request->input('description');
      }

      
      $category->save();

      return redirect('/category_list')->with('update', 'Update Successfully');
   }

   public function delete($id)
   {
      $category = Category::find($id);

      $category->delete();

      return back()->with('deleted', 'Deleted Successfully');
   }


}
