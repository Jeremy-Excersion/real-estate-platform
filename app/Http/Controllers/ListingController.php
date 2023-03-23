<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::with('photos')->paginate(9);

        if (request()->wantsJson()) {
            return $listings;
        }

        return Inertia::render('Listings/Index', [
            'listings' => $listings,
        ]);
    }

    public function show ($id)
    {
        $listing = Listing::with('photos')->findOrFail($id);

        return Inertia::render('Listings/Show', [
            'listing' => $listing,
        ]);
    }
}
