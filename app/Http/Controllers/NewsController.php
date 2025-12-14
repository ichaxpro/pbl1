<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::where('status', 'accepted');

        // Search functionality
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'ILIKE', '%' . $searchTerm . '%')
                  ->orWhere('content', 'ILIKE', '%' . $searchTerm . '%');
            });
        }

        // Filter by year
        if ($request->has('year') && $request->year) {
            $query->whereYear('published_at', $request->year);
        }

        // Sort functionality
        $sortOrder = $request->get('sort', 'newest');
        if ($sortOrder === 'oldest') {
            $query->orderBy('published_at', 'asc');
        } else {
            $query->orderByDesc('published_at');
        }

        $news = $query->get();

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