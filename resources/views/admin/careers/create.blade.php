@extends('admin.layouts.admin')

@section('title', 'Post New Career Opening | Globaltronics CMS')
@section('header-title', 'Post Job Opening')
@section('header-subtitle', 'Add a new career opportunity to the Globaltronics careers portal.')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Top Navigation Row -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.careers.index') }}" class="inline-flex items-center space-x-2 text-xs font-bold text-slate-400 hover:text-white transition-colors bg-slate-900 px-4 py-2 rounded-xl border border-slate-800">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Back to Positions List</span>
        </a>
    </div>

    <!-- Main Job Creation Form -->
    <form action="{{ route('admin.careers.store') }}" method="POST" class="bg-slate-900 border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl space-y-8">
        @csrf

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
                           value="{{ old('title') }}" 
                           placeholder="e.g. LED Systems Field Engineer, Corporate Account Executive..." 
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
                           value="{{ old('department', 'Engineering') }}" 
                           placeholder="e.g. Engineering, Sales & Marketing..." 
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
                        <option value="Full-time" {{ old('employment_type') === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="Part-time" {{ old('employment_type') === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="Contract / Project-based" {{ old('employment_type') === 'Contract / Project-based' ? 'selected' : '' }}>Contract / Project-based</option>
                        <option value="Internship" {{ old('employment_type') === 'Internship' ? 'selected' : '' }}>Internship</option>
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
                           value="{{ old('location', 'Mandaluyong City, Metro Manila') }}" 
                           placeholder="e.g. Mandaluyong City, Cebu City, Remote / Field..." 
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
                           value="{{ old('experience_level') }}" 
                           placeholder="e.g. Mid-Senior Level (2-4 Years), Entry Level..." 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                </div>

                <!-- Salary Range (Optional) -->
                <div class="md:col-span-2">
                    <label for="salary_range" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Salary / Compensation Package (Optional)
                    </label>
                    <input type="text" 
                           id="salary_range" 
                           name="salary_range" 
                           value="{{ old('salary_range') }}" 
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
                              placeholder="Brief summary that displays on the job card on the Careers page..." 
                              class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('description') }}</textarea>
                    <p class="text-[11px] text-slate-400 mt-1">Recommended: 1 to 3 concise sentences highlighting the main purpose of this role.</p>
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
                        Key Responsibilities (What they will do)
                    </label>
                    <textarea id="responsibilities" 
                              name="responsibilities" 
                              rows="5" 
                              placeholder="• Install, wire, calibrate, and commission outdoor and indoor LED displays...&#10;• Coordinate with clients and field engineers...&#10;• Conduct diagnostic tests and quality inspection..." 
                              class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm font-mono leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('responsibilities') }}</textarea>
                    <p class="text-[11px] text-slate-400 mt-1">Tip: Use bullet points (•) or separate lines for optimal readability.</p>
                </div>

                <!-- Requirements -->
                <div>
                    <label for="requirements" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Candidate Qualifications & Skills
                    </label>
                    <textarea id="requirements" 
                              name="requirements" 
                              rows="5" 
                              placeholder="• Bachelor's Degree in Engineering, Computer Science, Marketing, or related field...&#10;• 2+ years of relevant industry experience...&#10;• Strong communication and organizational skills..." 
                              class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm font-mono leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('requirements') }}</textarea>
                </div>

                <!-- Benefits -->
                <div>
                    <label for="benefits" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Benefits, Perks & Allowances (Optional)
                    </label>
                    <textarea id="benefits" 
                              name="benefits" 
                              rows="4" 
                              placeholder="• Comprehensive HMO healthcare upon regularization&#10;• Transportation and field allowances&#10;• Performance bonuses and technical certification subsidies..." 
                              class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm font-mono leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('benefits') }}</textarea>
                </div>

            </div>
        </div>

        <!-- Section 3: Application Channels -->
        <div class="pt-6 border-t border-slate-800">
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-blue-400 mb-1 flex items-center gap-2">
                <i class="fa-solid fa-envelope"></i>
                <span>3. Application Channels</span>
            </h3>
            <p class="text-xs text-slate-400 mb-6">Specify how candidates should submit their resumes and portfolios.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                
                <!-- Application Email -->
                <div>
                    <label for="application_email" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Application Recipient Email
                    </label>
                    <input type="email" 
                           id="application_email" 
                           name="application_email" 
                           value="{{ old('application_email', 'hr.specialist@globaltronics.net') }}" 
                           placeholder="hr.specialist@globaltronics.net" 
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
                           value="{{ old('application_url') }}" 
                           placeholder="https://forms.google.com/... or job board link" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                </div>

            </div>
        </div>

        <!-- Section 4: Publishing Visibility Switch -->
        <div class="pt-6 border-t border-slate-800 flex items-center justify-between">
            <div>
                <h4 class="text-sm font-bold text-white">Publish Immediately</h4>
                <p class="text-xs text-slate-400">If toggled off, this job opening will be saved as a draft and hidden from the public website.</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer select-none">
                <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#0047ba]"></div>
            </label>
        </div>

        <!-- Form Actions -->
        <div class="pt-6 border-t border-slate-800 flex items-center justify-end space-x-3">
            <a href="{{ route('admin.careers.index') }}" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-7 py-3 rounded-xl bg-[#0047ba] hover:bg-blue-600 text-white text-xs font-extrabold shadow-lg shadow-blue-600/30 transition-all flex items-center gap-2 active:scale-95">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <span>Publish Job Opening</span>
            </button>
        </div>

    </form>
</div>

@push('scripts')
<script>
    function setDepartment(dept) {
        document.getElementById('department').value = dept;
    }
</script>
@endpush
@endsection
