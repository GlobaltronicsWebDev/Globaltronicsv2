@extends('layouts.app')

@section('title', 'About Us | GLOBALTRONICS INC - The Leader in LED Technology')

@section('content')
<!-- About Page Hero Header -->
<section class="relative bg-gradient-to-br from-[#002f7d] via-[#0047ba] to-slate-950 text-white py-20 lg:py-28 overflow-hidden select-none">
    <!-- Ambient Background Effects -->
    <div class="absolute inset-0 opacity-15 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:20px_20px] pointer-events-none"></div>
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-400/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-yellow-400/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 text-center">
        <!-- Breadcrumb -->
        <nav class="flex justify-center items-center space-x-2 text-xs sm:text-sm text-blue-200 font-medium mb-6 uppercase tracking-wider">
            <a href="{{ url('/') }}" class="hover:text-yellow-300 transition-colors flex items-center gap-1.5">
                <i class="fa-solid fa-house text-xs"></i> Home
            </a>
            <span class="text-blue-300">/</span>
            <span class="text-yellow-300 font-bold">About Us</span>
        </nav>

        <!-- Main Title -->
        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white mb-6 drop-shadow-md">
            Pioneering Digital LED <br class="hidden sm:inline">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-amber-200 to-yellow-400">
                Technology in the Philippines
            </span>
        </h1>

        <!-- Subtitle -->
        <p class="text-blue-100 text-sm sm:text-base md:text-lg lg:text-xl max-w-3xl mx-auto font-normal leading-relaxed">
            For over two decades, Globaltronics has illuminated the nation's skylines and commercial centers, delivering world-class digital out-of-home (DOOH) solutions and innovative LED display monuments.
        </p>
    </div>
</section>



