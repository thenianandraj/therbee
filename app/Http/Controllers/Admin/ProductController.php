<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('Adminpanel.Product.list', compact('products'));
    }
    public function create()
    {
        $category = Category::all();
        return view('Adminpanel.Product.create', compact('category'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'files1' => 'nullable|file|mimes:zip|max:2048',
            'files2' => 'nullable|file|mimes:zip|max:2048',
            'files3' => 'nullable|file|mimes:zip|max:2048',
            'files4' => 'nullable|file|mimes:zip|max:2048',
            'files5' => 'nullable|file|mimes:zip|max:2048',
            'files6' => 'nullable|file|mimes:zip|max:2048',
        ]);

        $imageUploadPath = public_path('uploads/products');
        $fileUploadPath = public_path('uploads/files');
        $projectBImagePath = '/Users/arjun/Downloads/Projects/npi_store_client/public/uploads/products';
        $projectBFilePath = '/Users/arjun/Downloads/Projects/npi_store_client/public/uploads/files';

        $imagePaths = [];
        if ($file = $request->file('image')) {
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move($imageUploadPath, $imageName);
            $relativeImagePath = 'uploads/products/' . $imageName;

            // Copy to the second project
            if (file_exists($imageUploadPath . '/' . $imageName)) {
                copy($imageUploadPath . '/' . $imageName, $projectBImagePath . '/' . $imageName);
            }
            $imagePaths['therbee'] = $relativeImagePath;
            $imagePaths['gold'] = 'uploads/products/' . $imageName;
        }

        $filePaths = [];
        for ($i = 1; $i <= 6; $i++) {
            $fileKey = "files{$i}";
            if ($request->hasFile($fileKey)) {
                $file = $request->file($fileKey);
                // Set a standardized name format
                $fileName = time() . "_{$i}_" . $file->getClientOriginalName();
                $file->move($fileUploadPath, $fileName);
                $relativeFilePath = 'uploads/files/' . $fileName;

                // Copy to the second project
                if (file_exists($fileUploadPath . '/' . $fileName)) {
                    copy($fileUploadPath . '/' . $fileName, $projectBFilePath . '/' . $fileName);
                }
                $filePaths[$fileKey] = $relativeFilePath;
            } else {
                $filePaths[$fileKey] = null;
            }
        }

        Product::create([
            'product_name' => ucwords(trim($request->input('product_name'))),
            'original_rate' => $request->input('original_rate'),
            'discount_rate' => $request->input('discount_rate'),
            'keywords' => ucwords(trim($request->input('keywords'))),
            'description' => trim($request->input('description')),
            'image' => json_encode($imagePaths),
            'files1' => $filePaths['files1'],
            'files2' => $filePaths['files2'],
            'files3' => $filePaths['files3'],
            'files4' => $filePaths['files4'],
            'files5' => $filePaths['files5'],
            'files6' => $filePaths['files6'],
            'category' => ucwords(trim($request->input('category'))),
            'subcategory' => ucwords(trim($request->input('subcategory'))),
            'add_product' => $request->input('is_default'),
        ]);

        return back()->with('insert', 'Inserted and copied successfully.');
    }




    public function edit($id)
    {
        $products = Product::findOrFail($id);

        $category = Category::all();

        return view('Adminpanel.Product.update', compact('category', 'products'));
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'files1' => 'nullable|file|mimes:zip|max:2048',
            'files2' => 'nullable|file|mimes:zip|max:2048',
            'files3' => 'nullable|file|mimes:zip|max:2048',
            'files4' => 'nullable|file|mimes:zip|max:2048',
            'files5' => 'nullable|file|mimes:zip|max:2048',
            'files6' => 'nullable|file|mimes:zip|max:2048',
        ]);

        // Define paths for uploads
        $imageUploadPath = public_path('uploads/products');
        $fileUploadPath = public_path('uploads/files');
        $projectBImagePath = '/Users/arjun/Downloads/Projects/npi_store_client/public/uploads/products';
        $projectBFilePath = '/Users/arjun/Downloads/Projects/npi_store_client/public/uploads/files';

        // Find the product to update
        $product = Product::findOrFail($id);
        $imagePaths = json_decode($product->image, true);

        // Handle image upload for 'uploads/products'
        if ($file = $request->file('image')) {
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move($imageUploadPath, $imageName);
            $relativeImagePath = 'uploads/products/' . $imageName;

            // Copy to the second project
            if (file_exists($imageUploadPath . '/' . $imageName)) {
                copy($imageUploadPath . '/' . $imageName, $projectBImagePath . '/' . $imageName);
            }
            // Update image paths
            $imagePaths['therbee'] = $relativeImagePath;
            $imagePaths['gold'] = $projectBImagePath . '/' . $imageName;
        }

        // Prepare updated file paths
        $filePaths = [];
        for ($i = 1; $i <= 6; $i++) {
            $fileKey = "files{$i}";
            if ($request->hasFile($fileKey)) {
                $file = $request->file($fileKey);
                $fileName = time() . "_{$i}_" . $file->getClientOriginalName();
                $file->move($fileUploadPath, $fileName);
                $filePaths[$fileKey] = 'uploads/files/' . $fileName;

                // Copy to the second project
                copy($fileUploadPath . '/' . $fileName, $projectBFilePath . '/' . $fileName);
            } else {
                $filePaths[$fileKey] = $product->$fileKey; // Keep existing file if not replaced
            }
        }

        // Update product details in the database
        $product->update([
            'product_name' => ucwords(trim($request->input('product_name'))),
            'original_rate' => $request->input('original_rate'),
            'discount_rate' => $request->input('discount_rate'),
            'keywords' => ucwords(trim($request->input('keywords'))),
            'description' => trim($request->input('description')),
            'image' => json_encode($imagePaths),
            'files1' => $filePaths['files1'],
            'files2' => $filePaths['files2'],
            'files3' => $filePaths['files3'],
            'files4' => $filePaths['files4'],
            'files5' => $filePaths['files5'],
            'files6' => $filePaths['files6'],
            'category' => ucwords(trim($request->input('category'))),
            'subcategory' => ucwords(trim($request->input('subcategory'))),
            'add_product' => $request->input('is_default'),
        ]);

        return redirect('/product_list')->with('update', 'Updated and copied successfully.');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        $product->delete();

        return back()->with('deleted', 'Deleted Successfully');
    }


}
