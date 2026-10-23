@extends('layouts.app')

@section('title', 'Digital Display Kiosk Installations | Globaltronics Reference Projects')

@section('content')
<!-- Hero Banner -->
<section class="relative bg-gradient-to-r from-[#001f54] via-[#0047ba] to-blue-900 text-white py-16 sm:py-24 border-t border-blue-800 overflow-hidden">
    <div class="absolute inset-0 opacity-15 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:20px_20px] pointer-events-none"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-white text-xs font-black uppercase tracking-wider mb-4">
            <i class="fa-solid fa-tablet-screen-button"></i>
            <span>Interactive Displays</span>
        </div>

        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black uppercase tracking-tight text-white mb-4 drop-shadow-md">
            DIGITAL DISPLAY KIOSK INSTALLATIONS
        </h1>

        <p class="text-blue-100 text-sm sm:text-base max-w-3xl font-normal leading-relaxed">
            Our custom interactive digital kiosks engage customers at a glance, delivering dynamic touchscreen interaction and exciting visual experiences that amplify customer brand equity.
        </p>
    </div>
</section>

<!-- Projects Showcase Grid -->
<section class="py-16 sm:py-20 bg-[#f8fafc] border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Grid Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200 mb-10">
            <div>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 uppercase tracking-tight">
                    Custom Interactive Kiosks
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">
                    Click any freestanding kiosk installation below to view full details.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <span class="px-3.5 py-1 rounded-full bg-blue-50 text-[#0047ba] border border-blue-200 text-xs font-extrabold uppercase">
                    5 Custom Deployments
                </span>
            </div>
        </div>

        <!-- Project Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $index => $item)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl border border-slate-200 overflow-hidden flex flex-col group transition-all duration-300 transform hover:-translate-y-1.5 cursor-pointer"
                     onclick="openProjectLightbox('{{ asset($item['image']) }}', '{{ addslashes($item['title']) }}', '{{ addslashes($item['description']) }}')">
                    
                    <div class="relative aspect-[3/4] sm:aspect-[4/5] w-full overflow-hidden bg-slate-900">
                        <img src="{{ asset($item['image']) }}" 
                             alt="{{ $item['title'] }}" 
                             class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                        
                        <div class="absolute inset-0 bg-[#0047ba]/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="w-12 h-12 rounded-full bg-white/90 text-[#0047ba] flex items-center justify-center text-lg shadow-xl transform scale-75 group-hover:scale-100 transition-transform duration-300">
                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                            </div>
                        </div>

                        <div class="absolute top-3 left-3">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-slate-950/80 text-white backdrop-blur-sm border border-white/20">
                                {{ $item['category'] }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col justify-between border-t border-slate-100">
                        <div>
                            <h3 class="text-base sm:text-lg font-black text-slate-900 uppercase tracking-wide group-hover:text-[#0047ba] transition-colors mb-2">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-xs text-slate-600 leading-relaxed line-clamp-3">
                                {{ $item['description'] }}
                            </p>
                        </div>

                        <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-[#0047ba]">
                            <span>Enlarge Kiosk View</span>
                            <i class="fa-solid fa-arrow-up-right-from-square text-[11px] group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Call to Action -->
        <div class="mt-16 bg-gradient-to-r from-[#0047ba] to-blue-800 rounded-3xl p-8 sm:p-12 text-white shadow-xl flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="max-w-2xl text-center lg:text-left">
                <span class="px-3 py-1 rounded-full bg-white/20 text-white text-[11px] font-extrabold uppercase tracking-wider mb-3 inline-block">
                    Touchscreen Hardware & Software Integration
                </span>
                <h3 class="text-2xl sm:text-3xl font-black uppercase tracking-tight text-white mb-2">
                    Customize Touchscreen Kiosks for Your Location
                </h3>
                <p class="text-blue-100 text-xs sm:text-sm leading-relaxed">
                    We fabricate custom kiosk housings, integrate capacitive multi-touch displays, and develop interactive wayfinding and promotional apps.
                </p>
            </div>
            <div class="flex flex-wrap gap-3 justify-center shrink-0">
                <a href="mailto:info@globaltronics.net?subject=Digital%20Kiosk%20Inquiry" 
                   class="px-8 py-3.5 bg-white text-[#0047ba] hover:bg-yellow-400 hover:text-slate-950 font-black text-xs uppercase tracking-wider rounded-xl shadow-lg transition-all transform active:scale-95">
                    Request Kiosk Specs
                </a>
                <a href="{{ route('services.iposters.index') }}" 
                   class="px-6 py-3.5 bg-blue-700/60 hover:bg-blue-700 text-white font-black text-xs uppercase tracking-wider rounded-xl border border-white/20 transition-all">
                    Explore Digital iPosters
                </a>
            </div>
        </div>

    </div>
</section>

<!-- Lightbox Modal -->
<div id="project-lightbox" class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden items-center justify-center p-4" onclick="closeProjectLightbox(event)">
    <div class="relative max-w-5xl w-full bg-slate-950 rounded-2xl overflow-hidden shadow-2xl border border-white/10" onclick="event.stopPropagation()">
        
        <button onclick="closeProjectLightboxDirect()" 
                class="absolute top-4 right-4 z-20 w-10 h-10 rounded-full bg-black/60 text-white flex items-center justify-center hover:bg-red-600 transition-colors"
                title="Close (Esc)">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <div class="relative w-full max-h-[75vh] flex items-center justify-center bg-black">
            <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[75vh] object-contain">
        </div>

        <div class="p-6 bg-slate-900 border-t border-slate-800 text-white">
            <h4 id="lightbox-title" class="text-lg font-black uppercase text-yellow-400 mb-1"></h4>
            <p id="lightbox-desc" class="text-xs text-slate-300 leading-relaxed"></p>
        </div>
    </div>
</div>

<script>
    function openProjectLightbox(src, title, desc) {
        document.getElementById('lightbox-img').src = src;
        document.getElementById('lightbox-title').innerText = title;
        document.getElementById('lightbox-desc').innerText = desc;
        const modal = document.getElementById('project-lightbox');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeProjectLightboxDirect() {
        const modal = document.getElementById('project-lightbox');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    function closeProjectLightbox(e) {
        if (e.target.id === 'project-lightbox') {
            closeProjectLightboxDirect();
        }
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeProjectLightboxDirect();
        }
    });
</script>
@endsection
