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
    // Paths for products and files uploads
    $imageUploadPath = public_path('uploads/products');
    $fileUploadPath = public_path('uploads/files');
    
    $imagePaths = [];
    $filePaths = [];

    // Handling the image upload to 'uploads/products'
    if ($file = $request->file('image')) {
        $imageName = time() . '_' . $file->getClientOriginalName(); // Unique file name
    
        // Move the image to the public/uploads/products directory
        $file->move($imageUploadPath, $imageName);
        $absoluteImagePath = $imageUploadPath . '/' . $imageName; // Absolute path for the main image
        $relativeImagePath = 'uploads/products/' . $imageName; // Relative path for easy downloads

        // Copy the image to the second project's public path (gold)
        $projectBImagePath = 'D:\work sector\working projects\gold\public\uploads\products';
        if (file_exists($absoluteImagePath)) {
            // Copy the image from the first project to the second project
            copy($absoluteImagePath, $projectBImagePath . '\\' . $imageName);
        }

        // Store both paths for the image
        $imagePaths['therbee'] = $relativeImagePath; // First project (relative path)
        $imagePaths['gold'] = $projectBImagePath . '\\' . $imageName; // Second project (absolute path)
    } else {
        return back()->with('error', 'Image upload failed.');
    }

    // Handling the file upload to 'uploads/files'
    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $file) {
            $fileName = time() . '_' . $file->getClientOriginalName(); // Unique file name
    
            // Move the file to the public/uploads/files directory
            $file->move($fileUploadPath, $fileName);
            $absoluteFilePath = $fileUploadPath . '/' . $fileName;
            $relativeFilePath = 'uploads/files/' . $fileName;
            
            // Copy the uploaded file to the second project's public path (gold)
            $projectBFilePath = 'D:\work sector\working projects\gold\public\uploads\files';
            if (file_exists($absoluteFilePath)) {
                // Copy the file from the first project to the second project
                copy($absoluteFilePath, $projectBFilePath . '\\' . $fileName);
            }
            
            // Store both paths for the file
            $filePaths[] = [
                'therbee' => $relativeFilePath, // First project (relative path)
                'gold' => $projectBFilePath . '\\' . $fileName // Second project (absolute path)
            ];
        }
    }

    // Save product details to the database
    Product::create([
        'product_name' => ucwords(trim($request->input('product_name'))),
        'original_rate' => $request->input('original_rate'),
        'discount_rate' => $request->input('discount_rate'),
        'keywords' => ucwords(trim($request->input('keywords'))),
        'description' => trim($request->input('description')),
        'image' => json_encode($imagePaths), // Store image paths for both projects as JSON
        'file_paths' => json_encode($filePaths), // Store file paths for both projects as JSON
        'category' => ucwords(trim($request->input('category'))),
        'add_product' => $request->input('is_default'),
    ]);

    return back()->with('insert', 'Inserted and copied successfully.');
}

    
    public function edit($id){
        $products = Product::find($id);
        $category =  Category::all();
       
        return view('Adminpanel.Product.update', compact('category', 'products'));
    }
   

    public function update(Request $request, $id)
{
    $product = Product::find($id);

    // Check if a new image is uploaded
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $destinationPath = 'uploads/products/';
        $imageName = time() . '_' . $file->getClientOriginalName(); // Unique file name
        
        // Move the new image to the first project path (therbee)
        $file->move(public_path($destinationPath), $imageName);

        // Now copy the uploaded image to the second project's public path (gold)
        $projectBPath = 'D:\work sector\working projects\gold\public\uploads\products'; // Second project path
        if (file_exists(public_path($destinationPath . $imageName))) {
            // Copy the file from the first project to the second project
            copy(public_path($destinationPath . $imageName), $projectBPath . '\\' . $imageName);
        }

        // Delete the old image if it exists
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        // Update the product's image path in the database
        $product->image = $destinationPath . $imageName;
    }

    // Update other fields if they are filled
    if ($request->filled('product_name')) {
        $product->product_name = ucwords(trim($request->input('product_name')));
    }
    
    if ($request->filled('description')) {
        $product->description = trim($request->input('description'));
    }

    if ($request->filled('discount_rate')) {
        $product->discount_rate = $request->input('discount_rate');
    }

    if ($request->filled('original_rate')) {
        $product->original_rate = $request->input('original_rate');
    }

    if ($request->filled('keywords')) {
        $product->keywords = ucwords(trim($request->input('keywords')));
    }

    if ($request->filled('category')) {
        $product->category = ucwords(trim($request->input('category')));
    }

    // Save the updated product details
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
