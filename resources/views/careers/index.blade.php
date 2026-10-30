@extends('layouts.app')

@section('title', 'Careers & Job Openings | Globaltronics')

@section('content')
<div class="bg-[#f8fafc] text-slate-800 min-h-screen relative overflow-hidden">

    <!-- Ambient Subtle Background Glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[450px] bg-gradient-to-b from-blue-100/70 via-slate-100/50 to-transparent pointer-events-none blur-3xl"></div>

    <!-- Hero / Header Section -->
    <section class="relative pt-12 pb-16 lg:pt-16 lg:pb-20 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            
            <!-- Breadcrumb -->
            <nav class="flex items-center justify-center space-x-2 text-xs uppercase tracking-wider text-slate-500 font-bold mb-6">
                <a href="{{ url('/') }}" class="hover:text-[#0047ba] transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-house text-xs"></i>
                    <span>Home</span>
                </a>
                <span class="text-slate-300">/</span>
                <span class="text-[#0047ba]">Careers</span>
            </nav>

            <!-- Pill Badge -->
            <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200 text-[#0047ba] text-xs font-black uppercase tracking-wider mb-5 shadow-sm">
                <i class="fa-solid fa-briefcase"></i>
                <span>Join Globaltronics</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-slate-950 mb-6 tracking-tight max-w-4xl mx-auto leading-tight">
                Build the Future of <span class="career-hero-word career-hero-word--right text-[#0047ba]">Digital</span> <span class="career-hero-word career-hero-word--left text-[#0047ba]">Media &amp; LED</span> Innovation
            </h1>

            <p class="text-slate-600 text-sm sm:text-base md:text-lg max-w-3xl mx-auto leading-relaxed font-normal mb-10">
                Be part of the country’s leader in digital billboard displays, smart electronics, and innovative advertising systems. Explore our current job openings and take the next step in your career.
            </p>

            <!-- Quick Metrics / Pillars -->
            <div id="career-metrics-grid" class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto pt-2">
                <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-sm text-center">
                    <p class="stat-counter text-2xl sm:text-3xl font-black text-[#0047ba] mb-1" data-target="20" data-suffix="+">20+</p>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Years of Excellence</p>
                </div>
                <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-sm text-center">
                    <p class="stat-counter text-2xl sm:text-3xl font-black text-[#0047ba] mb-1" data-target="100" data-suffix="+">100+</p>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Nationwide Sites</p>
                </div>
                <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-sm text-center">
                    <p class="stat-counter text-2xl sm:text-3xl font-black text-[#0047ba] mb-1" data-target="100" data-suffix="%">100%</p>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Filipino Innovation</p>
                </div>
                <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-sm text-center">
                    <p class="stat-counter text-2xl sm:text-3xl font-black text-[#0047ba] mb-1" data-target="{{ $careers->count() }}" data-suffix="">{{ $careers->count() }}</p>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Open Positions</p>
                </div>
            </div>

        </div>
    </section>

    <!-- Why Work With Us Section -->
    <section class="py-14 bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 mb-3 tracking-tight">
                    Why Work With Us?
                </h2>
                <p class="text-xs sm:text-sm text-slate-500">
                    We foster an environment that empowers our people to innovate, grow, and lead.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Perk 1 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-blue-300 hover:shadow-md transition-all">
                    <div class="w-11 h-11 rounded-xl bg-blue-100 text-[#0047ba] flex items-center justify-center text-lg mb-4">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 mb-2">Career Advancement</h3>
                    <p class="text-xs text-slate-600 leading-relaxed font-normal">
                        Structured career growth tracks, ongoing training, and opportunities to lead high-visibility projects.
                    </p>
                </div>

                <!-- Perk 2 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-blue-300 hover:shadow-md transition-all">
                    <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-lg mb-4">
                        <i class="fa-solid fa-lightbulb"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 mb-2">Innovation & Tech</h3>
                    <p class="text-xs text-slate-600 leading-relaxed font-normal">
                        Work with state-of-the-art LED hardware, digital display tech, and landmark media infrastructure.
                    </p>
                </div>

                <!-- Perk 3 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-blue-300 hover:shadow-md transition-all">
                    <div class="w-11 h-11 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-lg mb-4">
                        <i class="fa-solid fa-people-group"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 mb-2">Collaborative Culture</h3>
                    <p class="text-xs text-slate-600 leading-relaxed font-normal">
                        A supportive, energetic team atmosphere where great ideas are recognized and celebrated.
                    </p>
                </div>

                <!-- Perk 4 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-blue-300 hover:shadow-md transition-all">
                    <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-lg mb-4">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 mb-2">Competitive Benefits</h3>
                    <p class="text-xs text-slate-600 leading-relaxed font-normal">
                        Comprehensive compensation packages, health benefits, performance bonuses, and work perks.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Job Openings Section -->
    <section id="openings" class="py-14 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header & Filter Form -->
            <div class="mb-10">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-6">
                    <div>
                        <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-blue-50 text-[#0047ba] text-[11px] font-black uppercase tracking-wider mb-2">
                            <span>Open Positions</span>
                        </div>
                        <h2 class="text-2xl sm:text-4xl font-black text-slate-900 tracking-tight">
                            Current Opportunities
                        </h2>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-500 font-semibold">
                        Showing <span class="text-[#0047ba] font-bold">{{ $careers->count() }}</span> available position{{ $careers->count() == 1 ? '' : 's' }}
                    </p>
                </div>

                <form action="{{ route('careers.index') }}" method="GET" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-sm flex flex-col md:flex-row gap-3 items-center">
                    <div class="relative w-full md:flex-1">
                        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                        <input type="text" name="search" value="{{ request('search') }}" autocomplete="off" placeholder="Search job title, keyword, or location..." class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all placeholder:text-slate-400">
                    </div>
                    <div class="w-full md:w-56">
                        <select name="department" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all cursor-pointer">
                            <option value="">All Departments</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept }}" {{ request('department') == $dept ? 'selected' : '' }}>{{ $dept }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full md:w-48">
                        <select name="type" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all cursor-pointer">
                            <option value="">All Types</option>
                            @foreach($types as $t)
                                <option value="{{ $t }}" {{ request('type') == $t ? 'selected' : '' }}>{{ $t }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center gap-2 w-full md:w-auto">
                        <button type="submit" class="w-full md:w-auto px-6 py-2.5 rounded-xl bg-[#0047ba] hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-md shadow-blue-500/20 flex items-center justify-center gap-2 active:scale-95">
                            <i class="fa-solid fa-filter text-xs"></i>
                            <span>Filter</span>
                        </button>
                        @if(request()->hasAny(['search', 'department', 'type']))
                            <a href="{{ route('careers.index') }}" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold transition-all text-center" title="Reset Filters">
                                <i class="fa-solid fa-rotate-left"></i>
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Job Listings Cards -->
            @if($careers->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    @foreach($careers as $job)
                        <div class="bg-white rounded-3xl p-7 sm:p-8 border border-slate-200 shadow-sm hover:shadow-xl hover:border-blue-300 transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1">
                            <div>
                                <!-- Top Department & Time Row -->
                                <div class="flex items-center justify-between gap-2 mb-4">
                                    <span class="inline-block px-3 py-1 rounded-full bg-blue-50 text-[#0047ba] text-[11px] font-extrabold uppercase tracking-wider">
                                        {{ $job->department }}
                                    </span>
                                    <span class="text-[11px] font-semibold text-slate-400 flex items-center gap-1">
                                        <i class="fa-solid fa-clock text-slate-400"></i>
                                        {{ $job->employment_type }}
                                    </span>
                                </div>

                                <!-- Job Title -->
                                <h3 class="text-xl font-extrabold text-slate-900 group-hover:text-[#0047ba] transition-colors mb-3 leading-snug">
                                    <a href="{{ $job->read_url }}">
                                        {{ $job->title }}
                                    </a>
                                </h3>

                                <!-- Location & Experience Badges -->
                                <div class="flex flex-wrap items-center gap-2 mb-4 text-[11px] text-slate-500 font-medium">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-slate-50 border border-slate-200">
                                        <i class="fa-solid fa-location-dot text-[#0047ba]"></i>
                                        <span>{{ $job->location }}</span>
                                    </span>
                                    @if($job->experience_level)
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-slate-50 border border-slate-200">
                                            <i class="fa-solid fa-graduation-cap text-slate-400"></i>
                                            <span>{{ $job->experience_level }}</span>
                                        </span>
                                    @endif
                                </div>

                                <!-- Role Summary Description -->
                                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mb-6 line-clamp-3">
                                    {{ $job->description }}
                                </p>
                            </div>

                            <!-- Bottom Action Buttons -->
                            <div class="space-y-2 pt-5 border-t border-slate-100">
                                <a href="{{ $job->read_url }}" 
                                   class="w-full text-center py-2.5 px-4 rounded-xl bg-[#0047ba] text-white text-xs font-bold hover:bg-blue-700 transition-colors shadow-md shadow-blue-500/20 flex items-center justify-center gap-1.5 active:scale-95">
                                    <span>View Role Details</span>
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </a>

                                <button type="button" 
                                        onclick="openApplicationModal('{{ addslashes($job->title) }}', {{ $job->id }})" 
                                        class="w-full text-center py-2.5 px-4 rounded-xl bg-blue-50 text-[#0047ba] hover:bg-blue-600 hover:text-white text-xs font-bold transition-all flex items-center justify-center gap-1.5 border border-blue-200 active:scale-95 shadow-sm cursor-pointer">
                                    <i class="fa-solid fa-briefcase text-[11px]"></i>
                                    <span>Quick Apply</span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-3xl p-12 text-center border border-slate-200 shadow-sm max-w-xl mx-auto">
                    <div class="w-16 h-16 rounded-2xl bg-blue-50 text-[#0047ba] flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">No Openings Found</h3>
                    <p class="text-xs text-slate-500 mb-6 leading-relaxed">
                        We couldn't find any job positions matching your search criteria. Try adjusting your filters or check back later!
                    </p>
                    <a href="{{ route('careers.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-[#0047ba] hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-md">
                        <i class="fa-solid fa-rotate-left"></i>
                        <span>Reset All Filters</span>
                    </a>
                </div>
            @endif

        </div>
    </section>

    <!-- General Talent Pool CTA Banner -->
    <section class="py-16 bg-gradient-to-r from-[#003896] to-[#0047ba] text-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-white/10 text-blue-100 text-xs font-extrabold uppercase tracking-wider mb-4 border border-white/20">
                <i class="fa-solid fa-paper-plane"></i>
                <span>Talent Community</span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-black mb-4 tracking-tight">
                Don’t See the Right Role For You?
            </h2>
            <p class="text-blue-100 text-xs sm:text-base max-w-2xl mx-auto mb-8 leading-relaxed font-normal">
                We are always excited to connect with talented innovators, engineers, sales leaders, and creators. Send your CV directly to our Talent Acquisition team.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="mailto:hr.specialist@globaltronics.net?subject=General%20Application:%20Globaltronics%20Talent%20Pool" 
                   class="inline-flex items-center gap-2 px-8 py-3.5 rounded-full bg-white text-[#0047ba] hover:bg-blue-50 text-xs font-bold uppercase tracking-wider transition-all shadow-xl active:scale-95">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Submit General Resume</span>
                </a>
                <a href="{{ url('/#contact') }}" 
                   class="inline-flex items-center gap-2 px-8 py-3.5 rounded-full bg-blue-800/60 hover:bg-blue-800 text-white text-xs font-bold uppercase tracking-wider transition-all border border-blue-400/30">
                    <i class="fa-solid fa-phone"></i>
                    <span>Contact Us</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Job Application Modal -->
    @include('careers.partials.application-modal')
</div>

@push('scripts')
<script>
    // Count-Up Animation for Career Metrics
    function initCareerCounters() {
        const counters = document.querySelectorAll('.stat-counter');
        if (!counters.length) return;

        let hasAnimated = false;

        function startCountAnimation() {
            if (hasAnimated) return;
            hasAnimated = true;

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'), 10) || 0;
                const suffix = counter.getAttribute('data-suffix') || '';
                const duration = 1600; // ms
                const startTime = performance.now();

                function updateCounter(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    // Smooth ease-out cubic
                    const ease = 1 - Math.pow(1 - progress, 3);
                    const currentVal = Math.round(ease * target);
                    counter.textContent = currentVal + suffix;

                    if (progress < 1) {
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target + suffix;
                    }
                }

                requestAnimationFrame(updateCounter);
            });
        }

        const metricsGrid = document.getElementById('career-metrics-grid');
        if ('IntersectionObserver' in window && metricsGrid) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        startCountAnimation();
                        observer.disconnect();
                    }
                });
            }, { threshold: 0.2 });
            observer.observe(metricsGrid);
        } else {
            startCountAnimation();
        }
    }

    document.addEventListener('DOMContentLoaded', initCareerCounters);

    function openApplicationModal(roleTitle, careerId) {
        document.getElementById('modal-role-title').innerText = roleTitle;
        document.getElementById('modal-job-title-input').value = roleTitle;
        document.getElementById('modal-career-id').value = careerId || '';

        document.getElementById('app-success-box').classList.add('hidden');
        document.getElementById('app-error-box').classList.add('hidden');
        document.getElementById('job-application-form').classList.remove('hidden');

        const modal = document.getElementById('application-modal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeApplicationModal() {
        const modal = document.getElementById('application-modal');
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }

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

    window.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeApplicationModal();
        }
    });
</script>
@endpush
@endsection
