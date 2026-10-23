@extends('layouts.app')

@section('title', ($q ? 'Search Results for "' . $q . '"' : 'Search') . ' | Globaltronics')

@section('content')
<!-- Search Hero Section -->
<section class="relative bg-gradient-to-r from-[#002f7d] via-[#0047ba] to-indigo-950 text-white py-14 sm:py-20 border-t border-blue-800 overflow-hidden">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        
        <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-white text-xs font-black uppercase tracking-wider mb-4">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span>Global Search</span>
        </div>

        <h1 class="text-3xl sm:text-5xl font-black uppercase tracking-tight text-white mb-4">
            Search Globaltronics
        </h1>

        <p class="text-blue-100 text-xs sm:text-sm md:text-base max-w-2xl mx-auto mb-8 font-normal leading-relaxed">
            Find LED display systems, digital iPoster ad placement sites, latest company news, job openings, and digital services.
        </p>

        <!-- Search Input Box -->
        <form action="{{ route('search') }}" method="GET" class="max-w-2xl mx-auto relative">
            <div class="flex items-center bg-white rounded-2xl p-2 shadow-2xl border border-white/20">
                <div class="pl-4 pr-2 text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-base"></i>
                </div>
                <input type="text" 
                       name="q" 
                       value="{{ $q }}" 
                       autocomplete="off"
                       placeholder="Search products, premier malls, news, or services..." 
                       class="w-full py-3 px-2 text-slate-900 text-sm font-medium focus:outline-none placeholder-slate-400"
                       autofocus>
                <button type="submit" 
                        class="px-6 py-3 rounded-xl bg-[#0047ba] hover:bg-blue-700 text-white font-black text-xs uppercase tracking-wider transition-all shadow-md active:scale-95 shrink-0">
                    Search
                </button>
            </div>

            <!-- Quick Suggestions -->
            <div class="mt-4 flex flex-wrap items-center justify-center gap-2 text-xs text-blue-200">
                <span class="font-bold text-white">Popular:</span>
                <a href="{{ route('search', ['q' => 'Glorietta']) }}" class="px-2.5 py-1 rounded-full bg-white/10 hover:bg-white/20 transition-colors">Glorietta</a>
                <a href="{{ route('search', ['q' => 'Circuit']) }}" class="px-2.5 py-1 rounded-full bg-white/10 hover:bg-white/20 transition-colors">Circuit</a>
                <a href="{{ route('search', ['q' => 'Cloverleaf']) }}" class="px-2.5 py-1 rounded-full bg-white/10 hover:bg-white/20 transition-colors">Cloverleaf</a>
                <a href="{{ route('search', ['q' => 'Nustar']) }}" class="px-2.5 py-1 rounded-full bg-white/10 hover:bg-white/20 transition-colors">Nustar</a>
                <a href="{{ route('search', ['q' => 'Design']) }}" class="px-2.5 py-1 rounded-full bg-white/10 hover:bg-white/20 transition-colors">Consultancy</a>
                <a href="{{ route('search', ['q' => 'Engineer']) }}" class="px-2.5 py-1 rounded-full bg-white/10 hover:bg-white/20 transition-colors">Careers</a>
            </div>
        </form>

    </div>
</section>

