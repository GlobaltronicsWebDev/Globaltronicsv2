@extends('layouts.app')

@section('title', $solution->title . ' - Services | Globaltronics')

@section('content')
<!-- Hero Header with Image Overlay (Matching User Image 2 Header) -->
<section class="relative bg-gradient-to-r from-[#002f7d] via-[#0047ba] to-blue-950 text-white py-14 sm:py-20 lg:py-24 border-t border-blue-800 overflow-hidden">
    
    <!-- Ambient Background Image Backdrop with Dark/Blue Opacity -->
    <div class="absolute inset-0 z-0 opacity-25 mix-blend-overlay">
        <img src="{{ $solution->image_url }}" alt="{{ $solution->title }}" class="w-full h-full object-cover blur-sm">
    </div>
    <div class="absolute inset-0 bg-[#003896]/60 z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        
        <!-- Breadcrumbs Navigation -->
        <nav class="flex items-center justify-center space-x-2 text-[11px] uppercase tracking-wider text-blue-200 font-bold mb-4">
            <a href="{{ url('/') }}" class="hover:text-white transition-colors">Home</a>
            <span class="text-blue-400">/</span>
            <a href="{{ route('solutions.index') }}" class="hover:text-white transition-colors">Services</a>
            <span class="text-blue-400">/</span>
            <span class="text-yellow-300 truncate max-w-xs">{{ $solution->category }}</span>
        </nav>

        <!-- Big Bold Centered Title (Matching Image 2) -->
        <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black uppercase tracking-wider text-white drop-shadow-md max-w-4xl mx-auto leading-tight">
            {{ $solution->title }}
        </h1>
    </div>
</section>

<!-- Main Details Section (Split 2-Column Matching User Image 2) -->
<section class="py-16 sm:py-20 lg:py-24 bg-white text-slate-800 relative z-10 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            
            <!-- Left Column: Large Display Photo -->
            <div class="lg:col-span-6">
                <div class="relative rounded-2xl overflow-hidden shadow-xl border border-slate-200 bg-slate-900 aspect-[4/3] group">
                    <img src="{{ $solution->image_url }}" 
                         alt="{{ $solution->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                    <div class="absolute bottom-4 left-4">
                        <span class="px-3.5 py-1.5 rounded-full bg-black/70 backdrop-blur-md text-white text-[11px] font-extrabold uppercase tracking-wider border border-white/20">
                            {{ $solution->category }}
                        </span>
                    </div>
                </div>

                @if($solution->location)
                    <div class="mt-3 flex items-center gap-2 text-xs font-semibold text-slate-500">
                        <i class="fa-solid fa-location-dot text-[#0047ba]"></i>
                        <span>{{ $solution->location }}</span>
                    </div>
                @endif
            </div>

            <!-- Right Column: Features, Highlights & CTA (Matching Image 2) -->
            <div class="lg:col-span-6 space-y-6">
                
                <!-- Section Heading (Matching Image 2) -->
                <div>
                    <h2 class="text-xl sm:text-2xl font-black uppercase tracking-wider text-slate-900 mb-2">
                        SYSTEM FEATURES & HIGHLIGHTS
                    </h2>
                    <div class="w-16 h-1 bg-[#0047ba] rounded-full mb-6"></div>
                </div>

                <!-- Features Bullets List -->
                @if(!empty($solution->features))
                    <div class="space-y-4 text-slate-700 text-sm sm:text-base leading-relaxed">
                        @foreach(preg_split('/\r\n|\r|\n/', $solution->features) as $line)
                            @if(trim($line))
                                <div class="flex items-start gap-3">
                                    <span class="text-slate-800 text-base leading-none mt-1 shrink-0 font-bold">•</span>
                                    <p class="text-slate-700 text-sm sm:text-base leading-relaxed">
                                        {{ ltrim(trim($line), '•- ') }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <p class="text-slate-600 text-sm leading-relaxed">
                        {{ $solution->short_description }}
                    </p>
                @endif

                <!-- Technical Specs Pill Badge (if available) -->
                @if($solution->specs)
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-50 border border-blue-200 text-[#0047ba] text-xs font-bold">
                        <i class="fa-solid fa-microchip"></i>
                        <span>Specifications: {{ $solution->specs }}</span>
                    </div>
                @endif

                <!-- Book Your Ads Now Action Button (Matching Image 2) -->
                <div class="pt-4">
                    <a href="{{ $solution->booking_url }}" 
                       class="inline-block px-9 py-3.5 rounded-full bg-[#0047ba] hover:bg-blue-700 text-white font-extrabold text-xs sm:text-sm uppercase tracking-wider transition-all shadow-lg hover:shadow-blue-600/30 active:scale-95">
                        {{ $solution->cta_label ?: 'BOOK YOUR ADS NOW' }}
                    </a>
                </div>

            </div>

        </div>

        <!-- Explore More Systems -->
        @if($relatedSolutions->isNotEmpty())
            <div class="mt-24 pt-12 border-t border-slate-200">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl sm:text-2xl font-black uppercase tracking-wider text-slate-900">
                            MORE LED DISPLAY SYSTEMS
                        </h3>
                        <p class="text-xs text-slate-500 mt-1">Explore additional landmark installations nationwide.</p>
                    </div>
                    <a href="{{ route('solutions.index') }}" class="text-xs font-bold text-[#0047ba] hover:underline flex items-center gap-1.5">
                        <span>View All Systems</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedSolutions as $related)
                        <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl border border-slate-200 flex flex-col justify-between transition-all hover:-translate-y-1 group">
                            <a href="{{ $related->read_url }}" class="block aspect-[16/11] overflow-hidden bg-slate-900">
                                <img src="{{ $related->image_url }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </a>
                            <div class="p-5 flex-1 flex flex-col justify-between text-center">
                                <div>
                                    <h4 class="text-sm font-extrabold text-[#0047ba] uppercase line-clamp-1 mb-2">
                                        <a href="{{ $related->read_url }}">{{ $related->title }}</a>
                                    </h4>
                                    <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed">
                                        {{ $related->short_description }}
                                    </p>
                                </div>
                                <div class="mt-4 pt-3 border-t border-slate-100">
                                    <a href="{{ $related->read_url }}" class="text-xs font-bold text-[#0047ba] hover:underline inline-flex items-center gap-1">
                                        <span>View Details</span>
                                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>
@endsection
