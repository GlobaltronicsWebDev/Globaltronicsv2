@extends('admin.layouts.admin')

@section('title', 'Upload News Article')
@section('header-title', 'Upload What\'s New Article')
@section('header-subtitle', 'Add a new featured story, installation highlight, or DOOH announcement.')

@section('content')
<div class="max-w-4xl mx-auto">
    
    <!-- Top Action Nav -->
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.news.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-400 hover:text-white transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Back to All Articles</span>
        </a>
    </div>

    <!-- Upload Form Card -->
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-9 shadow-xl space-y-8">
        @csrf

        <!-- Section 1: Image Upload with Drag & Drop Preview -->
        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                Banner Image <span class="text-red-400">*</span>
            </label>
            <p class="text-xs text-slate-400 mb-3">
                Recommended aspect ratio: 16:9 or 4:3 (e.g. 1200x800 px). Max size: 10MB (JPEG, PNG, WEBP).
            </p>

            <!-- Drop Zone Container -->
            <div id="drop-zone" 
                 class="relative border-2 border-dashed border-slate-700 hover:border-[#0047ba] rounded-2xl p-6 sm:p-8 text-center bg-slate-950/60 transition-all cursor-pointer group flex flex-col items-center justify-center min-h-[240px]">
                
                <!-- Hidden Real File Input -->
                <input type="file" 
                       id="news-image-input" 
                       name="image" 
                       accept="image/png,image/jpeg,image/webp,image/gif" 
                       required 
                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                       onchange="previewNewsImage(this)">

                <!-- Default Placeholder State -->
                <div id="upload-prompt" class="space-y-3 pointer-events-none">
                    <div class="w-16 h-16 rounded-2xl bg-blue-500/10 text-[#0047ba] group-hover:bg-[#0047ba] group-hover:text-white flex items-center justify-center mx-auto text-2xl transition-all duration-300 shadow-sm">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white group-hover:text-blue-400 transition-colors">
                            Click to browse or drag & drop banner image
                        </p>
                        <p class="text-xs text-slate-400 mt-1">PNG, JPG, or WEBP up to 10MB</p>
                    </div>
                </div>

                <!-- Live Preview State (Hidden Initially) -->
                <div id="preview-wrapper" class="hidden w-full max-w-lg mx-auto relative z-20">
                    <div class="relative rounded-xl overflow-hidden border border-slate-700 bg-slate-900 shadow-2xl aspect-video max-h-72">
                        <img id="image-preview" src="#" alt="Banner Preview" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-3 left-3 flex items-center space-x-2 bg-black/70 backdrop-blur-md px-3 py-1 rounded-full text-xs text-white">
                            <i class="fa-solid fa-check text-emerald-400"></i>
                            <span id="file-name-label">Image Selected</span>
                        </div>
                    </div>
                    <button type="button" 
                            onclick="clearImageSelection(event)" 
                            class="mt-3 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-red-500/20 hover:bg-red-500/30 text-red-400 text-xs font-semibold transition-colors">
                        <i class="fa-solid fa-trash-can"></i>
                        <span>Remove & Pick Different Image</span>
                    </button>
                </div>

            </div>
            @error('image')
                <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Section 2: Article Meta & Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Title -->
            <div class="md:col-span-2">
                <label for="title" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                    Article Headline / Title <span class="text-red-400">*</span>
                </label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       required 
                       value="{{ old('title') }}" 
                       placeholder="e.g. Powering brighter experiences at UNIOIL Guadalupe!" 
                       class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                @error('title')
                    <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Badge / Category Tag -->
            <div>
                <label for="badge" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                    Badge / Tag <span class="text-red-400">*</span>
                </label>
                <input type="text" 
                       id="badge" 
                       name="badge" 
                       required 
                       value="{{ old('badge', 'GLOBALTRONICS') }}" 
                       placeholder="e.g. GLOBALTRONICS, SMART CITY" 
                       class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm uppercase focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                <!-- Suggested Quick Pills -->
                <div class="flex flex-wrap gap-1.5 mt-2">
                    <span class="text-[10px] text-slate-400 py-0.5">Quick picks:</span>
                    <button type="button" onclick="setBadge('GLOBALTRONICS')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">GLOBALTRONICS</button>
                    <button type="button" onclick="setBadge('SMART CITY')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">SMART CITY</button>
                    <button type="button" onclick="setBadge('LED DISPLAY')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">LED DISPLAY</button>
                    <button type="button" onclick="setBadge('INNOVATION')" class="px-2 py-0.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-[10px] font-bold rounded">INNOVATION</button>
                </div>
                @error('badge')
                    <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Published Date -->
            <div>
                <label for="published_date" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                    Published Date <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                    <input type="date" 
                           id="published_date" 
                           name="published_date" 
                           required 
                           value="{{ old('published_date', date('Y-m-d')) }}" 
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                </div>
                @error('published_date')
                    <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description / Summary -->
            <div class="md:col-span-2">
                <label for="description" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                    Summary / Description <span class="text-red-400">*</span>
                </label>
                <textarea id="description" 
                          name="description" 
                          rows="3" 
                          required 
                          placeholder="Brief summary that displays on the card carousel on the homepage..." 
                          class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('description') }}</textarea>
                <p class="text-[11px] text-slate-400 mt-1">Recommended length: 1 to 3 concise sentences.</p>
                @error('description')
                    <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Full Article Story / Details -->
            <div class="md:col-span-2">
                <label for="content" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                    Full Article Content (What users read when clicking "Read More")
                </label>
                <textarea id="content" 
                          name="content" 
                          rows="6" 
                          placeholder="Detailed article body, project specifications, quotes, or press release copy. Paragraphs are automatically formatted on the reading page..." 
                          class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('content') }}</textarea>
                <p class="text-[11px] text-slate-400 mt-1">Automatic: If left empty, the summary description above will be used automatically as the article body.</p>
            </div>

            <!-- YouTube Video URL (Optional) -->
            <div class="md:col-span-2">
                <label for="video_url" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2 flex items-center justify-between">
                    <span class="flex items-center gap-2">
                        <i class="fa-brands fa-youtube text-red-500 text-sm"></i>
                        <span>YouTube Video URL (Optional)</span>
                    </span>
                    <span class="text-[11px] text-slate-400 font-normal">Embed watch link, live stream, shorts, youtu.be, or video ID</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                        <i class="fa-solid fa-play text-xs text-red-400"></i>
                    </div>
                    <input type="url" 
                           id="video_url" 
                           name="video_url" 
                           value="{{ old('video_url') }}" 
                           placeholder="https://www.youtube.com/watch?v=... or https://youtube.com/live/..." 
                           class="w-full pl-10 pr-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-red-500 transition-all">
                </div>
                <p class="text-[11px] text-slate-400 mt-1">When provided, an interactive video player will be embedded in the full article page for visitors to watch.</p>
                @error('video_url')
                    <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Optional Custom CTA Link -->
            <div class="md:col-span-2">
                <label for="link_url" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                    Custom External Link (Optional)
                </label>
                <input type="text" 
                       id="link_url" 
                       name="link_url" 
                       value="{{ old('link_url') }}" 
                       placeholder="Leave blank to automatically open this article's dedicated reading page in a new tab" 
                       class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                <p class="text-[11px] text-slate-400 mt-1">Leave empty (default) to automatically generate the full article view page.</p>
            </div>

        </div>

        <!-- Section 3: Publishing Visibility Switch -->
        <div class="pt-4 border-t border-slate-800 flex items-center justify-between">
            <div>
                <h4 class="text-sm font-bold text-white">Publish Immediately</h4>
                <p class="text-xs text-slate-400">If toggled off, this article will be saved as a draft and hidden from the homepage carousel.</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer select-none">
                <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#0047ba]"></div>
            </label>
        </div>

        <!-- Form Actions -->
        <div class="pt-6 border-t border-slate-800 flex items-center justify-end space-x-3">
            <a href="{{ route('admin.news.index') }}" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-7 py-3 rounded-xl bg-[#0047ba] hover:bg-blue-600 text-white text-xs font-extrabold shadow-lg shadow-blue-600/30 transition-all flex items-center gap-2 active:scale-95">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <span>Upload & Save Article</span>
            </button>
        </div>

    </form>
</div>

@push('scripts')
<script>
    function previewNewsImage(input) {
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
        const input = document.getElementById('news-image-input');
        const promptBox = document.getElementById('upload-prompt');
        const previewBox = document.getElementById('preview-wrapper');
        const previewImg = document.getElementById('image-preview');

        input.value = '';
        previewImg.src = '#';
        previewBox.classList.add('hidden');
        promptBox.classList.remove('hidden');
    }

    function setBadge(text) {
        document.getElementById('badge').value = text;
    }
</script>
@endpush
@endsection