<!-- Results Section -->
<section class="py-12 sm:py-16 bg-[#f8fafc] min-h-[60vh] border-b border-slate-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($q !== '')
            <!-- Query Result Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200 mb-8">
                <div>
                    <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">
                        Results for "<span class="text-[#0047ba]">{{ $q }}</span>"
                    </h2>
                    <p class="text-xs text-slate-500 mt-1">
                        Found <strong class="text-slate-900">{{ $totalResults }}</strong> matching {{ Str::plural('result', $totalResults) }}.
                    </p>
                </div>

                @if($totalResults > 0)
                    <!-- Filter Tabs -->
                    <div class="flex items-center gap-1.5 overflow-x-auto pb-1 text-xs font-bold scrollbar-thin">
                        <a href="{{ route('search', ['q' => $q, 'tab' => 'all']) }}" 
                           class="px-3.5 py-1.5 rounded-full transition-all {{ $tab === 'all' ? 'bg-[#0047ba] text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                            All ({{ $totalResults }})
                        </a>

                        @if($menus->isNotEmpty())
                            <a href="{{ route('search', ['q' => $q, 'tab' => 'menus']) }}" 
                               class="px-3.5 py-1.5 rounded-full transition-all {{ $tab === 'menus' ? 'bg-[#0047ba] text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                                Menus ({{ $menus->count() }})
                            </a>
                        @endif

                        @if($solutions->isNotEmpty())
                            <a href="{{ route('search', ['q' => $q, 'tab' => 'led']) }}" 
                               class="px-3.5 py-1.5 rounded-full transition-all {{ $tab === 'led' ? 'bg-[#0047ba] text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                                LED Displays ({{ $solutions->count() }})
                            </a>
                        @endif

                        @if($iposters->isNotEmpty())
                            <a href="{{ route('search', ['q' => $q, 'tab' => 'iposters']) }}" 
                               class="px-3.5 py-1.5 rounded-full transition-all {{ $tab === 'iposters' ? 'bg-[#0047ba] text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                                iPosters ({{ $iposters->count() }})
                            </a>
                        @endif

                        @if($news->isNotEmpty())
                            <a href="{{ route('search', ['q' => $q, 'tab' => 'news']) }}" 
                               class="px-3.5 py-1.5 rounded-full transition-all {{ $tab === 'news' ? 'bg-[#0047ba] text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                                News ({{ $news->count() }})
                            </a>
                        @endif

                        @if($careers->isNotEmpty())
                            <a href="{{ route('search', ['q' => $q, 'tab' => 'careers']) }}" 
                               class="px-3.5 py-1.5 rounded-full transition-all {{ $tab === 'careers' ? 'bg-[#0047ba] text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                                Careers ({{ $careers->count() }})
                            </a>
                        @endif
                    </div>
                @endif
            </div>

            @if($totalResults === 0)
                <!-- No Results State -->
                <div class="bg-white rounded-3xl p-12 text-center border border-slate-200 shadow-sm max-w-lg mx-auto">
                    <div class="w-16 h-16 rounded-2xl bg-blue-50 text-[#0047ba] flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <h3 class="text-lg font-black text-slate-900 mb-2">No results found for "{{ $q }}"</h3>
                    <p class="text-xs text-slate-500 mb-6 leading-relaxed">
                        We couldn't find any direct matches. Try searching with broader keywords, city names (Makati, Cebu, BGC), or mall names.
                    </p>
                    <div class="flex flex-wrap justify-center gap-2">
                        <a href="{{ route('services.led-displays') }}" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-blue-50 hover:text-[#0047ba] text-slate-700 text-xs font-bold transition-colors">
                            Explore LED Displays
                        </a>
                        <a href="{{ route('services.iposters.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-blue-50 hover:text-[#0047ba] text-slate-700 text-xs font-bold transition-colors">
                            Explore Digital iPosters
                        </a>
                    </div>
                </div>
            @else
                <!-- Results List -->
                <div class="space-y-4">

                    <!-- Navigation Menus & Submenus -->
                    @if(($tab === 'all' || $tab === 'menus') && $menus->isNotEmpty())
                        @foreach($menus as $item)
                            <a href="{{ $item['url'] }}" 
                               class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md hover:border-blue-400 transition-all flex flex-col sm:flex-row items-start sm:items-center gap-4 group block">
                                <div class="w-12 h-12 rounded-xl bg-blue-50 text-[#0047ba] flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
                                    <i class="fa-solid {{ $item['icon'] }}"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider border {{ $item['badge_color'] }}">
                                            {{ $item['menu_group'] }}
                                        </span>
                                        <span class="text-xs font-semibold text-slate-400 flex items-center gap-1">
                                            <i class="fa-solid fa-compass text-[10px] text-blue-500"></i>
                                            Direct Navigation
                                        </span>
                                    </div>
                                    <h3 class="text-base font-extrabold text-slate-900 group-hover:text-[#0047ba] transition-colors uppercase">
                                        {{ $item['title'] }}
                                    </h3>
                                    <p class="text-xs text-slate-500 mt-1 line-clamp-2 leading-relaxed">
                                        {{ $item['description'] }}
                                    </p>
                                </div>
                                <div class="text-[#0047ba] text-xs font-bold shrink-0 hidden sm:flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                    <span>Open Menu</span>
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </div>
                            </a>
                        @endforeach
                    @endif

                    <!-- 1. LED Display Systems -->
                    @if(($tab === 'all' || $tab === 'led') && $solutions->isNotEmpty())
                        @foreach($solutions as $item)
                            <a href="{{ route('services.led-displays.show', $item->slug) }}" 
                               class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md hover:border-blue-400 transition-all flex flex-col sm:flex-row items-start sm:items-center gap-4 group block">
                                <div class="w-full sm:w-28 h-20 rounded-xl overflow-hidden bg-slate-950 shrink-0 border border-slate-100">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-cyan-500/10 text-cyan-700 border border-cyan-500/20">
                                            LED Display System
                                        </span>
                                        @if($item->location)
                                            <span class="text-xs font-semibold text-slate-400 flex items-center gap-1">
                                                <i class="fa-solid fa-location-dot text-[10px] text-blue-500"></i>
                                                {{ $item->location }}
                                            </span>
                                        @endif
                                    </div>
                                    <h3 class="text-base font-extrabold text-slate-900 group-hover:text-[#0047ba] transition-colors uppercase">
                                        {{ $item->title }}
                                    </h3>
                                    <p class="text-xs text-slate-500 mt-1 line-clamp-2 leading-relaxed">
                                        {{ $item->short_description }}
                                    </p>
                                </div>
                                <div class="text-[#0047ba] text-xs font-bold shrink-0 hidden sm:flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                    <span>View System</span>
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </div>
                            </a>
                        @endforeach
                    @endif

                    <!-- 2. Digital iPosters -->
                    @if(($tab === 'all' || $tab === 'iposters') && $iposters->isNotEmpty())
                        @foreach($iposters as $item)
                            <a href="{{ route('services.iposters.show', $item->slug) }}" 
                               class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md hover:border-purple-400 transition-all flex flex-col sm:flex-row items-start sm:items-center gap-4 group block">
                                <div class="w-full sm:w-28 h-20 rounded-xl overflow-hidden bg-slate-950 shrink-0 border border-slate-100">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-purple-500/10 text-purple-700 border border-purple-500/20">
                                            Digital iPoster Ad Placement
                                        </span>
                                        @if($item->mall_or_location)
                                            <span class="text-xs font-semibold text-slate-400 flex items-center gap-1">
                                                <i class="fa-solid fa-location-dot text-[10px] text-purple-500"></i>
                                                {{ $item->mall_or_location }}
                                            </span>
                                        @endif
                                    </div>
                                    <h3 class="text-base font-extrabold text-slate-900 group-hover:text-[#0047ba] transition-colors uppercase">
                                        {{ $item->title }}
                                    </h3>
                                    <p class="text-xs text-slate-500 mt-1 line-clamp-2 leading-relaxed">
                                        {{ $item->short_description }}
                                    </p>
                                </div>
                                <div class="text-[#0047ba] text-xs font-bold shrink-0 hidden sm:flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                    <span>View Deployment</span>
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </div>
                            </a>
                        @endforeach
                    @endif

                    <!-- 3. News & Articles -->
                    @if(($tab === 'all' || $tab === 'news') && $news->isNotEmpty())
                        @foreach($news as $item)
                            <a href="{{ route('news.show', $item->slug ?: $item->id) }}" 
                               class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md hover:border-blue-400 transition-all flex flex-col sm:flex-row items-start sm:items-center gap-4 group block">
                                <div class="w-full sm:w-28 h-20 rounded-xl overflow-hidden bg-slate-950 shrink-0 border border-slate-100">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-blue-500/10 text-blue-700 border border-blue-500/20">
                                            {{ $item->category ?: 'News Article' }}
                                        </span>
                                        @if($item->published_date)
                                            <span class="text-xs font-semibold text-slate-400">
                                                {{ $item->published_date->format('F d, Y') }}
                                            </span>
                                        @endif
                                    </div>
                                    <h3 class="text-base font-extrabold text-slate-900 group-hover:text-[#0047ba] transition-colors line-clamp-1">
                                        {{ $item->title }}
                                    </h3>
                                    <p class="text-xs text-slate-500 mt-1 line-clamp-2 leading-relaxed">
                                        {{ $item->excerpt }}
                                    </p>
                                </div>
                                <div class="text-[#0047ba] text-xs font-bold shrink-0 hidden sm:flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                    <span>Read Article</span>
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </div>
                            </a>
                        @endforeach
                    @endif

                    <!-- 4. Careers & Job Openings -->
                    @if(($tab === 'all' || $tab === 'careers') && $careers->isNotEmpty())
                        @foreach($careers as $item)
                            <a href="{{ route('careers.show', $item->slug) }}" 
                               class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md hover:border-amber-400 transition-all flex flex-col sm:flex-row items-start sm:items-center gap-4 group block">
                                <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center text-xl shrink-0">
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-amber-500/10 text-amber-700 border border-amber-500/20">
                                            Career Opening • {{ $item->type ?: 'Full-time' }}
                                        </span>
                                        <span class="text-xs font-semibold text-slate-400">
                                            {{ $item->department }} {{ $item->location ? '• ' . $item->location : '' }}
                                        </span>
                                    </div>
                                    <h3 class="text-base font-extrabold text-slate-900 group-hover:text-[#0047ba] transition-colors">
                                        {{ $item->title }}
                                    </h3>
                                    <p class="text-xs text-slate-500 mt-1 line-clamp-1 leading-relaxed">
                                        {{ $item->description }}
                                    </p>
                                </div>
                                <div class="text-[#0047ba] text-xs font-bold shrink-0 hidden sm:flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                    <span>View Role</span>
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </div>
                            </a>
                        @endforeach
                    @endif

                </div>
            @endif

        @else
            <!-- Search Home State -->
            <div class="max-w-2xl mx-auto text-center py-12">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-[#0047ba] flex items-center justify-center mx-auto mb-4 text-2xl">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <h3 class="text-lg font-black text-slate-900 mb-2">What are you looking for?</h3>
                <p class="text-xs text-slate-500 mb-8 leading-relaxed">
                    Type a search term above to discover LED billboards, digital iPoster deployment locations, news releases, or job vacancies.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-left">
                    <a href="{{ route('services.led-displays') }}" class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:border-[#0047ba] transition-all group">
                        <i class="fa-solid fa-tv text-cyan-600 text-lg mb-2"></i>
                        <h4 class="text-xs font-black text-slate-900 uppercase group-hover:text-[#0047ba]">LED Systems</h4>
                        <p class="text-[11px] text-slate-500 mt-1">Outdoor and indoor high-refresh display networks.</p>
                    </a>

                    <a href="{{ route('services.iposters.index') }}" class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:border-[#0047ba] transition-all group">
                        <i class="fa-solid fa-tablet-screen-button text-purple-600 text-lg mb-2"></i>
                        <h4 class="text-xs font-black text-slate-900 uppercase group-hover:text-[#0047ba]">Digital iPosters</h4>
                        <p class="text-[11px] text-slate-500 mt-1">In-mall digital poster advertising displays.</p>
                    </a>

                    <a href="{{ route('services.digital-design-consultancy') }}" class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:border-[#0047ba] transition-all group">
                        <i class="fa-solid fa-wand-magic-sparkles text-amber-600 text-lg mb-2"></i>
                        <h4 class="text-xs font-black text-slate-900 uppercase group-hover:text-[#0047ba]">Creatives</h4>
                        <p class="text-[11px] text-slate-500 mt-1">Motion graphics, 3D modeling, and UI layouts.</p>
                    </a>
                </div>
            </div>
        @endif

    </div>
</section>
@endsection
