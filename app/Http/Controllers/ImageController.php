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

        // Upload file
        $fileName = $id . '.' . $request->photo->extension();

        $path = $request->photo->storeAs('gallery', $fileName, 'public');

        // Generate URL
        $url = asset('storage/' . $path);

        Image::create([
            'id'          => $id,
            'file_name'   => $fileName,
            'url'         => $url,
            'uploaded_by' => auth()->id(),
            'created_at'  => now(),
        ]);

        return redirect()->route('gallery.index')->with('success', 'Image uploaded');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        // Hapus file fisik
        Storage::disk('public')->delete("gallery/" . $image->file_name);

        $image->delete();

        return back()->with('success', 'Image deleted');
    }
}
