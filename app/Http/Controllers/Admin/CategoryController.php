<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('Adminpanel.Category.list', compact('categories'));
    }

    public function create()
    {
        return view('Adminpanel.Category.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'subcategories' => 'array', // Validate subcategories as an array
            'subcategories.*' => 'nullable|string|max:255', // Each subcategory can be a string
        ]);

        // When creating a new category



        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'uploads/category';
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $imageName);

            $categoryData['image'] = $destinationPath . "/" . $imageName;
        }

        // Create the category
        Category::create([
            'name' => strtoupper($request->input('name')),
            'description' => ucwords($request->input('description')),

            'subcategories' => json_encode($request->input('subcategories')), // Ensure it's encoded
        ]);

        return back()->with('success', 'Category Created Successfully');
    }



    public function edit($id)
    {
        $category = Category::findOrFail($id);

        // Decode subcategories if necessary (this is typically handled by the $casts in the model)
        $subcategories = is_string($category->subcategories) ? json_decode($category->subcategories, true) : $category->subcategories;

        return view('Adminpanel.Category.update', compact('category', 'subcategories'));
    }


    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'subcategories' => 'array', // Validate subcategories as an array
            'subcategories.*' => 'nullable|string|max:255', // Each subcategory can be a string
        ]);

        // Find the category by ID
        $category = Category::findOrFail($id);

        // Prepare the category data for update
        $categoryData = [
            'name' => strtoupper($request->input('name')),
            'description' => ucwords($request->input('description')),
            'subcategories' => json_encode($request->input('subcategories')), // Ensure it's encoded
        ];

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists (optional)
            if ($category->image) {
                $oldImagePath = public_path($category->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Remove the old image file
                }
            }

            $file = $request->file('image');
            $destinationPath = 'uploads/category';
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $imageName);

            $categoryData['image'] = $destinationPath . "/" . $imageName; // Update the image path
        }

        // Update the category
        $category->update($categoryData);

        return redirect('/category_list')->with('success', 'Category Updated Successfully');
    }


    public function delete($id)
    {
        $category = Category::find($id);

        $category->delete();

        return back()->with('deleted', 'Deleted Successfully');
    }


}
