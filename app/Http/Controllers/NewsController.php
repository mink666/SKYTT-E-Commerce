<?php

namespace App\Http\Controllers;

use App\Models\News; // Make sure you have your News model
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display the main news listing page.
     */
    public function index(Request $request)
    {
        // 1. Get the single latest 'news' article for the hero section
        $featuredNews = News::where('type', 'news')->latest()->first();

        // 2. Get the paginated list of 'news' articles for the grid
        //    IMPORTANT: We start the query by *only* looking for 'news'
        $query = News::query()->where('type', 'news');

        // --- Handle Search (exactly like promotions) ---
        if ($request->filled('search')) {
            $query->where('title', 'LIKE', '%' . $request->input('search') . '%');
        }

        // --- Handle Filtering (exactly like promotions) ---
        if ($request->filled('category') && $request->input('category') != 'ALL') {
            // This is a simple text search on the title
            $query->where('title', 'LIKE', '%' . $request->input('category') . '%');
        }

        // Get 6 articles per page (for your 3-per-row layout)
        $newsList = $query->latest()->paginate(6);

        // 3. Send the data to the view
        return view('news.index', [
            'featuredNews' => $featuredNews,
            'newsList'     => $newsList,
        ]);
    }

    /**
     * Display a single news article.
     */
    public function show(News $news)
    {
        // Get 5 recent news articles for the sidebar
        // Exclude the current article using where('id', '!=', $news->id)
        $recentNews = News::latest()
                            ->where('id', '!=', $news->id)
                            ->take(5)
                            ->get();

        // Pass the main article AND the recent articles to the view
        return view('news.show', [
            'news' => $news,
            'recentNews' => $recentNews
        ]);
    }
}
