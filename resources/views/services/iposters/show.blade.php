@extends('layouts.app')

@section('title', $iposter->title . ' - Digital iPosters | Globaltronics')

@section('content')
<!-- Hero Header Section with Ambient Mall Photo Overlay -->
<section class="relative bg-gradient-to-r from-[#002f7d] via-[#0047ba] to-indigo-950 text-white py-14 sm:py-20 lg:py-24 border-t border-blue-800 overflow-hidden">
    
    <!-- Ambient Background Image Backdrop -->
    <div class="absolute inset-0 z-0 opacity-25 mix-blend-overlay">
        <img src="{{ $iposter->image_url }}" alt="{{ $iposter->title }}" class="w-full h-full object-cover blur-sm">
    </div>
    <div class="absolute inset-0 bg-[#003896]/65 z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        
        <!-- Breadcrumbs Navigation -->
        <nav class="flex items-center justify-center space-x-2 text-[11px] uppercase tracking-wider text-blue-200 font-bold mb-4">
            <a href="{{ url('/') }}" class="hover:text-white transition-colors">Home</a>
            <span class="text-blue-400">/</span>
            <a href="{{ route('services.iposters.index') }}" class="hover:text-white transition-colors">Services</a>
            <span class="text-blue-400">/</span>
            <a href="{{ route('services.iposters.index') }}" class="hover:text-white transition-colors">Digital iPosters</a>
            <span class="text-blue-400">/</span>
            <span class="text-yellow-300 truncate max-w-xs">{{ $iposter->title }}</span>
        </nav>

        <!-- Big Bold Centered Title -->
        <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black uppercase tracking-wider text-white drop-shadow-md max-w-4xl mx-auto leading-tight">
            {{ $iposter->title }}
        </h1>

        @if($iposter->mall_or_location)
            <p class="text-blue-100 text-xs sm:text-sm font-semibold mt-2 flex items-center justify-center gap-1.5">
                <i class="fa-solid fa-location-dot text-yellow-300"></i>
                <span>{{ $iposter->mall_or_location }}</span>
            </p>
        @endif
    </div>
</section>

