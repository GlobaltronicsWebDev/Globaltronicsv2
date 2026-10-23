@extends('admin.layouts.admin')

@section('title', 'Edit ' . $iposter->title)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Section -->
    <div class="flex items-center justify-between pb-2 border-b border-slate-800">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">
                <a href="{{ route('admin.iposters.index') }}" class="hover:text-white transition-colors">Digital iPoster CMS</a>
                <span>/</span>
                <span class="text-blue-400">Edit Deployment</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white uppercase tracking-wide flex items-center gap-3">
                <i class="fa-solid fa-pen-to-square text-blue-500"></i>
                <span>Edit iPoster Site</span>
            </h1>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ $iposter->read_url }}" target="_blank" 
               class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white font-bold text-xs flex items-center gap-2 border border-slate-700 transition-colors">
                <i class="fa-solid fa-arrow-up-right-from-square text-xs text-yellow-400"></i>
                <span>View Live</span>
            </a>
            <a href="{{ route('admin.iposters.index') }}" 
               class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white font-bold text-xs flex items-center gap-2 border border-slate-700 transition-colors">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Back to iPosters</span>
            </a>
        </div>
    </div>

    <!-- Edit Form -->
    <form action="{{ route('admin.iposters.update', $iposter) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <input type="hidden" name="category" value="{{ $iposter->category ?: 'Digital iPoster Ad Placement' }}">

        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm">
            
            <!-- Site Name & Mall Location -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                        Deployment Site Title <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="title" id="title" required value="{{ old('title', $iposter->title) }}" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs focus:outline-none focus:border-blue-500 transition-colors">
                    @error('title')
                        <p class="text-xs text-rose-500 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="mall_or_location" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                        Mall / Specific Area
                    </label>
                    <input type="text" name="mall_or_location" id="mall_or_location" value="{{ old('mall_or_location', $iposter->mall_or_location) }}" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs focus:outline-none focus:border-blue-500 transition-colors">
                </div>
            </div>

            <!-- Daily Traffic & Specs Summary -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="daily_traffic" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                        Estimated Foot Traffic
                    </label>
                    <input type="text" name="daily_traffic" id="daily_traffic" value="{{ old('daily_traffic', $iposter->daily_traffic) }}" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs focus:outline-none focus:border-blue-500 transition-colors">
                </div>

                <div>
                    <label for="specifications" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                        Hardware Specifications Tag
                    </label>
                    <input type="text" name="specifications" id="specifications" value="{{ old('specifications', $iposter->specifications) }}" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs focus:outline-none focus:border-blue-500 transition-colors">
                </div>
            </div>

            <!-- Display Photo Upload / Replace -->
            <div>
                <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                    Primary Cover Photo
                </label>
                <div class="flex flex-col sm:flex-row items-center gap-6 p-4 rounded-2xl bg-slate-950 border border-slate-800">
                    <div id="imagePreviewContainer" class="w-36 h-28 rounded-xl bg-slate-900 border border-slate-800 overflow-hidden flex items-center justify-center shrink-0">
                        <img id="imagePreview" src="{{ $iposter->image_url }}" alt="Preview" class="w-full h-full object-cover">
                    </div>
                    <div class="space-y-2 text-center sm:text-left flex-1">
                        <input type="file" name="image_file" id="image_file" accept="image/*" onchange="previewSelectedImage(event)" 
                               class="text-xs text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-extrabold file:bg-blue-600 file:text-white hover:file:bg-blue-500 cursor-pointer">
                        <p class="text-[11px] text-slate-500">Leave empty to keep current photo. Supported formats: JPG, PNG, WEBP.</p>
                    </div>
                </div>
            </div>

            <!-- Gallery Photos Upload / Existing Preview -->
            <div>
                <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                    Mall Installation Gallery Photos (Upload Multiple)
                </label>
                <div class="space-y-4 p-4 rounded-2xl bg-slate-950 border border-slate-800">
                    @if(!empty($iposter->gallery_list))
                        <div class="flex items-center gap-3 overflow-x-auto pb-2">
                            @foreach($iposter->gallery_list as $gIdx => $gPic)
                                <div class="w-20 h-16 rounded-xl overflow-hidden border border-slate-800 shrink-0 bg-slate-900 relative group">
                                    <img src="{{ $gPic }}" alt="Gallery {{ $gIdx + 1 }}" class="w-full h-full object-cover">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div>
                        <input type="file" name="gallery_files[]" id="gallery_files" multiple accept="image/*" 
                               class="text-xs text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-extrabold file:bg-blue-600 file:text-white hover:file:bg-blue-500 cursor-pointer">
                        <p class="text-[11px] text-slate-500 mt-1.5">Select multiple images to add them to this mall location's installation gallery.</p>
                    </div>
                </div>
            </div>

            <!-- Short Description (For Public Cards) -->
            <div>
                <label for="short_description" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                    Short Summary (Displayed on Public Showcase Cards)
                </label>
                <textarea name="short_description" id="short_description" rows="2" 
                          class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs focus:outline-none focus:border-blue-500 transition-colors">{{ old('short_description', $iposter->short_description) }}</textarea>
            </div>

            <!-- Features & Highlights (Bulleted list for detail page) -->
            <div>
                <label for="features" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                    System Features & Highlights (Detail Page Bullets)
                </label>
                <textarea name="features" id="features" rows="6" 
                          class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs focus:outline-none focus:border-blue-500 transition-colors font-mono leading-relaxed">{{ old('features', $iposter->features) }}</textarea>
            </div>

            <!-- CTA Label & Status -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4 border-t border-slate-800/60 items-center">
                <div>
                    <label for="cta_label" class="block text-xs font-extrabold uppercase tracking-wider text-slate-300 mb-2">
                        Call-to-Action Button Label
                    </label>
                    <input type="text" name="cta_label" id="cta_label" value="{{ old('cta_label', $iposter->cta_label) }}" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs focus:outline-none focus:border-blue-500 transition-colors">
                </div>

                <div class="flex items-center gap-3 pt-6">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $iposter->is_active) ? 'checked' : '' }} 
                           class="w-4 h-4 rounded border-slate-800 bg-slate-950 text-blue-600 focus:ring-0">
                    <label for="is_active" class="text-xs font-bold text-white cursor-pointer select-none">
                        Active & Published Live on Website
                    </label>
                </div>
            </div>

        </div>

        <!-- Submit & Delete Action Bar -->
        <div class="flex items-center justify-between">
            <button type="button" onclick="openDeleteModal()" 
                    class="px-5 py-3 rounded-xl bg-rose-600/10 hover:bg-rose-600 text-rose-400 hover:text-white font-bold text-xs uppercase tracking-wider border border-rose-500/20 transition-all flex items-center gap-2">
                <i class="fa-solid fa-trash-can text-xs"></i>
                <span>Delete Deployment</span>
            </button>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.iposters.index') }}" 
                   class="px-6 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold text-xs uppercase tracking-wider transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-8 py-3 rounded-xl bg-[#0047ba] hover:bg-blue-600 text-white font-black text-xs uppercase tracking-wider shadow-lg shadow-blue-600/30 transition-all transform active:scale-95">
                    Save Changes
                </button>
            </div>
        </div>

    </form>

