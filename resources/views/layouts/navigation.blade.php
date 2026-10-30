<!-- Top Contact & Social Bar (Hidden in Mobile Mode) -->
<div class="hidden md:block bg-black text-white text-xs py-2 px-4 sm:px-8 lg:px-12 border-b border-neutral-900">
    <div class="w-full flex items-center justify-between gap-4">
        <!-- Contact Info (Equal Gaps & Proper Alignment) -->
        <div class="flex items-center gap-6 sm:gap-8 shrink-0">
            <a href="tel:0287212878" class="flex items-center gap-2 text-yellow-400 hover:text-yellow-300 font-normal transition-colors">
                <i class="fa-solid fa-phone text-yellow-400 text-[14px]"></i>
                <span class="text-xs sm:text-[14px]">(02) 8721-2878</span>
            </a>

            <a href="mailto:inquiry@globaltronics.net" class="flex items-center gap-2 text-yellow-400 hover:text-yellow-300 font-normal transition-colors">
                <i class="fa-solid fa-envelope text-yellow-400 text-[14px]"></i>
                <span class="text-xs sm:text-[14px]">inquiry@globaltronics.net</span>
            </a>
        </div>

        <!-- Social Media Icons (White background, turns blue with white icon on click/hover) -->
        <div class="flex items-center gap-2.5 shrink-0">
            <!-- Facebook -->
            <a href="https://www.facebook.com/GlobaltronicsPH" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#1877F2] hover:bg-[#0047ba] hover:text-white active:bg-[#0047ba] active:text-white focus:bg-[#0047ba] focus:text-white hover:scale-105 active:scale-90 transition-all duration-300 shadow-sm" title="Facebook">
               <i class="fa-brands fa-facebook text-[18px]"></i>
            </a>
            <!-- Instagram -->
            <a href="https://www.instagram.com/globaltronicsph/?hl=en" target="_blank" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#E4405F] hover:bg-[#0047ba] hover:text-white active:bg-[#0047ba] active:text-white focus:bg-[#0047ba] focus:text-white hover:scale-105 active:scale-90 transition-all duration-300 shadow-sm" title="Instagram">
                <i class="fa-brands fa-instagram text-[18px]"></i>
            </a>
            <!-- YouTube -->
            <a href="https://www.youtube.com/@GlobaltronicsPH" target="_blank" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#FF0000] hover:bg-[#0047ba] hover:text-white active:bg-[#0047ba] active:text-white focus:bg-[#0047ba] focus:text-white hover:scale-105 active:scale-90 transition-all duration-300 shadow-sm" title="YouTube">
                <i class="fa-brands fa-youtube text-[18px]"></i>
            </a>
            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/company/globaltronicsphl" target="_blank" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#0A66C2] hover:bg-[#0047ba] hover:text-white active:bg-[#0047ba] active:text-white focus:bg-[#0047ba] focus:text-white hover:scale-105 active:scale-90 transition-all duration-300 shadow-sm" title="LinkedIn">
                <i class="fa-brands fa-linkedin text-[18px]"></i>
            </a>
        </div>
    </div>
</div>

