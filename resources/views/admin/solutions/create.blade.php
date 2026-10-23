@extends('admin.layouts.admin')

@section('title', 'Upload LED Display System | Solutions CMS')
@section('header-title', 'Upload LED Display System')
@section('header-subtitle', 'Add a new LED billboard, video wall, or digital monument to the public Solutions showcase.')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Top Navigation Row -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.solutions.index') }}" class="inline-flex items-center space-x-2 text-xs font-bold text-slate-400 hover:text-white transition-colors bg-slate-900 px-4 py-2 rounded-xl border border-slate-800">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Back to Systems List</span>
        </a>
    </div>

    <!-- Main Creation Form -->
    <form action="{{ route('admin.solutions.store') }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl space-y-8">
        @csrf

        <!-- Section 1: System Identification -->
        <div>
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-blue-400 mb-1 flex items-center gap-2">
                <i class="fa-solid fa-tv"></i>
                <span>1. System Overview</span>
            </h3>
            <p class="text-xs text-slate-400 mb-6">Display name, classification, and location.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        System / Site Title <span class="text-red-400">*</span>
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           required 
                           value="{{ old('title') }}" 
                           placeholder="e.g. AYALA MANILA BAY - CENTRAL GARDEN, BACOOR MCDONALDS..." 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all font-semibold uppercase">
                    @error('title')
                        <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Solution Category <span class="text-red-400">*</span>
                    </label>
                    <input type="text" 
                           id="category" 
                           name="category" 
                           required 
                           value="{{ old('category', 'LED Display System') }}" 
                           placeholder="e.g. LED Display System" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                    
                    <div class="flex flex-wrap gap-1.5 mt-2">
                        <span class="text-[10px] text-slate-400 py-0.5">Quick picks:</span>
                        <button type="button" onclick="setCategory('LED Display System')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">LED Display System</button>
                        <button type="button" onclick="setCategory('DOOH Billboard')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">DOOH Billboard</button>
                        <button type="button" onclick="setCategory('Indoor Video Wall')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">Indoor Video Wall</button>
                        <button type="button" onclick="setCategory('Digital Kiosk')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">Digital Kiosk</button>
                    </div>
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Site Location (Optional)
                    </label>
                    <input type="text" 
                           id="location" 
                           name="location" 
                           value="{{ old('location') }}" 
                           placeholder="e.g. Macapagal Boulevard & Aseana Avenue, Parañaque City" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                </div>

                <!-- Short Description (Card body) -->
                <div class="md:col-span-2">
                    <label for="short_description" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Short Description (Card Summary) <span class="text-red-400">*</span>
                    </label>
                    <textarea id="short_description" 
                              name="short_description" 
                              rows="2" 
                              required 
                              placeholder="e.g. Reach larger market in Mega Manila with this LED billboard" 
                              class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('short_description') }}</textarea>
                    <p class="text-[11px] text-slate-400 mt-1">This concise text is displayed directly on the card in the public solutions grid.</p>
                    @error('short_description')
                        <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        <!-- Section 2: Photo Upload -->
        <div class="pt-6 border-t border-slate-800">
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-blue-400 mb-1 flex items-center gap-2">
                <i class="fa-solid fa-image"></i>
                <span>2. Display Photo</span>
            </h3>
            <p class="text-xs text-slate-400 mb-6">Upload a high-resolution photo of the installed LED display monument.</p>

            <div class="space-y-4">
                <div class="relative border-2 border-dashed border-slate-700 hover:border-[#0047ba] bg-slate-950 rounded-2xl p-6 transition-all text-center cursor-pointer group" onclick="document.getElementById('solution-image-input').click()">
                    
                    <input type="file" 
                           id="solution-image-input" 
                           name="image" 
                           accept="image/*" 
                           required 
                           class="hidden" 
                           onchange="previewSolutionImage(this)">

                    <div id="upload-prompt" class="space-y-3 py-4">
                        <div class="w-14 h-14 rounded-2xl bg-slate-800 group-hover:bg-[#0047ba]/20 text-slate-400 group-hover:text-[#0047ba] flex items-center justify-center mx-auto transition-colors text-2xl">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-white">Click to browse or drag & drop photo here</p>
                            <p class="text-xs text-slate-400 mt-1">Supported formats: JPEG, PNG, WEBP (Max 8MB)</p>
                        </div>
                    </div>

                    <div id="preview-wrapper" class="hidden relative max-w-md mx-auto">
                        <img id="image-preview" src="#" alt="Preview" class="w-full h-56 object-cover rounded-xl shadow-lg border border-slate-700">
                        <button type="button" onclick="clearImageSelection(event)" class="absolute top-2 right-2 w-8 h-8 rounded-full bg-red-600 text-white text-xs flex items-center justify-center shadow-lg hover:bg-red-700 transition-colors" title="Remove image">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        <p id="file-name-label" class="text-xs text-slate-300 mt-2 truncate font-mono"></p>
                    </div>

                </div>
                @error('image')
                    <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Section 3: System Features & Highlights -->
        <div class="pt-6 border-t border-slate-800">
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-blue-400 mb-1 flex items-center gap-2">
                <i class="fa-solid fa-list-check"></i>
                <span>3. System Features & Highlights</span>
            </h3>
            <p class="text-xs text-slate-400 mb-6">Detailed specifications shown on the right side of the dedicated full description page.</p>

            <div class="space-y-5">
                
                <!-- Features & Highlights (Bullets) -->
                <div>
                    <label for="features" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Features & Highlights Bullets
                    </label>
                    <textarea id="features" 
                              name="features" 
                              rows="6" 
                              placeholder="• Full Video High Definition LED Display System.&#10;• Comes with a LED size of 25.92M(W) x 14.4m(H).&#10;• 3D capable LED – 4k resolution.&#10;• Embrace the digital ambiance nestled at Macapagal Boulevard and Aseana Avenue..." 
                              class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm font-mono leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('features') }}</textarea>
                    <p class="text-[11px] text-slate-400 mt-1">Tip: Each bullet point (•) or line will be cleanly formatted with an icon on the dedicated page.</p>
                </div>

                <!-- Technical Specs Summary -->
                <div>
                    <label for="specs" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Key Specs Badge (Optional)
                    </label>
                    <input type="text" 
                           id="specs" 
                           name="specs" 
                           value="{{ old('specs') }}" 
                           placeholder="e.g. 25.92M(W) x 14.4m(H) | 4K 3D Capable" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                </div>

            </div>
        </div>

        <!-- Section 4: Action Button Configuration -->
        <div class="pt-6 border-t border-slate-800">
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-blue-400 mb-1 flex items-center gap-2">
                <i class="fa-solid fa-bullhorn"></i>
                <span>4. Ad Booking Action Button</span>
            </h3>
            <p class="text-xs text-slate-400 mb-6">Configure the primary call to action button on the full description page.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                
                <!-- CTA Button Label -->
                <div>
                    <label for="cta_label" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Button Label
                    </label>
                    <input type="text" 
                           id="cta_label" 
                           name="cta_label" 
                           value="{{ old('cta_label', 'BOOK YOUR ADS NOW') }}" 
                           placeholder="BOOK YOUR ADS NOW" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all font-bold">
                </div>

                <!-- CTA URL (Optional) -->
                <div>
                    <label for="cta_url" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Custom Booking URL / Form Link (Optional)
                    </label>
                    <input type="text" 
                           id="cta_url" 
                           name="cta_url" 
                           value="{{ old('cta_url') }}" 
                           placeholder="Leave blank to automatically generate an Ad Booking email inquiry" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                    <p class="text-[11px] text-slate-400 mt-1">Defaults to generating an email inquiry to inquiry@globaltronics.net with pre-filled ad slot details.</p>
                </div>

            </div>
        </div>

        <!-- Section 5: Publishing Status -->
        <div class="pt-6 border-t border-slate-800 flex items-center justify-between">
            <div>
                <h4 class="text-sm font-bold text-white">Live on Public Solutions Showcase</h4>
                <p class="text-xs text-slate-400">If toggled off, this system will be saved as draft and hidden from visitors.</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer select-none">
                <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#0047ba]"></div>
            </label>
        </div>

        <!-- Form Actions -->
        <div class="pt-6 border-t border-slate-800 flex items-center justify-end space-x-3">
            <a href="{{ route('admin.solutions.index') }}" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-7 py-3 rounded-xl bg-[#0047ba] hover:bg-blue-600 text-white text-xs font-extrabold shadow-lg shadow-blue-600/30 transition-all flex items-center gap-2 active:scale-95">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <span>Publish Solution</span>
            </button>
        </div>

    </form>
</div>

@push('scripts')
<script>
    function setCategory(cat) {
        document.getElementById('category').value = cat;
    }

    function previewSolutionImage(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const previewImg = document.getElementById('image-preview');
                const promptBox = document.getElementById('upload-prompt');
                const previewBox = document.getElementById('preview-wrapper');
                const nameLabel = document.getElementById('file-name-label');

                previewImg.src = e.target.result;
                nameLabel.innerText = file.name;
                promptBox.classList.add('hidden');
                previewBox.classList.remove('hidden');
            };

            reader.readAsDataURL(file);
        }
    }

    function clearImageSelection(e) {
        e.stopPropagation();
        const input = document.getElementById('solution-image-input');
        const promptBox = document.getElementById('upload-prompt');
        const previewBox = document.getElementById('preview-wrapper');
        const previewImg = document.getElementById('image-preview');

        input.value = '';
        previewImg.src = '#';
        previewBox.classList.add('hidden');
        promptBox.classList.remove('hidden');
    }
</script>
@endpush
@endsection
