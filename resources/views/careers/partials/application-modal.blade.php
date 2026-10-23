<!-- Job Application Modal (Matching Image 2) -->
<div id="application-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm transition-all duration-300 overflow-y-auto">
    <div class="bg-white rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative border border-slate-100 my-8">
        
        <!-- Close Button (X) -->
        <button type="button" onclick="closeApplicationModal()" class="absolute top-5 right-5 w-8 h-8 rounded-full flex items-center justify-center text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition-colors" title="Close">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <!-- Header -->
        <div class="mb-6 pr-6">
            <span class="text-xs font-medium text-slate-500 block mb-0.5">Job Application for:</span>
            <h3 id="modal-role-title" class="text-xl sm:text-2xl font-black text-slate-900 leading-tight">
                Role Title
            </h3>
            <p class="text-xs text-slate-500 mt-1">Fill out the form below to submit your application</p>
        </div>

        <!-- Success Alert (Hidden Initially) -->
        <div id="app-success-box" class="hidden mb-6 p-5 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-center space-y-2.5">
            <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto text-xl">
                <i class="fa-solid fa-check"></i>
            </div>
            <h4 class="text-sm font-bold text-emerald-900">Application Submitted!</h4>
            <p id="app-success-msg" class="text-xs text-emerald-700 leading-relaxed"></p>
            <button type="button" onclick="closeApplicationModal()" class="mt-2 px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition-all shadow-sm">
                Close Window
            </button>
        </div>

        <!-- Error Alert (Hidden Initially) -->
        <div id="app-error-box" class="hidden mb-4 p-3.5 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs">
            <div class="flex items-center gap-2 font-bold mb-1">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>Please check the form:</span>
            </div>
            <ul id="app-error-list" class="list-disc list-inside space-y-0.5 text-[11px]"></ul>
        </div>

        <!-- Application Form -->
        <form id="job-application-form" action="{{ route('careers.apply') }}" method="POST" enctype="multipart/form-data" class="space-y-4" onsubmit="submitJobApplication(event)">
            @csrf
            <input type="hidden" name="career_id" id="modal-career-id" value="">
            <input type="hidden" name="job_title" id="modal-job-title-input" value="">

            <!-- Full Name -->
            <div>
                <label for="input_full_name" class="block text-xs font-semibold text-slate-700 mb-1">
                    Full Name<span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="input_full_name" 
                       name="full_name" 
                       autocomplete="name"
                       required 
                       placeholder="Juan Dela Cruz" 
                       class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all placeholder:text-slate-400">
            </div>

            <!-- Email -->
            <div>
                <label for="input_email" class="block text-xs font-semibold text-slate-700 mb-1">
                    Email<span class="text-red-500">*</span>
                </label>
                <input type="email" 
                       id="input_email" 
                       name="email" 
                       autocomplete="email"
                       required 
                       placeholder="j.delacruz@gmail.com" 
                       class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all placeholder:text-slate-400">
            </div>

            <!-- Contact Number -->
            <div>
                <label for="input_contact" class="block text-xs font-semibold text-slate-700 mb-1">
                    Contact Number<span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="input_contact" 
                       name="contact_number" 
                       autocomplete="tel"
                       required 
                       placeholder="09171234567" 
                       class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all placeholder:text-slate-400">
            </div>

            <!-- Current Address -->
            <div>
                <label for="input_address" class="block text-xs font-semibold text-slate-700 mb-1">
                    Current Address
                </label>
                <input type="text" 
                       id="input_address" 
                       name="current_address" 
                       autocomplete="street-address"
                       placeholder="Your current address" 
                       class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all placeholder:text-slate-400">
            </div>

            <!-- Why should we hire you? -->
            <div>
                <label for="input_why" class="block text-xs font-semibold text-slate-700 mb-1">
                    Why should we hire you?
                </label>
                <textarea id="input_why" 
                          name="why_hire_you" 
                          rows="3" 
                          placeholder="Tell us why you're interested in this position..." 
                          class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all placeholder:text-slate-400 resize-none"></textarea>
            </div>

            <!-- Attach Resume / CV -->
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">
                    Attach Resume / CV (Optional)
                </label>
                <input type="file" 
                       name="resume" 
                       accept=".pdf,.doc,.docx" 
                       class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                <p class="text-[11px] text-slate-400 mt-1">PDF, DOC, or DOCX up to 10MB</p>
            </div>

            <!-- Bottom Actions: Cancel & Submit -->
            <div class="pt-3 flex items-center justify-between gap-3">
                <button type="button" 
                        onclick="closeApplicationModal()" 
                        class="w-1/2 py-2.5 px-4 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 text-xs font-bold transition-all text-center">
                    Cancel
                </button>
                <button type="submit" 
                        id="submit-app-btn" 
                        class="w-1/2 py-2.5 px-4 rounded-xl bg-[#2563eb] hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-md shadow-blue-500/25 flex items-center justify-center gap-2 active:scale-95 text-center">
                    <span>Submit Application</span>
                </button>
            </div>
        </form>

    </div>
</div>
