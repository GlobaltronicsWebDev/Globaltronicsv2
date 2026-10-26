<!-- Globaltronics Main Footer (White Theme with High Visibility) -->
<footer id="contact" class="relative z-30 block w-full bg-white text-slate-600 m-0 pt-16 pb-12 border-t border-slate-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 mb-12">
            
            <!-- Company Info & Logo -->
            <div class="lg:col-span-2">
                <a href="{{ url('/') }}" class="inline-block mb-4">
                    <img src="{{ asset('assets/images/logos/GBTX_LOGO.png') }}" 
                         alt="Globaltronics Logo" 
                         loading="lazy"
                         decoding="async"
                         class="h-12 w-auto max-w-[260px] object-contain">
                </a>
                <p class="text-sm text-slate-600 leading-relaxed max-w-sm mb-6 font-normal">
                    The leading provider of digital out-of-home (DOOH) advertising, LED display boards, and smart digital solutions nationwide.
                </p>

                <!-- Contact Info with Brand Icons -->
                <div class="space-y-2.5 text-xs font-semibold mb-6">
                    <a href="tel:0287212878" class="flex items-center space-x-2.5 text-slate-700 hover:text-[#0047ba] transition-colors group">
                        <span class="w-7 h-7 rounded-full bg-blue-50 text-[#0047ba] flex items-center justify-center group-hover:bg-[#0047ba] group-hover:text-white transition-all shadow-xs">
                            <i class="fa-solid fa-phone text-xs"></i>
                        </span>
                        <span>(02) 8721-2878</span>
                    </a>
                    <a href="mailto:inquiry@globaltronics.net" class="flex items-center space-x-2.5 text-slate-700 hover:text-[#0047ba] transition-colors group">
                        <span class="w-7 h-7 rounded-full bg-blue-50 text-[#0047ba] flex items-center justify-center group-hover:bg-[#0047ba] group-hover:text-white transition-all shadow-xs">
                            <i class="fa-solid fa-envelope text-xs"></i>
                        </span>
                        <span>inquiry@globaltronics.net</span>
                    </a>
                </div>

                <!-- Footer Social Media Icons -->
                <div class="flex items-center space-x-3">
                    <a href="https://www.facebook.com/GlobaltronicsPH" target="_blank" rel="noopener noreferrer" 
                       class="w-9 h-9 rounded-full bg-[#1877F2]/10 hover:bg-[#1877F2] text-[#1877F2] hover:text-white border border-[#1877F2]/25 flex items-center justify-center hover:scale-110 transition-all duration-300 shadow-sm" 
                       title="Facebook">
                        <i class="fa-brands fa-facebook text-sm"></i>
                    </a>
                    <a href="https://www.instagram.com/globaltronicsph" target="_blank" rel="noopener noreferrer" 
                       class="w-9 h-9 rounded-full bg-[#E4405F]/10 hover:bg-[#E4405F] text-[#E4405F] hover:text-white border border-[#E4405F]/25 flex items-center justify-center hover:scale-110 transition-all duration-300 shadow-sm" 
                       title="Instagram">
                        <i class="fa-brands fa-instagram text-sm"></i>
                    </a>
                    <a href="https://www.youtube.com/@globaltronicsph" target="_blank" rel="noopener noreferrer" 
                       class="w-9 h-9 rounded-full bg-[#FF0000]/10 hover:bg-[#FF0000] text-[#FF0000] hover:text-white border border-[#FF0000]/25 flex items-center justify-center hover:scale-110 transition-all duration-300 shadow-sm" 
                       title="YouTube">
                        <i class="fa-brands fa-youtube text-sm"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/globaltronics" target="_blank" rel="noopener noreferrer" 
                       class="w-9 h-9 rounded-full bg-[#0A66C2]/10 hover:bg-[#0A66C2] text-[#0A66C2] hover:text-white border border-[#0A66C2]/25 flex items-center justify-center hover:scale-110 transition-all duration-300 shadow-sm" 
                       title="LinkedIn">
                        <i class="fa-brands fa-linkedin text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Column 1: Quick Links -->
            <div>
                <h4 class="text-xs font-bold text-slate-900 uppercase tracking-widest mb-4 border-l-2 border-[#0047ba] pl-2.5">Navigation</h4>
                <ul class="space-y-2.5 text-xs font-medium text-slate-600">
                    <li><a href="{{ url('/') }}" class="hover:text-[#0047ba] hover:translate-x-1 inline-block transition-all duration-200">HOME</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-[#0047ba] hover:translate-x-1 inline-block transition-all duration-200">ABOUT US</a></li>
                    <li><a href="{{ route('news.index') }}" class="hover:text-[#0047ba] hover:translate-x-1 inline-block transition-all duration-200">NEWS & ARTICLES</a></li>
                    <li><a href="{{ route('careers.index') }}" class="hover:text-[#0047ba] hover:translate-x-1 inline-block transition-all duration-200">CAREERS</a></li>
                    <li><a href="#contact" class="hover:text-[#0047ba] hover:translate-x-1 inline-block transition-all duration-200">CONTACT US</a></li>
                </ul>
            </div>

            <!-- Column 2: Services -->
            <div>
                <h4 class="text-xs font-bold text-slate-900 uppercase tracking-widest mb-4 border-l-2 border-[#0047ba] pl-2.5">Services</h4>
                <ul class="space-y-2.5 text-xs font-medium text-slate-600">
                    <li><a href="#led-displays" class="hover:text-[#0047ba] hover:translate-x-1 inline-block transition-all duration-200">Indoor & Outdoor LED</a></li>
                    <li><a href="#digital-signage" class="hover:text-[#0047ba] hover:translate-x-1 inline-block transition-all duration-200">Digital Out-Of-Home</a></li>
                    <li><a href="#content-mgmt" class="hover:text-[#0047ba] hover:translate-x-1 inline-block transition-all duration-200">Content Management Systems</a></li>
                    <li><a href="#maintenance" class="hover:text-[#0047ba] hover:translate-x-1 inline-block transition-all duration-200">Maintenance & Support</a></li>
                </ul>
            </div>

            <!-- Column 3: Solutions -->
            <div>
                <h4 class="text-xs font-bold text-slate-900 uppercase tracking-widest mb-4 border-l-2 border-[#0047ba] pl-2.5">Solutions</h4>
                <ul class="space-y-2.5 text-xs font-medium text-slate-600">
                    <li><a href="#smart-city" class="hover:text-[#0047ba] hover:translate-x-1 inline-block transition-all duration-200">Smart City Display</a></li>
                    <li><a href="#corporate" class="hover:text-[#0047ba] hover:translate-x-1 inline-block transition-all duration-200">Corporate Media Solutions</a></li>
                    <li><a href="#retail" class="hover:text-[#0047ba] hover:translate-x-1 inline-block transition-all duration-200">Retail DOOH</a></li>
                </ul>
            </div>

        </div>

        <!-- Bottom Bar -->
        <div class="pt-8 border-t border-slate-200 flex flex-col md:flex-row items-center justify-between text-xs text-slate-500 gap-4">
            <p>&copy; {{ date('Y') }} Globaltronics. All rights reserved.</p>
            <div class="flex items-center space-x-6 font-medium">
                <a href="{{ route('privacy.policy') }}" class="hover:text-[#0047ba] transition-colors">Privacy Policy</a>
                <a href="{{ route('terms.service') }}" class="hover:text-[#0047ba] transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
