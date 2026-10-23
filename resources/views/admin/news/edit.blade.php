@extends('admin.layouts.admin')

@section('title', 'Edit News Article')
@section('header-title', 'Edit What\'s New Article')
@section('header-subtitle', 'Update details, change status, or upload a new banner image.')

@section('content')
<div class="max-w-4xl mx-auto">
    
    <!-- Top Action Nav -->
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.news.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-400 hover:text-white transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Back to All Articles</span>
        </a>
        <a href="{{ url('/#news') }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs text-blue-400 hover:text-blue-300 transition-colors">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
            <span>View on Live Site</span>
        </a>
    </div>

    <!-- Edit Form Card -->
    <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-9 shadow-xl space-y-8">
        @csrf
        @method('PUT')

        <!-- Section 1: Current Image & Replace Option -->
        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                Banner Image
            </label>
            <p class="text-xs text-slate-400 mb-3">
                Upload a new image only if you want to replace the current banner. Recommended: 16:9 or 4:3 (e.g. 1200x800 px).
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-start">
                
                <!-- Current Active Image Card -->
                <div class="bg-slate-950/80 border border-slate-800 rounded-2xl p-4 flex flex-col items-center">
                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2 self-start">Current Live Banner</span>
                    <div class="w-full aspect-video rounded-xl overflow-hidden bg-slate-900 border border-slate-700 relative shadow-md">
                        <img src="{{ $news->image_url }}" 
                             alt="{{ $news->title }}" 
                             class="w-full h-full object-cover"
                             onerror="this.src='{{ asset('assets/images/news/news1.jpg') }}'">
                        <div class="absolute bottom-2 left-2 bg-black/70 backdrop-blur-md px-2.5 py-1 rounded-md text-[10px] text-white">
                            Active Banner
                        </div>
                    </div>
                </div>

                <!-- Drop Zone for Replacement Image -->
                <div>
                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2 block">Upload Replacement (Optional)</span>
                    <div id="drop-zone" 
                         class="relative border-2 border-dashed border-slate-700 hover:border-[#0047ba] rounded-2xl p-6 text-center bg-slate-950/60 transition-all cursor-pointer group flex flex-col items-center justify-center min-h-[175px]">
                        
                        <!-- Hidden Real File Input -->
                        <input type="file" 
                               id="news-image-input" 
                               name="image" 
                               accept="image/png,image/jpeg,image/webp,image/gif" 
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                               onchange="previewNewsImage(this)">

                        <!-- Default Placeholder State -->
                        <div id="upload-prompt" class="space-y-2 pointer-events-none">
                            <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-[#0047ba] group-hover:bg-[#0047ba] group-hover:text-white flex items-center justify-center mx-auto text-xl transition-all duration-300">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-white group-hover:text-blue-400 transition-colors">
                                    Click or drag new image
                                </p>
                                <p class="text-[10px] text-slate-400">PNG, JPG, or WEBP up to 10MB</p>
                            </div>
                        </div>

                        <!-- Live Preview State (Hidden Initially) -->
                        <div id="preview-wrapper" class="hidden w-full relative z-20">
                            <div class="relative rounded-xl overflow-hidden border border-slate-700 bg-slate-900 shadow-lg aspect-video">
                                <img id="image-preview" src="#" alt="New Banner Preview" class="w-full h-full object-cover">
                                <div class="absolute bottom-2 left-2 bg-black/70 backdrop-blur-md px-2.5 py-1 rounded-md text-[10px] text-white">
                                    <span id="file-name-label">New File Selected</span>
                                </div>
                            </div>
                            <button type="button" 
                                    onclick="clearImageSelection(event)" 
                                    class="mt-2 inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-red-500/20 hover:bg-red-500/30 text-red-400 text-[11px] font-semibold transition-colors">
                                <i class="fa-solid fa-xmark"></i>
                                <span>Cancel Replacement</span>
                            </button>
                        </div>

                    </div>
                    @error('image')
                        <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

            </div>
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
                       value="{{ old('title', $news->title) }}" 
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
                       value="{{ old('badge', $news->badge) }}" 
                       class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm uppercase focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
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
                           value="{{ old('published_date', $news->published_date ? $news->published_date->format('Y-m-d') : '') }}" 
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
                          class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('description', $news->description) }}</textarea>
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
                          class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">{{ old('content', $news->content) }}</textarea>
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
                           value="{{ old('video_url', $news->video_url) }}" 
                           placeholder="https://www.youtube.com/watch?v=... or https://www.youtube.com/live/..." 
                           class="w-full pl-10 pr-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-red-500 transition-all">
                </div>
                <p class="text-[11px] text-slate-400 mt-1">When provided, an interactive video player will be embedded in the full article page for visitors to watch.</p>
                @if($news->has_video)
                    <div class="mt-2 flex items-center gap-2 text-xs text-emerald-400">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Valid YouTube video attached: {{ $news->video_url }}</span>
                    </div>
                @endif
                @error('video_url')
                    <p class="text-red-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Custom CTA Link -->
            <div class="md:col-span-2">
                <label for="link_url" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                    Custom External Link (Optional)
                </label>
                <input type="text" 
                       id="link_url" 
                       name="link_url" 
                       value="{{ old('link_url', $news->link_url) }}" 
                       placeholder="Leave blank to automatically open this article's dedicated reading page in a new tab" 
                       class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] transition-all">
                <p class="text-[11px] text-slate-400 mt-1">Leave empty (default) to automatically generate the full article view page.</p>
            </div>

        </div>

        <!-- Section 3: Publishing Visibility Switch -->
        <div class="pt-4 border-t border-slate-800 flex items-center justify-between">
            <div>
                <h4 class="text-sm font-bold text-white">Live on Homepage</h4>
                <p class="text-xs text-slate-400">Toggle whether this article should be currently visible on the public What's New carousel.</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer select-none">
                <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ old('is_active', $news->is_active) ? 'checked' : '' }}>
                <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#0047ba]"></div>
            </label>
        </div>

        <!-- Form Actions -->
        <div class="pt-6 border-t border-slate-800 flex flex-wrap items-center justify-between gap-4">
            <div>
                <button type="button" 
                        onclick="promptDeleteNews({{ $news->id }}, {{ json_encode($news->title) }})" 
                        class="px-5 py-3 rounded-xl bg-red-500/10 hover:bg-red-600 text-red-400 hover:text-white border border-red-500/20 hover:border-red-600 text-xs font-bold transition-all flex items-center gap-2">
                    <i class="fa-solid fa-trash"></i>
                    <span>Delete Article</span>
                </button>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.news.index') }}" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold transition-colors">
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
    <form id="delete-form-{{ $news->id }}" action="{{ route('admin.news.destroy', $news) }}" method="POST" class="hidden">
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
        <h3 class="text-lg font-bold text-white mb-2">Delete News Article</h3>
        <p class="text-xs text-slate-400 mb-2 leading-relaxed">
            Are you sure you want to permanently delete this article?
        </p>
        <p id="delete-modal-title" class="text-sm font-semibold text-white bg-slate-950/60 p-3 rounded-xl border border-slate-800 mb-4 break-words line-clamp-2">
            <!-- Dynamic Title -->
        </p>
        <p class="text-[11px] text-red-400 mb-6 font-medium">
            This action cannot be undone and will immediately remove the article from the live website.
        </p>
        <div class="flex items-center justify-center space-x-3">
            <button type="button" onclick="closeDeleteModal()" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold transition-colors">
                Cancel
            </button>
            <button type="button" id="confirm-delete-btn" onclick="executeDeleteNews()" class="px-5 py-2.5 rounded-xl bg-red-600 hover:bg-red-500 text-white text-xs font-bold transition-all shadow-lg shadow-red-600/30 flex items-center gap-2">
                <i class="fa-solid fa-trash"></i>
                <span>Yes, Delete Article</span>
            </button>
        </div>
    </div>
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

    let currentDeleteFormId = null;

    function promptDeleteNews(id, title) {
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

    function executeDeleteNews() {
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
</script>
@endpush
@endsection
