<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('image.index', ['images' => $images]);
    }

    public function create()
    {
        return view('image.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            // Debug để kiểm tra file được upload
            dd($request->file('image'));
    
            $path = $request->file('image')->store('img', 'public');
            $image = Image::create(['image_path' => $path]);
            
            if ($image) {
                return redirect()->route('image.index')->with('success', 'Image uploaded successfully.');
            } else {
                return back()->with('error', 'Failed to save image to database.');
            }
        }
    
        return back()->with('error', 'Please upload an image.');
    }
    
    

    public function show($id)
    {
        $image = Image::findOrFail($id);
        return view('image.show', ['image' => $image]);
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('image.edit', ['image' => $image]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = Image::findOrFail($id);

        if ($request->hasFile('image')) {
            // Xóa hình ảnh cũ
            Storage::disk('public')->delete($image->path);

            // Lưu hình ảnh mới
            $path = $request->file('image')->store('img', 'public');
            $image->path = $path;
            $image->save();

            return redirect()->route('image.index')->with('success', 'Image updated successfully.');
        }

        return back()->with('error', 'Please upload an image.');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        // Xóa hình ảnh khỏi hệ thống lưu trữ
        Storage::disk('public')->delete($image->path);

        // Xóa bản ghi khỏi cơ sở dữ liệu
        $image->delete();

        return redirect()->route('image.index')->with('success', 'Image deleted successfully.');
    }
}
