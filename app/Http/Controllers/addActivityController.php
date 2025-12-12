<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AddActivityController extends Controller
{
    public function create()
    {
        // Ambil semua URL gambar dari gallery
        $galleryImages = Image::orderBy('created_at', 'DESC')->get(['url']);
        $galleryUrls = $galleryImages->pluck('url')->toArray();
        
        // Debug: Cek data
        // dd($galleryUrls); // Uncomment untuk cek data
        
        return view('operator.addActivities', compact('galleryUrls'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'required|url',
        ]);

        // Validasi bahwa URL image harus dari gallery
        $isValidGalleryImage = Image::where('url', $request->image_url)->exists();
        
        if (!$isValidGalleryImage) {
            return back()
                ->withInput()
                ->withErrors(['image_url' => 'Image URL must be from the gallery. Please select from the available images.']);
        }

        // Simpan data ke database
        $activity = Activity::create([
            'title' => $request->title,
            'image_url' => $request->image_url,
            'status' => 'requested',
            'created_by' => Auth::id(),
            'note_admin' => null,
        ]);

        return redirect()->route('operator.approval_status')
            ->with('success', 'Activity submitted successfully! Waiting for admin approval.');
    }
}