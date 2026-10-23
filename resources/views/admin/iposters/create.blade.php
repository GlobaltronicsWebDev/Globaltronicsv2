@extends('admin.layouts.admin')

@section('title', 'Upload New Digital iPoster Site')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Section -->
    <div class="flex items-center justify-between pb-2 border-b border-slate-800">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">
                <a href="{{ route('admin.iposters.index') }}" class="hover:text-white transition-colors">Digital iPoster CMS</a>
                <span>/</span>
                <span class="text-blue-400">Upload Site</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white uppercase tracking-wide flex items-center gap-3">
                <i class="fa-solid fa-cloud-arrow-up text-blue-500"></i>
                <span>Upload New Digital iPoster</span>
            </h1>
        </div>

        <a href="{{ route('admin.iposters.index') }}" 
           class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white font-bold text-xs flex items-center gap-2 border border-slate-700 transition-colors">
            <i class="fa-solid fa-arrow-left text-xs"></i>
            <span>Back to iPosters</span>
        </a>
    </div>

    <!-- Upload Form -->
    <form action="{{ route('admin.iposters.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <input type="hidden" name="category" value="Digital iPoster Ad Placement">

        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm">
            
            <!-- Site Name & Mall Location -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                        Deployment Site Title <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="title" id="title" required value="{{ old('title') }}" 
                           placeholder="e.g. AYALA MALLS GLORIETTA, AYALA MALLS CIRCUIT..." 
                           class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-colors">
                    @error('title')
                        <p class="text-xs text-rose-500 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="mall_or_location" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                        Mall / Specific Area
                    </label>
                    <input type="text" name="mall_or_location" id="mall_or_location" value="{{ old('mall_or_location') }}" 
                           placeholder="e.g. Glorietta, Ayala Center, Makati City" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-colors">
                    @error('mall_or_location')
                        <p class="text-xs text-rose-500 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Daily Traffic & Specs Summary -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="daily_traffic" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                        Estimated Foot Traffic
                    </label>
                    <input type="text" name="daily_traffic" id="daily_traffic" value="{{ old('daily_traffic') }}" 
                           placeholder="e.g. 120,000+ daily foot traffic" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-colors">
                </div>

                <div>
                    <label for="specifications" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                        Hardware Specifications Tag
                    </label>
                    <input type="text" name="specifications" id="specifications" value="{{ old('specifications', '572mm (W) x 1902mm (H) | 1200 Nits | 2880 Hz | 32kg') }}" 
                           placeholder="e.g. 572mm x 1902mm | 1200 Nits | 2880 Hz" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-colors">
                </div>
            </div>

            <!-- Display Photo Upload -->
            <div>
                <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                    Primary Cover Photo <span class="text-rose-500">*</span>
                </label>
                <div class="flex flex-col sm:flex-row items-center gap-6 p-4 rounded-2xl bg-slate-950 border border-slate-800">
                    <div id="imagePreviewContainer" class="w-36 h-28 rounded-xl bg-slate-900 border border-slate-800 overflow-hidden flex items-center justify-center shrink-0">
                        <img id="imagePreview" src="{{ asset('assets/images/iposters/iposter_hero.jpg') }}" alt="Preview" class="w-full h-full object-cover">
                    </div>
                    <div class="space-y-2 text-center sm:text-left flex-1">
                        <input type="file" name="image_file" id="image_file" accept="image/*" onchange="previewSelectedImage(event)" 
                               class="text-xs text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-extrabold file:bg-blue-600 file:text-white hover:file:bg-blue-500 cursor-pointer">
                        <p class="text-[11px] text-slate-500">Supported formats: JPG, PNG, WEBP. Recommended resolution: 800x600 or higher.</p>
                    </div>
                </div>
            </div>

            <!-- Mall Installation Gallery Photos -->
            <div>
                <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                    Mall Installation Gallery Photos (Upload Multiple)
                </label>
                <div class="p-4 rounded-2xl bg-slate-950 border border-slate-800">
                    <input type="file" name="gallery_files[]" id="gallery_files" multiple accept="image/*" 
                           class="text-xs text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-extrabold file:bg-blue-600 file:text-white hover:file:bg-blue-500 cursor-pointer">
                    <p class="text-[11px] text-slate-500 mt-1.5">You can select multiple photos showing different kiosk angles and mall entrance placements.</p>
                </div>
            </div>

            <!-- Short Description (For Public Cards) -->
            <div>
                <label for="short_description" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                    Short Summary (Displayed on Public Showcase Cards)
                </label>
                <textarea name="short_description" id="short_description" rows="2" 
                          placeholder="Brief 1-2 sentence overview of the location and audience demographic..." 
                          class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-colors">{{ old('short_description') }}</textarea>
            </div>

            <!-- Features & Highlights (Bulleted list for detail page) -->
            <div>
                <label for="features" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                    System Features & Highlights (Detail Page Bullets)
                </label>
                <textarea name="features" id="features" rows="5" 
                          placeholder="• Sleek, ultra-slim and lightweight digital display kiosk.&#10;• Frame Size: 572mm (W) x 1902mm (H).&#10;• 6mm ultra-slim edge with 2880 Hz refresh rate.&#10;• 1200 nits high brightness ensuring vivid daylight and ambient illumination clarity." 
                          class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-colors font-mono leading-relaxed">{{ old('features', "• Sleek, ultra-slim and lightweight digital display kiosk.\n• Frame Size: 572mm (W) x 1902mm (H) with 35mm display depth.\n• 6mm ultra-slim edge for maximum active visual area.\n• 2880 Hz high refresh rate for smooth brand motion playback.\n• 1200 nits high brightness ensuring vivid daylight clarity.\n• 160° ultra-wide viewing angle from all shopper walking directions.\n• Hidden auto-closing inclined bracket and lightweight 32kg portability.") }}</textarea>
                <p class="text-[11px] text-slate-500 mt-1">Each line starting with a bullet (•) or new line will be rendered as a bullet point on the detail page.</p>
            </div>

            <!-- CTA Label & Status -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4 border-t border-slate-800/60 items-center">
                <div>
                    <label for="cta_label" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                        Call-to-Action Button Label
                    </label>
                    <input type="text" name="cta_label" id="cta_label" value="{{ old('cta_label', 'BOOK YOUR IPOSTER ADS NOW') }}" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs focus:outline-none focus:border-blue-500 transition-colors">
                </div>

                <div class="flex items-center gap-3 pt-6">
                    <input type="checkbox" name="is_active" id="is_active" value="1" checked 
                           class="w-4 h-4 rounded border-slate-800 bg-slate-950 text-blue-600 focus:ring-0">
                    <label for="is_active" class="text-xs font-bold text-white cursor-pointer select-none">
                        Publish live immediately on website
                    </label>
                </div>
            </div>

        </div>

        <!-- Submit Bar -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.iposters.index') }}" 
               class="px-6 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold text-xs uppercase tracking-wider transition-colors">
                Cancel
            </a>
            <button type="submit" 
                    class="px-8 py-3 rounded-xl bg-[#0047ba] hover:bg-blue-600 text-white font-black text-xs uppercase tracking-wider shadow-lg shadow-blue-600/30 transition-all transform active:scale-95">
                Save & Upload iPoster
            </button>
        </div>

    </form>

</div>

<script>
    function previewSelectedImage(event) {
        const file = event.target.files[0];
        if (file) {
            const preview = document.getElementById('imagePreview');
            preview.src = URL.createObjectURL(file);
        }
    }
</script>
@endsection
