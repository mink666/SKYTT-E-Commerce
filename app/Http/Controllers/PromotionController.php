<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display the main promotions page.
     */
    public function index(Request $request)
    {
        $query = News::query()->where('type', 'promotion');

        // --- Handle Search---
        if ($request->filled('search')) {
            $query->where('title', 'LIKE', '%' . $request->input('search') . '%');
        }

        // --- Handle Filtering---
        if ($request->filled('category') && $request->input('category') != 'ALL') {
            $query->where('title', 'LIKE', '%' . $request->input('category') . '%');
        }

        $promotions = $query->latest()->paginate(9);

        return view('promotions.index', [
            'promotions' => $promotions,
        ]);
    }
}
