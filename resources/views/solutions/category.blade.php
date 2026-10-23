@extends('layouts.app')

@section('title', $category['title'] . ' | Globaltronics Solutions')

@section('content')
<!-- Hero Banner -->
<section class="relative bg-gradient-to-r from-[#001f54] via-[#0047ba] to-blue-900 text-white py-16 sm:py-24 border-t border-blue-800 overflow-hidden">
    <div class="absolute inset-0 opacity-15 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:20px_20px] pointer-events-none"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumbs -->
        <nav class="flex items-center space-x-2 text-xs text-blue-200 uppercase font-bold tracking-wider mb-4">
            <a href="{{ route('home') }}" class="hover:text-yellow-300 transition-colors">Home</a>
            <span class="text-blue-400">/</span>
            <span class="text-blue-300">Solutions</span>
            <span class="text-blue-400">/</span>
            <span class="text-white">{{ $category['title'] }}</span>
        </nav>

        <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-white text-xs font-black uppercase tracking-wider mb-4">
            <i class="fa-solid fa-microchip"></i>
            <span>{{ $category['badge'] }}</span>
        </div>

        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black uppercase tracking-tight text-white mb-4 drop-shadow-md">
            {{ $category['title'] }}
        </h1>

        <p class="text-blue-100 text-sm sm:text-base max-w-3xl font-normal leading-relaxed">
            {{ $category['subtitle'] }}
        </p>
    </div>
</section>

<!-- Product Series Showcase Grid -->
<section class="py-16 sm:py-20 bg-[#f8fafc] border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200 mb-10">
            <div>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 uppercase tracking-tight">
                    Product Series & Hardware Lineup
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">
                    Click any product hardware image to enlarge specifications and view in high definition.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <span class="px-3.5 py-1 rounded-full bg-blue-50 text-[#0047ba] border border-blue-200 text-xs font-extrabold uppercase">
                    {{ count($category['products']) }} Engineered Models
                </span>
            </div>
        </div>

        <!-- 3-Column Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($category['products'] as $item)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl border border-slate-200 overflow-hidden flex flex-col group transition-all duration-300 transform hover:-translate-y-1.5 cursor-pointer"
                     onclick="openSolutionLightbox('{{ asset($item['image']) }}', '{{ addslashes($item['title']) }}', '{{ addslashes($item['description']) }}')">
                    
                    <!-- Product Image -->
                    <div class="relative aspect-[4/3] w-full overflow-hidden bg-slate-950 flex items-center justify-center p-4">
                        <img src="{{ asset($item['image']) }}" 
                             alt="{{ $item['title'] }}" 
                             class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-500">
                        
                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-[#0047ba]/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="w-12 h-12 rounded-full bg-white/90 text-[#0047ba] flex items-center justify-center text-lg shadow-xl transform scale-75 group-hover:scale-100 transition-transform duration-300">
                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                            </div>
                        </div>

                        <!-- Tag Badge -->
                        <div class="absolute top-3 left-3">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-slate-900/90 text-yellow-400 backdrop-blur-sm border border-yellow-400/30">
                                {{ $item['tag'] }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6 flex-1 flex flex-col justify-between border-t border-slate-100">
                        <div>
                            <h3 class="text-base sm:text-lg font-black text-slate-900 uppercase tracking-wide group-hover:text-[#0047ba] transition-colors mb-2">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-xs text-slate-600 leading-relaxed mb-4">
                                {{ $item['description'] }}
                            </p>

                            <!-- Specifications Chips -->
                            @if(!empty($item['specs']))
                                <div class="space-y-1.5 pt-3 border-t border-slate-100">
                                    @foreach($item['specs'] as $spec)
                                        <div class="flex items-center text-[11px] text-slate-500">
                                            <i class="fa-solid fa-check text-blue-600 mr-2 text-[10px]"></i>
                                            <span>{{ $spec }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-[#0047ba]">
                            <span>Enlarge Specs & Photo</span>
                            <i class="fa-solid fa-arrow-up-right-from-square text-[11px] group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Consultation & RFQ Banner -->
        <div class="mt-16 bg-gradient-to-r from-[#0047ba] to-blue-800 rounded-3xl p-8 sm:p-12 text-white shadow-xl flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="max-w-2xl text-center lg:text-left">
                <span class="px-3 py-1 rounded-full bg-white/20 text-white text-[11px] font-extrabold uppercase tracking-wider mb-3 inline-block">
                    Turnkey Engineering & Integration
                </span>
                <h3 class="text-2xl sm:text-3xl font-black uppercase tracking-tight text-white mb-2">
                    Inquire for {{ $category['title'] }}
                </h3>
                <p class="text-blue-100 text-xs sm:text-sm leading-relaxed">
                    Need technical architectural drawings, structural engineering computations, or product quotation for your commercial establishment? Talk to our display specialists today.
                </p>
            </div>
            <div class="flex flex-wrap gap-3 justify-center shrink-0">
                <a href="mailto:info@globaltronics.net?subject=Inquiry%20for%20{{ urlencode($category['title']) }}" 
                   class="px-8 py-3.5 bg-white text-[#0047ba] hover:bg-yellow-400 hover:text-slate-950 font-black text-xs uppercase tracking-wider rounded-xl shadow-lg transition-all transform active:scale-95">
                    Request Quotation
                </a>
                <a href="{{ url('/#contact') }}" 
                   class="px-6 py-3.5 bg-blue-700/60 hover:bg-blue-700 text-white font-black text-xs uppercase tracking-wider rounded-xl border border-white/20 transition-all">
                    Contact Us
                </a>
            </div>
        </div>

    </div>
</section>

<!-- Lightbox Modal -->
<div id="solution-lightbox" class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden items-center justify-center p-4" onclick="closeSolutionLightbox(event)">
    <div class="relative max-w-4xl w-full bg-slate-950 rounded-2xl overflow-hidden shadow-2xl border border-white/10" onclick="event.stopPropagation()">
        
        <button onclick="closeSolutionLightboxDirect()" 
                class="absolute top-4 right-4 z-20 w-10 h-10 rounded-full bg-black/60 text-white flex items-center justify-center hover:bg-red-600 transition-colors"
                title="Close (Esc)">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <div class="relative w-full max-h-[70vh] flex items-center justify-center bg-slate-950 p-6">
            <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[65vh] object-contain">
        </div>

        <div class="p-6 bg-slate-900 border-t border-slate-800 text-white">
            <h4 id="lightbox-title" class="text-lg font-black uppercase text-yellow-400 mb-1"></h4>
            <p id="lightbox-desc" class="text-xs text-slate-300 leading-relaxed"></p>
        </div>
    </div>
</div>

<script>
    function openSolutionLightbox(src, title, desc) {
        document.getElementById('lightbox-img').src = src;
        document.getElementById('lightbox-title').innerText = title;
        document.getElementById('lightbox-desc').innerText = desc;
        const modal = document.getElementById('solution-lightbox');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeSolutionLightboxDirect() {
        const modal = document.getElementById('solution-lightbox');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    function closeSolutionLightbox(e) {
        if (e.target.id === 'solution-lightbox') {
            closeSolutionLightboxDirect();
        }
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSolutionLightboxDirect();
        }
    });
</script>
@endsection
