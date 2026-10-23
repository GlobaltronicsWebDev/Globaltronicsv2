@extends('layouts.app')

@section('title', 'Digital Design & Consultancy | Globaltronics')

@section('content')
<!-- Hero Header Banner (Matching User Image 1) -->
<section class="relative bg-gradient-to-r from-[#002f7d] via-[#0047ba] to-indigo-950 text-white py-16 sm:py-24 lg:py-28 border-t border-blue-800 overflow-hidden">
    
    <!-- Ambient Artwork Backdrop -->
    <div class="absolute inset-0 z-0 opacity-40 mix-blend-overlay">
        <img src="{{ asset('assets/images/services/consultancy/hero_banner.png') }}" 
             alt="Digital Design Consultancy" 
             class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-[#003896]/65 z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        
        <!-- Breadcrumbs Navigation -->
        <nav class="flex items-center justify-center space-x-2 text-[11px] uppercase tracking-wider text-blue-200 font-bold mb-4">
            <a href="{{ url('/') }}" class="hover:text-white transition-colors">Home</a>
            <span class="text-blue-400">/</span>
            <span class="text-blue-200">Services</span>
            <span class="text-blue-400">/</span>
            <span class="text-yellow-300">Digital Design Consultancy</span>
        </nav>

        <!-- Big Bold Uppercase Title (Matching User Image 1) -->
        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black uppercase tracking-wider text-white drop-shadow-md max-w-4xl mx-auto leading-tight">
            DIGITAL DESIGN CONSULTANCY
        </h1>
        
        <p class="text-blue-100 text-sm sm:text-base max-w-2xl mx-auto mt-4 font-medium leading-relaxed">
            Transforming data and creative visions into rich, structured, and immersive interactive digital experiences.
        </p>
    </div>
</section>

<!-- Content & Services Section (Matching User Image 1, 2, and 3) -->
<section class="py-16 sm:py-20 lg:py-24 bg-white text-slate-800 relative z-10 border-b border-slate-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Introductory Copy (Matching User Image 1) -->
        <div class="max-w-4xl mx-auto text-center space-y-6 text-slate-600 text-sm sm:text-base leading-relaxed">
            <p>
                Globaltronics, Inc. Creatives Team transforms electronic data files into rich and structured interactive digital content. This is accomplished through a combination of advanced technology, a rich library of ready content, and highly experienced graphic designers and programmers.
            </p>
            <p>
                Our content management services can be classified as content creation, classification, cleansing, and enrichment.<br class="hidden sm:inline">
                We specialize in providing rich fully attributed content. We can deliver them as hard copy catalogs or in electronic formats like PDF, XLS, CSV, text, etc.<br class="hidden sm:inline">
                We can do any layout required by our customers for any digital signage solution.
            </p>
        </div>

        <!-- Section Title (Matching User Image 1 & 2) -->
        <div class="mt-16 sm:mt-20 mb-12 sm:mb-16 text-center">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black uppercase tracking-wider text-slate-900">
                WHAT WE DO
            </h2>
            <div class="w-16 h-1 bg-[#0047ba] rounded-full mx-auto mt-3"></div>
        </div>

        <!-- Top Row Services (3 Columns - Matching User Image 2) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-10 lg:gap-12">
            
            <!-- 1. Motion Graphics -->
            <div class="flex flex-col items-center text-center p-6 rounded-2xl transition-all duration-300 hover:-translate-y-1 hover:shadow-lg border border-transparent hover:border-slate-100 group">
                <div class="w-28 h-28 flex items-center justify-center mb-6">
                    <img src="{{ asset('assets/images/services/consultancy/icon_motion.png') }}" 
                         alt="Motion Graphics" 
                         class="max-h-24 max-w-24 object-contain group-hover:scale-110 transition-transform duration-300">
                </div>
                <h3 class="text-base sm:text-lg font-extrabold uppercase tracking-wide text-[#0047ba] mb-3">
                    MOTION GRAPHICS
                </h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed max-w-xs">
                    We specialize in creating motion graphics which can attract the imagination of people. With high-impact designs, a glance can turn into a lingering and appreciative look.
                </p>
            </div>

            <!-- 2. Prints -->
            <div class="flex flex-col items-center text-center p-6 rounded-2xl transition-all duration-300 hover:-translate-y-1 hover:shadow-lg border border-transparent hover:border-slate-100 group">
                <div class="w-28 h-28 flex items-center justify-center mb-6">
                    <img src="{{ asset('assets/images/services/consultancy/icon_prints.png') }}" 
                         alt="Prints" 
                         class="max-h-24 max-w-24 object-contain group-hover:scale-110 transition-transform duration-300">
                </div>
                <h3 class="text-base sm:text-lg font-extrabold uppercase tracking-wide text-[#0047ba] mb-3">
                    PRINTS
                </h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed max-w-xs">
                    We are also reliable when it comes to print design. We can produce posters and other collateral materials which you might need in campaigns or events.
                </p>
            </div>

            <!-- 3. Flash Application -->
            <div class="flex flex-col items-center text-center p-6 rounded-2xl transition-all duration-300 hover:-translate-y-1 hover:shadow-lg border border-transparent hover:border-slate-100 group">
                <div class="w-28 h-28 flex items-center justify-center mb-6">
                    <img src="{{ asset('assets/images/services/consultancy/icon_flash.png') }}" 
                         alt="Flash Application" 
                         class="max-h-24 max-w-24 object-contain group-hover:scale-110 transition-transform duration-300">
                </div>
                <h3 class="text-base sm:text-lg font-extrabold uppercase tracking-wide text-[#0047ba] mb-3">
                    FLASH APPLICATION
                </h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed max-w-xs">
                    Animation is really possible with our key persons who are well-trained in using Flash Design. They will guarantee that your website will be appealing, engaging and interactive way.
                </p>
            </div>

        </div>

        <!-- Bottom Row Services (2 Columns Centered - Matching User Image 3) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-10 lg:gap-12 max-w-3xl mx-auto mt-8 sm:mt-12">
            
            <!-- 4. Web Design -->
            <div class="flex flex-col items-center text-center p-6 rounded-2xl transition-all duration-300 hover:-translate-y-1 hover:shadow-lg border border-transparent hover:border-slate-100 group">
                <div class="w-28 h-28 flex items-center justify-center mb-6">
                    <img src="{{ asset('assets/images/services/consultancy/icon_web.png') }}" 
                         alt="Web Design" 
                         class="max-h-24 max-w-24 object-contain group-hover:scale-110 transition-transform duration-300">
                </div>
                <h3 class="text-base sm:text-lg font-extrabold uppercase tracking-wide text-[#0047ba] mb-3">
                    WEB DESIGN
                </h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed max-w-xs">
                    We build new websites and redesign websites.
                </p>
            </div>

            <!-- 5. 3D Design -->
            <div class="flex flex-col items-center text-center p-6 rounded-2xl transition-all duration-300 hover:-translate-y-1 hover:shadow-lg border border-transparent hover:border-slate-100 group">
                <div class="w-28 h-28 flex items-center justify-center mb-6">
                    <img src="{{ asset('assets/images/services/consultancy/icon_3d.png') }}" 
                         alt="3D Design" 
                         class="max-h-28 max-w-28 object-contain group-hover:scale-110 transition-transform duration-300">
                </div>
                <h3 class="text-base sm:text-lg font-extrabold uppercase tracking-wide text-[#0047ba] mb-3">
                    3D DESIGN
                </h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed max-w-xs">
                    We have multimedia artists, who can create three-dimensional models using latest software programs and tools.
                </p>
            </div>

        </div>

        <!-- View Our Portfolio CTA Button (Matching User Image 3) -->
        <div class="mt-16 sm:mt-20 text-center">
            <a href="{{ url('/#contact') }}" 
               class="inline-block px-10 py-4 rounded-full bg-[#0047ba] hover:bg-blue-700 text-white font-extrabold text-xs sm:text-sm uppercase tracking-wider shadow-lg hover:shadow-blue-600/30 transition-all duration-300 transform hover:-translate-y-0.5 active:scale-95">
                VIEW OUR PORTFOLIO
            </a>
        </div>

    </div>
</section>
@endsection