<!-- Vision, Mission & Core Values Section -->
<section id="values" class="py-20 lg:py-28 bg-[#f8fafc] text-slate-800 relative z-10 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12">
        
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-16 lg:mb-20">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0047ba] mb-6 tracking-tight">
                Our Mission & Vision
            </h2>
            <p class="text-slate-600 text-sm sm:text-base md:text-lg leading-relaxed font-normal">
                Driven by passion for technological advancement, our core principles guide every project we engineer and every client relationship we build.
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Vision Card -->
            <div class="bg-white rounded-2xl p-8 sm:p-10 shadow-lg hover:shadow-2xl border border-slate-100 flex flex-col justify-between transition-all duration-300 transform hover:-translate-y-1.5 group">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-blue-50 text-[#0047ba] flex items-center justify-center text-2xl mb-6 group-hover:bg-[#0047ba] group-hover:text-white transition-colors duration-300 shadow-sm">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 mb-4 group-hover:text-[#0047ba] transition-colors">
                        Our Vision
                    </h3>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed font-normal">
                        To be the top-of-mind provider of accessible digital communications solutions for companies and communities through innovative and sustainable digital displays.
                    </p>
                </div>
                <div class="mt-8 pt-4 border-t border-slate-100 flex items-center text-xs font-bold text-[#0047ba] uppercase tracking-wider">
                    <span>Forward-Thinking DOOH</span>
                </div>
            </div>

            <!-- Mission Card -->
            <div class="bg-white rounded-2xl p-8 sm:p-10 shadow-lg hover:shadow-2xl border border-slate-100 flex flex-col justify-between transition-all duration-300 transform hover:-translate-y-1.5 group">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-blue-50 text-[#0047ba] flex items-center justify-center text-2xl mb-6 group-hover:bg-[#0047ba] group-hover:text-white transition-colors duration-300 shadow-sm">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 mb-4 group-hover:text-[#0047ba] transition-colors">
                        Our Mission
                    </h3>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed font-normal">
                       Our Mission is to provide businesses with innovative digital displays that will entertain, inform, and engage audiences in the most impressive and reliable way.
                    </p>
                </div>
                <div class="mt-8 pt-4 border-t border-slate-100 flex items-center text-xs font-bold text-[#0047ba] uppercase tracking-wider">
                    <span>Built on Trust & Integrity</span>
                </div>
            </div>

            <!-- Core Values Card -->
            <div class="bg-white rounded-2xl p-8 sm:p-10 shadow-lg hover:shadow-2xl border border-slate-100 flex flex-col justify-between transition-all duration-300 transform hover:-translate-y-1.5 group md:col-span-2 lg:col-span-1">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-blue-50 text-[#0047ba] flex items-center justify-center text-2xl mb-6 group-hover:bg-[#0047ba] group-hover:text-white transition-colors duration-300 shadow-sm">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 mb-4 group-hover:text-[#0047ba] transition-colors">
                        Core Values
                    </h3>
                    <ul class="space-y-3 text-slate-600 text-sm sm:text-base font-normal">
                        <li class="flex items-center space-x-2.5">
                            <i class="fa-solid fa-circle-check text-yellow-500 text-sm"></i>
                            <span><strong>Innovation:</strong> Pioneering futuristic DOOH media.</span>
                        </li>
                        <li class="flex items-center space-x-2.5">
                            <i class="fa-solid fa-circle-check text-yellow-500 text-sm"></i>
                            <span><strong>Quality:</strong> Rigorous ISO standard testing.</span>
                        </li>
                        <li class="flex items-center space-x-2.5">
                            <i class="fa-solid fa-circle-check text-yellow-500 text-sm"></i>
                            <span><strong>Service:</strong> Uncompromising 24/7 client support.</span>
                        </li>
                    </ul>
                </div>
                <div class="mt-8 pt-4 border-t border-slate-100 flex items-center text-xs font-bold text-[#0047ba] uppercase tracking-wider">
                    <span>LED by Vision</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Who We Are Section -->
<section id="who-we-are" class="py-20 lg:py-28 bg-white text-slate-800 relative z-10 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            
            <!-- Left Column: Video Embed -->
            <div class="lg:col-span-6">
                <div class="w-full rounded-2xl overflow-hidden shadow-2xl bg-black border border-slate-200 aspect-video relative group">
                    <iframe class="w-full h-full" 
                            src="https://www.youtube.com/embed/G1LD5Nai3PA" 
                            title="Globaltronics' LED AVP" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            referrerpolicy="strict-origin-when-cross-origin" 
                            allowfullscreen>
                    </iframe>
                </div>
            </div>

            <!-- Right Column: Who We Are Content -->
            <div class="lg:col-span-6 space-y-6 text-slate-700 font-['Poppins',sans-serif]">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0047ba] tracking-tight uppercase">
                    WHO WE ARE
                </h2>

                <p class="text-sm sm:text-base leading-relaxed font-normal text-slate-600">
                    <strong class="font-bold text-slate-900">GLOBALTRONICS</strong> has provided end-to-end full service LED display systems and created digital monuments for various reputable Philippine-based enterprises. Our main thrust is to provide the best digital solutions that will increase our client’s brand equity.
                </p>

                <p class="text-sm sm:text-base leading-relaxed font-normal text-slate-600">
                    As one of Southeast Asia’s leading full service digital out-of-home (DOOH) and place-based media companies, we will continue to introduce groundbreaking technologies to all our valued clients here and overseas with the help of our well-trained engineers, technicians, and highly-skilled creative digital artists.
                </p>

                <p class="text-sm sm:text-base leading-relaxed font-normal text-slate-600">
                    Globaltronics is the country’s leader in digital innovation. Partner with us today. Together, let us build your digital monument.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- The Man Behind Globaltronics Section -->
<section id="leadership" class="py-20 lg:py-28 bg-[#f8fafc] text-slate-800 relative z-10 border-b border-slate-200 font-['Poppins',sans-serif]">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            
            <!-- Left Column: Copy -->
            <div class="lg:col-span-6 space-y-5 text-slate-700">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0047ba] tracking-tight uppercase leading-tight">
                    THE MAN BEHIND <br class="hidden sm:inline">GLOBALTRONICS
                </h2>

                <p class="text-sm sm:text-base leading-relaxed font-normal text-slate-600">
                    William T. Guido is the man who brought dynamic LED billboards to the country in 2003. Since then, he has developed several breakthrough innovations in the digital display field.
                </p>

                <p class="text-sm sm:text-base leading-relaxed font-normal text-slate-600">
                    He is the chairman and CEO of Globaltronics, Inc.
                </p>

                <p class="text-sm sm:text-base leading-relaxed font-normal text-slate-600">
                    He currently holds leadership positions in various industry sectors – HVAC, health and lifestyle products, among others.
                </p>

                <p class="text-sm sm:text-base leading-relaxed font-normal text-slate-600">
                    He is also the chairman of the board of trustees of The Performing Arts and Recreation Center (PARC) Foundation.
                </p>

                <p class="text-sm sm:text-base leading-relaxed font-normal text-slate-600">
                    He is also a member of various professional organizations and advocacy groups in the Philippines.
                </p>
            </div>

            <!-- Right Column: Image -->
            <div class="lg:col-span-6 flex justify-center lg:justify-end">
                <div class="w-full max-w-lg rounded-2xl overflow-hidden shadow-xl bg-white border border-slate-100 group">
                    <img src="{{ asset('assets/images/WTG/WTG (400x400)_08.25.26.png') }}" 
                         alt="William T. Guido - Chairman and CEO of Globaltronics" 
                         class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Our Affiliates Section -->
<section id="affiliates" class="py-20 lg:py-28 bg-white text-slate-800 relative z-10 border-b border-slate-200 font-['Poppins',sans-serif]">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12">
        
        <!-- Header & Descriptions -->
        <div class="max-w-4xl mx-auto text-center mb-14 sm:mb-16 space-y-4">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0047ba] tracking-tight uppercase">
                OUR AFFILIATES
            </h2>
            <p class="text-slate-600 text-sm sm:text-base leading-relaxed font-normal">
                Globaltronics, Inc. is a member of the Guido Group of Companies which consists of six (6) dynamic companies.
            </p>
            <p class="text-slate-600 text-sm sm:text-base leading-relaxed font-normal">
                Over the years, each company has made its mark in its line of business.
            </p>
            <p class="text-slate-600 text-sm sm:text-base leading-relaxed font-normal">
                Superior quality products and services with excellent customer support are among the reasons why each company has created a reputable and reliable image in Southeast Asia.
            </p>
        </div>

        @php
            $affiliates = [
                ['name' => 'Dunham-Bush', 'image' => 'assets/images/our_affiliates/DBI-1600X900-1.webp'],
                ['name' => 'The PARC Foundation', 'image' => 'assets/images/our_affiliates/PARC-1600X900-1.webp'],
                ['name' => 'Team Asia Corporation', 'image' => 'assets/images/our_affiliates/TAC-1600X900-1.webp'],
                ['name' => 'Philips Signage Solutions', 'image' => 'assets/images/our_affiliates/PHILIPS-1600X900-1.webp'],
                ['name' => 'Vogels', 'image' => 'assets/images/our_affiliates/VOGELS-1600X900-1.webp'],
            ];
        @endphp

        <!-- Affiliates Carousel / Grid -->
        <div id="affiliates-container" class="relative overflow-hidden w-full">
            <div id="affiliates-track" class="flex transition-transform duration-500 ease-in-out -mx-3 sm:-mx-4">
                @foreach($affiliates as $index => $affiliate)
                    <div class="affiliate-slide w-full sm:w-1/2 md:w-1/3 lg:w-1/4 shrink-0 px-3 sm:px-4 flex">
                        <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-md hover:shadow-xl border border-slate-100 flex items-center justify-center w-full h-44 sm:h-48 transition-all duration-300 transform hover:-translate-y-1 group">
                            <img src="{{ asset($affiliate['image']) }}" 
                                 alt="{{ $affiliate['name'] }}" 
                                 class="max-h-full max-w-full object-contain transition-all duration-300 group-hover:scale-105">
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Indicator Dots -->
            <div class="flex justify-center items-center space-x-2.5 mt-10" id="affiliates-dots">
                @foreach($affiliates as $index => $affiliate)
                    <button onclick="goToAffiliateSlide({{ $index }})" 
                            class="affiliate-dot h-2.5 rounded-full {{ $index === 0 ? 'bg-[#0047ba] w-6' : 'bg-slate-300 hover:bg-slate-400 w-2.5' }} transition-all duration-300" 
                            title="{{ $affiliate['name'] }}">
                    </button>
                @endforeach
            </div>
        </div>

    </div>
