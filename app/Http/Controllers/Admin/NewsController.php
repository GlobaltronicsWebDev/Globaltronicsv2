<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the news articles.
     */
    public function index(Request $request)
    {
        $totalCount = News::count();
        $activeCount = News::where('is_active', true)->count();
        $draftCount = News::where('is_active', false)->count();

        $query = News::query();

        // Search query
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('badge', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status')) {
            if ($request->input('status') === 'active') {
                $query->where('is_active', true);
            } elseif ($request->input('status') === 'draft') {
                $query->where('is_active', false);
            }
        }

        // Category / Badge filter
        if ($request->filled('badge')) {
            $query->where('badge', $request->input('badge'));
        }

        $newsList = $query->orderByDesc('published_date')
                          ->orderByDesc('id')
                          ->paginate(9)
                          ->withQueryString();

        $distinctBadges = News::select('badge')->distinct()->pluck('badge');

        return view('admin.news.index', compact(
            'newsList',
            'totalCount',
            'activeCount',
            'draftCount',
            'distinctBadges'
        ));
    }

    /**
     * Show the form for creating a new news article.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created news article in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'badge' => ['required', 'string', 'max:50'],
            'published_date' => ['required', 'date'],
            'description' => ['required', 'string', 'max:1000'],
            'content' => ['nullable', 'string'],
            'video_url' => ['nullable', 'string', 'max:500'],
            'link_url' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:10240'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/news');
            
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $file->move($destinationPath, $filename);
            $imagePath = 'uploads/news/' . $filename;
        }

        $content = !empty($validated['content']) ? $validated['content'] : $validated['description'];
        $linkUrl = !empty($validated['link_url']) && $validated['link_url'] !== '#news' ? $validated['link_url'] : '';

        News::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'badge' => strtoupper(trim($validated['badge'])),
            'published_date' => $validated['published_date'],
            'description' => $validated['description'],
            'content' => $content,
            'video_url' => $validated['video_url'] ?? null,
            'link_url' => $linkUrl,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.news.index')
            ->with('success', 'News article created and published successfully!');
    }

    /**
     * Show the form for editing the specified news article.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified news article in storage.
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'badge' => ['required', 'string', 'max:50'],
            'published_date' => ['required', 'date'],
            'description' => ['required', 'string', 'max:1000'],
            'content' => ['nullable', 'string'],
            'video_url' => ['nullable', 'string', 'max:500'],
            'link_url' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:10240'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/news');

            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $file->move($destinationPath, $filename);

            // Delete old uploaded file if stored in uploads/news
            if ($news->image && str_starts_with($news->image, 'uploads/news/')) {
                $oldFilePath = public_path($news->image);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }

            $news->image = 'uploads/news/' . $filename;
        }

        $news->title = $validated['title'];
        $news->slug = Str::slug($validated['title']);
        $news->badge = strtoupper(trim($validated['badge']));
        $news->published_date = $validated['published_date'];
        $news->description = $validated['description'];
        $news->content = !empty($validated['content']) ? $validated['content'] : $validated['description'];
        $news->video_url = $validated['video_url'] ?? null;
        $news->link_url = !empty($validated['link_url']) && $validated['link_url'] !== '#news' ? $validated['link_url'] : '';
        $news->order = $validated['order'] ?? 0;
        $news->is_active = $request->boolean('is_active', true);
        $news->save();

        return redirect()->route('admin.news.index')
            ->with('success', 'News article updated successfully!');
    }

    /**
     * Remove the specified news article from storage.
     */
    public function destroy(News $news)
    {
        // Delete uploaded image if it's stored in uploads/news
        if ($news->image && str_starts_with($news->image, 'uploads/news/')) {
            $filePath = public_path($news->image);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'News article deleted successfully!');
    }

    /**
     * Toggle active/draft status for an article.
     */
    public function toggleStatus(News $news)
    {
        $news->is_active = !$news->is_active;
        $news->save();

        $statusLabel = $news->is_active ? 'published' : 'moved to drafts';

        return redirect()->back()
            ->with('success', "Article '{$news->title}' is now {$statusLabel}.");
    }
}
