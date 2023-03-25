<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $query = Listing::query()->with('photos');

        $filters = request()->all(
            ['min_listing_price', 'max_listing_price', 'min_bedrooms', 'min_bathrooms',
            'min_square_footage', 'max_square_footage', 'min_lot_size', 'max_lot_size', 'min_year_built', 'max_year_built',
            'has_garage', 'has_pool', 'has_basement', 'is_waterfront', 'has_ac', 'has_city_view', 'has_park_view', 'has_mountain_view', 'has_water_view']);

        foreach ($filters as $filter => $value) {
            if (empty($value) || $filter == 'page') {
                continue;
            }
            if (strpos($filter, 'min_') !== false) {
                $column = str_replace('min_', '', $filter);
                $query->where($column, '>=', $value);
            } else if (strpos($filter, 'max_') !== false) {
                $column = str_replace('max_', '', $filter);
                $query->where($column, '<=', $value);
            } else {
                $query->where($filter, $value);
            }
        }

        if (request()->wantsJson()) {
            return $query->paginate(9);
        }

        return Inertia::render('Listings/Index', [
            'listings' => $query->paginate(9),
            'filters' => request()->all(['min_price', 'max_price']),
        ]);
    }

    public function show ($id)
    {
        $listing = Listing::with('photos')->findOrFail($id);

        return Inertia::render('Listings/Show', [
            'listing' => $listing,
            'filters' => request()->all(['min_price', 'max_price']),
        ]);
    }
}
