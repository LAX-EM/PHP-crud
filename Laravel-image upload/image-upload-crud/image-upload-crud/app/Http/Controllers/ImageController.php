<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function gallery()
    {
        return view('gallery_user', ['images' => Image::all()]); // Public gallery page
    }

    public function create()
    {
        return view('admin_upload'); // Admin upload page
    }

    public function adminView()
    {
        return view('admin_view', ['images' => Image::all()]); // Admin view page
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');

        Image::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath
        ]);

        return redirect()->route('admin.upload')->with('success', 'Image uploaded successfully!');
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($image->image_path);
            $imagePath = $request->file('image')->store('uploads', 'public');
            $image->update(['title' => $request->title, 'description' => $request->description, 'image_path' => $imagePath]);
        } else {
            $image->update(['title' => $request->title, 'description' => $request->description]);
        }

        return redirect()->route('admin.view')->with('success', 'Image updated successfully!');
    }

    public function destroy(Image $image)
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return redirect()->route('admin.view')->with('success', 'Image deleted successfully!');
    }
}
