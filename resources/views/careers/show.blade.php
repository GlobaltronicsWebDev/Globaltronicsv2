@extends('layouts.app')

@section('title', $career->title . ' - Careers | Globaltronics')

@section('content')
<article class="bg-[#f8fafc] text-slate-800 min-h-screen py-10 lg:py-16 relative overflow-hidden border-t border-slate-200">

    <!-- Ambient Subtle Glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-b from-blue-100/60 via-slate-100/40 to-transparent pointer-events-none blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Top Breadcrumb & Back Link -->
        <div class="flex flex-wrap items-center justify-between gap-4 mb-8 pb-5 border-b border-slate-200">
            <nav class="flex items-center space-x-2 text-xs uppercase tracking-wider text-slate-500 font-bold">
                <a href="{{ url('/') }}" class="hover:text-[#0047ba] transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-house text-xs"></i>
                    <span>Home</span>
                </a>
                <span class="text-slate-300">/</span>
                <a href="{{ route('careers.index') }}" class="hover:text-[#0047ba] transition-colors">Careers</a>
                <span class="text-slate-300">/</span>
                <span class="text-[#0047ba] truncate max-w-[200px] sm:max-w-xs">{{ $career->department }}</span>
            </nav>

            <a href="{{ route('careers.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-600 hover:text-[#0047ba] transition-colors bg-white hover:bg-slate-50 px-3.5 py-1.5 rounded-full border border-slate-200 shadow-sm">
                <i class="fa-solid fa-arrow-left text-[10px]"></i>
                <span>All Open Positions</span>
            </a>
        </div>

        <!-- Position Header Area -->
        <header class="mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 pb-6 border-b border-slate-200/80">
                <div>
                    <!-- Badges & Meta Row -->
                    <div class="flex flex-wrap items-center gap-2 mb-3.5">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black tracking-wider uppercase bg-[#0047ba] text-white shadow-md shadow-blue-600/20">
                            {{ $career->department }}
                        </span>

                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-white text-slate-700 border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-clock mr-1.5 text-slate-400"></i>
                            {{ $career->employment_type }}
                        </span>

                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-white text-slate-700 border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-location-dot mr-1.5 text-[#0047ba]"></i>
                            {{ $career->location }}
                        </span>

                        @if($career->experience_level)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-white text-slate-700 border border-slate-200 shadow-sm">
                                <i class="fa-solid fa-graduation-cap mr-1.5 text-slate-400"></i>
                                {{ $career->experience_level }}
                            </span>
                        @endif
                    </div>

                    <!-- Position Title -->
                    <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                        {{ $career->title }}
                    </h1>

                    @if($career->salary_range)
                        <div class="mt-3 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold">
                            <i class="fa-solid fa-wallet text-emerald-600"></i>
                            <span>Compensation: {{ $career->salary_range }}</span>
                        </div>
                    @endif
                </div>

                <!-- Top Actions Bar (Matching Image 1) -->
                <div class="flex items-center gap-2.5 shrink-0">
                    <!-- Share Button -->
                    <button type="button" 
                            onclick="shareJobModal()" 
                            class="px-4 py-2.5 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 text-xs font-bold transition-all shadow-sm flex items-center gap-2 hover:border-slate-300 active:scale-95"
                            title="Share this role">
                        <i class="fa-solid fa-share-nodes text-slate-500"></i>
                        <span>Share</span>
                    </button>

                    <!-- Save Job Button -->
                    <button type="button" 
                            id="save-job-top-btn"
                            onclick="toggleSaveJob({{ $career->id }})" 
                            class="px-4 py-2.5 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 text-xs font-bold transition-all shadow-sm flex items-center gap-2 hover:border-slate-300 active:scale-95"
                            title="Bookmark this role">
                        <i id="save-icon-top" class="fa-regular fa-bookmark text-slate-500"></i>
                        <span id="save-text-top">Save</span>
                    </button>

                    <!-- Apply Now Primary Button -->
                    <button type="button" 
                            onclick="openApplicationModal('{{ addslashes($career->title) }}', {{ $career->id }})" 
                            class="px-6 py-2.5 rounded-xl bg-[#2563eb] hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-md shadow-blue-500/25 flex items-center gap-2 active:scale-95">
                        <i class="fa-solid fa-briefcase"></i>
                        <span>Apply Now</span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Two Column Main Layout -->
        <div class="flex flex-col lg:flex-row items-start gap-8 mb-16 w-full">

            <!-- Left Main Column (Role Details) -->
            <div class="w-full lg:flex-1 space-y-8 min-w-0">

                <!-- Role Summary / Lead Deck -->
                <div class="p-6 sm:p-8 rounded-3xl bg-white border border-slate-200 text-slate-700 text-base sm:text-lg leading-relaxed font-medium border-l-4 border-l-[#0047ba] shadow-sm">
                    {{ $career->description }}
                </div>

                <!-- Key Responsibilities -->
                @if(!empty($career->responsibilities))
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm">
                        <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-6 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-blue-50 text-[#0047ba] flex items-center justify-center text-sm shadow-sm">
                                <i class="fa-solid fa-list-check"></i>
                            </div>
                            <span>Key Responsibilities</span>
                        </h2>

                        <div class="text-slate-700 text-sm sm:text-base leading-relaxed space-y-3 font-normal">
                            @foreach(preg_split('/\r\n|\r|\n/', $career->responsibilities) as $item)
                                @if(trim($item))
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 h-5 rounded-full bg-blue-50 text-[#0047ba] flex items-center justify-center text-xs shrink-0 mt-0.5 font-bold">
                                            <i class="fa-solid fa-check text-[10px]"></i>
                                        </div>
                                        <span>{{ ltrim(trim($item), '•- ') }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Requirements & Qualifications -->
                @if(!empty($career->requirements))
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm">
                        <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-6 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-sm shadow-sm">
                                <i class="fa-solid fa-user-gear"></i>
                            </div>
                            <span>Requirements & Qualifications</span>
                        </h2>

                        <div class="text-slate-700 text-sm sm:text-base leading-relaxed space-y-3 font-normal">
                            @foreach(preg_split('/\r\n|\r|\n/', $career->requirements) as $item)
                                @if(trim($item))
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 h-5 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center text-xs shrink-0 mt-0.5 font-bold">
                                            <i class="fa-solid fa-angle-right text-[11px]"></i>
                                        </div>
                                        <span>{{ ltrim(trim($item), '•- ') }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Benefits & What We Offer -->
                @if(!empty($career->benefits))
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm">
                        <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-6 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-sm shadow-sm">
                                <i class="fa-solid fa-gift"></i>
                            </div>
                            <span>What We Offer</span>
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 text-slate-700 text-sm leading-relaxed">
                            @foreach(preg_split('/\r\n|\r|\n/', $career->benefits) as $item)
                                @if(trim($item))
                                    <div class="flex items-start gap-2.5 p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                                        <i class="fa-solid fa-circle-check text-emerald-500 text-sm mt-0.5 shrink-0"></i>
                                        <span>{{ ltrim(trim($item), '•- ') }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

            <!-- Right Sidebar Column (Action Card & Summary) -->
            <div class="w-full lg:w-80 xl:w-96 shrink-0 space-y-6 lg:sticky lg:top-24">

                <!-- Interested in this role? Card (Matching Image 1) -->
                <div class="bg-white rounded-2xl p-6 sm:p-7 border border-slate-200 shadow-lg">
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 mb-2">
                        Interested in this role?
                    </h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mb-6 font-normal">
                        Submit your application and our hiring team will review it within 3-5 business days.
                    </p>

                    <div class="space-y-3">
                        <!-- Apply Now Button (Blue Full Width) -->
                        <button type="button" 
                                onclick="openApplicationModal('{{ addslashes($career->title) }}', {{ $career->id }})" 
                                class="w-full py-3.5 px-5 rounded-xl bg-[#2563eb] hover:bg-blue-700 text-white text-sm font-bold transition-all shadow-md shadow-blue-500/30 flex items-center justify-center gap-2 active:scale-95">
                            <i class="fa-solid fa-briefcase"></i>
                            <span>Apply Now</span>
                        </button>

                        <!-- Save Job For Later Button (Outline Full Width) -->
                        <button type="button" 
                                id="save-job-side-btn"
                                onclick="toggleSaveJob({{ $career->id }})" 
                                class="w-full py-3 px-5 rounded-xl bg-white hover:bg-slate-50 text-slate-800 text-sm font-semibold border border-slate-200 hover:border-slate-300 transition-all flex items-center justify-center gap-2 active:scale-95 shadow-sm">
                            <i id="save-icon-side" class="fa-regular fa-bookmark text-slate-500"></i>
                            <span id="save-text-side">Save Job For Later</span>
                        </button>
                    </div>
                </div>

                <!-- Job Overview Summary Box -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider">
                        Job Overview
                    </h4>
                    
                    <div class="divide-y divide-slate-100 text-xs text-slate-700">
                        <div class="py-2.5 flex items-center justify-between">
                            <span class="text-slate-500 flex items-center gap-1.5"><i class="fa-solid fa-building text-slate-400"></i> Department</span>
                            <span class="font-bold text-slate-900">{{ $career->department }}</span>
                        </div>
                        <div class="py-2.5 flex items-center justify-between">
                            <span class="text-slate-500 flex items-center gap-1.5"><i class="fa-solid fa-clock text-slate-400"></i> Type</span>
                            <span class="font-bold text-slate-900">{{ $career->employment_type }}</span>
                        </div>
                        <div class="py-2.5 flex items-center justify-between">
                            <span class="text-slate-500 flex items-center gap-1.5"><i class="fa-solid fa-location-dot text-slate-400"></i> Location</span>
                            <span class="font-bold text-slate-900">{{ $career->location }}</span>
                        </div>
                        @if($career->experience_level)
                        <div class="py-2.5 flex items-center justify-between">
                            <span class="text-slate-500 flex items-center gap-1.5"><i class="fa-solid fa-graduation-cap text-slate-400"></i> Experience</span>
                            <span class="font-bold text-slate-900">{{ $career->experience_level }}</span>
                        </div>
                        @endif
                        <div class="py-2.5 flex items-center justify-between">
                            <span class="text-slate-500 flex items-center gap-1.5"><i class="fa-solid fa-calendar-check text-slate-400"></i> Date Posted</span>
                            <span class="font-bold text-slate-900">{{ $career->created_at ? $career->created_at->format('M d, Y') : 'Active' }}</span>
                        </div>
                    </div>
                </div>

                <!-- HR Team Help Note -->
                <div class="p-5 rounded-2xl bg-blue-50/70 border border-blue-100 text-xs text-slate-600">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-600 text-white flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-headset text-xs"></i>
                        </div>
                        <div>
                            <h5 class="font-bold text-slate-900 mb-0.5">Need Assistance?</h5>
                            <p class="leading-relaxed">Contact our Talent Acquisition team directly at <a href="mailto:{{ $career->application_email ?: 'hr.specialist@globaltronics.net' }}" class="font-bold text-blue-600 hover:underline">{{ $career->application_email ?: 'hr.specialist@globaltronics.net' }}</a></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Social Share Bar -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 flex flex-col sm:flex-row items-center justify-between gap-4 mb-16 shadow-sm">
            <div>
                <h4 class="text-sm font-bold text-slate-900 mb-1">Share this opening</h4>
                <p class="text-xs text-slate-500">Know someone who would be a great fit? Send it their way.</p>
            </div>

            <div class="flex items-center gap-2">
                <!-- Share LinkedIn -->
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   class="w-10 h-10 rounded-xl bg-[#0A66C2] text-white flex items-center justify-center transition-all hover:scale-105 shadow-sm" 
                   title="Share on LinkedIn">
                    <i class="fa-brands fa-linkedin-in text-sm"></i>
                </a>

                <!-- Share Facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   class="w-10 h-10 rounded-xl bg-[#1877F2] text-white flex items-center justify-center transition-all hover:scale-105 shadow-sm" 
                   title="Share on Facebook">
                    <i class="fa-brands fa-facebook-f text-sm"></i>
                </a>

                <!-- Share X -->
                <a href="https://twitter.com/intent/tweet?text={{ urlencode('Career Opportunity at Globaltronics: ' . $career->title) }}&url={{ urlencode(url()->current()) }}" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center transition-all hover:scale-105 shadow-sm" 
                   title="Share on X">
                    <i class="fa-brands fa-x-twitter text-sm"></i>
                </a>

                <!-- Copy Link Button -->
                <button type="button" 
                        onclick="copyJobLink(this)" 
                        class="px-4 h-10 rounded-xl bg-slate-100 hover:bg-[#0047ba] hover:text-white text-slate-800 text-xs font-bold flex items-center gap-2 border border-slate-200 transition-all hover:scale-105 shadow-sm">
                    <i class="fa-solid fa-link text-xs"></i>
                    <span>Copy Link</span>
                </button>
            </div>
        </div>

        <!-- Other Career Positions -->
        @if($otherCareers->isNotEmpty())
            <div class="pt-8 border-t border-slate-200">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Other Open Positions</h3>
                        <p class="text-xs text-slate-500 mt-1">Explore additional roles at Globaltronics.</p>
                    </div>
                    <a href="{{ route('careers.index') }}" class="text-xs font-bold text-[#0047ba] hover:underline flex items-center gap-1.5">
                        <span>View All Roles</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($otherCareers as $other)
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 flex flex-col justify-between group hover:border-blue-300 hover:shadow-xl transition-all hover:-translate-y-1 shadow-sm">
                            <div>
                                <span class="inline-block px-3 py-1 rounded-full bg-blue-50 text-[#0047ba] text-[10px] font-extrabold uppercase mb-3">
                                    {{ $other->department }}
                                </span>
                                <h4 class="text-base font-bold text-slate-900 group-hover:text-[#0047ba] transition-colors line-clamp-2 leading-snug mb-2">
                                    {{ $other->title }}
                                </h4>
                                <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed mb-6">
                                    {{ $other->description }}
                                </p>
                            </div>
                            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                                <a href="{{ $other->read_url }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#0047ba] hover:underline transition-colors">
                                    <span>View Details</span>
                                    <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                                </a>
                                <button type="button" 
                                        onclick="openApplicationModal('{{ addslashes($other->title) }}', {{ $other->id }})" 
                                        class="px-3.5 py-1.5 rounded-lg bg-blue-50 hover:bg-blue-600 hover:text-white text-blue-600 text-xs font-bold transition-all">
                                    Apply
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

</article>

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
                {{ $career->title }}
            </h3>
            <p class="text-xs text-slate-500 mt-1">Fill out the form below to submit your application</p>
        </div>

        <!-- Success Alert (Hidden Initially) -->
        <div id="app-success-box" class="hidden mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-center space-y-2">
            <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto text-xl">
                <i class="fa-solid fa-check"></i>
            </div>
            <h4 class="text-sm font-bold text-emerald-900">Application Submitted!</h4>
            <p id="app-success-msg" class="text-xs text-emerald-700 leading-relaxed"></p>
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
            <input type="hidden" name="career_id" id="modal-career-id" value="{{ $career->id }}">
            <input type="hidden" name="job_title" id="modal-job-title-input" value="{{ $career->title }}">

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

@push('scripts')
<script>
    // Open Job Application Modal
    function openApplicationModal(roleTitle, careerId) {
        document.getElementById('modal-role-title').innerText = roleTitle;
        document.getElementById('modal-job-title-input').value = roleTitle;
        document.getElementById('modal-career-id').value = careerId || '';

        // Reset state
        document.getElementById('app-success-box').classList.add('hidden');
        document.getElementById('app-error-box').classList.add('hidden');
        document.getElementById('job-application-form').classList.remove('hidden');

        const modal = document.getElementById('application-modal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    // Close Job Application Modal
    function closeApplicationModal() {
        const modal = document.getElementById('application-modal');
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }

    // Submit Job Application via AJAX
    function submitJobApplication(e) {
        e.preventDefault();
        const form = document.getElementById('job-application-form');
        const submitBtn = document.getElementById('submit-app-btn');
        const successBox = document.getElementById('app-success-box');
        const errorBox = document.getElementById('app-error-box');
        const errorList = document.getElementById('app-error-list');

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> <span>Submitting...</span>';
        errorBox.classList.add('hidden');
        errorList.innerHTML = '';

        const formData = new FormData(form);

        fetch("{{ route('careers.apply') }}", {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(res => res.json().then(data => ({ status: res.status, body: data })))
        .then(result => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<span>Submit Application</span>';

            if (result.status === 200 && result.body.success) {
                form.classList.add('hidden');
                document.getElementById('app-success-msg').innerText = result.body.message;
                successBox.classList.remove('hidden');
                form.reset();

                setTimeout(() => {
                    closeApplicationModal();
                }, 4000);
            } else {
                errorBox.classList.remove('hidden');
                if (result.body.errors) {
                    Object.values(result.body.errors).forEach(errArr => {
                        errArr.forEach(msg => {
                            const li = document.createElement('li');
                            li.innerText = msg;
                            errorList.appendChild(li);
                        });
                    });
                } else {
                    const li = document.createElement('li');
                    li.innerText = result.body.message || 'Something went wrong. Please check your inputs.';
                    errorList.appendChild(li);
                }
            }
        })
        .catch(err => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<span>Submit Application</span>';
            errorBox.classList.remove('hidden');
            const li = document.createElement('li');
            li.innerText = 'Unable to submit application right now. Please try again.';
            errorList.appendChild(li);
        });
    }

    // Save Job Bookmark in LocalStorage
    function getSavedJobs() {
        try {
            return JSON.parse(localStorage.getItem('gt_saved_jobs') || '[]');
        } catch (e) {
            return [];
        }
    }

    function isJobSaved(id) {
        return getSavedJobs().includes(id);
    }

    function toggleSaveJob(id) {
        let saved = getSavedJobs();
        if (saved.includes(id)) {
            saved = saved.filter(item => item !== id);
        } else {
            saved.push(id);
        }
        localStorage.setItem('gt_saved_jobs', JSON.stringify(saved));
        updateSaveJobButtons(id);
    }

    function updateSaveJobButtons(id) {
        const saved = isJobSaved(id);
        
        // Top Button
        const topIcon = document.getElementById('save-icon-top');
        const topText = document.getElementById('save-text-top');
        const topBtn = document.getElementById('save-job-top-btn');
        if (topIcon && topText && topBtn) {
            if (saved) {
                topIcon.className = 'fa-solid fa-bookmark text-blue-600';
                topText.innerText = 'Saved';
                topBtn.classList.add('bg-blue-50', 'border-blue-200', 'text-blue-700');
            } else {
                topIcon.className = 'fa-regular fa-bookmark text-slate-500';
                topText.innerText = 'Save';
                topBtn.classList.remove('bg-blue-50', 'border-blue-200', 'text-blue-700');
            }
        }

        // Side Button
        const sideIcon = document.getElementById('save-icon-side');
        const sideText = document.getElementById('save-text-side');
        const sideBtn = document.getElementById('save-job-side-btn');
        if (sideIcon && sideText && sideBtn) {
            if (saved) {
                sideIcon.className = 'fa-solid fa-bookmark text-blue-600';
                sideText.innerText = 'Saved In Bookmarks';
                sideBtn.classList.add('bg-blue-50', 'border-blue-200', 'text-blue-700');
            } else {
                sideIcon.className = 'fa-regular fa-bookmark text-slate-500';
                sideText.innerText = 'Save Job For Later';
                sideBtn.classList.remove('bg-blue-50', 'border-blue-200', 'text-blue-700');
            }
        }
    }

    // Share Job
    function shareJobModal() {
        if (navigator.share) {
            navigator.share({
                title: '{{ addslashes($career->title) }} - Globaltronics',
                text: 'Check out this career opportunity at Globaltronics: {{ addslashes($career->title) }}',
                url: window.location.href
            }).catch(() => {});
        } else {
            copyJobLink();
        }
    }

    function copyJobLink(btn) {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            if (btn) {
                const orig = btn.innerHTML;
                btn.innerHTML = '<i class="fa-solid fa-check text-white text-xs"></i> <span>Copied!</span>';
                btn.classList.add('bg-emerald-600', 'text-white');
                setTimeout(() => {
                    btn.innerHTML = orig;
                    btn.classList.remove('bg-emerald-600', 'text-white');
                }, 2000);
            } else {
                alert('Job opening link copied to clipboard!');
            }
        });
    }

    // Initialize saved state on load
    document.addEventListener('DOMContentLoaded', function() {
        updateSaveJobButtons({{ $career->id }});
    });

    // Close on escape key
    window.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeApplicationModal();
        }
    });
</script>
@endpush
@endsection
