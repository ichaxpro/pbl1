<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('status', 'accepted')
            ->orderByDesc('published_at')
            ->get();

        return view('news.news_page', compact('news'));
    }

    public function show(string $slug)
    {
        $news = News::where('slug', $slug)
            ->where('status', 'accepted')
            ->firstOrFail();

        return view('news.news_detail_page', compact('news'));
    }
}