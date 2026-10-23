@extends('admin.layouts.admin')

@section('title', "What's New CMS")
@section('header-title', "What's New Content Management")
@section('header-subtitle', "Upload, edit, and manage articles featured on the homepage carousel.")

@section('content')
<div class="space-y-6">

    <!-- KPI Metric Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <!-- Total Articles -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 flex items-center justify-between shadow-xs">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Total Articles</p>
                <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mt-1">{{ $totalCount }}</h3>
                <p class="text-[11px] text-slate-500 mt-1">Total items in CMS database</p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center text-lg">
                <i class="fa-regular fa-newspaper"></i>
            </div>
        </div>

        <!-- Live on Homepage -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 flex items-center justify-between shadow-xs">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-emerald-700">Published / Live</p>
                <h3 class="text-2xl sm:text-3xl font-black text-emerald-700 mt-1">{{ $activeCount }}</h3>
                <p class="text-[11px] text-slate-500 mt-1">Visible on public carousel</p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-lg">
                <i class="fa-regular fa-circle-check"></i>
            </div>
        </div>

        <!-- Drafts -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 flex items-center justify-between shadow-xs sm:col-span-2 lg:col-span-1">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-amber-700">Drafts / Hidden</p>
                <h3 class="text-2xl sm:text-3xl font-black text-amber-700 mt-1">{{ $draftCount }}</h3>
                <p class="text-[11px] text-slate-500 mt-1">Hidden from public homepage</p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-amber-50 border border-amber-100 text-amber-600 flex items-center justify-center text-lg">
                <i class="fa-regular fa-eye-slash"></i>
            </div>
        </div>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5 shadow-xs">
        <form method="GET" action="{{ route('admin.news.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 items-center">
            
            <!-- Search Text -->
            <div class="relative lg:col-span-2">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </div>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Search by title, badge, or description..." 
                       class="w-full pl-9 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#0047ba]">
            </div>

            <!-- Status Filter -->
            <div>
                <select name="status" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0047ba]">
                    <option value="">All Statuses</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Published Only</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Drafts Only</option>
                </select>
            </div>

            <!-- Filter Buttons -->
            <div class="flex items-center space-x-2">
                <button type="submit" class="flex-1 py-2.5 px-4 bg-[#0047ba] hover:bg-blue-700 text-white font-bold text-xs rounded-xl transition-all shadow-xs flex items-center justify-center gap-1.5 active:scale-95">
                    <i class="fa-solid fa-filter text-xs"></i>
                    <span>Apply Filter</span>
                </button>
                @if(request()->hasAny(['search', 'status', 'badge']))
                    <a href="{{ route('admin.news.index') }}" class="py-2.5 px-3 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-semibold rounded-xl transition-colors border border-slate-200" title="Reset Filters">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- News Table & Grid Area -->
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-xs">
        
        <div class="p-5 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                    <span>Uploaded News Articles</span>
                    <span class="text-xs font-semibold text-slate-500">({{ $newsList->total() }} results)</span>
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">Click actions to update status, edit text, or upload replacement images.</p>
            </div>

            <a href="{{ route('admin.news.create') }}" 
               class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-[#0047ba] hover:bg-blue-700 text-white font-bold text-xs shadow-xs transition-all self-start sm:self-auto active:scale-95">
                <i class="fa-solid fa-plus"></i>
                <span>Upload New Article</span>
            </a>
        </div>

        @if($newsList->isEmpty())
            <div class="p-12 text-center">
                <div class="w-16 h-16 rounded-2xl bg-slate-100 border border-slate-200 flex items-center justify-center mx-auto text-slate-400 text-2xl mb-4">
                    <i class="fa-regular fa-newspaper"></i>
                </div>
                <h4 class="text-base font-bold text-slate-900 mb-1">No news articles found</h4>
                <p class="text-xs text-slate-500 max-w-sm mx-auto mb-6">
                    {{ request()->hasAny(['search', 'status']) ? 'Try adjusting your search criteria or resetting filters.' : 'Get started by uploading your very first What\'s New article.' }}
                </p>
                <a href="{{ route('admin.news.create') }}" class="inline-flex items-center space-x-2 px-5 py-2.5 rounded-xl bg-[#0047ba] hover:bg-blue-700 text-white font-bold text-xs transition-all">
                    <i class="fa-solid fa-plus"></i>
                    <span>Upload Article Now</span>
                </a>
            </div>
        @else
            <!-- Desktop / Tablet Table View -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead>
                        <tr class="bg-slate-50 text-slate-600 uppercase font-extrabold tracking-wider border-b border-slate-200 text-[11px]">
                            <th class="py-3.5 px-4 sm:px-6">Preview Image</th>
                            <th class="py-3.5 px-4">Title & Description</th>
                            <th class="py-3.5 px-4">Badge</th>
                            <th class="py-3.5 px-4">Published Date</th>
                            <th class="py-3.5 px-4 text-center">Status</th>
                            <th class="py-3.5 px-4 sm:px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        @foreach($newsList as $article)
                            <tr class="hover:bg-slate-50/80 transition-colors group">
                                
                                <!-- Image Thumbnail -->
                                <td class="py-4 px-4 sm:px-6 shrink-0">
                                    <div class="w-20 h-14 sm:w-24 sm:h-16 rounded-lg overflow-hidden bg-slate-100 border border-slate-200 relative shadow-xs shrink-0">
                                        <img src="{{ $article->image_url }}" 
                                             alt="{{ $article->title }}" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                             onerror="this.src='{{ asset('assets/images/news/news1.jpg') }}'">
                                    </div>
                                </td>

                                <!-- Title & Summary -->
                                <td class="py-4 px-4 max-w-xs sm:max-w-md">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.news.edit', $article) }}" class="font-bold text-slate-900 hover:text-[#0047ba] transition-colors text-sm line-clamp-1">
                                            {{ $article->title }}
                                        </a>
                                        @if($article->has_video)
                                            <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded bg-red-50 text-red-600 border border-red-200 text-[10px] font-bold shrink-0" title="Has YouTube Video Attached">
                                                <i class="fa-brands fa-youtube"></i> Video
                                            </span>
                                        @endif
                                    </div>
                                    <p class="text-slate-600 text-xs mt-1 line-clamp-2 leading-relaxed">
                                        {{ $article->description }}
                                    </p>
                                </td>

                                <!-- Badge / Tag -->
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-extrabold tracking-wider uppercase bg-blue-50 text-[#0047ba] border border-blue-200">
                                        {{ $article->badge ?? 'GLOBALTRONICS' }}
                                    </span>
                                </td>

                                <!-- Date -->
                                <td class="py-4 px-4 whitespace-nowrap text-slate-600">
                                    <div class="flex items-center gap-1.5">
                                        <i class="fa-regular fa-calendar text-slate-400"></i>
                                        <span>{{ $article->formatted_date }}</span>
                                    </div>
                                </td>

                                <!-- Status (Click to Toggle) -->
                                <td class="py-4 px-4 whitespace-nowrap text-center">
                                    <form action="{{ route('admin.news.toggle', $article) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold transition-all {{ $article->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100' : 'bg-slate-100 text-slate-600 border border-slate-200 hover:bg-slate-200' }}"
                                                title="Click to toggle visibility on homepage">
                                            <span class="w-1.5 h-1.5 rounded-full {{ $article->is_active ? 'bg-emerald-500 animate-pulse' : 'bg-slate-400' }}"></span>
                                            <span>{{ $article->is_active ? 'Active' : 'Draft' }}</span>
                                        </button>
                                    </form>
                                </td>

                                <!-- Action Buttons -->
                                <td class="py-4 px-4 sm:px-6 whitespace-nowrap text-right">
                                    <div class="flex items-center justify-end space-x-1.5">
                                        
                                        <!-- View Live Article -->
                                        <a href="{{ $article->read_url }}" 
                                           target="_blank" 
                                           class="p-2 rounded-lg bg-slate-100 hover:bg-emerald-50 text-slate-600 hover:text-emerald-700 transition-colors border border-slate-200" 
                                           title="View Live Article in new tab">
                                            <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                                        </a>

                                        <!-- Edit -->
                                        <a href="{{ route('admin.news.edit', $article) }}" 
                                           class="p-2 rounded-lg bg-slate-100 hover:bg-blue-50 text-slate-600 hover:text-[#0047ba] transition-colors border border-slate-200" 
                                           title="Edit Article">
                                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                                        </a>

                                        <!-- Delete Form -->
                                        <form id="delete-form-{{ $article->id }}" action="{{ route('admin.news.destroy', $article) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" 
                                                    onclick="promptDeleteNews({{ $article->id }}, {{ json_encode($article->title) }})"
                                                    class="p-2 rounded-lg bg-slate-100 hover:bg-red-50 text-slate-600 hover:text-red-600 transition-colors border border-slate-200" 
                                                    title="Delete Article">
                                                <i class="fa-regular fa-trash-can text-xs"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($newsList->hasPages())
                <div class="p-4 border-t border-slate-200 bg-slate-50/50">
                    {{ $newsList->links() }}
                </div>
            @endif
        @endif

    </div>

</div>

<!-- Custom Delete Confirmation Modal -->
<div id="delete-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-xs">
    <div class="bg-white border border-slate-200 rounded-2xl max-w-md w-full p-6 shadow-xl relative text-center">
        <div class="w-12 h-12 rounded-xl bg-red-50 text-red-600 border border-red-100 flex items-center justify-center mx-auto mb-4">
            <i class="fa-regular fa-trash-can text-xl"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-2">Delete News Article</h3>
        <p class="text-xs text-slate-600 mb-2 leading-relaxed">
            Are you sure you want to permanently delete this article?
        </p>
        <p id="delete-modal-title" class="text-sm font-semibold text-slate-800 bg-slate-50 p-3 rounded-xl border border-slate-200 mb-4 break-words line-clamp-2">
            <!-- Dynamic Title -->
        </p>
        <p class="text-[11px] text-red-600 mb-6 font-medium">
            This action cannot be undone and will immediately remove the article from the live website.
        </p>
        <div class="flex items-center justify-center space-x-3">
            <button type="button" onclick="closeDeleteModal()" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition-colors border border-slate-200">
                Cancel
            </button>
            <button type="button" id="confirm-delete-btn" onclick="executeDeleteNews()" class="px-5 py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-bold transition-all shadow-xs flex items-center gap-2">
                <i class="fa-regular fa-trash-can"></i>
                <span>Yes, Delete Article</span>
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let currentDeleteFormId = null;

    function promptDeleteNews(id, title) {
        currentDeleteFormId = 'delete-form-' + id;
        document.getElementById('delete-modal-title').textContent = title;
        const modal = document.getElementById('delete-modal');
        modal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('delete-modal');
        modal.classList.add('hidden');
        currentDeleteFormId = null;
    }

    function executeDeleteNews() {
        if (currentDeleteFormId) {
            const form = document.getElementById(currentDeleteFormId);
            if (form) {
                const btn = document.getElementById('confirm-delete-btn');
                btn.disabled = true;
                btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> <span>Deleting...</span>';
                form.submit();
            }
        }
    }

    // Close on backdrop click or Escape key
    window.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDeleteModal();
        }
    });
</script>
@endpush
@endsection
