<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {

        // request()->validate([
        //     'min_price' => ['in:listing_price'],
        //     'max_price' => ['in:listing_price'],
        // ]);

        $query = Listing::query()->with('photos');

        if (request('min_price')) {
            $query->where('listing_price', '>=', request('min_price'));
        }

        if (request('max_price')) {
            $query->where('listing_price', '<=', request('max_price'));
        }

        if (request('min_bedrooms')) {
            $query->where('bedrooms', '>=', request('min_bedrooms'));
        }

        if (request('min_bathrooms')) {
            $query->where('bathrooms', '>=', request('min_bathrooms'));
        }

        if (request('min_sqft')) {
            $query->where('square_footage', '>=', request('min_sqft'));
        }

        if (request('max_sqft')) {
            $query->where('square_footage', '<=', request('max_sqft'));
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
