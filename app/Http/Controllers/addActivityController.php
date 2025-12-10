<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Concerns\HasUuids;

class AddActivityController extends Controller

{
  //  use HasUuids;
    /**
     * Menampilkan form add activity
     */
    public function create()
    {
        return view('operator.addActivity');
    }

    /**
     * Menyimpan data activity baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'nullable|url',
        ]);

        // Simpan data ke database
        $activity = Activity::create([
            'title' => $request->title,
            'image_url' => $request->image_url,
            'status' => 'requested', // Default status
            'created_by' => Auth::id(),
            'note_admin' => null,
        ]);

        // Redirect ke approval status dengan pesan sukses
        return redirect()->route('operator.approval_status')
            ->with('success', 'Activity submitted successfully! Waiting for admin approval.');
    }
}