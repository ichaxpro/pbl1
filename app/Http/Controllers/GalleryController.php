<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery; 
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Str; 

class GalleryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image_file' => 'required|array',
            'image_file.*' => 'image|max:2048', // Validasi tiap file
        ]);

        if ($request->hasFile('image_file')) {
            $files = $request->file('image_file');
            
            foreach ($files as $file) {
                // Nama file asli
                $originalFileName = $file->getClientOriginalName();
                
                // Simpan file ke storage
                $imagePath = $file->store('gallery_images', 'public');
                $imageUrl = Storage::url($imagePath);
                
                // Simpan ke database
                Gallery::create([
                    'id' => Str::uuid(),
                    'file_name' => $originalFileName,
                    'url' => $imageUrl,
                    'uploaded_by' => auth()->id(), // disarankan pakai auth user
                    'created_at' => now(),
                ]);
            }
        }

        // Redirect ke halaman gallery dengan flash message
        return redirect()->route('gallery.index')
                         ->with('success', 'Image(s) uploaded successfully!');
    }
}