</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-200">
    <div class="bg-slate-900 border border-slate-800 rounded-3xl max-w-md w-full p-6 shadow-2xl transform scale-95 transition-transform duration-200" id="deleteModalBox">
        <div class="w-14 h-14 rounded-2xl bg-rose-500/10 border border-rose-500/20 text-rose-500 flex items-center justify-center mx-auto mb-4 text-2xl">
            <i class="fa-solid fa-trash-can"></i>
        </div>
        
        <h3 class="text-lg font-black text-white text-center uppercase tracking-wide">
            Delete {{ $iposter->title }}?
        </h3>
        
        <p class="text-xs text-slate-400 text-center mt-2 leading-relaxed">
            This action cannot be undone. This deployment site will be permanently removed from the public website and admin portal.
        </p>

        <form method="POST" action="{{ route('admin.iposters.destroy', $iposter) }}" class="mt-6 flex items-center gap-3">
            @csrf
            @method('DELETE')
            <button type="button" onclick="closeDeleteModal()" 
                    class="flex-1 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold text-xs uppercase tracking-wider transition-colors">
                Cancel
            </button>
            <button type="submit" 
                    class="flex-1 py-3 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-black text-xs uppercase tracking-wider transition-all shadow-lg shadow-rose-600/30">
                Confirm Delete
            </button>
        </form>
    </div>
</div>

<script>
    function previewSelectedImage(event) {
        const file = event.target.files[0];
        if (file) {
            const preview = document.getElementById('imagePreview');
            preview.src = URL.createObjectURL(file);
        }
    }

    function openDeleteModal() {
        const modal = document.getElementById('deleteModal');
        const box = document.getElementById('deleteModalBox');
        modal.classList.remove('opacity-0', 'pointer-events-none');
        box.classList.remove('scale-95');
        box.classList.add('scale-100');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        const box = document.getElementById('deleteModalBox');
        modal.classList.add('opacity-0', 'pointer-events-none');
        box.classList.add('scale-95');
        box.classList.remove('scale-100');
    }
</script>
@endsection
