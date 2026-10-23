@extends('admin.layouts.admin')

@section('title', 'Job Applications')
@section('header-title', 'Candidate Applications')
@section('header-subtitle', 'Manage candidate submissions, review statements, and download resumes.')

@section('content')
<div class="space-y-6">

    <!-- KPI Metric Cards Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        
        <!-- Total -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 shadow-lg flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Received</p>
                <h3 class="text-2xl sm:text-3xl font-black text-white mt-1">{{ $totalCount }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-inbox"></i>
            </div>
        </div>

        <!-- New / Unreviewed -->
        <div class="bg-slate-900 border border-amber-500/30 rounded-2xl p-5 shadow-lg flex items-center justify-between relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-amber-500/5 rounded-full blur-xl pointer-events-none"></div>
            <div>
                <p class="text-xs font-semibold text-amber-400 uppercase tracking-wider">Pending Review</p>
                <h3 class="text-2xl sm:text-3xl font-black text-amber-300 mt-1">{{ $newCount }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-clock"></i>
            </div>
        </div>

        <!-- Reviewed -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 shadow-lg flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Under Review</p>
                <h3 class="text-2xl sm:text-3xl font-black text-white mt-1">{{ $reviewedCount }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-user-check"></i>
            </div>
        </div>

        <!-- Contacted -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 shadow-lg flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Contacted</p>
                <h3 class="text-2xl sm:text-3xl font-black text-emerald-400 mt-1">{{ $contactedCount }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-phone-volume"></i>
            </div>
        </div>

    </div>

    <!-- Filters and Search Bar -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 sm:p-5 shadow-md">
        <form method="GET" action="{{ route('admin.applications.index') }}" class="flex flex-col md:flex-row gap-4 items-center justify-between">
            
            <!-- Search Field -->
            <div class="w-full md:w-96 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </div>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Search candidate, email, phone, or job title..." 
                       class="w-full pl-9 pr-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:border-transparent transition-all">
            </div>

            <!-- Status Tabs & Filter -->
            <div class="flex items-center gap-2 w-full md:w-auto overflow-x-auto pb-2 md:pb-0">
                <a href="{{ route('admin.applications.index', ['status' => 'all', 'search' => request('search')]) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition-colors whitespace-nowrap {{ !request('status') || request('status') === 'all' ? 'bg-[#0047ba] text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                    All ({{ $totalCount }})
                </a>
                <a href="{{ route('admin.applications.index', ['status' => 'new', 'search' => request('search')]) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition-colors whitespace-nowrap {{ request('status') === 'new' ? 'bg-amber-500 text-slate-950' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                    Pending ({{ $newCount }})
                </a>
                <a href="{{ route('admin.applications.index', ['status' => 'reviewed', 'search' => request('search')]) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition-colors whitespace-nowrap {{ request('status') === 'reviewed' ? 'bg-indigo-600 text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                    Reviewed ({{ $reviewedCount }})
                </a>
                <a href="{{ route('admin.applications.index', ['status' => 'contacted', 'search' => request('search')]) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-bold transition-colors whitespace-nowrap {{ request('status') === 'contacted' ? 'bg-emerald-600 text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                    Contacted ({{ $contactedCount }})
                </a>
            </div>

        </form>
    </div>

    <!-- Applications Table Card -->
    <div class="bg-slate-900 border border-slate-800 rounded-3xl shadow-xl overflow-hidden">
        @if($applications->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="bg-slate-950/80 text-slate-400 uppercase font-bold text-[10px] tracking-wider border-b border-slate-800">
                        <tr>
                            <th class="py-4 px-5">Candidate</th>
                            <th class="py-4 px-5">Applied Position</th>
                            <th class="py-4 px-5">Contact Details</th>
                            <th class="py-4 px-4">Date Applied</th>
                            <th class="py-4 px-4">Resume</th>
                            <th class="py-4 px-4">Status</th>
                            <th class="py-4 px-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @foreach($applications as $app)
                            <tr class="hover:bg-slate-800/40 transition-colors group">
                                
                                <!-- Candidate -->
                                <td class="py-4 px-5">
                                    <div class="font-bold text-white text-sm">
                                        {{ $app->full_name }}
                                    </div>
                                    <div class="text-slate-400 text-xs mt-0.5">
                                        <a href="mailto:{{ $app->email }}" class="hover:text-blue-400 transition-colors">
                                            {{ $app->email }}
                                        </a>
                                    </div>
                                </td>

                                <!-- Position -->
                                <td class="py-4 px-5">
                                    <div class="font-bold text-blue-400">
                                        {{ $app->job_title }}
                                    </div>
                                    @if($app->career)
                                        <span class="inline-block text-[10px] text-slate-400 uppercase tracking-wider">
                                            {{ $app->career->department }}
                                        </span>
                                    @endif
                                </td>

                                <!-- Contact Info -->
                                <td class="py-4 px-5">
                                    <div class="font-semibold text-slate-300">
                                        <i class="fa-solid fa-phone text-[10px] text-slate-500 mr-1"></i>
                                        <a href="tel:{{ $app->contact_number }}" class="hover:text-white">
                                            {{ $app->contact_number }}
                                        </a>
                                    </div>
                                    @if($app->current_address)
                                        <div class="text-slate-400 text-[11px] truncate max-w-[180px] mt-0.5" title="{{ $app->current_address }}">
                                            <i class="fa-solid fa-location-dot text-[10px] text-slate-500 mr-1"></i>
                                            {{ $app->current_address }}
                                        </div>
                                    @endif
                                </td>

                                <!-- Date -->
                                <td class="py-4 px-4 text-slate-400 whitespace-nowrap">
                                    {{ $app->formatted_date }}
                                </td>

                                <!-- Resume -->
                                <td class="py-4 px-4 whitespace-nowrap">
                                    @if($app->resume_url)
                                        <a href="{{ $app->resume_url }}" 
                                           target="_blank" 
                                           class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-500/10 hover:bg-blue-500/20 text-blue-400 border border-blue-500/20 text-xs font-bold transition-all shadow-sm">
                                            <i class="fa-solid fa-file-arrow-down text-[11px]"></i>
                                            <span>Download</span>
                                        </a>
                                    @else
                                        <span class="text-slate-500 text-[11px] italic">No file</span>
                                    @endif
                                </td>

                                <!-- Status Selector -->
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <form action="{{ route('admin.applications.status', $app) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" 
                                                onchange="this.form.submit()" 
                                                class="px-2.5 py-1 rounded-lg text-xs font-bold bg-slate-950 border focus:outline-none transition-colors cursor-pointer
                                                {{ $app->status === 'new' ? 'text-amber-400 border-amber-500/30' : '' }}
                                                {{ $app->status === 'reviewed' ? 'text-indigo-400 border-indigo-500/30' : '' }}
                                                {{ $app->status === 'contacted' ? 'text-emerald-400 border-emerald-500/30' : '' }}
                                                {{ $app->status === 'rejected' ? 'text-slate-400 border-slate-700' : '' }}">
                                            <option value="new" {{ $app->status === 'new' ? 'selected' : '' }}>Pending</option>
                                            <option value="reviewed" {{ $app->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                            <option value="contacted" {{ $app->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                            <option value="rejected" {{ $app->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </form>
                                </td>

                                <!-- Actions -->
                                <td class="py-4 px-5 text-right whitespace-nowrap space-x-2">
                                    <!-- View Candidate Statement Button -->
                                    <button type="button" 
                                            onclick="viewApplicationStatement({{ json_encode($app) }})" 
                                            class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white transition-colors inline-flex items-center justify-center text-xs" 
                                            title="View Candidate Statement">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    <!-- Delete Button -->
                                    <button type="button" 
                                            onclick="promptDeleteApplication({{ $app->id }}, {{ json_encode($app->full_name) }})" 
                                            class="w-8 h-8 rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-colors inline-flex items-center justify-center text-xs" 
                                            title="Delete Application">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>

                                    <!-- Hidden Real Delete Form -->
                                    <form id="delete-app-{{ $app->id }}" action="{{ route('admin.applications.destroy', $app) }}" method="POST" class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="p-5 border-t border-slate-800">
                {{ $applications->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16 px-4">
                <div class="w-16 h-16 rounded-2xl bg-slate-800/80 text-slate-400 flex items-center justify-center mx-auto mb-4 text-2xl">
                    <i class="fa-solid fa-inbox"></i>
                </div>
                <h3 class="text-base font-bold text-white mb-1">No Applications Found</h3>
                <p class="text-xs text-slate-400 max-w-sm mx-auto leading-relaxed">
                    {{ request('search') || request('status') ? 'No applications match your current filters.' : 'When candidates apply for open roles on the website, their submissions will appear here.' }}
                </p>
            </div>
        @endif
    </div>

</div>

<!-- Candidate Details Modal -->
<div id="statement-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl max-w-lg w-full p-6 sm:p-7 shadow-2xl relative">
        <button type="button" onclick="closeStatementModal()" class="absolute top-5 right-5 text-slate-400 hover:text-white">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <div class="mb-5">
            <span class="text-[10px] font-bold text-blue-400 uppercase tracking-wider block mb-0.5" id="view-job-title"></span>
            <h3 class="text-lg font-bold text-white" id="view-full-name"></h3>
            <p class="text-xs text-slate-400 mt-0.5" id="view-email-phone"></p>
        </div>

        <div class="space-y-4 text-xs">
            <div>
                <label class="block font-bold text-slate-400 uppercase tracking-wider text-[10px] mb-1">Current Address</label>
                <p class="text-slate-200 bg-slate-950 p-3 rounded-xl border border-slate-800" id="view-address"></p>
            </div>

            <div>
                <label class="block font-bold text-slate-400 uppercase tracking-wider text-[10px] mb-1">Why should we hire you?</label>
                <div class="text-slate-200 bg-slate-950 p-3.5 rounded-xl border border-slate-800 leading-relaxed whitespace-pre-line max-h-56 overflow-y-auto" id="view-statement"></div>
            </div>

            <div id="view-resume-container" class="pt-2">
                <a href="#" id="view-resume-link" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs shadow-md transition-all">
                    <i class="fa-solid fa-file-arrow-down"></i>
                    <span>Open / Download Resume</span>
                </a>
            </div>
        </div>

        <div class="mt-6 pt-4 border-t border-slate-800 flex justify-end">
            <button type="button" onclick="closeStatementModal()" class="px-5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-bold transition-colors">
                Close
            </button>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="delete-app-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl max-w-sm w-full p-6 shadow-2xl relative text-center">
        <div class="w-12 h-12 rounded-xl bg-red-500/10 text-red-500 flex items-center justify-center mx-auto mb-3 text-xl">
            <i class="fa-solid fa-trash-can"></i>
        </div>
        <h4 class="text-base font-bold text-white mb-1">Delete Application?</h4>
        <p class="text-xs text-slate-400 mb-4">
            Are you sure you want to remove the application for <span id="del-candidate-name" class="font-bold text-white"></span>?
        </p>
        <div class="flex items-center justify-center space-x-3">
            <button type="button" onclick="closeDeleteAppModal()" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold transition-colors">
                Cancel
            </button>
            <button type="button" id="confirm-del-btn" onclick="executeDeleteApp()" class="px-4 py-2 rounded-xl bg-red-600 hover:bg-red-500 text-white text-xs font-bold transition-colors shadow-md">
                Yes, Delete
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function viewApplicationStatement(app) {
        document.getElementById('view-job-title').innerText = 'Application for: ' + app.job_title;
        document.getElementById('view-full-name').innerText = app.full_name;
        document.getElementById('view-email-phone').innerText = app.email + ' • ' + app.contact_number;
        document.getElementById('view-address').innerText = app.current_address || 'Not provided';
        document.getElementById('view-statement').innerText = app.why_hire_you || 'No statement provided.';

        const resumeContainer = document.getElementById('view-resume-container');
        const resumeLink = document.getElementById('view-resume-link');
        if (app.resume_path) {
            resumeLink.href = '/' + app.resume_path;
            resumeContainer.classList.remove('hidden');
        } else {
            resumeContainer.classList.add('hidden');
        }

        document.getElementById('statement-modal').classList.remove('hidden');
    }

    function closeStatementModal() {
        document.getElementById('statement-modal').classList.add('hidden');
    }

    let activeDeleteId = null;

    function promptDeleteApplication(id, name) {
        activeDeleteId = id;
        document.getElementById('del-candidate-name').innerText = name;
        document.getElementById('delete-app-modal').classList.remove('hidden');
    }

    function closeDeleteAppModal() {
        document.getElementById('delete-app-modal').classList.add('hidden');
        activeDeleteId = null;
    }

    function executeDeleteApp() {
        if (activeDeleteId) {
            const form = document.getElementById('delete-app-' + activeDeleteId);
            if (form) {
                form.submit();
            }
        }
    }

    window.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeStatementModal();
            closeDeleteAppModal();
        }
    });
</script>
@endpush
@endsection