<!-- Main Royal Blue Navigation Header (Sticky) -->
<nav class="bg-[#0047ba] text-white shadow-md sticky top-0 z-50">
    <div class="w-full px-2 sm:px-8 lg:px-9 ">
        <div class="flex items-center justify-between h-20">

            <!-- Logo Aligned at Left Corner -->
                <a href="{{ url('/') }}" class="flex items-center group py-2 shrink-0  ml-8 lg:ml-16">
                    <img src="{{ asset('assets/images/logos/global_logo.webp') }}" 
                     alt="Globaltronics Logo" 
                     fetchpriority="high"
                     decoding="async"
                     class="h-10 sm:h-12 md:h-14 w-auto max-w-[220px] sm:max-w-[280px] object-contain drop-shadow-md group-hover:scale-[1.02] transition-transform duration-300">
            </a>

            <!-- Desktop Navigation Menu (PERFECTLY CENTER ALIGNED) -->
            <div class="hidden lg:flex flex-1 items-center justify-center  -translate-x-12 xl:-translate-x-16 space-x-1 lg:space-x-2 xl:space-x-3  text-[11px] xl:text-[15px] font-bold tracking-tight uppercase font-sans">
                <a href="{{ url('/') }}" class="py-2 px-1 text-white hover:text-white-300 transition-colors border-b-2 border-transparent hover:border-yellow-300 whitespace-nowrap">
                    HOME
                </a>

                <!-- About Menu Link & Dropdown -->
                <div class="relative group">
                    <a href="{{ route('about') }}" target="_blank" class="flex items-center space-x-1 py-2 px-1 text-white hover:text-white-300 transition-colors border-b-2 {{ request()->routeIs('about') ? 'border-yellow-300 text-yellow-300' : 'border-transparent hover:border-yellow-300' }} whitespace-nowrap">
                        <span>ABOUT</span>
                        <svg class="transition-transform duration-200 group-hover:rotate-180 shrink-0 text-current inline-block" style="width: 10px; height: 10px; min-width: 10px; max-width: 10px; min-height: 10px; max-height: 10px; margin-left: 4px;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <div class="absolute left-1/2 -translate-x-1/2 mt-2 w-52 bg-white text-slate-900 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 py-2 border border-slate-100">
                        <a href="{{ route('about') }}" target="_blank" class="block px-4 py-2.5 text-xs font-bold hover:bg-blue-50 hover:text-[#0047ba] transition-colors">Company Overview</a>
                    </div>
                </div>

                <a href="https://digiparc.globaltronics.net/" target="_blank" class="py-2 px-1 text-white hover:text-white-300 transition-colors border-b-2 border-transparent hover:border-yellow-300 whitespace-nowrap">
                    DIGIPARC
                </a>

                <!-- Services Dropdown -->
                <div class="relative group">
                    <button class="flex items-center space-x-1 py-2 px-1 text-white hover:text-white-300 transition-colors border-b-2 border-transparent hover:border-yellow-300 focus:outline-none whitespace-nowrap">
                        <span>SERVICES</span>
                        <svg class="transition-transform duration-200 group-hover:rotate-180 shrink-0 text-current inline-block" style="width: 10px; height: 10px; min-width: 10px; max-width: 10px; min-height: 10px; max-height: 10px; margin-left: 4px;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute left-1/2 -translate-x-1/2 mt-2 w-64 bg-white text-slate-900 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 py-2 border border-slate-100 uppercase text-[11px] font-bold">
                        <a href="{{ route('solutions.index') }}" class="block px-4 py-2.5 bg-blue-50/70 text-[#0047ba] hover:bg-blue-100 hover:text-blue-800 transition-colors font-extrabold flex items-center justify-between">
                            <span>LED Display Systems</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                        <a href="{{ route('services.iposters.index') }}" class="block px-4 py-2.5 hover:bg-blue-50 hover:text-[#0047ba] transition-colors">Digital IPoster AD Placement</a>
                        <a href="{{ url('/#services') }}" target="_blank" class="block px-4 py-2.5 hover:bg-blue-50 hover:text-[#0047ba] transition-colors">Static AD Placement</a>
                        <a href="{{ route('services.digital-design-consultancy') }}" class="block px-4 py-2.5 hover:bg-blue-50 hover:text-[#0047ba] transition-colors">Digital Design & Consultancy</a>
                    </div>
                </div>

                <!-- Solutions Dropdown -->
                <div class="relative group">
                    <button class="flex items-center space-x-1 py-2 px-1 text-white hover:text-white-300 transition-colors border-b-2 border-transparent hover:border-yellow-300 focus:outline-none whitespace-nowrap">
                        <span>SOLUTIONS</span>
                        <svg class="transition-transform duration-200 group-hover:rotate-180 shrink-0 text-current inline-block" style="width: 10px; height: 10px; min-width: 10px; max-width: 10px; min-height: 10px; max-height: 10px; margin-left: 4px;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute left-1/2 -translate-x-1/2 mt-2 w-64 bg-white text-slate-900 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 py-2 border border-slate-100 uppercase text-[11px] font-bold">
                        <a href="{{ route('solutions.electronics-led') }}" target="_blank" class="block px-4 py-2.5 hover:bg-blue-50 hover:text-[#0047ba] transition-colors">Electronics LED Display</a>
                        <a href="{{ route('solutions.philips') }}" target="_blank" class="block px-4 py-2.5 hover:bg-blue-50 hover:text-[#0047ba] transition-colors">Philips Commercial Display</a>
                        <a href="{{ route('solutions.aver') }}" target="_blank" class="block px-4 py-2.5 hover:bg-blue-50 hover:text-[#0047ba] transition-colors">AVer Camera Video Conferencing</a>
                        <a href="{{ route('solutions.digital-signage') }}" target="_blank" class="block px-4 py-2.5 hover:bg-blue-50 hover:text-[#0047ba] transition-colors">Digital Signage Solution</a>
                        <a href="{{ route('solutions.video-matrix') }}" target="_blank" class="block px-4 py-2.5 hover:bg-blue-50 hover:text-[#0047ba] transition-colors">Video Matrix Solution</a>
                        <a href="{{ route('solutions.brackets') }}" target="_blank" class="block px-4 py-2.5 hover:bg-blue-50 hover:text-[#0047ba] transition-colors">Brackets</a>
                    </div>
                </div>

                <a href="{{ route('news.index') }}" class="py-2 px-1 text-white hover:text-white-300 transition-colors border-b-2 {{ request()->routeIs('news.*') ? 'border-yellow-300 text-yellow-300 font-bold' : 'border-transparent hover:border-yellow-300' }} whitespace-nowrap">
                    NEWS & ARTICLES
                </a>

                <a href="{{ route('careers.index') }}" class="py-2 px-1 text-white hover:text-white-300 transition-colors border-b-2 {{ request()->routeIs('careers.*') ? 'border-yellow-300 text-yellow-300 font-bold' : 'border-transparent hover:border-yellow-300' }} whitespace-nowrap">
                    CAREERS
                </a>

                <a href="{{ url('/#contact') }}" onclick="if(typeof openQuoteModal === 'function') { openQuoteModal(); return false; }" class="py-2 px-1 text-white hover:text-yellow-300 transition-colors border-b-2 border-transparent hover:border-yellow-300 whitespace-nowrap cursor-pointer">
                    CONTACT US
                </a>
            </div>

            <!-- Search & Admin Actions (Desktop Animated) -->
            <div class="hidden lg:flex items-center space-x-3 shrink-0">
                @auth
                    <a href="{{ route('admin.news.index') }}" 
                       class="relative group w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#0047ba] hover:bg-yellow-400 hover:text-slate-950 active:scale-90 transition-all duration-300 shadow-md" 
                       title="CMS Dashboard">
                        <i class="fa-solid fa-right-to-bracket text-[18px] group-hover:scale-110 transition-transform duration-300"></i>
                        <span class="absolute -top-0.5 -right-0.5 w-3 h-3 bg-emerald-500 rounded-full border-2 border-white shadow-sm" title="Logged in as Admin"></span>
                    </a>
                @else
                    <a href="{{ route('admin.login') }}" 
                       class="group w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#0047ba] hover:bg-yellow-400 hover:text-slate-950 active:scale-90 transition-all duration-300 shadow-md" 
                       title="Admin CMS Login">
                        <i class="fa-solid fa-right-to-bracket text-[18px] group-hover:scale-110 transition-transform duration-300"></i>
                    </a>
                @endauth

                <button type="button" onclick="toggleSearchModal(true)" class="group w-10 h-10 rounded-full flex items-center justify-center text-white hover:text-yellow-300 hover:bg-white/10 active:scale-90 transition-all duration-300 focus:outline-none" title="Search">
                    <i class="fa-solid fa-magnifying-glass text-sm group-hover:scale-125 group-hover:rotate-12 transition-transform duration-300"></i>
                </button>
            </div>

            <!-- Mobile Hamburger & Search Toggle (Animated) -->
            <div class="lg:hidden flex items-center space-x-2">
                <button type="button" onclick="toggleSearchModal(true)" class="group w-10 h-10 rounded-lg bg-blue-700/50 flex items-center justify-center text-white hover:text-yellow-300 hover:bg-blue-600/70 active:scale-90 transition-all duration-300 focus:outline-none" title="Search">
                    <i class="fa-solid fa-magnifying-glass text-base group-hover:scale-125 group-hover:rotate-12 transition-transform duration-300"></i>
                </button>
                <button id="mobile-menu-btn" type="button" onclick="toggleMobileMenu()" class="text-white hover:text-yellow-300 p-2 focus:outline-none rounded-lg bg-blue-700/50 flex flex-col justify-center items-center w-10 h-10 gap-1.5 active:scale-90 transition-all duration-300 group" aria-label="Toggle Menu">
                    <span id="burger-line-1" class="w-5 h-0.5 bg-white group-hover:bg-yellow-300 rounded-full transition-all duration-300 origin-center"></span>
                    <span id="burger-line-2" class="w-5 h-0.5 bg-white group-hover:bg-yellow-300 rounded-full transition-all duration-300 origin-center"></span>
                    <span id="burger-line-3" class="w-5 h-0.5 bg-white group-hover:bg-yellow-300 rounded-full transition-all duration-300 origin-center"></span>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Navigation Drawer (Smooth Animated Expand/Collapse) -->
    <div id="mobile-menu" class="max-h-0 opacity-0 overflow-hidden lg:hidden bg-[#003896] border-t border-blue-600/80 px-4 transition-all duration-300 ease-in-out">
        <div class="py-3 space-y-2 text-sm font-bold uppercase tracking-wider">
            <a href="{{ url('/') }}" class="block py-2.5 px-3 rounded-md text-white hover:bg-blue-600 hover:text-yellow-300 transition-colors">HOME</a>
            
            <!-- Mobile About Submenu -->
            <div>
                <div class="flex items-center justify-between py-2.5 px-3 rounded-md text-white hover:bg-blue-600 transition-colors">
                    <a href="{{ route('about') }}" target="_blank" class="flex-1 hover:text-yellow-300 {{ request()->routeIs('about') ? 'text-yellow-300' : '' }}">ABOUT US</a>
                    <button onclick="toggleMobileSubmenu('mobile-about', this)" class="p-1 focus:outline-none" title="Toggle About Submenu">
                        <svg class="transition-transform duration-300 shrink-0" style="width: 14px; height: 14px; min-width: 14px; max-width: 14px; min-height: 14px; max-height: 14px;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <div id="mobile-about" class="max-h-0 opacity-0 overflow-hidden pl-6 space-y-1.5 text-xs text-blue-100 font-semibold transition-all duration-300 ease-in-out">
                    <a href="{{ route('about') }}" target="_blank" class="block py-1.5 hover:text-yellow-300 transition-colors">Company Overview</a>
                </div>
            </div>

            <a href="https://digiparc.globaltronics.net/" target="_blank" class="block py-2.5 px-3 rounded-md text-white hover:bg-blue-600 hover:text-yellow-300 transition-colors">DIGIPARC</a>

            <!-- Mobile Services Submenu -->
            <div>
                <button onclick="toggleMobileSubmenu('mobile-services', this)" class="w-full flex items-center justify-between py-2.5 px-3 rounded-md text-white hover:bg-blue-600 hover:text-yellow-300 text-left transition-colors">
                    <span>SERVICES</span>
                    <svg class="transition-transform duration-300 shrink-0" style="width: 14px; height: 14px; min-width: 14px; max-width: 14px; min-height: 14px; max-height: 14px;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="mobile-services" class="max-h-0 opacity-0 overflow-hidden pl-6 space-y-1.5 text-xs text-blue-100 font-semibold transition-all duration-300 ease-in-out">
                    <a href="{{ route('solutions.index') }}" class="block py-1.5 text-yellow-300 font-bold hover:text-white transition-colors">LED Display Systems</a>
                    <a href="{{ route('services.iposters.index') }}" class="block py-1.5 hover:text-yellow-300 transition-colors">Digital IPoster AD Placement</a>
                    <a href="{{ url('/#services') }}" target="_blank" class="block py-1.5 hover:text-yellow-300 transition-colors">Static AD Placement</a>
                    <a href="{{ route('services.digital-design-consultancy') }}" class="block py-1.5 hover:text-yellow-300 transition-colors">Digital Design & Consultancy</a>
                </div>
            </div>

            <!-- Mobile Solutions Submenu -->
            <div>
                <div class="flex items-center justify-between py-2.5 px-3 rounded-md text-white hover:bg-blue-600 transition-colors">
                    <a href="{{ route('solutions.index') }}" class="flex-1 hover:text-yellow-300">SOLUTIONS</a>
                    <button onclick="toggleMobileSubmenu('mobile-solutions', this)" class="p-1 focus:outline-none" title="Toggle Solutions Submenu">
                        <svg class="transition-transform duration-300 shrink-0" style="width: 14px; height: 14px; min-width: 14px; max-width: 14px; min-height: 14px; max-height: 14px;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <div id="mobile-solutions" class="max-h-0 opacity-0 overflow-hidden pl-6 space-y-1.5 text-xs text-blue-100 font-semibold transition-all duration-300 ease-in-out">
                    <a href="{{ route('solutions.electronics-led') }}" target="_blank" class="block py-1.5 hover:text-yellow-300 transition-colors">Electronics LED Display</a>
                    <a href="{{ route('solutions.philips') }}" target="_blank" class="block py-1.5 hover:text-yellow-300 transition-colors">Philips Commercial Display</a>
                    <a href="{{ route('solutions.aver') }}" target="_blank" class="block py-1.5 hover:text-yellow-300 transition-colors">AVer Camera Video Conferencing</a>
                    <a href="{{ route('solutions.digital-signage') }}" target="_blank" class="block py-1.5 hover:text-yellow-300 transition-colors">Digital Signage Solution</a>
                    <a href="{{ route('solutions.video-matrix') }}" target="_blank" class="block py-1.5 hover:text-yellow-300 transition-colors">Video Matrix Solution</a>
                    <a href="{{ route('solutions.brackets') }}" target="_blank" class="block py-1.5 hover:text-yellow-300 transition-colors">Brackets</a>
                </div>
            </div>

            <a href="{{ route('news.index') }}" class="block py-2.5 px-3 rounded-md {{ request()->routeIs('news.*') ? 'bg-blue-600 text-yellow-300 font-bold' : 'text-white hover:bg-blue-600 hover:text-yellow-300' }} transition-colors">NEWS & ARTICLES</a>
            <a href="{{ route('careers.index') }}" class="block py-2.5 px-3 rounded-md {{ request()->routeIs('careers.*') ? 'bg-blue-600 text-yellow-300 font-bold' : 'text-white hover:bg-blue-600 hover:text-yellow-300' }} transition-colors">CAREERS</a>
            <a href="{{ url('/#contact') }}" onclick="if(typeof openQuoteModal === 'function') { toggleMobileMenu(); openQuoteModal(); return false; }" class="block py-2.5 px-3 rounded-md text-white hover:bg-blue-600 hover:text-yellow-300 transition-colors cursor-pointer">CONTACT US</a>
        </div>
    </div>

    <!-- Smooth Animated Search Modal Overlay -->
    <div id="search-modal" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-50 flex items-start justify-center pt-20 sm:pt-24 px-4 opacity-0 pointer-events-none transition-all duration-300 ease-out" onclick="if(event.target === this) toggleSearchModal(false)">
        <div id="search-modal-card" class="bg-white rounded-3xl shadow-2xl p-6 sm:p-7 w-full max-w-2xl text-slate-900 relative transform -translate-y-4 scale-95 opacity-0 transition-all duration-300 ease-out">
            
            <button onclick="toggleSearchModal(false)" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 p-1.5 rounded-full hover:bg-slate-100 transition-colors" title="Close (Esc)">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>

            <div class="flex items-center gap-2.5 mb-4">
                <div class="w-8 h-8 rounded-lg bg-blue-50 text-[#0047ba] flex items-center justify-center text-sm">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <h3 class="text-base sm:text-lg font-black text-[#0047ba] uppercase tracking-wide">
                    Search Globaltronics
                </h3>
            </div>

            <form action="{{ route('search') }}" method="GET" class="flex gap-2" id="search-form">
                <div class="relative flex-1">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input id="search-input" 
                           name="q" 
                           type="text" 
                           autocomplete="off" 
                           placeholder="Type to search LED displays, iPosters, news, or careers..." 
                           oninput="handleLiveSearch(this.value)"
                           class="w-full pl-11 pr-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:border-transparent text-sm text-slate-900 placeholder-slate-400 shadow-inner">
                    <div id="search-spinner" class="absolute right-4 top-1/2 -translate-y-1/2 text-[#0047ba] hidden">
                        <i class="fa-solid fa-circle-notch fa-spin text-sm"></i>
                    </div>
                </div>

                <button type="submit" class="px-6 py-3 bg-[#0047ba] hover:bg-blue-700 text-white font-extrabold rounded-2xl text-xs sm:text-sm uppercase tracking-wider transition-all shadow-md active:scale-95 flex items-center gap-2 shrink-0">
                    <span>Search</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>

            <!-- Popular Suggestions Tags (Default view) -->
            <div id="search-popular-tags" class="mt-4 pt-3 border-t border-slate-100">
                <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-2">Popular Searches:</p>
                <div class="flex flex-wrap gap-1.5 text-xs font-semibold">
                    <a href="{{ route('search', ['q' => 'Glorietta']) }}" class="px-3 py-1 rounded-full bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-[#0047ba] transition-colors">Glorietta</a>
                    <a href="{{ route('search', ['q' => 'Circuit']) }}" class="px-3 py-1 rounded-full bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-[#0047ba] transition-colors">Circuit</a>
                    <a href="{{ route('search', ['q' => 'Cloverleaf']) }}" class="px-3 py-1 rounded-full bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-[#0047ba] transition-colors">Cloverleaf</a>
                    <a href="{{ route('search', ['q' => 'Nustar']) }}" class="px-3 py-1 rounded-full bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-[#0047ba] transition-colors">Nustar</a>
                    <a href="{{ route('search', ['q' => 'Consultancy']) }}" class="px-3 py-1 rounded-full bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-[#0047ba] transition-colors">Digital Design</a>
                    <a href="{{ route('search', ['q' => 'Careers']) }}" class="px-3 py-1 rounded-full bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-[#0047ba] transition-colors">Careers</a>
                </div>
            </div>

            <!-- Live Search Results Dropdown -->
            <div id="search-live-results" class="mt-4 pt-3 border-t border-slate-100 max-h-72 overflow-y-auto hidden space-y-2 scrollbar-thin">
                <!-- Dynamically populated via JavaScript -->
            </div>

        </div>
    </div>
