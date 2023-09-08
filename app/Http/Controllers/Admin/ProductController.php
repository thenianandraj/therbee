<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() {
        $products = Product::latest()->paginate(5);
        return view('Adminpanel.Product.list', compact('products'));
    }
    public function create() {
        $category = Category::all();
        return view('Adminpanel.Product.create',compact('category'));
    }

    public function store(Request $request)
    {
        $file = $request->file('image');
    

        $destinationPath = 'uploads/products/';
        $name = $file->move($destinationPath, $file->getClientOriginalName());

        Product::create([
            'product_name' => ucwords($request->input('product_name')),
            'original_rate' => ucwords($request->input('original_rate')),
            'discount_rate' => ucwords($request->input('discount_rate')),
            'keywords' => ucwords($request->input('keywords')),
            'description' => ucwords($request->input('description')),
            'image' => $destinationPath . "/" . $file->getClientOriginalName(),
            'category' => ucwords($request->input('category')),
            'add_product' => $request->input('is_default'),
        ]);

        return back()->with('insert', 'Inserted Successfully');
    }
    public function edit($id){
        $products = Product::find($id);
        $category =  Category::all();
       
        return view('Adminpanel.Product.update', compact('category', 'products'));
    }
   

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
    
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'uploads/products/';
            $name = $file->move($destinationPath, $file->getClientOriginalName());
    
       
            if ($product->image) {
                Storage::delete($product->image);
            }
    
            $product->image = $destinationPath . "/" . $file->getClientOriginalName();
        }
    
        if ($request->filled('product_name')) {
            $product->product_name = ucwords($request->input('product_name'));
        }
    
        if ($request->filled('description')) {
            $product->description = ucwords($request->input('description'));
        }

        if ($request->filled('discount_rate')) {
            $product->discount_rate = ucwords($request->input('discount_rate'));
        }
        if ($request->filled('original_rate')) {
            $product->original_rate = ucwords($request->input('original_rate'));
        }
        if ($request->filled('keywords')) {
            $product->keywords = ucwords($request->input('keywords'));
        }
        if ($request->filled('category')) {
            $product->category = ucwords($request->input('category'));
        }
    
        $product->save();
    
        return redirect('/product_list')->with('update', 'Update Successfully');
    }
    
    public function delete($id)
    {
        $product = Product::find($id);

        $product->delete();

        return back()->with('deleted', 'Deleted Successfully');
    }


}
