<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AddNewsController extends Controller
{
    public function create()
    {
        // Read files from: storage/app/public/gallery_images
        $galleryImages = Image::orderBy('created_at', 'DESC')->get(['url']);
        $galleryUrls = $galleryImages->pluck('url')->toArray();

        return view('operator.addNews', compact('galleryUrls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail_url' => 'required|string',
            'date' => 'required|date',
        ]);

        // Unique slug
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;

        while (News::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        if (!Image::where('url', $request->thumbnail_url)->exists()) {
            return back()
                ->withInput()
                ->withErrors([
                    'thumbnail_url' => 'Thumbnail must be selected from gallery'
                ]);
        }

        News::create([
            'id' => Str::uuid(),
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->input('content'),
            'thumbnail_url' => $request->thumbnail_url,
            'status' => 'requested',
            'author_id' => auth()->id(),
            'published_at' => Carbon::parse($request->input('date')),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('operator.news.create')
            ->with('success', 'News submitted and waiting for admin review.');
    }
}