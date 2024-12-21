<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $images = Devices::latest()->paginate(5);
        return view('Adminpanel.DeviceAvailable.list', compact('images'));
    }

    public function create()
    {
        return view('Adminpanel.DeviceAvailable.create');
    }

    public function store(Request $request)
    {
        // Define the target path for the other project
        $otherProjectPath = '/Users/arjun/Downloads/my_app/public/uploads/images';
    
        // Store the file in the target path
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move($otherProjectPath, $fileName);
    
        // Construct the relative path to store in the database
        $imagePath = 'uploads/images/' . $fileName;
    
        // Save details to the database
        Devices::create([
            'image_path' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
        ]);
    
        // Redirect with success message
        return redirect('/device_list')->with('success', 'added successfully!');
    }
    

    public function show(Devices $image)
    {
        return view('images.edit', compact('image'));
    }

    public function edit($id)
    {
        $view = Devices::where('id', $id)->get();
        return view('Adminpanel.DeviceAvailable.update', compact('view'));
       
    }

    public function update(Request $request, $id)
    {
        // Find the device record by ID
        $device = Devices::findOrFail($id);
    
        // Define the target path for the other project
        $otherProjectPath = '/Users/arjun/Downloads/my_app/public/uploads/images';
    
        // Check if a new file is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // Move the file to the target path
            $file->move($otherProjectPath, $fileName);
    
            // Construct the relative path to store in the database
            $imagePath = 'uploads/images/' . $fileName;
    
            // Optionally delete the old image from the storage
            $oldImagePath = public_path($device->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
    
            // Update the image path in the database
            $device->image_path = $imagePath;
        }
    
        // Update other fields
        $device->title = $request->title;
        $device->description = $request->description;
        $device->type = $request->type;
    
        // Save the updated record
        $device->save();
    
        // Redirect with success message
        return redirect('/device_list')->with('success', 'Updated successfully!');
    }
    

    public function destroy($id)
    {
        $product = Devices::find($id);
        $product->delete();
        return redirect('/device_list')->with('success', 'deleted successfully!');
    }
}