<?php

namespace App\Http\Controllers;

use App\Models\Iposter;
use Illuminate\Http\Request;

class IposterViewController extends Controller
{
    /**
     * Display the public showcase of Digital iPoster Ad Placement.
     */
    public function index(Request $request)
    {
        $iposters = Iposter::where('is_active', true)
            ->orderBy('title', 'asc')
            ->paginate(12);

        return view('services.iposters.index', compact('iposters'));
    }

    /**
     * Display the dedicated full details page for a specific iPoster deployment.
     */
    public function show($slug)
    {
        $iposter = Iposter::where('slug', $slug)
            ->orWhere('id', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedIposters = Iposter::where('id', '!=', $iposter->id)
            ->where('is_active', true)
            ->orderBy('title', 'asc')
            ->take(3)
            ->get();

        return view('services.iposters.show', compact('iposter', 'relatedIposters'));
    }
}
