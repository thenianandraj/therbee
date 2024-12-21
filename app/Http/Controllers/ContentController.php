<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::latest()->paginate(5);
        return view('Adminpanel.Specific.list', compact('contents'));
    }

    public function create()
    {
        return view('Adminpanel.Specific.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title.*' => 'nullable|string|max:255',
            'type.*' => 'required|string|max:255',
            'description.*' => 'nullable|string',
        ]);
    
        foreach ($data['type'] as $key => $type) {
            Content::create([
                'title' => $data['title'][$key],
                'type' => $type,
                'description' => $data['description'][$key],
            ]);
        }
    
        return redirect()->back()->with('success', 'Content saved successfully!');
    }
    

    public function show(Content $content)
    {
        return view('content.show', compact('content'));
    }

    public function edit($id)
    {
        $view = Content::where('id', $id)->get();
        return view('Adminpanel.Specific.update', compact('view'));
       
    }

    public function update(Request $request, $id)
    {
        // Find the content by ID or fail
        $content = Content::findOrFail($id);
    
        // Update the content with all input data
        $content->update($request->all());
    
        // Redirect with a success message
        return redirect('/specific')->with('success', 'Content updated successfully.');
    }
    
    public function destroy($id)
    {
        $content = Content::find($id);
        $content->delete();
        return redirect('/specific')->with('success', 'Content deleted successfully.');
    }
}

