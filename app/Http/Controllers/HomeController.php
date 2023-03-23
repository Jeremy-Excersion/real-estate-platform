<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Listing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $listings = Listing::with('photos')->limit(3)->get();

        return Inertia::render('Home', [
            'listings' => $listings,
        ]);
    }
}
