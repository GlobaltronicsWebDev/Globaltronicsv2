@extends('layouts.app')

@section('title', 'Digital iPoster Ad Placement - Services | Globaltronics')

@section('content')
<!-- Hero Header Section with Product Specifications -->
<section class="relative bg-gradient-to-r from-[#002f7d] via-[#0047ba] to-indigo-950 text-white py-16 sm:py-24 border-t border-blue-800 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="text-center max-w-3xl mx-auto mb-12">
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-white text-xs font-black uppercase tracking-wider mb-4">
                <i class="fa-solid fa-tablet-screen-button"></i>
                <span>Digital Indoor Ad Placement</span>
            </div>
            
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black uppercase tracking-tight text-white mb-4 leading-tight">
                DIGITAL IPOSTER AD PLACEMENT
            </h1>
            
            <p class="text-blue-100 text-sm sm:text-base md:text-lg font-normal leading-relaxed">
                Sleek, slim and lightweight digital display kiosks positioned at premier shopping malls nationwide to reach high-density consumer foot traffic.
            </p>
        </div>

        <!-- Hardware Specifications Highlight Bar (from globaltronics.net/digital-display-iposters/) -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4 max-w-6xl mx-auto">
            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-4 text-center">
                <i class="fa-solid fa-expand text-blue-300 text-lg mb-1.5"></i>
                <h4 class="text-xs font-extrabold uppercase text-white">572 × 1902 mm</h4>
                <p class="text-[10px] text-blue-200 mt-0.5">Frame Dimensions</p>
            </div>

            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-4 text-center">
                <i class="fa-solid fa-arrows-split-up-and-left text-blue-300 text-lg mb-1.5"></i>
                <h4 class="text-xs font-extrabold uppercase text-white">6mm Ultra-Slim</h4>
                <p class="text-[10px] text-blue-200 mt-0.5">Minimalist Bezel</p>
            </div>

            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-4 text-center">
                <i class="fa-solid fa-bolt text-yellow-300 text-lg mb-1.5"></i>
                <h4 class="text-xs font-extrabold uppercase text-white">2880 Hz</h4>
                <p class="text-[10px] text-blue-200 mt-0.5">High Refresh Rate</p>
            </div>

            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-4 text-center">
                <i class="fa-solid fa-sun text-amber-300 text-lg mb-1.5"></i>
                <h4 class="text-xs font-extrabold uppercase text-white">1200 Nits</h4>
                <p class="text-[10px] text-blue-200 mt-0.5">High Brightness</p>
            </div>

            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-4 text-center">
                <i class="fa-solid fa-eye text-blue-300 text-lg mb-1.5"></i>
                <h4 class="text-xs font-extrabold uppercase text-white">160° Viewing</h4>
                <p class="text-[10px] text-blue-200 mt-0.5">Wide Visual Angle</p>
            </div>

            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-4 text-center">
                <i class="fa-solid fa-weight-hanging text-blue-300 text-lg mb-1.5"></i>
                <h4 class="text-xs font-extrabold uppercase text-white">32 kg</h4>
                <p class="text-[10px] text-blue-200 mt-0.5">Lightweight & Portable</p>
            </div>
        </div>

    </div>
</section>

<!-- Mall Deployments Grid Showcase -->
<section class="py-16 sm:py-20 lg:py-24 bg-[#f8fafc] text-slate-800 relative z-10 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="text-2xl sm:text-3xl font-black uppercase tracking-wider text-slate-900">
                PREMIER MALL DEPLOYMENTS
            </h2>
            <div class="w-16 h-1 bg-[#0047ba] rounded-full mx-auto mt-3 mb-4"></div>
            <p class="text-xs sm:text-sm text-slate-600">
                Explore premier shopping malls and commercial centers hosting Globaltronics Digital iPoster kiosks.
            </p>
        </div>

        @if($iposters->isEmpty())
            <div class="bg-white rounded-3xl p-12 text-center border border-slate-200 shadow-sm max-w-md mx-auto">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-[#0047ba] flex items-center justify-center mx-auto mb-4 text-2xl">
                    <i class="fa-solid fa-tablet-screen-button"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">No iPoster Deployments Found</h3>
                <p class="text-xs text-slate-500 mb-6">Deployments will appear here once published from the CMS.</p>
                @auth
                    <a href="{{ route('admin.iposters.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#0047ba] text-white text-xs font-bold shadow-md">
                        <i class="fa-solid fa-plus"></i>
                        <span>Upload First iPoster</span>
                    </a>
                @endauth
            </div>
        @else
            <!-- Responsive Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-9">
                @foreach($iposters as $item)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl border border-slate-200/80 flex flex-col justify-between transition-all duration-300 transform hover:-translate-y-1 group">
                        
                        <!-- Top Image -->
                        <a href="{{ $item->read_url }}" class="block relative aspect-[16/11] overflow-hidden bg-slate-900">
                            <img src="{{ $item->image_url }}" 
                                 alt="{{ $item->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                            
                            @if($item->daily_traffic)
                                <div class="absolute top-3 right-3">
                                    <span class="px-3 py-1 rounded-full bg-black/70 backdrop-blur-md text-yellow-300 text-[10px] font-extrabold uppercase tracking-wider border border-white/20">
                                        <i class="fa-solid fa-users text-[9px] mr-1"></i>
                                        {{ $item->daily_traffic }}
                                    </span>
                                </div>
                            @endif
                        </a>

                        <!-- Body Content -->
                        <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between text-center">
                            <div>
                                <h3 class="text-base sm:text-lg font-extrabold uppercase tracking-wide text-[#0047ba] group-hover:text-blue-700 transition-colors mb-1.5 leading-snug">
                                    <a href="{{ $item->read_url }}">
                                        {{ $item->title }}
                                    </a>
                                </h3>

                                <p class="text-xs font-bold text-slate-500 mb-3 flex items-center justify-center gap-1">
                                    <i class="fa-solid fa-location-dot text-blue-500 text-[11px]"></i>
                                    <span>{{ $item->mall_or_location ?: 'Premier Shopping Mall' }}</span>
                                </p>

                                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed font-normal">
                                    {{ $item->short_description ?: 'High-impact digital iPoster advertising network capturing shopper foot traffic.' }}
                                </p>
                            </div>

                            <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                    Digital iPoster
                                </span>
                                <a href="{{ $item->read_url }}" class="inline-flex items-center gap-1.5 text-xs font-black text-[#0047ba] hover:text-blue-700 transition-colors uppercase tracking-wider">
                                    <span>View Specs</span>
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($iposters->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $iposters->links() }}
                </div>
            @endif
        @endif

    </div>
</section>
@endsection
