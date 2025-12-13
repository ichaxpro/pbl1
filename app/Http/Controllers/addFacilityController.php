<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Concerns\HasUuids;

class addFacilityController extends Controller
{
    //  use HasUuids;
    /**

     */
    public function create()
    {
        $galleryImages = Image::orderBy('created_at', 'DESC')->get(['url']);
        $galleryUrls = $galleryImages->pluck('url')->toArray();
        return view('operator.addFacilities', compact('galleryUrls'));
    }

    /**

     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'required|string|max:500',
        ]);
        // Memastikan internal paths always begin with /storage/
        $imageUrl = trim($request->image_url);

        $isValidGalleryImage = Image::where('url', $imageUrl)->exists(); 

        if (!$isValidGalleryImage) {
        return back()
            ->withInput()
            ->withErrors(['image_url' => 'Image URL must be from the gallery. Please select from the available images.']);
    }

        // Simpan data ke database
        $facility = Facility::create([
            'title' => $request->title,
            'image_url' => $imageUrl,
            'status' => 'requested', // Default status

            'created_by' => Auth::id(),
            'note_admin' => null,
        ]);

        // Redirect ke approval status dengan pesan sukses
        return redirect()->route('operator.approval_status')
            ->with('success', 'Facility submitted successfully! Waiting for admin approval.');
    }
}