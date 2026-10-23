<!-- Globaltronics Main Footer (Seamless Flush Connection) -->
<footer id="contact" class="relative z-30 block w-full bg-black text-slate-300 m-0 pt-16 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 mb-12">
            
            <!-- Company Info & Logo -->
            <div class="lg:col-span-2">
                <a href="{{ url('/') }}" class="inline-block mb-4">
                    <img src="{{ asset('assets/images/logos/global_logo.webp') }}" 
                         alt="Globaltronics Logo" 
                         loading="lazy"
                         decoding="async"
                         class="h-12 w-auto max-w-[260px] object-contain drop-shadow-md">
                </a>
                <p class="text-sm text-slate-400 leading-relaxed max-w-sm mb-6">
                    The leading provider of digital out-of-home (DOOH) advertising, LED display boards, and smart digital solutions nationwide.
                </p>

                <!-- Contact Info with Font Awesome / Bootstrap Icons -->
                <div class="space-y-2.5 text-xs font-semibold mb-6">
                    <div class="flex items-center space-x-2.5 text-yellow-400">
                        <i class="fa-solid fa-phone text-sm w-4 text-center"></i>
                        <span>(02) 8721-2878</span>
                    </div>
                    <div class="flex items-center space-x-2.5 text-yellow-400">
                        <i class="fa-solid fa-envelope text-sm w-4 text-center"></i>
                        <span>inquiry@globaltronics.net</span>
                    </div>
                </div>

                <!-- Footer Social Media Icons -->
                <div class="flex items-center space-x-2.5">
                    <a href="https://www.facebook.com/GlobaltronicsPH" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-white flex items-center justify-center text-[#1877F2] hover:bg-[#0047ba] hover:text-white active:bg-[#0047ba] active:text-white hover:scale-105 transition-all shadow-sm" title="Facebook">
                        <i class="fa-brands fa-facebook text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white flex items-center justify-center text-[#E4405F] hover:bg-[#0047ba] hover:text-white active:bg-[#0047ba] active:text-white hover:scale-105 transition-all shadow-sm" title="Instagram">
                        <i class="fa-brands fa-instagram text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white flex items-center justify-center text-[#FF0000] hover:bg-[#0047ba] hover:text-white active:bg-[#0047ba] active:text-white hover:scale-105 transition-all shadow-sm" title="YouTube">
                        <i class="fa-brands fa-youtube text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white flex items-center justify-center text-[#0A66C2] hover:bg-[#0047ba] hover:text-white active:bg-[#0047ba] active:text-white hover:scale-105 transition-all shadow-sm" title="LinkedIn">
                        <i class="fa-brands fa-linkedin text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Column 1: Quick Links -->
            <div>
                <h4 class="text-xs font-bold text-white uppercase tracking-widest mb-4 border-l-2 border-[#0047ba] pl-2">Navigation</h4>
                <ul class="space-y-2.5 text-xs font-medium">
                    <li><a href="{{ url('/') }}" class="hover:text-yellow-400 transition-colors">HOME</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-yellow-400 transition-colors">ABOUT US</a></li>
                    <li><a href="{{ route('news.index') }}" class="hover:text-yellow-400 transition-colors">NEWS & ARTICLES</a></li>
                    <li><a href="{{ route('careers.index') }}" class="hover:text-yellow-400 transition-colors">CAREERS</a></li>
                    <li><a href="#contact" class="hover:text-yellow-400 transition-colors">CONTACT US</a></li>
                </ul>
            </div>

            <!-- Column 2: Services -->
            <div>
                <h4 class="text-xs font-bold text-white uppercase tracking-widest mb-4 border-l-2 border-[#0047ba] pl-2">Services</h4>
                <ul class="space-y-2.5 text-xs font-medium">
                    <li><a href="#led-displays" class="hover:text-yellow-400 transition-colors">Indoor & Outdoor LED</a></li>
                    <li><a href="#digital-signage" class="hover:text-yellow-400 transition-colors">Digital Out-Of-Home</a></li>
                    <li><a href="#content-mgmt" class="hover:text-yellow-400 transition-colors">Content Management Systems</a></li>
                    <li><a href="#maintenance" class="hover:text-yellow-400 transition-colors">Maintenance & Support</a></li>
                </ul>
            </div>

            <!-- Column 3: Solutions -->
            <div>
                <h4 class="text-xs font-bold text-white uppercase tracking-widest mb-4 border-l-2 border-[#0047ba] pl-2">Solutions</h4>
                <ul class="space-y-2.5 text-xs font-medium">
                    <li><a href="#smart-city" class="hover:text-yellow-400 transition-colors">Smart City Display</a></li>
                    <li><a href="#corporate" class="hover:text-yellow-400 transition-colors">Corporate Media Solutions</a></li>
                    <li><a href="#retail" class="hover:text-yellow-400 transition-colors">Retail DOOH</a></li>
                </ul>
            </div>

        </div>

        <!-- Bottom Bar -->
        <div class="pt-8 border-t border-slate-900 flex flex-col md:flex-row items-center justify-between text-xs text-slate-500 gap-4">
            <p>&copy; {{ date('Y') }} Globaltronics. All rights reserved.</p>
            <div class="flex items-center space-x-6">
                <a href="{{ route('privacy.policy') }}" class="hover:text-slate-300 transition-colors">Privacy Policy</a>
                <a href="{{ route('terms.service') }}" class="hover:text-slate-300 transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