<!-- Main Details Section (Split 2-Column Presentation) -->
<section class="py-16 sm:py-20 lg:py-24 bg-white text-slate-800 relative z-10 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
            
            <!-- Left Column: Large Display Photo & Quick Switcher -->
            <div class="lg:col-span-6 space-y-4">
                <div class="relative rounded-2xl overflow-hidden shadow-xl border border-slate-200 bg-slate-900 aspect-[4/3] group">
                    <img id="mainHeroImage" 
                         src="{{ $iposter->image_url }}" 
                         alt="{{ $iposter->title }}" 
                         class="w-full h-full object-cover transition-all duration-500 ease-out cursor-pointer"
                         onclick="openLightbox(this.src, '{{ $iposter->title }}')">
                    
                    <div class="absolute bottom-4 left-4 pointer-events-none">
                        <span class="px-3.5 py-1.5 rounded-full bg-black/70 backdrop-blur-md text-white text-[11px] font-extrabold uppercase tracking-wider border border-white/20">
                            Digital iPoster Kiosk
                        </span>
                    </div>

                    @if($iposter->daily_traffic)
                        <div class="absolute top-4 right-4 pointer-events-none">
                            <span class="px-3.5 py-1.5 rounded-full bg-black/70 backdrop-blur-md text-yellow-300 text-[11px] font-extrabold uppercase tracking-wider border border-white/20">
                                <i class="fa-solid fa-users text-[10px] mr-1"></i>
                                {{ $iposter->daily_traffic }}
                            </span>
                        </div>
                    @endif

                    <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                        <span class="px-4 py-2 rounded-full bg-white/90 text-slate-900 text-xs font-black uppercase tracking-wider shadow-lg flex items-center gap-2">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                            <span>Click to Zoom</span>
                        </span>
                    </div>
                </div>

                <!-- Thumbnail Switcher if Multiple Gallery Photos Exist -->
                @if(count($iposter->gallery_list) > 1)
                    <div class="flex items-center gap-2.5 overflow-x-auto pb-2 pt-1 scrollbar-thin">
                        @foreach($iposter->gallery_list as $gIndex => $gThumb)
                            <button type="button" 
                                    onclick="switchMainHeroImage('{{ $gThumb }}', this)" 
                                    class="w-16 h-14 sm:w-20 sm:h-16 rounded-xl overflow-hidden border-2 transition-all shrink-0 {{ $loop->first ? 'border-[#0047ba] ring-2 ring-blue-500/30' : 'border-slate-200 hover:border-blue-400 opacity-70 hover:opacity-100' }}">
                                <img src="{{ $gThumb }}" alt="Thumb {{ $gIndex + 1 }}" class="w-full h-full object-cover">
                            </button>
                        @endforeach
                    </div>
                @endif

                @if($iposter->mall_or_location)
                    <div class="flex items-center gap-2 text-xs font-semibold text-slate-500">
                        <i class="fa-solid fa-location-dot text-[#0047ba]"></i>
                        <span>{{ $iposter->mall_or_location }}</span>
                    </div>
                @endif
            </div>

            <!-- Right Column: Features, Specs & Booking Button -->
            <div class="lg:col-span-6 space-y-6">
                
                <div>
                    <h2 class="text-xl sm:text-2xl font-black uppercase tracking-wider text-slate-900 mb-2">
                        IPOSTERS FEATURES & HIGHLIGHTS
                    </h2>
                    <div class="w-16 h-1 bg-[#0047ba] rounded-full mb-6"></div>
                </div>

                <!-- Features Bullets List -->
                @if(!empty($iposter->features))
                    <div class="space-y-4 text-slate-700 text-sm sm:text-base leading-relaxed">
                        @foreach(preg_split('/\r\n|\r|\n/', $iposter->features) as $line)
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
                        {{ $iposter->short_description ?: 'High-impact digital iPoster advertising network capturing shopper foot traffic.' }}
                    </p>
                @endif

                <!-- Technical Specs Pill Badge -->
                @if($iposter->specifications)
                    <div class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-50 border border-blue-200 text-[#0047ba] text-xs font-bold">
                        <i class="fa-solid fa-microchip"></i>
                        <span>Specifications: {{ $iposter->specifications }}</span>
                    </div>
                @endif

                <!-- Book Your iPoster Ads Now Action Button -->
                <div class="pt-4">
                    <a href="{{ $iposter->booking_url }}" 
                       class="inline-block px-9 py-3.5 rounded-full bg-[#0047ba] hover:bg-blue-700 text-white font-extrabold text-xs sm:text-sm uppercase tracking-wider transition-all shadow-lg hover:shadow-blue-600/30 active:scale-95">
                        {{ $iposter->cta_label ?: 'BOOK YOUR IPOSTER ADS NOW' }}
                    </a>
                </div>

            </div>

        </div>

        <!-- ========================================== -->
        <!-- PHOTO GALLERY & MALL INSTALLATIONS SECTION -->
        <!-- Matches reference screenshot exactly       -->
        <!-- ========================================== -->
        @if(!empty($iposter->gallery_list))
            <div class="mt-20 pt-16 border-t border-slate-200" id="gallery">
                
                <!-- Gallery Heading & Intro Copy -->
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-blue-50 border border-blue-200 text-[#0047ba] text-xs font-black uppercase tracking-wider mb-3">
                        <i class="fa-solid fa-camera"></i>
                        <span>Actual Mall Installations</span>
                    </div>
                    
                    <h2 class="text-2xl sm:text-3xl font-black uppercase tracking-wide text-slate-900 mb-3">
                        Experience the future of indoor advertising at {{ $iposter->mall_or_location ?: $iposter->title }}!
                    </h2>
                    <div class="w-16 h-1 bg-[#0047ba] rounded-full mx-auto mb-4"></div>
                    
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                        Our iPosters are available at various locations throughout our malls, providing maximum visibility and exposure for your brand. Don't miss out on this opportunity to elevate your brand's visibility and reach a wider audience. Contact us today to learn more about how iPosters can help you achieve your marketing goals!
                    </p>
                </div>

                <!-- 3-Column Responsive Photo Grid (Matching Reference Screenshot) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    @foreach($iposter->gallery_list as $index => $galleryImage)
                        <div class="relative bg-slate-900 rounded-2xl overflow-hidden shadow-md hover:shadow-2xl border border-slate-200 group cursor-pointer aspect-square"
                             onclick="openLightbox('{{ $galleryImage }}', '{{ $iposter->title }} - Angle {{ $index + 1 }}')">
                            
                            <img src="{{ $galleryImage }}" 
                                 alt="{{ $iposter->title }} installation {{ $index + 1 }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/20 opacity-80 group-hover:opacity-60 transition-opacity"></div>
                            
                            <!-- Location Overlay for specific known angles -->
                            @if($loop->first && Str::contains($iposter->title, ['GLORIETTA', 'Glorietta']))
                                <div class="absolute bottom-4 inset-x-4 text-center">
                                    <span class="text-white font-black text-xs sm:text-sm uppercase tracking-wider drop-shadow-md">
                                        GLORIETTA 1 ENTRANCE FACING SM MAKATI
                                    </span>
                                </div>
                            @else
                                <div class="absolute bottom-4 inset-x-4 text-center">
                                    <span class="text-white font-black text-[11px] sm:text-xs uppercase tracking-wider drop-shadow-md">
                                        {{ $iposter->title }} • INSTALLATION {{ $index + 1 }}
                                    </span>
                                </div>
                            @endif

                            <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="w-8 h-8 rounded-full bg-black/60 backdrop-blur-md text-white flex items-center justify-center text-xs">
                                    <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        @endif

        <!-- Related Deployments -->
        @if($relatedIposters->isNotEmpty())
            <div class="mt-24 pt-12 border-t border-slate-200">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl sm:text-2xl font-black uppercase tracking-wider text-slate-900">
                            MORE IPOSTER MALL LOCATIONS
                        </h3>
                        <p class="text-xs text-slate-500 mt-1">Explore additional premier mall deployments across the Philippines.</p>
                    </div>
                    <a href="{{ route('services.iposters.index') }}" class="text-xs font-bold text-[#0047ba] hover:underline flex items-center gap-1.5">
                        <span>View All Locations</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedIposters as $related)
                        <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl border border-slate-200 flex flex-col justify-between transition-all hover:-translate-y-1 group">
                            <a href="{{ $related->read_url }}" class="block aspect-[16/11] overflow-hidden bg-slate-900">
                                <img src="{{ $related->image_url }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </a>
                            <div class="p-5 flex-1 flex flex-col justify-between text-center">
                                <div>
                                    <h4 class="text-sm font-extrabold text-[#0047ba] uppercase line-clamp-1 mb-1">
                                        <a href="{{ $related->read_url }}">{{ $related->title }}</a>
                                    </h4>
                                    <p class="text-[11px] font-bold text-slate-500 mb-2">
                                        {{ $related->mall_or_location ?: 'Premier Mall' }}
                                    </p>
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

<!-- Lightbox Modal for High-Res Inspection -->
<div id="lightboxModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/90 backdrop-blur-md opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="relative max-w-5xl w-full max-h-[90vh] flex flex-col items-center">
        
        <button type="button" 
                onclick="closeLightbox()" 
                class="absolute -top-12 right-0 text-white/80 hover:text-white text-2xl font-bold p-2 focus:outline-none transition-colors">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="rounded-2xl overflow-hidden shadow-2xl border border-white/20 bg-slate-950 max-h-[80vh] flex items-center justify-center">
            <img id="lightboxImage" src="" alt="Zoomed view" class="max-h-[80vh] max-w-full object-contain">
        </div>

        <p id="lightboxCaption" class="text-white text-xs sm:text-sm font-bold mt-4 tracking-wide uppercase text-center"></p>
    </div>
</div>

<script>
    function switchMainHeroImage(src, btn) {
        const hero = document.getElementById('mainHeroImage');
        hero.style.opacity = '0.3';
        setTimeout(() => {
            hero.src = src;
            hero.style.opacity = '1';
        }, 150);

        // Update active border on buttons
        const allBtns = btn.parentElement.querySelectorAll('button');
        allBtns.forEach(b => {
            b.classList.remove('border-[#0047ba]', 'ring-2', 'ring-blue-500/30', 'opacity-100');
            b.classList.add('border-slate-200', 'opacity-70');
        });
        btn.classList.remove('border-slate-200', 'opacity-70');
        btn.classList.add('border-[#0047ba]', 'ring-2', 'ring-blue-500/30', 'opacity-100');
    }

    function openLightbox(src, caption) {
        const modal = document.getElementById('lightboxModal');
        const img = document.getElementById('lightboxImage');
        const cap = document.getElementById('lightboxCaption');

        img.src = src;
        cap.textContent = caption;

        modal.classList.remove('opacity-0', 'pointer-events-none');
    }

    function closeLightbox() {
        const modal = document.getElementById('lightboxModal');
        modal.classList.add('opacity-0', 'pointer-events-none');
    }

    // Close modal on Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });

    // Close on backdrop click
    document.getElementById('lightboxModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeLightbox();
        }
    });
</script>
@endsection
