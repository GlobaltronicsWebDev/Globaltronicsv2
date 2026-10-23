@extends('admin.layouts.admin')

@section('title', 'Solutions CMS | LED Display Systems')
@section('header-title', 'Solutions & LED Display Systems')
@section('header-subtitle', 'Upload, manage, and feature LED billboards, indoor displays, and digital monuments.')

@section('content')
<div class="space-y-6">

    <!-- KPI Metric Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-center justify-between shadow-lg">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Systems</p>
                <p class="text-2xl sm:text-3xl font-black text-white mt-1">{{ $totalCount }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-400 border border-blue-500/20 flex items-center justify-center text-xl">
                <i class="fa-solid fa-tv"></i>
            </div>
        </div>

        <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-center justify-between shadow-lg">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-emerald-400">Live on Website</p>
                <p class="text-2xl sm:text-3xl font-black text-white mt-1">{{ $activeCount }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 flex items-center justify-center text-xl">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>

        <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-center justify-between shadow-lg">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-amber-400">Drafts / Hidden</p>
                <p class="text-2xl sm:text-3xl font-black text-white mt-1">{{ $draftCount }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-400 border border-amber-500/20 flex items-center justify-center text-xl">
                <i class="fa-solid fa-eye-slash"></i>
            </div>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 shadow-lg">
        <form action="{{ route('admin.solutions.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 justify-between items-center">
            
            <div class="w-full md:w-auto flex-1 flex flex-col sm:flex-row gap-3">
                <!-- Search Input -->
                <div class="relative flex-1">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-xs"></i>
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Search system title, location, description..." 
                           class="w-full pl-9 pr-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-slate-200 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                </div>

                <!-- Category Filter -->
                <select name="category" class="px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-slate-300 focus:outline-none focus:ring-2 focus:ring-[#0047ba]">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>

                <!-- Status Filter -->
                <select name="status" class="px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-slate-300 focus:outline-none focus:ring-2 focus:ring-[#0047ba]">
                    <option value="">All Statuses</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Live Only</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Drafts Only</option>
                </select>
            </div>

            <div class="flex items-center space-x-2 w-full md:w-auto justify-end">
                <button type="submit" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-bold transition-colors">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'category', 'status']))
                    <a href="{{ route('admin.solutions.index') }}" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-400 text-xs transition-colors">
                        Reset
                    </a>
                @endif
                <a href="{{ route('admin.solutions.create') }}" class="px-4 py-2.5 rounded-xl bg-[#0047ba] hover:bg-blue-600 text-white text-xs font-bold flex items-center gap-1.5 shadow-md shadow-blue-600/30 transition-all active:scale-95">
                    <i class="fa-solid fa-cloud-arrow-up text-xs"></i>
                    <span>Upload New Solution</span>
                </a>
            </div>

        </form>
    </div>

    <!-- Solutions Table -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
        
        @if($solutions->isEmpty())
            <div class="py-16 text-center text-slate-400">
                <div class="w-16 h-16 rounded-2xl bg-slate-800 flex items-center justify-center mx-auto mb-4 text-slate-500 text-2xl">
                    <i class="fa-solid fa-tv"></i>
                </div>
                <h3 class="text-base font-bold text-white mb-1">No LED Display Systems Found</h3>
                <p class="text-xs max-w-sm mx-auto mb-6">
                    {{ request()->hasAny(['search', 'category', 'status']) ? 'No systems match your filter criteria.' : 'No LED display systems have been uploaded yet.' }}
                </p>
                <a href="{{ route('admin.solutions.create') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-[#0047ba] hover:bg-blue-600 text-xs font-bold text-white shadow-lg transition-all">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <span>Upload First Solution</span>
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="bg-slate-950/70 uppercase text-[10px] tracking-wider text-slate-400 border-b border-slate-800 font-extrabold">
                        <tr>
                            <th class="py-3.5 px-4 w-20 text-center">Image</th>
                            <th class="py-3.5 px-6">System Title & Overview</th>
                            <th class="py-3.5 px-4">Category & Location</th>
                            <th class="py-3.5 px-4 text-center">Status</th>
                            <th class="py-3.5 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60 font-medium">
                        @foreach($solutions as $system)
                            <tr class="hover:bg-slate-800/40 transition-colors group">
                                
                                <!-- Image Thumbnail -->
                                <td class="py-4 px-4 text-center">
                                    <div class="w-16 h-12 rounded-lg overflow-hidden bg-slate-800 border border-slate-700 mx-auto">
                                        <img src="{{ $system->image_url }}" alt="{{ $system->title }}" class="w-full h-full object-cover">
                                    </div>
                                </td>

                                <!-- Title & Description -->
                                <td class="py-4 px-6 max-w-xs sm:max-w-md">
                                    <a href="{{ route('admin.solutions.edit', $system) }}" class="font-bold text-white hover:text-blue-400 transition-colors text-sm line-clamp-1">
                                        {{ $system->title }}
                                    </a>
                                    <p class="text-slate-400 text-xs mt-1 line-clamp-2 leading-relaxed">
                                        {{ $system->short_description }}
                                    </p>
                                </td>

                                <!-- Category & Location -->
                                <td class="py-4 px-4 whitespace-nowrap text-slate-300">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-extrabold uppercase bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                        {{ $system->category }}
                                    </span>
                                    @if($system->location)
                                        <div class="text-[11px] text-slate-400 flex items-center gap-1 mt-1 truncate max-w-[200px]">
                                            <i class="fa-solid fa-location-dot text-[#0047ba]"></i>
                                            <span class="truncate">{{ $system->location }}</span>
                                        </div>
                                    @endif
                                </td>

                                <!-- Status Toggle -->
                                <td class="py-4 px-4 whitespace-nowrap text-center">
                                    <form action="{{ route('admin.solutions.toggle', $system) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold transition-all {{ $system->is_active ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 hover:bg-emerald-500/20' : 'bg-slate-800 text-slate-400 border border-slate-700 hover:bg-slate-700' }}"
                                                title="Click to toggle visibility on website">
                                            <span class="w-1.5 h-1.5 rounded-full {{ $system->is_active ? 'bg-emerald-400 animate-pulse' : 'bg-slate-500' }}"></span>
                                            <span>{{ $system->is_active ? 'Live' : 'Draft' }}</span>
                                        </button>
                                    </form>
                                </td>

                                <!-- Actions -->
                                <td class="py-4 px-6 whitespace-nowrap text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        
                                        <!-- View Live Details -->
                                        <a href="{{ $system->read_url }}" 
                                           target="_blank" 
                                           class="p-2 rounded-lg bg-slate-800 hover:bg-emerald-600 text-slate-300 hover:text-white transition-colors border border-slate-700" 
                                           title="View Full Description Page in new tab">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>

                                        <!-- Edit -->
                                        <a href="{{ route('admin.solutions.edit', $system) }}" 
                                           class="p-2 rounded-lg bg-slate-800 hover:bg-[#0047ba] text-slate-300 hover:text-white transition-colors border border-slate-700" 
                                           title="Edit Solution">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <!-- Delete Form -->
                                        <form id="delete-form-{{ $system->id }}" action="{{ route('admin.solutions.destroy', $system) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" 
                                                    onclick="promptDeleteSolution({{ $system->id }}, {{ json_encode($system->title) }})"
                                                    class="p-2 rounded-lg bg-slate-800 hover:bg-red-600 text-slate-300 hover:text-white transition-colors border border-slate-700" 
                                                    title="Delete Solution">
                                                <i class="fa-solid fa-trash"></i>
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
            @if($solutions->hasPages())
                <div class="p-4 border-t border-slate-800 bg-slate-950/40">
                    {{ $solutions->links() }}
                </div>
            @endif
        @endif

    </div>

</div>

<!-- Custom Delete Confirmation Modal -->
<div id="delete-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl max-w-md w-full p-6 shadow-2xl relative text-center">
        <div class="w-14 h-14 rounded-2xl bg-red-500/10 text-red-500 border border-red-500/20 flex items-center justify-center mx-auto mb-4">
            <i class="fa-solid fa-trash-can text-2xl"></i>
        </div>
        <h3 class="text-lg font-bold text-white mb-2">Delete LED Display System</h3>
        <p class="text-xs text-slate-400 mb-2 leading-relaxed">
            Are you sure you want to permanently delete this system?
        </p>
        <p id="delete-modal-title" class="text-sm font-semibold text-white bg-slate-950/60 p-3 rounded-xl border border-slate-800 mb-4 break-words line-clamp-2">
            <!-- Dynamic Title -->
        </p>
        <p class="text-[11px] text-red-400 mb-6 font-medium">
            This will immediately remove this system from the public Solutions showcase.
        </p>
        <div class="flex items-center justify-center space-x-3">
            <button type="button" onclick="closeDeleteModal()" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold transition-colors">
                Cancel
            </button>
            <button type="button" id="confirm-delete-btn" onclick="executeDeleteSolution()" class="px-5 py-2.5 rounded-xl bg-red-600 hover:bg-red-500 text-white text-xs font-bold transition-all shadow-lg shadow-red-600/30 flex items-center gap-2">
                <i class="fa-solid fa-trash"></i>
                <span>Yes, Delete System</span>
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let currentDeleteFormId = null;

    function promptDeleteSolution(id, title) {
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

    function executeDeleteSolution() {
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

    window.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDeleteModal();
        }
    });
</script>
@endpush
@endsection