</section>

<!-- Company Milestones Timeline Section -->
<!-- <section id="milestones" class="py-20 lg:py-28 bg-white text-slate-800 relative z-10 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12">
        <div class="max-w-3xl mx-auto text-center mb-16 lg:mb-20">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0047ba] mb-6 tracking-tight">
                Our Journey of Growth
            </h2>
            <p class="text-slate-600 text-sm sm:text-base md:text-lg leading-relaxed font-normal">
                A historical look at the major milestones that defined our continuous leadership in the Philippine digital signage industry.
            </p>
        </div> -->

        <!-- <div class="relative border-l-4 border-[#0047ba]/30 ml-4 md:ml-32 space-y-12 pl-6 md:pl-10">
             -->
            <!-- Milestone 1 -->
            <!-- <div class="relative group">
                <div class="absolute -left-[35px] md:-left-[51px] top-1.5 w-6 h-6 rounded-full bg-[#0047ba] border-4 border-white shadow-md group-hover:scale-125 transition-transform duration-300"></div>
                <div class="bg-[#f8fafc] rounded-2xl p-6 sm:p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all">
                    <span class="inline-block px-3 py-1 rounded-full bg-[#0047ba] text-white text-xs font-extrabold mb-3">2003</span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 mb-2">Foundation & Pioneer LED Billboards</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Globaltronics was established with the vision of transforming traditional static advertising into vibrant, high-impact electronic LED billboards across major highways in Metro Manila.
                    </p>
                </div>
            </div> -->

            <!-- Milestone 2 -->
            <!-- <div class="relative group">
                <div class="absolute -left-[35px] md:-left-[51px] top-1.5 w-6 h-6 rounded-full bg-[#0047ba] border-4 border-white shadow-md group-hover:scale-125 transition-transform duration-300"></div>
                <div class="bg-[#f8fafc] rounded-2xl p-6 sm:p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all">
                    <span class="inline-block px-3 py-1 rounded-full bg-[#0047ba] text-white text-xs font-extrabold mb-3">2012</span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 mb-2">Commercial Malls & QSR Nationwide Rollout</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Expanded into premier commercial shopping malls, retail flagship stores, and major fast-food chains with digital menu boards and smart interactive information kiosks.
                    </p>
                </div>
            </div> -->

            <!-- Milestone 3 -->
            <!-- <div class="relative group">
                <div class="absolute -left-[35px] md:-left-[51px] top-1.5 w-6 h-6 rounded-full bg-[#0047ba] border-4 border-white shadow-md group-hover:scale-125 transition-transform duration-300"></div>
                <div class="bg-[#f8fafc] rounded-2xl p-6 sm:p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all">
                    <span class="inline-block px-3 py-1 rounded-full bg-[#0047ba] text-white text-xs font-extrabold mb-3">2020</span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 mb-2">Giant 3D Curved & Anamorphic Landmark Screens</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Engineered the nation's most iconic anamorphic 3D curved LED displays, creating immersive digital landmarks in premier entertainment and lifestyle destinations.
                    </p>
                </div>
            </div> -->

            <!-- Milestone 4 -->
            <!-- <div class="relative group">
                <div class="absolute -left-[35px] md:-left-[51px] top-1.5 w-6 h-6 rounded-full bg-yellow-400 border-4 border-white shadow-md group-hover:scale-125 transition-transform duration-300"></div>
                <div class="bg-[#f8fafc] rounded-2xl p-6 sm:p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all">
                    <span class="inline-block px-3 py-1 rounded-full bg-yellow-400 text-slate-900 text-xs font-extrabold mb-3">2024 – 2026</span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 mb-2">Smart City Integration & Digiparc Network</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Pioneering next-generation Smart City public displays, fine-pitch indoor video walls, and the cutting-edge Digiparc DOOH network nationwide.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section> -->

