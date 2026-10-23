@extends('admin.layouts.admin')

@section('title', 'Client Inquiries & Quotes')
@section('header-title', 'Client Inquiries & Quote Requests')
@section('header-subtitle', 'Review incoming project specifications, LED dimension requirements, and client sales requests.')

@section('content')
<div class="space-y-6">

    <!-- KPI Metric Cards Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 sm:gap-5">
        
        <!-- Total Inquiries -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 sm:p-5 shadow-lg flex items-center justify-between">
            <div>
                <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Total Received</p>
                <h3 class="text-2xl sm:text-3xl font-black text-white mt-1">{{ $totalCount }}</h3>
            </div>
            <div class="w-11 h-11 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center text-lg">
                <i class="fa-solid fa-inbox"></i>
            </div>
        </div>

        <!-- New / Unattended -->
        <div class="bg-slate-900 border border-amber-500/30 rounded-2xl p-4 sm:p-5 shadow-lg flex items-center justify-between relative overflow-hidden">
            <div class="absolute top-0 right-0 w-20 h-20 bg-amber-500/5 rounded-full blur-xl pointer-events-none"></div>
            <div>
                <p class="text-[11px] font-semibold text-amber-400 uppercase tracking-wider">New Inquiries</p>
                <h3 class="text-2xl sm:text-3xl font-black text-amber-300 mt-1">{{ $newCount }}</h3>
            </div>
            <div class="w-11 h-11 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-lg">
                <i class="fa-solid fa-bell"></i>
            </div>
        </div>

        <!-- Contacted -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 sm:p-5 shadow-lg flex items-center justify-between">
            <div>
                <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Contacted</p>
                <h3 class="text-2xl sm:text-3xl font-black text-indigo-400 mt-1">{{ $contactedCount }}</h3>
            </div>
            <div class="w-11 h-11 rounded-xl bg-indigo-500/10 text-indigo-400 flex items-center justify-center text-lg">
                <i class="fa-solid fa-phone-volume"></i>
            </div>
        </div>

        <!-- Quoted -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 sm:p-5 shadow-lg flex items-center justify-between">
            <div>
                <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Quoted</p>
                <h3 class="text-2xl sm:text-3xl font-black text-emerald-400 mt-1">{{ $quotedCount }}</h3>
            </div>
            <div class="w-11 h-11 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center text-lg">
                <i class="fa-solid fa-file-invoice-dollar"></i>
            </div>
        </div>

        <!-- Closed -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 sm:p-5 shadow-lg flex items-center justify-between">
            <div>
                <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Closed</p>
                <h3 class="text-2xl sm:text-3xl font-black text-slate-400 mt-1">{{ $closedCount }}</h3>
            </div>
            <div class="w-11 h-11 rounded-xl bg-slate-800 text-slate-400 flex items-center justify-center text-lg">
                <i class="fa-solid fa-check-double"></i>
            </div>
        </div>

    </div>

    <!-- Filters and Search Bar -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 sm:p-5 shadow-md">
        <form method="GET" action="{{ route('admin.inquiries.index') }}" class="flex flex-col md:flex-row gap-4 items-center justify-between">
            
            <!-- Search Field -->
            <div class="w-full md:w-96 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </div>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Search client, email, phone, company, or solution..." 
                       class="w-full pl-9 pr-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:border-transparent transition-all">
            </div>

            <!-- Status Tabs & Filter -->
            <div class="flex items-center gap-2 w-full md:w-auto overflow-x-auto pb-2 md:pb-0">
                <a href="{{ route('admin.inquiries.index', ['status' => 'all', 'search' => request('search')]) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition-colors whitespace-nowrap {{ !request('status') || request('status') === 'all' ? 'bg-[#0047ba] text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                    All ({{ $totalCount }})
                </a>
                <a href="{{ route('admin.inquiries.index', ['status' => 'new', 'search' => request('search')]) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition-colors whitespace-nowrap {{ request('status') === 'new' ? 'bg-amber-500 text-slate-950' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                    New ({{ $newCount }})
                </a>
                <a href="{{ route('admin.inquiries.index', ['status' => 'contacted', 'search' => request('search')]) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition-colors whitespace-nowrap {{ request('status') === 'contacted' ? 'bg-indigo-600 text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                    Contacted ({{ $contactedCount }})
                </a>
                <a href="{{ route('admin.inquiries.index', ['status' => 'quoted', 'search' => request('search')]) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition-colors whitespace-nowrap {{ request('status') === 'quoted' ? 'bg-emerald-600 text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                    Quoted ({{ $quotedCount }})
                </a>
                <a href="{{ route('admin.inquiries.index', ['status' => 'closed', 'search' => request('search')]) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition-colors whitespace-nowrap {{ request('status') === 'closed' ? 'bg-slate-700 text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                    Closed ({{ $closedCount }})
                </a>
            </div>

        </form>
    </div>

    <!-- Inquiries Table Card -->
    <div class="bg-slate-900 border border-slate-800 rounded-3xl shadow-xl overflow-hidden">
        @if($inquiries->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="bg-slate-950/80 text-slate-400 uppercase font-bold text-[10px] tracking-wider border-b border-slate-800">
                        <tr>
                            <th class="py-4 px-5">Client & Company</th>
                            <th class="py-4 px-5">Solution / Requirement</th>
                            <th class="py-4 px-5">Contact Info</th>
                            <th class="py-4 px-4">Date Submitted</th>
                            <th class="py-4 px-4">Status</th>
                            <th class="py-4 px-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @foreach($inquiries as $item)
                            <tr class="hover:bg-slate-800/40 transition-colors group">
                                
                                <!-- Client & Company -->
                                <td class="py-4 px-5">
                                    <div class="font-bold text-white text-sm">
                                        {{ $item->name }}
                                    </div>
                                    @if($item->company)
                                        <div class="text-blue-400 text-xs font-medium mt-0.5 flex items-center gap-1.5">
                                            <i class="fa-solid fa-building text-[10px] text-slate-500"></i>
                                            <span>{{ $item->company }}</span>
                                        </div>
                                    @endif
                                </td>

                                <!-- Solution & Specs -->
                                <td class="py-4 px-5">
                                    <div class="font-bold text-slate-100 flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                        <span>{{ $item->service_type }}</span>
                                    </div>
                                    <div class="text-slate-400 text-[11px] mt-1 space-y-0.5">
                                        @if($item->estimated_size)
                                            <span class="inline-block bg-slate-800 px-2 py-0.5 rounded text-[10px] text-slate-300 font-mono">
                                                Size: {{ $item->estimated_size }}
                                            </span>
                                        @endif
                                        @if($item->project_location)
                                            <span class="text-slate-400 text-[11px] ml-1">
                                                <i class="fa-solid fa-location-dot text-[9px] text-slate-500 mr-0.5"></i>
                                                {{ $item->project_location }}
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <!-- Contact Info -->
                                <td class="py-4 px-5">
                                    <div class="font-semibold text-slate-200">
                                        <i class="fa-solid fa-phone text-[10px] text-slate-500 mr-1.5"></i>
                                        <a href="tel:{{ $item->phone }}" class="hover:text-blue-400 transition-colors">
                                            {{ $item->phone }}
                                        </a>
                                    </div>
                                    <div class="text-slate-400 text-xs mt-0.5">
                                        <i class="fa-solid fa-envelope text-[10px] text-slate-500 mr-1.5"></i>
                                        <a href="mailto:{{ $item->email }}" class="hover:text-blue-400 transition-colors">
                                            {{ $item->email }}
                                        </a>
                                    </div>
                                </td>

                                <!-- Date Submitted -->
                                <td class="py-4 px-4 text-slate-400 whitespace-nowrap">
                                    <div class="font-medium text-slate-300">{{ $item->created_at->format('M d, Y') }}</div>
                                    <div class="text-[10px] text-slate-500">{{ $item->created_at->format('h:i A') }}</div>
                                </td>

                                <!-- Status Selector -->
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <form action="{{ route('admin.inquiries.status', $item) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" 
                                                onchange="this.form.submit()" 
                                                class="px-2.5 py-1 rounded-lg text-xs font-bold bg-slate-950 border focus:outline-none transition-colors cursor-pointer
                                                {{ $item->status === 'new' ? 'text-amber-400 border-amber-500/30' : '' }}
                                                {{ $item->status === 'contacted' ? 'text-indigo-400 border-indigo-500/30' : '' }}
                                                {{ $item->status === 'quoted' ? 'text-emerald-400 border-emerald-500/30' : '' }}
                                                {{ $item->status === 'closed' ? 'text-slate-400 border-slate-700' : '' }}">
                                            <option value="new" {{ $item->status === 'new' ? 'selected' : '' }}>New</option>
                                            <option value="contacted" {{ $item->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                            <option value="quoted" {{ $item->status === 'quoted' ? 'selected' : '' }}>Quoted</option>
                                            <option value="closed" {{ $item->status === 'closed' ? 'selected' : '' }}>Closed</option>
                                        </select>
                                    </form>
                                </td>

                                <!-- Actions -->
                                <td class="py-4 px-5 text-right whitespace-nowrap space-x-2">
                                    <!-- View Details Modal Button -->
                                    <button type="button" 
                                            onclick="openInquiryModal({{ $item->id }})" 
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-500/10 hover:bg-blue-500/20 text-blue-400 border border-blue-500/20 text-xs font-bold transition-all shadow-sm">
                                        <i class="fa-solid fa-eye text-[11px]"></i>
                                        <span>View Details</span>
                                    </button>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.inquiries.destroy', $item) }}" 
                                          method="POST" 
                                          class="inline-block" 
                                          onsubmit="return confirm('Are you sure you want to delete the inquiry from {{ addslashes($item->name) }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-1.5 rounded-lg text-slate-500 hover:text-red-400 hover:bg-red-500/10 transition-colors" 
                                                title="Delete Inquiry">
                                            <i class="fa-solid fa-trash-can text-sm"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>

                            <!-- Detail & Notes Modal -->
                            <div id="inquiry-modal-{{ $item->id }}" class="fixed inset-0 z-50 bg-black/70 backdrop-blur-sm hidden items-center justify-center p-4">
                                <div class="bg-slate-900 border border-slate-800 rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto p-6 shadow-2xl space-y-6 text-left" onclick="event.stopPropagation()">
                                    
                                    <!-- Header -->
                                    <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-xl bg-blue-600/20 text-[#0047ba] flex items-center justify-center text-lg">
                                                <i class="fa-solid fa-file-lines text-blue-400"></i>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-bold text-white">Project Inquiry #{{ $item->id }}</h3>
                                                <p class="text-xs text-slate-400">Submitted {{ $item->created_at->format('M d, Y - h:i A') }}</p>
                                            </div>
                                        </div>
                                        <button type="button" 
                                                onclick="closeInquiryModal({{ $item->id }})" 
                                                class="w-8 h-8 rounded-lg bg-slate-800 text-slate-400 hover:text-white flex items-center justify-center transition-colors">
                                            <i class="fa-solid fa-xmark text-sm"></i>
                                        </button>
                                    </div>

                                    <!-- Client Details Grid -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-slate-950 p-4 rounded-2xl border border-slate-800/80">
                                        <div>
                                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Client Name</span>
                                            <p class="text-sm font-semibold text-white mt-0.5">{{ $item->name }}</p>
                                        </div>
                                        <div>
                                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Company / Organization</span>
                                            <p class="text-sm font-semibold text-white mt-0.5">{{ $item->company ?: 'Not specified' }}</p>
                                        </div>
                                        <div>
                                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Email Address</span>
                                            <p class="text-sm font-semibold text-blue-400 mt-0.5">
                                                <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                            </p>
                                        </div>
                                        <div>
                                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Phone / Mobile</span>
                                            <p class="text-sm font-semibold text-white mt-0.5">
                                                <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a>
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Project Specifications Grid -->
                                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                        <div class="bg-slate-950 p-3 rounded-xl border border-slate-800">
                                            <span class="text-[10px] font-bold text-slate-500 uppercase">Solution</span>
                                            <p class="text-xs font-semibold text-white mt-1">{{ $item->service_type }}</p>
                                        </div>
                                        <div class="bg-slate-950 p-3 rounded-xl border border-slate-800">
                                            <span class="text-[10px] font-bold text-slate-500 uppercase">Screen / Size</span>
                                            <p class="text-xs font-semibold text-amber-300 mt-1 font-mono">{{ $item->estimated_size ?: 'N/A' }}</p>
                                        </div>
                                        <div class="bg-slate-950 p-3 rounded-xl border border-slate-800">
                                            <span class="text-[10px] font-bold text-slate-500 uppercase">Target Budget</span>
                                            <p class="text-xs font-semibold text-emerald-400 mt-1">{{ $item->budget_range ?: 'Open' }}</p>
                                        </div>
                                        <div class="bg-slate-950 p-3 rounded-xl border border-slate-800">
                                            <span class="text-[10px] font-bold text-slate-500 uppercase">Timeline</span>
                                            <p class="text-xs font-semibold text-white mt-1">{{ $item->timeline ?: 'Immediate' }}</p>
                                        </div>
                                    </div>

                                    @if($item->project_location)
                                        <div class="bg-slate-950 p-3 rounded-xl border border-slate-800 text-xs">
                                            <span class="text-[10px] font-bold text-slate-500 uppercase">Installation Location:</span>
                                            <span class="text-slate-200 font-semibold ml-2">{{ $item->project_location }}</span>
                                        </div>
                                    @endif

                                    <!-- Message Requirements -->
                                    <div>
                                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Client Project Requirements & Message</span>
                                        <div class="mt-2 p-4 bg-slate-950 border border-slate-800 rounded-2xl text-xs sm:text-sm text-slate-300 leading-relaxed whitespace-pre-wrap">
                                            {{ $item->message }}
                                        </div>
                                    </div>

                                    <!-- Internal Admin Notes Form -->
                                    <form action="{{ route('admin.inquiries.notes', $item) }}" method="POST" class="space-y-3 pt-2 border-t border-slate-800">
                                        @csrf
                                        @method('PATCH')
                                        <div class="flex items-center justify-between">
                                            <label for="admin_notes_{{ $item->id }}" class="text-xs font-bold text-amber-400 uppercase tracking-wider flex items-center gap-1.5">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                <span>Internal Sales Notes & Quote Status</span>
                                            </label>
                                            <span class="text-[10px] text-slate-500">Visible to team only</span>
                                        </div>
                                        <textarea id="admin_notes_{{ $item->id }}" 
                                                  name="admin_notes" 
                                                  rows="3" 
                                                  placeholder="Add notes: e.g., Sent formal proposal on March 4, client prefers P2.5 indoor curved screen..." 
                                                  class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-[#0047ba]">{{ old('admin_notes', $item->admin_notes) }}</textarea>
                                        <div class="flex justify-between items-center">
                                            <span class="text-[10px] text-slate-600">IP: {{ $item->ip_address ?: 'Unknown' }}</span>
                                            <button type="submit" class="px-4 py-2 bg-[#0047ba] hover:bg-blue-600 text-white rounded-xl text-xs font-bold transition-all shadow-md">
                                                Save Notes
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($inquiries->hasPages())
                <div class="p-4 border-t border-slate-800 bg-slate-950/40">
                    {{ $inquiries->links() }}
                </div>
            @endif

        @else
            <div class="p-12 text-center">
                <div class="w-16 h-16 rounded-2xl bg-slate-800 text-slate-500 mx-auto flex items-center justify-center text-2xl mb-4">
                    <i class="fa-solid fa-inbox"></i>
                </div>
                <h3 class="text-base font-bold text-white">No Inquiries Found</h3>
                <p class="text-xs text-slate-400 mt-1 max-w-sm mx-auto">
                    {{ request('search') ? 'No results matched your search query. Try clearing your filters.' : 'When prospective clients request a quote through the website or LED calculator, they will appear here.' }}
                </p>
                @if(request('search') || request('status'))
                    <a href="{{ route('admin.inquiries.index') }}" class="inline-block mt-4 px-4 py-2 bg-slate-800 hover:bg-slate-700 text-xs font-bold text-white rounded-xl transition-colors">
                        Clear All Filters
                    </a>
                @endif
            </div>
        @endif
    </div>

</div>

@push('scripts')
<script>
    function openInquiryModal(id) {
        const modal = document.getElementById(`inquiry-modal-${id}`);
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeInquiryModal(id) {
        const modal = document.getElementById(`inquiry-modal-${id}`);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }
    }

    // Close modal on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            document.querySelectorAll('[id^="inquiry-modal-"]').forEach(modal => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
            document.body.style.overflow = '';
        }
    });

    // Close on backdrop click
    document.querySelectorAll('[id^="inquiry-modal-"]').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
                this.classList.remove('flex');
                document.body.style.overflow = '';
            }
        });
    });
</script>
@endpush
@endsection
