<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        $paginated = Image::orderBy('created_at', 'DESC')->paginate(10);

        return view('operator.operator_gallery', compact('paginated'));
    }

    public function create()
    {
        return view('operator.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048',
        ]);

        // Generate UUID
        $id = Str::uuid();

        // Upload file - PASTIKAN folder 'gallery_images'
        $fileName = $id . '.' . $request->photo->extension();
        
        // Simpan di folder gallery_images
        $path = $request->photo->storeAs('gallery_images', $fileName, 'public');

        // Generate URL yang benar
        $url = Storage::url($path); // Ini akan menghasilkan: /storage/gallery_images/filename.png

        Image::create([
            'id'          => $id,
            'file_name'   => $fileName,
            'url'         => $url, // Simpan sebagai /storage/gallery_images/filename.png
            'uploaded_by' => auth()->id(),
            'created_at'  => now(),
        ]);

        return redirect()->route('gallery.index')->with('success', 'Image uploaded');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        // Hapus file fisik - PASTIKAN path yang benar
        Storage::disk('public')->delete("gallery_images/" . $image->file_name);

        $image->delete();

        return back()->with('success', 'Image deleted');
    }
    
    // Tambahkan method untuk get full URL
    public function getImageUrl($filename)
    {
        $path = 'gallery_images/' . $filename;
        
        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }
        
        return Storage::url($path);
    }
}