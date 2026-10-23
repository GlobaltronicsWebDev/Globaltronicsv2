<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionViewController extends Controller
{
    /**
     * Display the public showcase grid of LED Display Systems (Matching Image 1).
     */
    public function index(Request $request)
    {
        $solutions = Solution::where('is_active', true)
            ->orderBy('title', 'asc')
            ->paginate(12);

        return view('solutions.index', compact('solutions'));
    }

    /**
     * Display the dedicated full description page for a specific system (Matching Image 2).
     */
    public function show($slug)
    {
        $solution = Solution::where('slug', $slug)
            ->orWhere('id', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedSolutions = Solution::where('id', '!=', $solution->id)
            ->where('is_active', true)
            ->orderBy('title', 'asc')
            ->take(3)
            ->get();

        return view('solutions.show', compact('solution', 'relatedSolutions'));
    }
}
