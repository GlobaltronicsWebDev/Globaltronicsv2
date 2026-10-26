@extends('layouts.app')

@section('title', 'News & Articles | Globaltronics - LED by Vision, Built by Trust')

@section('content')
<div class="bg-[#f8fafc] text-slate-800 min-h-screen relative overflow-hidden">

    <!-- Ambient Subtle Background Glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[420px] bg-gradient-to-b from-blue-100/70 via-slate-100/40 to-transparent pointer-events-none blur-3xl"></div>

    <!-- Hero / Header Section -->
    <section class="relative pt-10 pb-12 sm:pt-14 sm:pb-16 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            
            <!-- Breadcrumb -->
            <nav class="flex items-center justify-center space-x-2 text-xs uppercase tracking-wider text-slate-500 font-bold mb-5">
                <a href="{{ url('/') }}" class="hover:text-[#0047ba] transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-house text-xs"></i>
                    <span>Home</span>
                </a>
                <span class="text-slate-300">/</span>
                <span class="text-[#0047ba]">News & Articles</span>
            </nav>

            <!-- Pill Badge -->
            <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200 text-[#0047ba] text-xs font-black uppercase tracking-wider mb-4 shadow-sm">
                <i class="fa-solid fa-newspaper"></i>
                <span>Globaltronics Media Center</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-slate-950 mb-4 tracking-tight max-w-4xl mx-auto leading-tight">
                Latest <span class="text-[#0047ba]">News & Articles</span>
            </h1>

            <p class="text-slate-600 text-sm sm:text-base md:text-lg max-w-3xl mx-auto leading-relaxed font-normal mb-8">
                Stay updated with Globaltronics’ latest LED display installations, digital out-of-home innovations, partnerships, and corporate milestones.
            </p>

            <!-- Search & Filter Form Bar -->
            <div class="max-w-2xl mx-auto mb-6">
                <form action="{{ route('news.index') }}" method="GET" class="relative flex items-center bg-white rounded-2xl p-2 shadow-xl border border-slate-200 focus-within:border-[#0047ba] transition-all">
                    @if(request('badge'))
                        <input type="hidden" name="badge" value="{{ request('badge') }}">
                    @endif
                    <div class="pl-4 pr-2 text-slate-400">
                        <i class="fa-solid fa-magnifying-glass text-base"></i>
                    </div>
                    <input type="text" 
                           name="q" 
                           value="{{ request('q') }}" 
                           placeholder="Search news by headline, keyword, or topic..." 
                           class="w-full py-2.5 px-2 text-slate-900 text-sm font-medium focus:outline-none placeholder-slate-400 bg-transparent">
                    
                    @if(request('q'))
                        <a href="{{ route('news.index', array_filter(['badge' => request('badge')])) }}" class="px-2 text-slate-400 hover:text-slate-600 text-xs font-semibold mr-1" title="Clear search">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    @endif

                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#0047ba] hover:bg-blue-700 text-white font-extrabold text-xs uppercase tracking-wider transition-all shadow-md active:scale-95 shrink-0">
                        Search
                    </button>
                </form>
            </div>

            <!-- Category Filter Pills -->
            @if(isset($badges) && count($badges) > 0)
            <div class="flex flex-wrap items-center justify-center gap-2 pt-2">
                <a href="{{ route('news.index', array_filter(['q' => request('q')])) }}" 
                   class="px-4 py-1.5 rounded-full text-xs font-bold transition-all {{ !request('badge') ? 'bg-[#0047ba] text-white shadow-md shadow-blue-500/20' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    All Stories
                </a>
                @foreach($badges as $badge)
                    <a href="{{ route('news.index', array_filter(['badge' => $badge, 'q' => request('q')])) }}" 
                       class="px-4 py-1.5 rounded-full text-xs font-bold transition-all {{ request('badge') === $badge ? 'bg-[#0047ba] text-white shadow-md shadow-blue-500/20' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                        {{ $badge }}
                    </a>
                @endforeach
            </div>
            @endif

        </div>
    </section>

    <!-- Main Articles Section -->
    <section class="py-12 sm:py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Active Filter Indicator Bar -->
        @if(request('badge') || request('q'))
            <div class="flex flex-wrap items-center justify-between gap-3 mb-8 pb-4 border-b border-slate-200 bg-blue-50/60 p-4 rounded-xl">
                <div class="flex items-center gap-2 text-xs font-medium text-slate-700">
                    <span class="font-bold text-[#0047ba]"><i class="fa-solid fa-filter mr-1"></i> Filtering by:</span>
                    @if(request('badge'))
                        <span class="px-2.5 py-0.5 rounded-md bg-white border border-blue-200 text-blue-800 font-bold">Category: {{ request('badge') }}</span>
                    @endif
                    @if(request('q'))
                        <span class="px-2.5 py-0.5 rounded-md bg-white border border-blue-200 text-blue-800 font-bold">Keyword: "{{ request('q') }}"</span>
                    @endif
                    <span class="text-slate-500 font-semibold ml-1">({{ $articles->total() }} {{ \Illuminate\Support\Str::plural('article', $articles->total()) }} found)</span>
                </div>
                <a href="{{ route('news.index') }}" class="text-xs font-bold text-red-600 hover:text-red-700 flex items-center gap-1 transition-colors">
                    <i class="fa-solid fa-rotate-left"></i>
                    <span>Reset Filters</span>
                </a>
            </div>
        @endif

        @if($articles->count() > 0)
            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($articles as $article)
                    @php
                        $articleLink = $article->read_url;
                        $isExternal = !empty($article->link_url) && $article->link_url !== '#news';
                    @endphp
                    <article class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl border border-slate-200/80 flex flex-col h-full transition-all duration-300 transform hover:-translate-y-1.5 group">
                        
                        <!-- Article Image Banner (Fully Viewable, Uncropped with Ambient Atmospheric Backdrop) -->
                        <a href="{{ $articleLink }}" 
                           @if($isExternal) target="_blank" rel="noopener noreferrer" @endif
                           class="block relative h-56 sm:h-64 w-full overflow-hidden bg-slate-950 shrink-0 flex items-center justify-center">
                            
                            <!-- Atmospheric Ambient Blur Background (fills canvas with image's authentic color palette) -->
                            <img src="{{ $article->image_url }}" 
                                 alt="" 
                                 aria-hidden="true"
                                 class="absolute inset-0 w-full h-full object-cover blur-xl opacity-35 scale-110 pointer-events-none"
                                 onerror="this.src='{{ asset('assets/images/news/news1.jpg') }}'">
                            
                            <!-- Main Image: object-contain ensures NO heads or graphics are cut off regardless of aspect ratio -->
                            <img src="{{ $article->image_url }}" 
                                 alt="{{ $article->title }}" 
                                 loading="lazy"
                                 class="relative z-10 w-full h-full object-contain p-1 group-hover:scale-105 transition-transform duration-500 ease-out"
                                 onerror="this.src='{{ asset('assets/images/news/news1.jpg') }}'">
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/30 pointer-events-none z-10"></div>
                            
                            <!-- Category Badge (Small & Compact Pill) -->
                            <div class="absolute top-3 left-3 inline-flex items-center space-x-1.5 bg-black/65 backdrop-blur-md px-2.5 py-1 rounded-full border border-white/20 shadow-sm z-10" style="max-width: fit-content;">
                                <img src="{{ asset('assets/images/logos/global_logo.webp') }}" 
                                     alt="Globaltronics" 
                                     class="object-contain brightness-0 invert shrink-0" 
                                     style="height: 11px; max-height: 11px; width: auto; max-width: 56px; display: block;">
                                <span class="text-[9px] font-extrabold uppercase tracking-wider text-white border-l border-white/30 pl-1.5 leading-none">
                                    {{ $article->badge ?? 'GLOBALTRONICS' }}
                                </span>
                            </div>

                            @if($article->has_video)
                                <!-- Video Available Badge -->
                                <div class="absolute top-3 right-3 flex items-center space-x-1.5 bg-red-600/90 backdrop-blur-md px-2.5 py-1 rounded-full text-white text-[9px] font-extrabold shadow-md uppercase tracking-wider z-10">
                                    <i class="fa-brands fa-youtube text-xs"></i>
                                    <span>Video</span>
                                </div>

                                <!-- Centered Play Button Overlay -->
                                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                    <div class="w-12 h-12 rounded-full bg-red-600/90 text-white flex items-center justify-center shadow-2xl group-hover:scale-110 group-hover:bg-red-600 transition-all duration-300">
                                        <i class="fa-solid fa-play text-sm translate-x-0.5"></i>
                                    </div>
                                </div>
                            @endif
                        </a>

                        <!-- Article Body -->
                        <div class="p-6 sm:p-7 flex flex-col flex-1 justify-between">
                            <div>
                                <!-- Date & Author -->
                                <div class="flex items-center justify-between gap-2 text-xs font-semibold text-slate-400 mb-3 uppercase tracking-wider">
                                    <div class="flex items-center gap-1.5">
                                        <i class="fa-regular fa-calendar text-[#0047ba]"></i>
                                        <span class="text-slate-600 font-medium">{{ $article->formatted_date }}</span>
                                    </div>
                                    <span class="text-slate-400 font-normal">Globaltronics</span>
                                </div>

                                <!-- Title -->
                                <h3 class="text-lg sm:text-xl font-extrabold text-[#0047ba] mb-3 leading-snug group-hover:text-blue-700 transition-colors">
                                    <a href="{{ $articleLink }}" @if($isExternal) target="_blank" rel="noopener noreferrer" @endif class="hover:underline">
                                        {{ $article->title }}
                                    </a>
                                </h3>

                                <!-- Description / Excerpt -->
                                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mb-6 font-normal line-clamp-3">
                                    {{ $article->description }}
                                </p>
                            </div>

                            <!-- Card Action Buttons -->
                            <div class="pt-4 border-t border-slate-100 flex flex-wrap items-center justify-between gap-2">
                                <a href="{{ $articleLink }}" 
                                   @if($isExternal) target="_blank" rel="noopener noreferrer" @endif
                                   class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-[#0047ba] hover:text-blue-800 transition-colors group/btn">
                                    <span>Read Full Story</span>
                                    <i class="fa-solid fa-arrow-right text-[11px] group-hover/btn:translate-x-1 transition-transform"></i>
                                </a>

                                @if($article->has_video)
                                    <button type="button" 
                                            onclick="openVideoModal('{{ $article->youtube_embed_url }}')" 
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white text-xs font-extrabold transition-all">
                                        <i class="fa-brands fa-youtube"></i>
                                        <span>Watch</span>
                                    </button>
                                @endif
                            </div>
                        </div>

                    </article>
                @endforeach
            </div>

            <!-- Pagination Container -->
            @if($articles->hasPages())
                <div class="mt-14 pt-8 border-t border-slate-200 flex items-center justify-center">
                    {{ $articles->links() }}
                </div>
            @endif

        @else
            <!-- Empty State -->
            <div class="text-center py-16 bg-white rounded-3xl border border-slate-200 shadow-sm p-8 max-w-lg mx-auto">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-[#0047ba] flex items-center justify-center mx-auto mb-4 text-2xl">
                    <i class="fa-regular fa-newspaper"></i>
                </div>
                <h3 class="text-xl font-black text-slate-900 mb-2">No Articles Found</h3>
                <p class="text-sm text-slate-500 mb-6 leading-relaxed">
                    We couldn't find any articles matching your search criteria. Please try a different query or browse all news updates.
                </p>
                <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#0047ba] text-white text-xs sm:text-sm font-extrabold hover:bg-blue-700 transition-all shadow-md">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>View All Articles</span>
                </a>
            </div>
        @endif

    </section>

</div>

<!-- Video Popup Modal -->
<div id="video-modal" class="fixed inset-0 bg-black/85 backdrop-blur-md z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300 ease-out" onclick="if(event.target === this) closeVideoModal()">
    <div class="bg-black rounded-2xl overflow-hidden shadow-2xl w-full max-w-4xl relative">
        <button onclick="closeVideoModal()" class="absolute top-4 right-4 text-white hover:text-yellow-400 p-2 z-20 focus:outline-none" title="Close Video">
            <i class="fa-solid fa-xmark text-2xl"></i>
        </button>
        <div class="relative aspect-video w-full">
            <iframe id="video-iframe" class="w-full h-full" src="" title="Globaltronics Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>

<script>
    function openVideoModal(videoUrl) {
        const modal = document.getElementById('video-modal');
        const iframe = document.getElementById('video-iframe');
        if (!modal || !iframe) return;

        let targetUrl = videoUrl || "https://www.youtube.com/embed/Ea4w1kRoydQ";
        if (!targetUrl.includes('autoplay=1')) {
            targetUrl += (targetUrl.includes('?') ? '&' : '?') + 'autoplay=1';
        }

        iframe.src = targetUrl;
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100', 'pointer-events-auto');
    }

    function closeVideoModal() {
        const modal = document.getElementById('video-modal');
        const iframe = document.getElementById('video-iframe');
        if (!modal || !iframe) return;

        iframe.src = "";
        modal.classList.remove('opacity-100', 'pointer-events-auto');
        modal.classList.add('opacity-0', 'pointer-events-none');
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeVideoModal();
        }
    });
</script>
@endsection
