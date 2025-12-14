<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('status', 'accepted')
            ->orderByDesc('published_at')
            ->get();

        return view('news.news_page', compact('news'));
    }

    public function show(Request $request, string $slug)
    {
        // Check if this is a preview request from admin
        $isPreview = $request->has('preview') && auth()->check();

        $query = News::where('slug', $slug);

        // If not preview mode, only show accepted news
        if (!$isPreview) {
            $query->where('status', 'accepted');
        }

        $news = $query->firstOrFail();

        return view('news.news_detail_page', compact('news', 'isPreview'));
    }
}