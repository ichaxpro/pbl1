<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AddPublicationController extends Controller
{
    public function create()
    {
        return view('operator.addPublication');
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
            'file' => 'required|mimes:pdf|max:10000', // 10 MB
        ]);

        // Upload PDF to storage
        $storedPath = $request->file('file')->store(
            'public/publications'
        );

        // Convert to public URL form
        $fileUrl = str_replace('public/', 'storage/', $storedPath);

        // Insert into PostgreSQL
        $publication = Publication::create([
            'id' => Str::uuid(),
            'title' => $request->title,
            'date' => $request->date,
            'abstract' => $request->content,
            'file_url' => $fileUrl,
            'status' => 'requested',
            'created_by' => Auth::id(),
            'note_admin' => null,
            'approved_by' => null,
            'rejected_by' => null,
        ]);

        return redirect()
            ->route('operator.approval_status')
            ->with('success', 'Publication submitted! Waiting for admin approval.');
    }
}
