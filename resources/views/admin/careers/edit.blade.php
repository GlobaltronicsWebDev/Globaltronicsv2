@extends('admin.layouts.admin')

@section('title', 'Edit Position: ' . $career->title . ' | Globaltronics CMS')
@section('header-title', 'Edit Job Opening')
@section('header-subtitle', 'Update specifications, requirements, or status for this position.')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Top Navigation Row -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.careers.index') }}" class="inline-flex items-center space-x-2 text-xs font-bold text-slate-400 hover:text-white transition-colors bg-slate-900 px-4 py-2 rounded-xl border border-slate-800">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Back to Positions List</span>
        </a>

        @if($career->is_active)
            <a href="{{ $career->read_url }}" target="_blank" class="inline-flex items-center space-x-1.5 text-xs font-semibold text-emerald-400 hover:text-emerald-300 transition-colors bg-emerald-500/10 px-3.5 py-1.5 rounded-xl border border-emerald-500/20">
                <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                <span>View Live Job Page</span>
            </a>
        @endif
    </div>

    <!-- Main Job Edit Form -->
    <form action="{{ route('admin.careers.update', $career) }}" method="POST" class="bg-slate-900 border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl space-y-8">
        @csrf
        @method('PUT')

        <!-- Section 1: Core Role Details -->
        <div>
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-blue-400 mb-1 flex items-center gap-2">
                <i class="fa-solid fa-briefcase"></i>
                <span>1. Position Overview</span>
            </h3>
            <p class="text-xs text-slate-400 mb-6">Primary title, department, and employment specifications.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                
                <!-- Job Title -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Job Position Title <span class="text-red-400">*</span>
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           required 
                           value="{{ old('title', $career->title) }}" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                    @error('title')
                        <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Department -->
                <div>
                    <label for="department" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Department <span class="text-red-400">*</span>
                    </label>
                    <input type="text" 
                           id="department" 
                           name="department" 
                           required 
                           value="{{ old('department', $career->department) }}" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                    
                    <div class="flex flex-wrap gap-1.5 mt-2">
                        <span class="text-[10px] text-slate-400 py-0.5">Quick picks:</span>
                        <button type="button" onclick="setDepartment('Engineering')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">Engineering</button>
                        <button type="button" onclick="setDepartment('Sales & Marketing')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">Sales & Marketing</button>
                        <button type="button" onclick="setDepartment('Creative / Tech')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">Creative / Tech</button>
                        <button type="button" onclick="setDepartment('Operations')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">Operations</button>
                    </div>
                    @error('department')
                        <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Employment Type -->
                <div>
                    <label for="employment_type" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Employment Type <span class="text-red-400">*</span>
                    </label>
                    <select id="employment_type" 
                            name="employment_type" 
                            required 
                            class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                        <option value="Full-time" {{ old('employment_type', $career->employment_type) === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="Part-time" {{ old('employment_type', $career->employment_type) === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="Contract / Project-based" {{ old('employment_type', $career->employment_type) === 'Contract / Project-based' ? 'selected' : '' }}>Contract / Project-based</option>
                        <option value="Internship" {{ old('employment_type', $career->employment_type) === 'Internship' ? 'selected' : '' }}>Internship</option>
                    </select>
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Work Location <span class="text-red-400">*</span>
                    </label>
                    <input type="text" 
                           id="location" 
                           name="location" 
                           required 
                           value="{{ old('location', $career->location) }}" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                    @error('location')
                        <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Experience Level -->
                <div>
                    <label for="experience_level" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Experience Level (Optional)
                    </label>
                    <input type="text" 
                           id="experience_level" 
                           name="experience_level" 
                           value="{{ old('experience_level', $career->experience_level) }}" 
                           placeholder="e.g. Mid-Senior Level (2-4 Years), Entry Level..." 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                </div>

                <!-- Salary Range -->
                <div class="md:col-span-2">
                    <label for="salary_range" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Salary / Compensation Package (Optional)
                    </label>
                    <input type="text" 
                           id="salary_range" 
                           name="salary_range" 
                           value="{{ old('salary_range', $career->salary_range) }}" 
                           placeholder="e.g. Competitive Salary + Commission, or Discussed upon interview" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                </div>

                <!-- Role Summary Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Role Summary / Overview <span class="text-red-400">*</span>
                    </label>
                    <textarea id="description" 
                              name="description" 
                              rows="3" 
                              required 
                              class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('description', $career->description) }}</textarea>
                    @error('description')
                        <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        <!-- Section 2: Detailed Specifications -->
        <div class="pt-6 border-t border-slate-800">
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-blue-400 mb-1 flex items-center gap-2">
                <i class="fa-solid fa-list-check"></i>
                <span>2. Responsibilities & Requirements</span>
            </h3>
            <p class="text-xs text-slate-400 mb-6">Detailed duties and candidate qualifications for the dedicated job page.</p>

            <div class="space-y-5">
                
                <!-- Responsibilities -->
                <div>
                    <label for="responsibilities" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Key Responsibilities
                    </label>
                    <textarea id="responsibilities" 
                              name="responsibilities" 
                              rows="5" 
                              class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm font-mono leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('responsibilities', $career->responsibilities) }}</textarea>
                </div>

                <!-- Requirements -->
                <div>
                    <label for="requirements" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Candidate Qualifications & Skills
                    </label>
                    <textarea id="requirements" 
                              name="requirements" 
                              rows="5" 
                              class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm font-mono leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('requirements', $career->requirements) }}</textarea>
                </div>

                <!-- Benefits -->
                <div>
                    <label for="benefits" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Benefits, Perks & Allowances (Optional)
                    </label>
                    <textarea id="benefits" 
                              name="benefits" 
                              rows="4" 
                              class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm font-mono leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('benefits', $career->benefits) }}</textarea>
                </div>

            </div>
        </div>

        <!-- Section 3: Application Channels -->
        <div class="pt-6 border-t border-slate-800">
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-blue-400 mb-1 flex items-center gap-2">
                <i class="fa-solid fa-envelope"></i>
                <span>3. Application Channels</span>
            </h3>
            <p class="text-xs text-slate-400 mb-6">Specify how candidates should submit their resumes.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                
                <!-- Application Email -->
                <div>
                    <label for="application_email" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Application Recipient Email
                    </label>
                    <input type="email" 
                           id="application_email" 
                           name="application_email" 
                           value="{{ old('application_email', $career->application_email) }}" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                </div>

                <!-- Application URL / Form Link -->
                <div>
                    <label for="application_url" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Online Application Form URL (Optional)
                    </label>
                    <input type="url" 
                           id="application_url" 
                           name="application_url" 
                           value="{{ old('application_url', $career->application_url) }}" 
                           placeholder="https://forms.google.com/... or job portal link" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                </div>

            </div>
        </div>

        <!-- Section 4: Publishing Visibility Switch -->
        <div class="pt-6 border-t border-slate-800 flex items-center justify-between">
            <div>
                <h4 class="text-sm font-bold text-white">Live on Website</h4>
                <p class="text-xs text-slate-400">Toggle whether this position should be actively visible and open for applications.</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer select-none">
                <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ old('is_active', $career->is_active) ? 'checked' : '' }}>
                <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#0047ba]"></div>
            </label>
        </div>

        <!-- Form Actions -->
        <div class="pt-6 border-t border-slate-800 flex flex-wrap items-center justify-between gap-4">
            <div>
                <button type="button" 
                        onclick="promptDeleteCareer({{ $career->id }}, {{ json_encode($career->title) }})" 
                        class="px-5 py-3 rounded-xl bg-red-500/10 hover:bg-red-600 text-red-400 hover:text-white border border-red-500/20 hover:border-red-600 text-xs font-bold transition-all flex items-center gap-2">
                    <i class="fa-solid fa-trash"></i>
                    <span>Delete Position</span>
                </button>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.careers.index') }}" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-7 py-3 rounded-xl bg-[#0047ba] hover:bg-blue-600 text-white text-xs font-extrabold shadow-lg shadow-blue-600/30 transition-all flex items-center gap-2 active:scale-95">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Save Changes</span>
                </button>
            </div>
        </div>

    </form>

    <!-- Separate Hidden Delete Form -->
    <form id="delete-form-{{ $career->id }}" action="{{ route('admin.careers.destroy', $career) }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
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
    function setDepartment(dept) {
        document.getElementById('department').value = dept;
    }

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
