@extends('admin.layouts.admin')

@section('title', 'Edit Solution: ' . $solution->title . ' | Solutions CMS')
@section('header-title', 'Edit LED Display System')
@section('header-subtitle', 'Update specifications, photo, or live visibility for this system.')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Top Navigation Row -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.solutions.index') }}" class="inline-flex items-center space-x-2 text-xs font-bold text-slate-400 hover:text-white transition-colors bg-slate-900 px-4 py-2 rounded-xl border border-slate-800">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Back to Systems List</span>
        </a>

        @if($solution->is_active)
            <a href="{{ $solution->read_url }}" target="_blank" class="inline-flex items-center space-x-1.5 text-xs font-semibold text-emerald-400 hover:text-emerald-300 transition-colors bg-emerald-500/10 px-3.5 py-1.5 rounded-xl border border-emerald-500/20">
                <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                <span>View Live Description Page</span>
            </a>
        @endif
    </div>

    <!-- Main Edit Form -->
    <form action="{{ route('admin.solutions.update', $solution) }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl space-y-8">
        @csrf
        @method('PUT')

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
                           value="{{ old('title', $solution->title) }}" 
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
                           value="{{ old('category', $solution->category) }}" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                    
                    <div class="flex flex-wrap gap-1.5 mt-2">
                        <span class="text-[10px] text-slate-400 py-0.5">Quick picks:</span>
                        <button type="button" onclick="setCategory('LED Display System')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">LED Display System</button>
                        <button type="button" onclick="setCategory('DOOH Billboard')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">DOOH Billboard</button>
                        <button type="button" onclick="setCategory('Indoor Video Wall')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">Indoor Video Wall</button>
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
                           value="{{ old('location', $solution->location) }}" 
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
                              class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('short_description', $solution->short_description) }}</textarea>
                    <p class="text-[11px] text-slate-400 mt-1">This concise text is displayed directly on the card in the public solutions grid.</p>
                </div>

            </div>
        </div>

        <!-- Section 2: Photo Management -->
        <div class="pt-6 border-t border-slate-800">
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-blue-400 mb-1 flex items-center gap-2">
                <i class="fa-solid fa-image"></i>
                <span>2. Display Photo</span>
            </h3>
            <p class="text-xs text-slate-400 mb-6">Current photo preview or upload a replacement.</p>

            <div class="space-y-4">
                
                @if($solution->image)
                    <div class="mb-4">
                        <p class="text-xs text-slate-400 mb-2 font-semibold">Current Active Photo:</p>
                        <div class="w-full max-w-md h-52 rounded-xl overflow-hidden border border-slate-700 bg-slate-950">
                            <img src="{{ $solution->image_url }}" alt="{{ $solution->title }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                @endif

                <div class="relative border-2 border-dashed border-slate-700 hover:border-[#0047ba] bg-slate-950 rounded-2xl p-6 transition-all text-center cursor-pointer group" onclick="document.getElementById('solution-image-input').click()">
                    
                    <input type="file" 
                           id="solution-image-input" 
                           name="image" 
                           accept="image/*" 
                           class="hidden" 
                           onchange="previewSolutionImage(this)">

                    <div id="upload-prompt" class="space-y-3 py-4">
                        <div class="w-14 h-14 rounded-2xl bg-slate-800 group-hover:bg-[#0047ba]/20 text-slate-400 group-hover:text-[#0047ba] flex items-center justify-center mx-auto transition-colors text-2xl">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-white">Click to upload a new replacement photo</p>
                            <p class="text-xs text-slate-400 mt-1">Leave blank to keep current photo. Supported: JPEG, PNG, WEBP (Max 8MB)</p>
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
                              class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm font-mono leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('features', $solution->features) }}</textarea>
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
                           value="{{ old('specs', $solution->specs) }}" 
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
                           value="{{ old('cta_label', $solution->cta_label) }}" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all font-bold">
                </div>

                <!-- CTA URL -->
                <div>
                    <label for="cta_url" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                        Custom Booking URL / Form Link (Optional)
                    </label>
                    <input type="text" 
                           id="cta_url" 
                           name="cta_url" 
                           value="{{ old('cta_url', $solution->cta_url) }}" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                </div>

            </div>
        </div>

        <!-- Section 5: Publishing Status -->
        <div class="pt-6 border-t border-slate-800 flex items-center justify-between">
            <div>
                <h4 class="text-sm font-bold text-white">Live on Public Solutions Showcase</h4>
                <p class="text-xs text-slate-400">Toggle whether this display system should be visible on the website.</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer select-none">
                <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ old('is_active', $solution->is_active) ? 'checked' : '' }}>
                <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#0047ba]"></div>
            </label>
        </div>

        <!-- Form Actions -->
        <div class="pt-6 border-t border-slate-800 flex flex-wrap items-center justify-between gap-4">
            <div>
                <button type="button" 
                        onclick="promptDeleteSolution({{ $solution->id }}, {{ json_encode($solution->title) }})" 
                        class="px-5 py-3 rounded-xl bg-red-500/10 hover:bg-red-600 text-red-400 hover:text-white border border-red-500/20 hover:border-red-600 text-xs font-bold transition-all flex items-center gap-2">
                    <i class="fa-solid fa-trash"></i>
                    <span>Delete System</span>
                </button>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.solutions.index') }}" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-7 py-3 rounded-xl bg-[#0047ba] hover:bg-blue-600 text-white text-xs font-extrabold shadow-lg shadow-blue-600/30 transition-all flex items-center gap-2 active:scale-95">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Save Changes</span>
                </button>
            </div>
        </div>

    </form>

    <!-- Separate Hidden Delete Form -->
    <form id="delete-form-{{ $solution->id }}" action="{{ route('admin.solutions.destroy', $solution) }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</div>

