@extends('layouts.app')

@section('title', $news->title . ' | Globaltronics News')

@push('styles')
<style>
    .article-body p {
        margin-bottom: 1.5rem;
        line-height: 1.9;
        font-size: 1.0625rem;
        color: #334155; /* text-slate-700 */
    }
    .article-body p:first-of-type {
        font-size: 1.1875rem;
        color: #0f172a; /* text-slate-900 */
        font-weight: 500;
        line-height: 1.85;
    }
</style>
@endpush

@section('content')
<article class="bg-[#f8fafc] text-slate-800 min-h-screen py-12 lg:py-20 relative overflow-hidden border-t border-slate-200">

    <!-- Ambient Subtle Top Glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-b from-blue-100/60 via-slate-100/40 to-transparent pointer-events-none blur-3xl"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Top Breadcrumb & Back Link -->
        <div class="flex flex-wrap items-center justify-between gap-4 mb-8 pb-6 border-b border-slate-200">
            <nav class="flex items-center space-x-2 text-xs uppercase tracking-wider text-slate-500 font-bold">
                <a href="{{ url('/') }}" class="hover:text-[#0047ba] transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-house text-xs"></i>
                    <span>Home</span>
                </a>
                <span class="text-slate-300">/</span>
                <a href="{{ route('news.index') }}" class="hover:text-[#0047ba] transition-colors">News & Articles</a>
                <span class="text-slate-300">/</span>
                <span class="text-[#0047ba] truncate max-w-[200px] sm:max-w-xs">{{ $news->badge }}</span>
            </nav>

            <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-600 hover:text-[#0047ba] transition-colors bg-white hover:bg-slate-50 px-3.5 py-1.5 rounded-full border border-slate-200 shadow-sm">
                <i class="fa-solid fa-arrow-left text-[10px]"></i>
                <span>All News</span>
            </a>
        </div>

        <!-- Article Header Area -->
        <header class="mb-10 text-center sm:text-left">
            
            <!-- Badge & Meta Row -->
            <div class="flex flex-wrap items-center justify-center sm:justify-start gap-3 mb-5">
                <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-black tracking-wider uppercase bg-[#0047ba] text-white shadow-md shadow-blue-600/20">
                    {{ $news->badge ?? 'GLOBALTRONICS' }}
                </span>

                <div class="flex items-center space-x-2 text-xs text-slate-500 font-semibold">
                    <i class="fa-regular fa-calendar text-[#0047ba]"></i>
                    <span>{{ $news->formatted_date }}</span>
                </div>

                <span class="text-slate-300 hidden sm:inline">•</span>

                <div class="flex items-center space-x-1.5 text-xs text-slate-500 font-medium">
                    <i class="fa-solid fa-building text-slate-400"></i>
                    <span>Globaltronics Media</span>
                </div>
            </div>

            <!-- Main Article Headline -->
            <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight sm:leading-snug mb-6">
                {{ $news->title }}
            </h1>

            <!-- Article Summary / Lead Deck -->
            <div class="p-6 rounded-2xl bg-white border border-slate-200 text-slate-700 text-base sm:text-lg leading-relaxed font-medium border-l-4 border-l-[#0047ba] shadow-sm">
                {{ $news->description }}
            </div>
        </header>

        <!-- Featured Banner Image (Fully Viewable, Zero Head-Cropping, Ambient Fill) -->
        <div class="mb-12 rounded-3xl overflow-hidden border border-slate-200 bg-slate-950 shadow-xl relative group">
            <div class="relative w-full flex items-center justify-center overflow-hidden min-h-[360px] sm:min-h-[460px] max-h-[720px] bg-slate-950">
                <!-- Atmospheric Ambient Blur Background (fills canvas with image's authentic color palette) -->
                <img src="{{ $news->image_url }}" 
                     alt="" 
                     aria-hidden="true"
                     class="absolute inset-0 w-full h-full object-cover blur-2xl opacity-40 scale-110 pointer-events-none"
                     onerror="this.src='{{ asset('assets/images/news/news1.jpg') }}'">
                
                <!-- Main Featured Image (100% Fully Viewable & Centered - Zero Cropping of Heads or Artwork) -->
                <img src="{{ $news->image_url }}" 
                     alt="{{ $news->title }}" 
                     class="relative z-10 w-auto h-auto max-w-full max-h-[720px] object-contain mx-auto drop-shadow-2xl group-hover:scale-[1.01] transition-transform duration-500"
                     onerror="this.src='{{ asset('assets/images/news/news1.jpg') }}'">
                
                <!-- Subtle Gradient Overlays -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-black/20 pointer-events-none z-10"></div>

                <!-- Brand Watermark Badge -->
                <div class="absolute top-5 left-5 flex items-center space-x-2 bg-black/60 backdrop-blur-md px-3.5 py-1.5 rounded-full border border-white/20 z-20 shadow-md">
                    <img src="{{ asset('assets/images/logos/global_logo.webp') }}" alt="Globaltronics" class="h-4 sm:h-5 w-auto object-contain brightness-0 invert">
                </div>

                <!-- View Full High-Res Image Button -->
                <a href="{{ $news->image_url }}" target="_blank" rel="noopener noreferrer" 
                   class="absolute bottom-4 right-4 z-20 flex items-center gap-1.5 bg-black/65 hover:bg-[#0047ba] text-white text-xs font-semibold px-3.5 py-1.5 rounded-xl backdrop-blur-md border border-white/20 transition-all opacity-0 group-hover:opacity-100 shadow-lg hover:scale-105" 
                   title="Open full resolution image in new tab">
                    <i class="fa-solid fa-up-right-and-down-left-from-center text-[10px]"></i>
                    <span class="hidden sm:inline">View Full Image</span>
                </a>
            </div>
            
            <div class="px-6 py-3.5 bg-white border-t border-slate-100 flex items-center justify-between text-xs text-slate-500 font-medium">
                <span>Featured Project / Digital Signage Installation</span>
                <span class="text-[11px] font-mono uppercase tracking-wider text-[#0047ba] font-bold">Globaltronics Innovation</span>
            </div>
        </div>

        <!-- Embedded YouTube Video Showcase Player -->
        @if($news->has_video)
            <div class="mb-12 rounded-3xl overflow-hidden border border-slate-200 bg-white shadow-xl">
                <div class="px-6 py-4 bg-white border-b border-slate-100 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center">
                            <i class="fa-brands fa-youtube text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Video Coverage & Demonstration</h3>
                            <p class="text-xs text-slate-500">Watch the official video coverage for this update</p>
                        </div>
                    </div>
                    <a href="{{ $news->video_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs text-slate-700 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 px-3.5 py-2 rounded-lg border border-slate-200 transition-colors font-semibold">
                        <span>Watch on YouTube</span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                    </a>
                </div>
                <div class="relative aspect-video w-full bg-black">
                    <iframe 
                        src="{{ $news->youtube_embed_url }}" 
                        title="{{ $news->title }} Video Coverage" 
                        class="absolute inset-0 w-full h-full"
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        @endif

        <!-- Full Article Body Content -->
        <div class="article-body bg-white border border-slate-200 rounded-3xl p-6 sm:p-10 mb-12 shadow-sm">
            @php
                // Display content if present, or split description into structured paragraphs
                $rawContent = !empty($news->content) ? $news->content : $news->description;
                $paragraphs = preg_split('/\r\n|\r|\n/', $rawContent);
            @endphp

            @foreach($paragraphs as $paragraph)
                @if(trim($paragraph))
                    <p>{{ trim($paragraph) }}</p>
                @endif
            @endforeach
        </div>

        <!-- Social Share & Footer Actions -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 flex flex-col sm:flex-row items-center justify-between gap-4 mb-16 shadow-sm">
            <div>
                <h4 class="text-sm font-bold text-slate-900 mb-1">Share this update</h4>
                <p class="text-xs text-slate-500">Spread the word across your professional network.</p>
            </div>

            <div class="flex items-center gap-2">
                <!-- Share Facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="w-10 h-10 rounded-xl bg-[#1877F2] text-white flex items-center justify-center transition-all hover:scale-105 shadow-sm" 
                   title="Share on Facebook">
                    <i class="fa-brands fa-facebook-f text-sm"></i>
                </a>

                <!-- Share LinkedIn -->
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="w-10 h-10 rounded-xl bg-[#0A66C2] text-white flex items-center justify-center transition-all hover:scale-105 shadow-sm" 
                   title="Share on LinkedIn">
                    <i class="fa-brands fa-linkedin-in text-sm"></i>
                </a>

                <!-- Share Twitter / X -->
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($news->title) }}&url={{ urlencode(url()->current()) }}" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center transition-all hover:scale-105 shadow-sm" 
                   title="Share on X">
                    <i class="fa-brands fa-x-twitter text-sm"></i>
                </a>

                <!-- Copy Link Button -->
                <button type="button" 
                        onclick="copyArticleLink(this)" 
                        class="px-4 h-10 rounded-xl bg-slate-100 hover:bg-[#0047ba] hover:text-white text-slate-800 text-xs font-bold flex items-center gap-2 border border-slate-200 transition-all hover:scale-105 shadow-sm">
                    <i class="fa-solid fa-link text-xs"></i>
                    <span>Copy Link</span>
                </button>
            </div>
        </div>

        <!-- Recent / Other News Updates -->
        @if($recentNews->isNotEmpty())
            <div class="pt-8 border-t border-slate-200">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">More Latest Updates</h3>
                        <p class="text-xs text-slate-500 mt-1">Explore other recent installations and announcements.</p>
                    </div>
                    <a href="{{ route('news.index') }}" class="text-xs font-bold text-[#0047ba] hover:underline flex items-center gap-1.5">
                        <span>View All</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($recentNews as $recent)
                        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden flex flex-col justify-between group hover:border-blue-300 hover:shadow-xl transition-all hover:-translate-y-1 shadow-sm">
                            <div class="relative h-44 w-full overflow-hidden bg-slate-950 flex items-center justify-center">
                                <!-- Atmospheric Ambient Blur Background -->
                                <img src="{{ $recent->image_url }}" 
                                     alt="" 
                                     aria-hidden="true"
                                     class="absolute inset-0 w-full h-full object-cover blur-xl opacity-35 scale-110 pointer-events-none"
                                     onerror="this.src='{{ asset('assets/images/news/news1.jpg') }}'">
                                
                                <!-- Primary Uncropped Image -->
                                <img src="{{ $recent->image_url }}" 
                                     alt="{{ $recent->title }}" 
                                     class="relative z-10 w-full h-full object-contain p-1 group-hover:scale-105 transition-transform duration-500"
                                     onerror="this.src='{{ asset('assets/images/news/news1.jpg') }}'">
                                <div class="absolute top-3 left-3 bg-black/70 backdrop-blur-md px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase text-white z-10">
                                    {{ $recent->badge }}
                                </div>
                                @if($recent->has_video)
                                    <div class="absolute top-3 right-3 bg-red-600/90 backdrop-blur-md px-2 py-0.5 rounded text-[10px] font-extrabold text-white flex items-center gap-1">
                                        <i class="fa-brands fa-youtube"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5 flex flex-col flex-1 justify-between">
                                <div>
                                    <p class="text-[11px] text-slate-400 font-semibold mb-2 uppercase">{{ $recent->formatted_date }}</p>
                                    <h4 class="text-sm font-bold text-slate-900 group-hover:text-[#0047ba] transition-colors line-clamp-2 leading-snug mb-2">
                                        {{ $recent->title }}
                                    </h4>
                                    <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed mb-4">
                                        {{ $recent->description }}
                                    </p>
                                </div>
                                <a href="{{ route('news.show', $recent->slug ?? $recent->id) }}" 
                                   target="_blank"
                                   class="inline-flex items-center gap-1.5 text-xs font-bold text-[#0047ba] hover:underline transition-colors">
                                    <span>Read Story</span>
                                    <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

</article>

@push('scripts')
<script>
    function copyArticleLink(btn) {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<i class="fa-solid fa-check text-white text-xs"></i> <span>Copied!</span>';
            btn.classList.add('bg-emerald-600', 'text-white');
            btn.classList.remove('bg-slate-100', 'text-slate-800');
            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.classList.remove('bg-emerald-600', 'text-white');
                btn.classList.add('bg-slate-100', 'text-slate-800');
            }, 2000);
        }).catch(() => {
            alert('Article link: ' + url);
        });
    }
</script>
@endpush
@endsection
