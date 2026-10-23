<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    /**
     * Display a listing of career opportunities in the CMS.
     */
    public function index(Request $request)
    {
        $query = Career::query();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('department', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_active', false);
            }
        }

        $careers = $query->orderBy('order', 'asc')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        $totalCount = Career::count();
        $activeCount = Career::where('is_active', true)->count();
        $draftCount = Career::where('is_active', false)->count();

        $departments = Career::select('department')
            ->distinct()
            ->pluck('department');

        return view('admin.careers.index', compact(
            'careers',
            'totalCount',
            'activeCount',
            'draftCount',
            'departments'
        ));
    }

    /**
     * Show the form for creating a new job opening.
     */
    public function create()
    {
        return view('admin.careers.create');
    }

    /**
     * Store a newly created job opening in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:100'],
            'employment_type' => ['required', 'string', 'max:50'],
            'location' => ['required', 'string', 'max:255'],
            'experience_level' => ['nullable', 'string', 'max:100'],
            'salary_range' => ['nullable', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:2000'],
            'responsibilities' => ['nullable', 'string'],
            'requirements' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],
            'application_email' => ['nullable', 'email', 'max:255'],
            'application_url' => ['nullable', 'url', 'max:500'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        Career::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'department' => trim($validated['department']),
            'employment_type' => $validated['employment_type'],
            'location' => $validated['location'],
            'experience_level' => $validated['experience_level'] ?? null,
            'salary_range' => $validated['salary_range'] ?? null,
            'description' => $validated['description'],
            'responsibilities' => $validated['responsibilities'] ?? null,
            'requirements' => $validated['requirements'] ?? null,
            'benefits' => $validated['benefits'] ?? null,
            'application_email' => $validated['application_email'] ?: 'hr.specialist@globaltronics.net',
            'application_url' => $validated['application_url'] ?? null,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career opportunity posted successfully!');
    }

    /**
     * Show the form for editing the specified job opening.
     */
    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    /**
     * Update the specified job opening in storage.
     */
    public function update(Request $request, Career $career)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:100'],
            'employment_type' => ['required', 'string', 'max:50'],
            'location' => ['required', 'string', 'max:255'],
            'experience_level' => ['nullable', 'string', 'max:100'],
            'salary_range' => ['nullable', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:2000'],
            'responsibilities' => ['nullable', 'string'],
            'requirements' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],
            'application_email' => ['nullable', 'email', 'max:255'],
            'application_url' => ['nullable', 'url', 'max:500'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $career->title = $validated['title'];
        $career->slug = Str::slug($validated['title']);
        $career->department = trim($validated['department']);
        $career->employment_type = $validated['employment_type'];
        $career->location = $validated['location'];
        $career->experience_level = $validated['experience_level'] ?? null;
        $career->salary_range = $validated['salary_range'] ?? null;
        $career->description = $validated['description'];
        $career->responsibilities = $validated['responsibilities'] ?? null;
        $career->requirements = $validated['requirements'] ?? null;
        $career->benefits = $validated['benefits'] ?? null;
        $career->application_email = $validated['application_email'] ?: 'hr.specialist@globaltronics.net';
        $career->application_url = $validated['application_url'] ?? null;
        $career->order = $validated['order'] ?? 0;
        $career->is_active = $request->boolean('is_active', true);
        $career->save();

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career opportunity updated successfully!');
    }

    /**
     * Remove the specified job opening from storage.
     */
    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career opportunity deleted successfully!');
    }

    /**
     * Toggle active/draft status for a job opening.
     */
    public function toggleStatus(Career $career)
    {
        $career->is_active = !$career->is_active;
        $career->save();

        $statusLabel = $career->is_active ? 'published live' : 'moved to drafts';

        return redirect()->back()
            ->with('success', "Position '{$career->title}' is now {$statusLabel}.");
    }
}
