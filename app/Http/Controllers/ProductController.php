<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // 1. Only query bikes where is_active is 1
        $query = Bike::where('is_active', 1);

        // 2. Search Logic
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'LIKE', '%' . $searchTerm . '%');
        }

        // 3. Eager Loading & Min Price
        $query->withMin('variants', 'price')->with('variants');

        // 4. Paginate
        $bikes = $query->latest()->paginate(6);

        return view('products.index', [
            'bikes' => $bikes
        ]);
    }

    public function show($slug)
    {
        // Ensure the main bike being viewed is also active
        $bike = Bike::where('slug', $slug)
            ->where('is_active', 1)
            ->with(['variants', 'features', 'sections.items'])
            ->firstOrFail();

        // 5. RELATED BIKES LOGIC
        $related_bikes = Bike::where('type', $bike->type)
            ->where('id', '!=', $bike->id)
            ->where('is_active', 1)
            ->take(4)
            ->get();

        return view('products.show', [
            'bike' => $bike,
            'related_bikes' => $related_bikes
        ]);
    }
}
