<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerViewController extends Controller
{
    /**
     * Display the standalone careers listing page.
     */
    public function index(Request $request)
    {
        $query = Career::where('is_active', true);

        // Filter by Department
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Filter by Employment Type
        if ($request->filled('type')) {
            $query->where('employment_type', $request->type);
        }

        // Keyword Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('department', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $careers = $query->orderBy('order', 'asc')->orderByDesc('id')->get();
        $departments = Career::where('is_active', true)->pluck('department')->unique()->filter()->values();
        $types = Career::where('is_active', true)->pluck('employment_type')->unique()->filter()->values();

        return view('careers.index', compact('careers', 'departments', 'types'));
    }

    /**
     * Display the specified job opening details.
     */
    public function show($slug)
    {
        $career = Career::where('slug', $slug)
            ->orWhere('id', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $otherCareers = Career::where('id', '!=', $career->id)
            ->where('is_active', true)
            ->orderBy('order', 'asc')
            ->take(3)
            ->get();

        return view('careers.show', compact('career', 'otherCareers'));
    }
}