<!-- Custom Delete Confirmation Modal -->
<div id="delete-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl max-w-md w-full p-6 shadow-2xl relative text-center">
        <div class="w-14 h-14 rounded-2xl bg-red-500/10 text-red-500 border border-red-500/20 flex items-center justify-center mx-auto mb-4">
            <i class="fa-solid fa-trash-can text-2xl"></i>
        </div>
        <h3 class="text-lg font-bold text-white mb-2">Delete LED Display System</h3>
        <p class="text-xs text-slate-400 mb-2 leading-relaxed">
            Are you sure you want to permanently delete this system?
        </p>
        <p id="delete-modal-title" class="text-sm font-semibold text-white bg-slate-950/60 p-3 rounded-xl border border-slate-800 mb-4 break-words line-clamp-2">
            <!-- Dynamic Title -->
        </p>
        <p class="text-[11px] text-red-400 mb-6 font-medium">
            This will immediately remove this system from the public Solutions showcase.
        </p>
        <div class="flex items-center justify-center space-x-3">
            <button type="button" onclick="closeDeleteModal()" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold transition-colors">
                Cancel
            </button>
            <button type="button" id="confirm-delete-btn" onclick="executeDeleteSolution()" class="px-5 py-2.5 rounded-xl bg-red-600 hover:bg-red-500 text-white text-xs font-bold transition-all shadow-lg shadow-red-600/30 flex items-center gap-2">
                <i class="fa-solid fa-trash"></i>
                <span>Yes, Delete System</span>
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function setCategory(cat) {
        document.getElementById('category').value = cat;
    }

    let currentDeleteFormId = null;

    function promptDeleteSolution(id, title) {
        currentDeleteFormId = 'delete-form-' + id;
        document.getElementById('delete-modal-title').textContent = title;
        const modal = document.getElementById('delete-modal');
        modal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('delete-modal');
        modal.classList.add('hidden');
        currentDeleteFormId = null;
    }

    function executeDeleteSolution() {
        if (currentDeleteFormId) {
            const form = document.getElementById(currentDeleteFormId);
            if (form) {
                const btn = document.getElementById('confirm-delete-btn');
                btn.disabled = true;
                btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> <span>Deleting...</span>';
                form.submit();
            }
        }
    }

    window.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDeleteModal();
        }
    });

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