</nav>

<script>
    let searchDebounceTimer = null;

    function handleLiveSearch(val) {
        clearTimeout(searchDebounceTimer);
        const query = val.trim();
        const resultsContainer = document.getElementById('search-live-results');
        const popularTags = document.getElementById('search-popular-tags');
        const spinner = document.getElementById('search-spinner');

        if (query.length < 2) {
            resultsContainer.classList.add('hidden');
            resultsContainer.innerHTML = '';
            popularTags.classList.remove('hidden');
            if (spinner) spinner.classList.add('hidden');
            return;
        }

        if (spinner) spinner.classList.remove('hidden');

        searchDebounceTimer = setTimeout(() => {
            fetch(`/api/search/live?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    if (spinner) spinner.classList.add('hidden');
                    popularTags.classList.add('hidden');
                    resultsContainer.classList.remove('hidden');

                    if (!data.results || data.results.length === 0) {
                        resultsContainer.innerHTML = `
                            <div class="py-6 text-center text-slate-500 text-xs">
                                <i class="fa-solid fa-magnifying-glass text-lg mb-2 text-slate-400 block"></i>
                                No quick matches found for "<strong>${escapeHtml(query)}</strong>". Press Enter to perform full search.
                            </div>
                        `;
                        return;
                    }

                    let html = '<div class="space-y-1.5">';
                    data.results.forEach(item => {
                        const imgHtml = item.image 
                            ? `<img src="${item.image}" alt="" class="w-11 h-9 rounded-lg object-cover shrink-0 border border-slate-200">`
                            : `<div class="w-11 h-9 rounded-lg bg-blue-50 text-[#0047ba] flex items-center justify-center text-sm shrink-0 border border-blue-100"><i class="fa-solid ${item.icon}"></i></div>`;

                        html += `
                            <a href="${item.url}" class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors group">
                                ${imgHtml}
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-0.5">
                                        <span class="px-2 py-0.2 rounded-full text-[10px] font-extrabold uppercase tracking-wider border ${item.badge_color}">
                                            ${item.category}
                                        </span>
                                    </div>
                                    <h4 class="text-xs font-bold text-slate-900 group-hover:text-[#0047ba] transition-colors truncate uppercase">
                                        ${escapeHtml(item.title)}
                                    </h4>
                                    <p class="text-[11px] text-slate-400 truncate">
                                        ${escapeHtml(item.subtitle)}
                                    </p>
                                </div>
                                <i class="fa-solid fa-chevron-right text-xs text-slate-300 group-hover:text-[#0047ba] group-hover:translate-x-0.5 transition-all shrink-0 pr-1"></i>
                            </a>
                        `;
                    });
                    html += '</div>';

                    html += `
                        <div class="pt-3 mt-2 border-t border-slate-100 text-center">
                            <a href="${data.view_all_url}" class="text-xs font-bold text-[#0047ba] hover:underline inline-flex items-center gap-1.5">
                                <span>View all results for "${escapeHtml(query)}"</span>
                                <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                    `;

                    resultsContainer.innerHTML = html;
                })
                .catch(() => {
                    if (spinner) spinner.classList.add('hidden');
                });
        }, 250);
    }

    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>"']/g, function(m) {
            return {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            }[m];
        });
    }

    // Search Modal Animation
    function toggleSearchModal(show) {
        const modal = document.getElementById('search-modal');
        const card = document.getElementById('search-modal-card');
        const input = document.getElementById('search-input');
        
        if (!modal || !card) return;

        if (show) {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100', 'pointer-events-auto');
            card.classList.remove('-translate-y-4', 'scale-95', 'opacity-0');
            card.classList.add('translate-y-0', 'scale-100', 'opacity-100');
            setTimeout(() => {
                if (input) input.focus();
            }, 100);
        } else {
            card.classList.remove('translate-y-0', 'scale-100', 'opacity-100');
            card.classList.add('-translate-y-4', 'scale-95', 'opacity-0');
            modal.classList.remove('opacity-100', 'pointer-events-auto');
            modal.classList.add('opacity-0', 'pointer-events-none');
        }
    }

    // Mobile Hamburger Menu Animation & Morph
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const line1 = document.getElementById('burger-line-1');
        const line2 = document.getElementById('burger-line-2');
        const line3 = document.getElementById('burger-line-3');
        
        if (!menu || !line1 || !line2 || !line3) return;

        const isClosed = menu.classList.contains('max-h-0');

        if (isClosed) {
            // Expand Menu
            menu.classList.remove('max-h-0', 'opacity-0');
            menu.classList.add('max-h-[800px]', 'opacity-100');

            // Morph Lines to 'X'
            line1.classList.add('rotate-45', 'translate-y-2', 'bg-yellow-400');
            line2.classList.add('opacity-0', '-translate-x-3');
            line3.classList.add('-rotate-45', '-translate-y-2', 'bg-yellow-400');
        } else {
            // Collapse Menu
            menu.classList.remove('max-h-[800px]', 'opacity-100');
            menu.classList.add('max-h-0', 'opacity-0');

            // Morph 'X' back to Hamburger
            line1.classList.remove('rotate-45', 'translate-y-2', 'bg-yellow-400');
            line2.classList.remove('opacity-0', '-translate-x-3');
            line3.classList.remove('-rotate-45', '-translate-y-2', 'bg-yellow-400');
        }
    }

    // Mobile Submenu Accordion Animation
    function toggleMobileSubmenu(id, btn) {
        const submenu = document.getElementById(id);
        const icon = btn.querySelector('i, svg');
        
        if (!submenu || !icon) return;

        const isClosed = submenu.classList.contains('max-h-0');

        if (isClosed) {
            submenu.classList.remove('max-h-0', 'opacity-0');
            submenu.classList.add('max-h-60', 'opacity-100', 'py-1.5');
            icon.classList.add('rotate-180');
        } else {
            submenu.classList.remove('max-h-60', 'opacity-100', 'py-1.5');
            submenu.classList.add('max-h-0', 'opacity-0');
            icon.classList.remove('rotate-180');
        }
    }

    // Keyboard ESC listener
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            toggleSearchModal(false);
        }
    });
</script>
