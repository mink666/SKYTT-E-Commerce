<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;
use App\Models\BikeVariant;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // 1. Start by querying the base Bike model
        $query = Bike::query();

        // 2. --- SEARCH BY BIKE NAME ONLY ---
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'LIKE', '%' . $searchTerm . '%');
        }

        // 3. --- GET THE LOWEST VARIANT PRICE ---
        $query->withMin('variants', 'price');

        // 4. --- LOAD ALL VARIANTS FOR THE PALETTE ---
        $query->with('variants');

        // Get the final list of bikes
        $bikes = $query->latest()->paginate(6);

        // 5. Pass the list of bikes (now with variants) to the view
        return view('products.index', [
            'bikes' => $bikes
        ]);
    }

    public function show(Bike $bike)
    {
        // Load all variants and all features
        $bike->load(['variants', 'features']);

        return view('products.show', [
            'bike' => $bike
        ]);
    }
}
