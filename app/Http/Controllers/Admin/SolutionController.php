<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SolutionController extends Controller
{
    /**
     * Display a listing of solutions / LED display systems.
     */
    public function index(Request $request)
    {
        $query = Solution::query();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_active', false);
            }
        }

        $solutions = $query->orderBy('title', 'asc')
            ->paginate(15)
            ->withQueryString();

        $totalCount = Solution::count();
        $activeCount = Solution::where('is_active', true)->count();
        $draftCount = Solution::where('is_active', false)->count();

        $categories = Solution::select('category')
            ->distinct()
            ->pluck('category');

        return view('admin.solutions.index', compact(
            'solutions',
            'totalCount',
            'activeCount',
            'draftCount',
            'categories'
        ));
    }

    /**
     * Show the form for uploading a new solution.
     */
    public function create()
    {
        return view('admin.solutions.create');
    }

    /**
     * Store a newly uploaded solution in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:8192'],
            'short_description' => ['required', 'string', 'max:1000'],
            'features' => ['nullable', 'string'],
            'specs' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'cta_label' => ['nullable', 'string', 'max:100'],
            'cta_url' => ['nullable', 'string', 'max:500'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadDir = public_path('uploads/solutions');
            if (!File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $imagePath = 'uploads/solutions/' . $filename;
        }

        Solution::create([
            'title' => trim($validated['title']),
            'slug' => Str::slug($validated['title']),
            'category' => trim($validated['category']),
            'image' => $imagePath,
            'short_description' => $validated['short_description'],
            'features' => $validated['features'] ?? null,
            'specs' => $validated['specs'] ?? null,
            'location' => $validated['location'] ?? null,
            'cta_label' => $validated['cta_label'] ?: 'BOOK YOUR ADS NOW',
            'cta_url' => $validated['cta_url'] ?? null,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.solutions.index')
            ->with('success', 'LED Display System published successfully!');
    }

    /**
     * Show the form for editing the specified solution.
     */
    public function edit(Solution $solution)
    {
        return view('admin.solutions.edit', compact('solution'));
    }

    /**
     * Update the specified solution in storage.
     */
    public function update(Request $request, Solution $solution)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:8192'],
            'short_description' => ['required', 'string', 'max:1000'],
            'features' => ['nullable', 'string'],
            'specs' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'cta_label' => ['nullable', 'string', 'max:100'],
            'cta_url' => ['nullable', 'string', 'max:500'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            // Delete old uploaded image if in uploads/solutions
            if ($solution->image && str_starts_with($solution->image, 'uploads/solutions/')) {
                $oldFile = public_path($solution->image);
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $file = $request->file('image');
            $uploadDir = public_path('uploads/solutions');
            if (!File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $solution->image = 'uploads/solutions/' . $filename;
        }

        $solution->title = trim($validated['title']);
        $solution->slug = Str::slug($validated['title']);
        $solution->category = trim($validated['category']);
        $solution->short_description = $validated['short_description'];
        $solution->features = $validated['features'] ?? null;
        $solution->specs = $validated['specs'] ?? null;
        $solution->location = $validated['location'] ?? null;
        $solution->cta_label = $validated['cta_label'] ?: 'BOOK YOUR ADS NOW';
        $solution->cta_url = $validated['cta_url'] ?? null;
        $solution->order = $validated['order'] ?? 0;
        $solution->is_active = $request->boolean('is_active', true);
        $solution->save();

        return redirect()->route('admin.solutions.index')
            ->with('success', 'LED Display System updated successfully!');
    }

    /**
     * Remove the specified solution from storage.
     */
    public function destroy(Solution $solution)
    {
        if ($solution->image && str_starts_with($solution->image, 'uploads/solutions/')) {
            $filePath = public_path($solution->image);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $solution->delete();

        return redirect()->route('admin.solutions.index')
            ->with('success', 'LED Display System deleted successfully!');
    }

    /**
     * Toggle active/draft status for a solution.
     */
    public function toggleStatus(Solution $solution)
    {
        $solution->is_active = !$solution->is_active;
        $solution->save();

        $statusLabel = $solution->is_active ? 'published live' : 'moved to drafts';

        return redirect()->back()
            ->with('success', "Display System '{$solution->title}' is now {$statusLabel}.");
    }
}