<!-- Careers Callout Banner -->
<section id="careers" class="py-16 bg-white text-slate-800 relative z-10 border-b border-slate-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-blue-50 border border-blue-200 text-[#0047ba] text-xs font-extrabold uppercase tracking-wider mb-4">
            <i class="fa-solid fa-briefcase"></i>
            <span>Join Our Team</span>
        </div>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0047ba] mb-4 tracking-tight">
            Explore Careers at Globaltronics
        </h2>
        <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto mb-8 leading-relaxed font-normal">
            Ready to shape the future of digital media and LED display technology? Check out our latest openings and submit your application online.
        </p>
        <a href="{{ route('careers.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-full bg-[#0047ba] hover:bg-blue-700 text-white text-xs font-bold uppercase tracking-wider transition-all shadow-lg shadow-blue-600/30 active:scale-95">
            <span>View All Open Positions</span>
            <i class="fa-solid fa-arrow-right text-xs"></i>
        </a>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-16 lg:py-24 bg-[#0047ba] text-white text-center relative overflow-hidden">
    <div class="max-w-5xl mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black mb-6 tracking-tight">
            Ready to Light Up Your Brand?
        </h2>
        <p class="text-blue-100 text-base sm:text-lg lg:text-xl max-w-2xl mx-auto mb-10 font-normal">
            Partner with the undisputed leader in LED technology. Let's create your next captivating digital monument today.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="tel:0287212878" class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-yellow-400 text-slate-950 font-black text-sm uppercase tracking-wider hover:bg-yellow-300 transition-all shadow-xl active:scale-95">
                Call (02) 8721-2878
            </a>
            <a href="mailto:inquiry@globaltronics.net" class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/30 text-white font-bold text-sm uppercase tracking-wider transition-all backdrop-blur-md active:scale-95">
                Send an Inquiry
            </a>
        </div>
    </div>
</section>

<script>
    let currentAffiliateIndex = 0;
    const affiliatesTrack = document.getElementById('affiliates-track');
    const affiliateSlides = document.querySelectorAll('.affiliate-slide');
    const affiliateDots = document.querySelectorAll('.affiliate-dot');
    let affiliateInterval;

    function getVisibleAffiliatesCount() {
        if (window.innerWidth >= 1024) return 4;
        if (window.innerWidth >= 768) return 3;
        if (window.innerWidth >= 640) return 2;
        return 1;
    }

    function showAffiliateSlide(index) {
        if (!affiliateSlides.length || !affiliatesTrack) return;
        const visibleCount = getVisibleAffiliatesCount();
        const maxIndex = Math.max(0, affiliateSlides.length - visibleCount);

        if (index > maxIndex) {
            currentAffiliateIndex = 0;
        } else if (index < 0) {
            currentAffiliateIndex = maxIndex;
        } else {
            currentAffiliateIndex = index;
        }

        const shiftPercentage = (currentAffiliateIndex * (100 / visibleCount));
        affiliatesTrack.style.transform = `translateX(-${shiftPercentage}%)`;

        affiliateDots.forEach((dot, i) => {
            if (i === currentAffiliateIndex) {
                dot.className = 'affiliate-dot h-2.5 rounded-full bg-[#0047ba] w-6 transition-all duration-300';
            } else {
                dot.className = 'affiliate-dot h-2.5 rounded-full bg-slate-300 hover:bg-slate-400 w-2.5 transition-all duration-300';
            }
        });
    }

    function goToAffiliateSlide(index) {
        showAffiliateSlide(index);
        resetAffiliateInterval();
    }

    function startAffiliateInterval() {
        clearInterval(affiliateInterval);
        affiliateInterval = setInterval(() => {
            showAffiliateSlide(currentAffiliateIndex + 1);
        }, 3500);
    }

    function resetAffiliateInterval() {
        clearInterval(affiliateInterval);
        startAffiliateInterval();
    }

    const affiliatesContainer = document.getElementById('affiliates-container');
    if (affiliatesContainer) {
        affiliatesContainer.addEventListener('mouseenter', () => clearInterval(affiliateInterval));
        affiliatesContainer.addEventListener('mouseleave', startAffiliateInterval);
    }

    window.addEventListener('resize', () => {
        showAffiliateSlide(currentAffiliateIndex);
    });

    document.addEventListener('DOMContentLoaded', () => {
        showAffiliateSlide(0);
        startAffiliateInterval();
    });
</script>
@endsection
