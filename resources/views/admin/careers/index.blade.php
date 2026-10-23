@extends('admin.layouts.admin')

@section('title', 'Careers CMS | Manage Job Openings')
@section('header-title', 'Careers & Job Openings')
@section('header-subtitle', 'Post, update, and manage job opportunities across all Globaltronics departments.')

@section('content')
<div class="space-y-6">

    <!-- KPI Metric Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-center justify-between shadow-lg">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Positions</p>
                <p class="text-2xl sm:text-3xl font-black text-white mt-1">{{ $totalCount }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-400 border border-blue-500/20 flex items-center justify-center text-xl">
                <i class="fa-solid fa-briefcase"></i>
            </div>
        </div>

        <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-center justify-between shadow-lg">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-emerald-400">Active & Hiring</p>
                <p class="text-2xl sm:text-3xl font-black text-white mt-1">{{ $activeCount }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 flex items-center justify-center text-xl">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>

        <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-center justify-between shadow-lg">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-amber-400">Drafts / Inactive</p>
                <p class="text-2xl sm:text-3xl font-black text-white mt-1">{{ $draftCount }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-400 border border-amber-500/20 flex items-center justify-center text-xl">
                <i class="fa-solid fa-file-lines"></i>
            </div>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 shadow-lg">
        <form action="{{ route('admin.careers.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 justify-between items-center">
            
            <div class="w-full md:w-auto flex-1 flex flex-col sm:flex-row gap-3">
                <!-- Search Input -->
                <div class="relative flex-1">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-xs"></i>
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Search job title, department, location..." 
                           class="w-full pl-9 pr-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-slate-200 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                </div>

                <!-- Department Filter -->
                <select name="department" class="px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-slate-300 focus:outline-none focus:ring-2 focus:ring-[#0047ba]">
                    <option value="">All Departments</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept }}" {{ request('department') === $dept ? 'selected' : '' }}>
                            {{ $dept }}
                        </option>
                    @endforeach
                </select>

                <!-- Status Filter -->
                <select name="status" class="px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-slate-300 focus:outline-none focus:ring-2 focus:ring-[#0047ba]">
                    <option value="">All Statuses</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active Only</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Drafts Only</option>
                </select>
            </div>

            <div class="flex items-center space-x-2 w-full md:w-auto justify-end">
                <button type="submit" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-bold transition-colors">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'department', 'status']))
                    <a href="{{ route('admin.careers.index') }}" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-400 text-xs transition-colors">
                        Reset
                    </a>
                @endif
                <a href="{{ route('admin.careers.create') }}" class="px-4 py-2.5 rounded-xl bg-[#0047ba] hover:bg-blue-600 text-white text-xs font-bold flex items-center gap-1.5 shadow-md shadow-blue-600/30 transition-all active:scale-95">
                    <i class="fa-solid fa-plus text-xs"></i>
                    <span>Post New Opening</span>
                </a>
            </div>

        </form>
    </div>

    <!-- Career Opportunities Table -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
        
        @if($careers->isEmpty())
            <div class="py-16 text-center text-slate-400">
                <div class="w-16 h-16 rounded-2xl bg-slate-800 flex items-center justify-center mx-auto mb-4 text-slate-500 text-2xl">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <h3 class="text-base font-bold text-white mb-1">No Career Positions Found</h3>
                <p class="text-xs max-w-sm mx-auto mb-6">
                    {{ request()->hasAny(['search', 'department', 'status']) ? 'No job openings match your filter criteria.' : 'No job opportunities have been published yet.' }}
                </p>
                <a href="{{ route('admin.careers.create') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-[#0047ba] hover:bg-blue-600 text-xs font-bold text-white shadow-lg transition-all">
                    <i class="fa-solid fa-plus"></i>
                    <span>Post First Job Opening</span>
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="bg-slate-950/70 uppercase text-[10px] tracking-wider text-slate-400 border-b border-slate-800 font-extrabold">
                        <tr>
                            <th class="py-3.5 px-6">Job Position & Overview</th>
                            <th class="py-3.5 px-4">Department</th>
                            <th class="py-3.5 px-4">Type & Location</th>
                            <th class="py-3.5 px-4 text-center">Status</th>
                            <th class="py-3.5 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60 font-medium">
                        @foreach($careers as $career)
                            <tr class="hover:bg-slate-800/40 transition-colors group">
                                
                                <!-- Title & Description -->
                                <td class="py-4 px-6 max-w-xs sm:max-w-md">
                                    <a href="{{ route('admin.careers.edit', $career) }}" class="font-bold text-white hover:text-blue-400 transition-colors text-sm line-clamp-1">
                                        {{ $career->title }}
                                    </a>
                                    <p class="text-slate-400 text-xs mt-1 line-clamp-2 leading-relaxed">
                                        {{ $career->description }}
                                    </p>
                                </td>

                                <!-- Department -->
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-extrabold tracking-wider uppercase bg-[#0047ba]/20 text-blue-300 border border-blue-500/30">
                                        {{ $career->department }}
                                    </span>
                                </td>

                                <!-- Type & Location -->
                                <td class="py-4 px-4 whitespace-nowrap text-slate-300">
                                    <div class="text-xs font-semibold text-white">
                                        {{ $career->employment_type }}
                                    </div>
                                    <div class="text-[11px] text-slate-400 flex items-center gap-1 mt-0.5">
                                        <i class="fa-solid fa-location-dot text-[#0047ba]"></i>
                                        <span class="truncate max-w-[180px]">{{ $career->location }}</span>
                                    </div>
                                </td>

                                <!-- Status Toggle -->
                                <td class="py-4 px-4 whitespace-nowrap text-center">
                                    <form action="{{ route('admin.careers.toggle', $career) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold transition-all {{ $career->is_active ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 hover:bg-emerald-500/20' : 'bg-slate-800 text-slate-400 border border-slate-700 hover:bg-slate-700' }}"
                                                title="Click to toggle visibility on website">
                                            <span class="w-1.5 h-1.5 rounded-full {{ $career->is_active ? 'bg-emerald-400 animate-pulse' : 'bg-slate-500' }}"></span>
                                            <span>{{ $career->is_active ? 'Active' : 'Draft' }}</span>
                                        </button>
                                    </form>
                                </td>

                                <!-- Actions -->
                                <td class="py-4 px-6 whitespace-nowrap text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        
                                        <!-- View Live -->
                                        <a href="{{ $career->read_url }}" 
                                           target="_blank" 
                                           class="p-2 rounded-lg bg-slate-800 hover:bg-emerald-600 text-slate-300 hover:text-white transition-colors border border-slate-700" 
                                           title="View Job Details in new tab">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>

                                        <!-- Edit -->
                                        <a href="{{ route('admin.careers.edit', $career) }}" 
                                           class="p-2 rounded-lg bg-slate-800 hover:bg-[#0047ba] text-slate-300 hover:text-white transition-colors border border-slate-700" 
                                           title="Edit Opening">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <!-- Delete Form -->
                                        <form id="delete-form-{{ $career->id }}" action="{{ route('admin.careers.destroy', $career) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" 
                                                    onclick="promptDeleteCareer({{ $career->id }}, {{ json_encode($career->title) }})"
                                                    class="p-2 rounded-lg bg-slate-800 hover:bg-red-600 text-slate-300 hover:text-white transition-colors border border-slate-700" 
                                                    title="Delete Opening">
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
            @if($careers->hasPages())
                <div class="p-4 border-t border-slate-800 bg-slate-950/40">
                    {{ $careers->links() }}
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
        <h3 class="text-lg font-bold text-white mb-2">Delete Career Opening</h3>
        <p class="text-xs text-slate-400 mb-2 leading-relaxed">
            Are you sure you want to permanently delete this job position?
        </p>
        <p id="delete-modal-title" class="text-sm font-semibold text-white bg-slate-950/60 p-3 rounded-xl border border-slate-800 mb-4 break-words line-clamp-2">
            <!-- Dynamic Title -->
        </p>
        <p class="text-[11px] text-red-400 mb-6 font-medium">
            This will immediately remove this position from the public Careers page.
        </p>
        <div class="flex items-center justify-center space-x-3">
            <button type="button" onclick="closeDeleteModal()" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold transition-colors">
                Cancel
            </button>
            <button type="button" id="confirm-delete-btn" onclick="executeDeleteCareer()" class="px-5 py-2.5 rounded-xl bg-red-600 hover:bg-red-500 text-white text-xs font-bold transition-all shadow-lg shadow-red-600/30 flex items-center gap-2">
                <i class="fa-solid fa-trash"></i>
                <span>Yes, Delete Position</span>
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let currentDeleteFormId = null;

    function promptDeleteCareer(id, title) {
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

    function executeDeleteCareer() {
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
