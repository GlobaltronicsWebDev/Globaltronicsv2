@extends('layouts.app')

@section('title', 'LED Display Systems - Services | Globaltronics')

@section('content')
<!-- Services Hero Header -->
<section class="relative bg-gradient-to-r from-[#002f7d] via-[#0047ba] to-blue-900 text-white py-16 sm:py-20 lg:py-24 border-t border-blue-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-white text-xs font-black uppercase tracking-wider mb-4">
            <i class="fa-solid fa-tv"></i>
            <span>Services & Digital Monuments</span>
        </div>
        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black uppercase tracking-tight mb-4">
            LED DISPLAY SYSTEMS
        </h1>
        <p class="text-blue-100 text-sm sm:text-base md:text-lg max-w-2xl mx-auto font-normal leading-relaxed">
            Discover landmark digital LED installations engineered and operated by Globaltronics nationwide.
        </p>
    </div>
</section>

<!-- Main Grid Showcase (Matching User Image 1) -->
<section class="py-16 sm:py-20 lg:py-24 bg-[#f8fafc] text-slate-800 relative z-10 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if($solutions->isEmpty())
            <div class="bg-white rounded-3xl p-12 text-center border border-slate-200 shadow-sm max-w-md mx-auto">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-[#0047ba] flex items-center justify-center mx-auto mb-4 text-2xl">
                    <i class="fa-solid fa-tv"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">No Display Systems Found</h3>
                <p class="text-xs text-slate-500 mb-6">Display systems will appear here once published from the CMS.</p>
                @auth
                    <a href="{{ route('admin.solutions.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#0047ba] text-white text-xs font-bold shadow-md">
                        <i class="fa-solid fa-plus"></i>
                        <span>Upload First System</span>
                    </a>
                @endauth
            </div>
        @else
            <!-- 3-Column Card Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-9">
                @foreach($solutions as $system)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl border border-slate-200/80 flex flex-col justify-between transition-all duration-300 transform hover:-translate-y-1 group">
                        
                        <!-- Top Image -->
                        <a href="{{ $system->read_url }}" class="block relative aspect-[16/11] overflow-hidden bg-slate-900">
                            <img src="{{ $system->image_url }}" 
                                 alt="{{ $system->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                        </a>

                        <!-- Body Content -->
                        <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between text-center">
                            <div>
                                <h3 class="text-base sm:text-lg font-extrabold uppercase tracking-wide text-[#0047ba] group-hover:text-blue-700 transition-colors mb-2.5 leading-snug">
                                    <a href="{{ $system->read_url }}">
                                        {{ $system->title }}
                                    </a>
                                </h3>

                                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed font-normal">
                                    {{ $system->short_description }}
                                </p>
                            </div>

                            <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                    {{ $system->category }}
                                </span>
                                <a href="{{ $system->read_url }}" class="inline-flex items-center gap-1.5 text-xs font-black text-[#0047ba] hover:text-blue-700 transition-colors uppercase tracking-wider">
                                    <span>View Specs</span>
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($solutions->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $solutions->links() }}
                </div>
            @endif
        @endif

    </div>
</section>
@endsection
