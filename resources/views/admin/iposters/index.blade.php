@extends('admin.layouts.admin')

@section('title', 'Digital iPoster Ad Placement CMS')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-800">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">
                <span>Services Management</span>
                <span>/</span>
                <span class="text-blue-400">Digital iPoster Ad Placement</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white uppercase tracking-wide flex items-center gap-3">
                <i class="fa-solid fa-tablet-screen-button text-blue-500"></i>
                <span>Digital iPoster Sites</span>
            </h1>
            <p class="text-xs sm:text-sm text-slate-400 mt-1">
                Upload and manage digital iPoster kiosks deployed across premier shopping malls nationwide.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('services.iposters.index') }}" target="_blank" 
               class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 hover:text-white font-bold text-xs flex items-center gap-2 border border-slate-700 transition-all shadow-sm">
                <i class="fa-solid fa-arrow-up-right-from-square text-xs text-yellow-400"></i>
                <span>View Public Page</span>
            </a>

            <a href="{{ route('admin.iposters.create') }}" 
               class="px-4 py-2.5 rounded-xl bg-[#0047ba] hover:bg-blue-600 text-white font-bold text-xs flex items-center gap-2 shadow-lg shadow-blue-600/30 transition-all transform active:scale-95">
                <i class="fa-solid fa-plus text-xs"></i>
                <span>Upload New iPoster</span>
            </a>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-semibold flex items-center justify-between">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-circle-check text-base"></i>
                <span>{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-slate-400 hover:text-white">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    <!-- Metrics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 flex items-center justify-between shadow-sm">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Deployments</p>
                <h3 class="text-2xl sm:text-3xl font-black text-white mt-1">{{ $totalCount }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-500/10 border border-blue-500/20 text-blue-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-tablet-screen-button"></i>
            </div>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 flex items-center justify-between shadow-sm">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Live on Website</p>
                <h3 class="text-2xl sm:text-3xl font-black text-emerald-400 mt-1">{{ $activeCount }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-globe"></i>
            </div>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 flex items-center justify-between shadow-sm">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Drafts / Hidden</p>
                <h3 class="text-2xl sm:text-3xl font-black text-amber-400 mt-1">{{ $draftCount }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-500/10 border border-amber-500/20 text-amber-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-eye-slash"></i>
            </div>
        </div>
    </div>

    <!-- Search & Filter Controls -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 shadow-sm">
        <form method="GET" action="{{ route('admin.iposters.index') }}" class="flex flex-col md:flex-row gap-4 justify-between items-center">
            <div class="w-full md:w-96 relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search by mall, location, or keyword..."
                       class="w-full pl-9 pr-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-colors">
            </div>

            <div class="flex items-center gap-3 w-full md:w-auto">
                <select name="status" onchange="this.form.submit()" 
                        class="px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs focus:outline-none focus:border-blue-500 transition-colors">
                    <option value="">All Statuses</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Live Only</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Drafts Only</option>
                </select>

                @if(request()->anyFilled(['search', 'status']))
                    <a href="{{ route('admin.iposters.index') }}" class="p-2.5 text-xs text-slate-400 hover:text-white transition-colors" title="Reset Filters">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Data Table -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300">
                <thead class="bg-slate-950 text-[11px] font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800">
                    <tr>
                        <th class="px-5 py-4">Deployment Site</th>
                        <th class="px-5 py-4">Mall Location</th>
                        <th class="px-5 py-4">Traffic / Specs</th>
                        <th class="px-5 py-4 text-center">Status</th>
                        <th class="px-5 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 font-medium">
                    @forelse($iposters as $item)
                        <tr class="hover:bg-slate-800/40 transition-colors">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3.5">
                                    <div class="w-14 h-11 rounded-lg overflow-hidden bg-slate-950 border border-slate-800 shrink-0">
                                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.iposters.edit', $item) }}" class="text-sm font-black text-white hover:text-blue-400 transition-colors uppercase line-clamp-1">
                                            {{ $item->title }}
                                        </a>
                                        <p class="text-[11px] text-slate-400 line-clamp-1 mt-0.5 font-normal">
                                            {{ $item->short_description ?: 'No card description added' }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <span class="text-slate-300 font-semibold flex items-center gap-1.5">
                                    <i class="fa-solid fa-location-dot text-blue-400 text-[11px]"></i>
                                    <span>{{ $item->mall_or_location ?: 'Premier Mall' }}</span>
                                </span>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="text-[11px] text-slate-300">
                                    <span class="font-bold text-yellow-300">{{ $item->daily_traffic ?: 'High Foot Traffic' }}</span>
                                </div>
                                <div class="text-[10px] text-slate-500 font-normal truncate max-w-xs mt-0.5">
                                    {{ $item->specifications ?: '572mm x 1902mm' }}
                                </div>
                            </td>
                            <td class="px-5 py-4 text-center whitespace-nowrap">
                                <form action="{{ route('admin.iposters.toggle', $item) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" 
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-extrabold tracking-wide transition-all {{ $item->is_active ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 hover:bg-emerald-500/20' : 'bg-slate-800 text-slate-400 border border-slate-700 hover:bg-slate-700' }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $item->is_active ? 'bg-emerald-400' : 'bg-slate-500' }}"></span>
                                        <span>{{ $item->is_active ? 'Live' : 'Draft' }}</span>
                                    </button>
                                </form>
                            </td>
                            <td class="px-5 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ $item->read_url }}" target="_blank" class="p-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white transition-colors" title="View Public Page">
                                        <i class="fa-solid fa-arrow-up-right-from-square text-xs text-yellow-400"></i>
                                    </a>
                                    <a href="{{ route('admin.iposters.edit', $item) }}" class="p-2 rounded-lg bg-slate-800 hover:bg-blue-600 text-slate-300 hover:text-white transition-colors" title="Edit iPoster">
                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                    </a>
                                    <button type="button" 
                                            onclick="openDeleteModal({{ $item->id }}, {{ json_encode($item->title) }})" 
                                            class="p-2 rounded-lg bg-slate-800 hover:bg-rose-600 text-slate-300 hover:text-white transition-colors" title="Delete">
                                        <i class="fa-solid fa-trash-can text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-12 text-center text-slate-400">
                                <i class="fa-solid fa-tablet-screen-button text-3xl mb-3 text-slate-600"></i>
                                <p class="text-sm font-bold text-white">No Digital iPosters found</p>
                                <p class="text-xs text-slate-500 mt-1">Click "Upload New iPoster" to add the first deployment site.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($iposters->hasPages())
            <div class="p-4 border-t border-slate-800 flex justify-center">
                {{ $iposters->links() }}
            </div>
        @endif
    </div>

</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-200">
    <div class="bg-slate-900 border border-slate-800 rounded-3xl max-w-md w-full p-6 shadow-2xl transform scale-95 transition-transform duration-200" id="deleteModalBox">
        <div class="w-14 h-14 rounded-2xl bg-rose-500/10 border border-rose-500/20 text-rose-500 flex items-center justify-center mx-auto mb-4 text-2xl">
            <i class="fa-solid fa-trash-can"></i>
        </div>
        
        <h3 class="text-lg font-black text-white text-center uppercase tracking-wide">
            Delete Digital iPoster?
        </h3>
        
        <p class="text-xs text-slate-400 text-center mt-2 leading-relaxed">
            Are you sure you want to permanently delete <strong id="deleteItemTitle" class="text-white"></strong>? This will remove its showcase and detail pages.
        </p>

        <form id="deleteForm" method="POST" action="" class="mt-6 flex items-center gap-3">
            @csrf
            @method('DELETE')
            <button type="button" onclick="closeDeleteModal()" 
                    class="flex-1 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold text-xs uppercase tracking-wider transition-colors">
                Cancel
            </button>
            <button type="submit" 
                    class="flex-1 py-3 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-black text-xs uppercase tracking-wider transition-all shadow-lg shadow-rose-600/30">
                Confirm Delete
            </button>
        </form>
    </div>
</div>

<script>
    function openDeleteModal(id, title) {
        const modal = document.getElementById('deleteModal');
        const box = document.getElementById('deleteModalBox');
        const form = document.getElementById('deleteForm');
        const titleSpan = document.getElementById('deleteItemTitle');

        titleSpan.textContent = title;
        form.action = `/admin/iposters/${id}`;

        modal.classList.remove('opacity-0', 'pointer-events-none');
        box.classList.remove('scale-95');
        box.classList.add('scale-100');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        const box = document.getElementById('deleteModalBox');

        modal.classList.add('opacity-0', 'pointer-events-none');
        box.classList.add('scale-95');
        box.classList.remove('scale-100');
    }
</script>
@endsection
