<?php

namespace App\Http\Controllers;

use App\Models\News; // We use the News model as you requested
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display the main promotions page.
     */
    public function index(Request $request)
    {
        // Start a query on the News model
        $query = News::query();

        // --- Handle Search ---
        if ($request->filled('search')) {
            $query->where('title', 'LIKE', '%' . $request->input('search') . '%');
        }

        // --- Handle Filtering (e.g., 'ALL', 'Vinfast', 'Neo') ---
        if ($request->filled('category') && $request->input('category') != 'ALL') {
            // This is a simple text search. You can make this more complex later.
            $query->where('title', 'LIKE', '%' . $request->input('category') . '%');
        }

        // Get 3 articles per page (for your 3-per-row layout)
        $promotions = $query->latest()->paginate(3);

        // Send the data to the view
        return view('promotions.index', [
            'promotions' => $promotions,
        ]);
    }
}
