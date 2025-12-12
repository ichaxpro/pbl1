<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Concerns\HasUuids;

class AddFacilityController extends Controller

{
  //  use HasUuids;
    /**
    
     */
    public function create()
    {
        return view('operator.addFacility');
    }

    /**
     
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'required|url',
        ]);

        // Simpan data ke database
        $facility = Facility::create([
            'title' => $request->title,
            'image_url' => $request->image_url,
            'status' => 'requested', // Default status
            
            'created_by' => Auth::id(),
            'note_admin' => null,
        ]);

        // Redirect ke approval status dengan pesan sukses
        return redirect()->route('operator.approval_status')
            ->with('success', 'Facility submitted successfully! Waiting for admin approval.');
    }
}