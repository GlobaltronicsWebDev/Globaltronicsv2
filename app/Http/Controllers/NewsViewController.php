<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsViewController extends Controller
{
    /**
     * Display a listing of all published news and articles.
     */
    public function index(Request $request)
    {
        $query = News::where('is_active', true)
            ->orderByDesc('published_date')
            ->orderByDesc('id');

        // Optional category / badge filter
        if ($request->filled('badge')) {
            $query->where('badge', $request->badge);
        }

        // Optional search keyword
        if ($request->filled('q')) {
            $search = trim($request->q);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('badge', 'like', "%{$search}%");
            });
        }

        $articles = $query->paginate(9)->withQueryString();

        // Get distinct active category badges for filter tabs
        $badges = News::where('is_active', true)
            ->whereNotNull('badge')
            ->where('badge', '!=', '')
            ->distinct()
            ->pluck('badge')
            ->sort()
            ->values();

        $featuredNews = null;
        // On first page with no filters, highlight the latest article as featured hero banner if desired
        if (!$request->filled('badge') && !$request->filled('q') && (!$request->has('page') || $request->page == 1)) {
            $featuredNews = $articles->first();
        }

        return view('news.index', compact('articles', 'badges', 'featuredNews'));
    }

    /**
     * Display the full public news article.
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)
            ->orWhere('id', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $recentNews = News::where('id', '!=', $news->id)
            ->where('is_active', true)
            ->orderByDesc('published_date')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        return view('news.show', compact('news', 'recentNews'));
    }
}
