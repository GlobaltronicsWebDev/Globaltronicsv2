<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Iposter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class IposterController extends Controller
{
    /**
     * Display a listing of digital iPosters.
     */
    public function index(Request $request)
    {
        $query = Iposter::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('mall_or_location', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_active', false);
            }
        }

        $iposters = $query->orderBy('title', 'asc')
            ->paginate(15)
            ->withQueryString();

        $totalCount = Iposter::count();
        $activeCount = Iposter::where('is_active', true)->count();
        $draftCount = Iposter::where('is_active', false)->count();

        return view('admin.iposters.index', compact(
            'iposters',
            'totalCount',
            'activeCount',
            'draftCount'
        ));
    }

    /**
     * Show the form for creating a new digital iPoster.
     */
    public function create()
    {
        return view('admin.iposters.create');
    }

    /**
     * Store a newly created digital iPoster in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'mall_or_location' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:8192',
            'image_url_fallback' => 'nullable|string|max:1000',
            'short_description' => 'nullable|string|max:1000',
            'features' => 'nullable|string',
            'specifications' => 'nullable|string|max:255',
            'daily_traffic' => 'nullable|string|max:255',
            'cta_label' => 'nullable|string|max:100',
            'cta_url' => 'nullable|string|max:500',
            'is_active' => 'boolean',
        ]);

        $imagePath = 'assets/images/iposters/iposter_hero.jpg';

        if ($request->hasFile('image_file')) {
            $uploadDir = public_path('uploads/iposters');
            if (!File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true);
            }

            $file = $request->file('image_file');
            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $fileName);
            $imagePath = 'uploads/iposters/' . $fileName;
        } elseif ($request->filled('image_url_fallback')) {
            $imagePath = $request->image_url_fallback;
        }

        $galleryImages = [];
        if ($request->hasFile('gallery_files')) {
            $galleryDir = public_path('uploads/iposters/gallery');
            if (!File::isDirectory($galleryDir)) {
                File::makeDirectory($galleryDir, 0755, true);
            }
            foreach ($request->file('gallery_files') as $idx => $gFile) {
                $gName = time() . '_' . $idx . '_' . Str::slug(pathinfo($gFile->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gFile->getClientOriginalExtension();
                $gFile->move($galleryDir, $gName);
                $galleryImages[] = 'uploads/iposters/gallery/' . $gName;
            }
        }
        if (empty($galleryImages)) {
            $galleryImages = [$imagePath];
        }

        $validated['category'] = !empty($validated['category']) ? $validated['category'] : 'Digital iPoster Ad Placement';
        $validated['image'] = $imagePath;
        $validated['gallery_images'] = $galleryImages;
        $validated['is_active'] = $request->has('is_active');
        $validated['cta_label'] = !empty($validated['cta_label']) ? $validated['cta_label'] : 'BOOK YOUR IPOSTER ADS NOW';

        $iposter = Iposter::create($validated);

        return redirect()->route('admin.iposters.index')
            ->with('success', "Digital iPoster '{$iposter->title}' uploaded successfully!");
    }

    /**
     * Show the form for editing the specified digital iPoster.
     */
    public function edit(Iposter $iposter)
    {
        return view('admin.iposters.edit', compact('iposter'));
    }

    /**
     * Update the specified digital iPoster in storage.
     */
    public function update(Request $request, Iposter $iposter)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'mall_or_location' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:8192',
            'gallery_files.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:8192',
            'image_url_fallback' => 'nullable|string|max:1000',
            'short_description' => 'nullable|string|max:1000',
            'features' => 'nullable|string',
            'specifications' => 'nullable|string|max:255',
            'daily_traffic' => 'nullable|string|max:255',
            'cta_label' => 'nullable|string|max:100',
            'cta_url' => 'nullable|string|max:500',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image_file')) {
            // Remove old uploaded file if it was in uploads/
            if (!empty($iposter->image) && Str::startsWith($iposter->image, 'uploads/iposters/')) {
                $oldPath = public_path($iposter->image);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $uploadDir = public_path('uploads/iposters');
            if (!File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true);
            }

            $file = $request->file('image_file');
            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $fileName);
            $validated['image'] = 'uploads/iposters/' . $fileName;
        } elseif ($request->filled('image_url_fallback')) {
            $validated['image'] = $request->image_url_fallback;
        }

        $existingGallery = $iposter->gallery_images ?: [];
        if (!is_array($existingGallery)) {
            $existingGallery = json_decode($existingGallery, true) ?: [];
        }

        if ($request->hasFile('gallery_files')) {
            $galleryDir = public_path('uploads/iposters/gallery');
            if (!File::isDirectory($galleryDir)) {
                File::makeDirectory($galleryDir, 0755, true);
            }
            foreach ($request->file('gallery_files') as $idx => $gFile) {
                $gName = time() . '_' . $idx . '_' . Str::slug(pathinfo($gFile->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gFile->getClientOriginalExtension();
                $gFile->move($galleryDir, $gName);
                $existingGallery[] = 'uploads/iposters/gallery/' . $gName;
            }
        }
        $validated['gallery_images'] = $existingGallery;

        $validated['category'] = !empty($validated['category']) ? $validated['category'] : 'Digital iPoster Ad Placement';
        $validated['is_active'] = $request->has('is_active');
        $validated['cta_label'] = !empty($validated['cta_label']) ? $validated['cta_label'] : 'BOOK YOUR IPOSTER ADS NOW';

        $iposter->update($validated);

        return redirect()->route('admin.iposters.index')
            ->with('success', "Digital iPoster '{$iposter->title}' updated successfully!");
    }

    /**
     * Remove the specified digital iPoster from storage.
     */
    public function destroy(Iposter $iposter)
    {
        $title = $iposter->title;

        if (!empty($iposter->image) && Str::startsWith($iposter->image, 'uploads/iposters/')) {
            $filePath = public_path($iposter->image);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        if (!empty($iposter->gallery_images) && is_array($iposter->gallery_images)) {
            foreach ($iposter->gallery_images as $gImg) {
                if (Str::startsWith($gImg, 'uploads/iposters/')) {
                    $gPath = public_path($gImg);
                    if (File::exists($gPath)) {
                        File::delete($gPath);
                    }
                }
            }
        }

        $iposter->delete();

        return redirect()->route('admin.iposters.index')
            ->with('success', "Digital iPoster '{$title}' was successfully deleted.");
    }

    /**
     * Toggle active/draft status quickly.
     */
    public function toggleStatus(Iposter $iposter)
    {
        $iposter->is_active = !$iposter->is_active;
        $iposter->save();

        $status = $iposter->is_active ? 'published live' : 'moved to drafts';
        return back()->with('success', "iPoster '{$iposter->title}' is now {$status}.");
    }
}
