@extends('layouts.app')

@section('title', 'GLOBALTRONICS INC | LED by Vision, Built by Trust')

@push('head')
    <!-- Priority Preload for Above-the-fold Hero Slide 1 for Instant Smooth Opening -->
    <link rel="preload" as="image" href="{{ asset('assets/images/carousel/slider1/gbtx_slide1_bg.webp') }}" type="image/webp" fetchpriority="high">
    <link rel="preload" as="image" href="{{ asset('assets/images/carousel/slider1/GBTX-slider_PIONEER-TEXT.webp') }}" type="image/webp" fetchpriority="high">
    <link rel="preload" as="image" href="{{ asset('assets/images/carousel/slider1/GBTX-slider_23-years.webp') }}" type="image/webp" fetchpriority="high">
    <link rel="preload" as="image" href="{{ asset('assets/images/logos/global_logo.webp') }}" type="image/webp" fetchpriority="high">
    <!-- Carousel assets -->
    <link rel="preload" as="image" href="{{ asset('assets/images/carousel/slider2/gbtx_slide2_bg.jpg') }}" fetchpriority="low">
    <link rel="preload" as="image" href="{{ asset('assets/images/carousel/slider3/GBTX-slider-Philips_BG.jpg') }}" fetchpriority="low">
    <link rel="preload" as="image" href="{{ asset('assets/images/carousel/slider4/Lease-to-Own-Slider-01-BG.png') }}" fetchpriority="low">
    <style>
        #hero-carousel {
            height: 620px;
            min-height: 580px;
        }
        @media (min-width: 480px) {
            #hero-carousel {
                height: 680px;
            }
        }
        @media (min-width: 768px) {
            #hero-carousel {
                height: calc(100vh - 116px);
                min-height: 400px;
                max-height: 920px;
            }
        }
        /* Mobile specific styling: hide controllers, anchor enlarged GIF to bottom */
        @media (max-width: 767px) {
            .carousel-nav-btn,
            .carousel-indicators-pill {
                display: none !important;
            }
            .hero-mascot-container {
                margin-top: auto !important;
                padding-bottom: 0 !important;
                display: flex !important;
                align-items: flex-end !important;
                justify-content: center !important;
                width: 100% !important;
            }
            .hero-mascot-gif {
                height: 330px !important;
                max-height: 52vh !important;
                width: auto !important;
                object-fit: contain !important;
                transform: translateY(0) !important;
            }
        }
        @media (min-width: 480px) and (max-width: 767px) {
            .hero-mascot-gif {
                height: 380px !important;
            }
        }
    </style>
@endpush

@section('content')
<!-- Full-Screen Interactive Hero Carousel -->
<div id="hero-carousel" class="relative w-full overflow-hidden bg-[#07011f] select-none">

    <!-- Slides Wrapper -->
    <div class="relative w-full h-full">

        <!-- Slide 1: Pioneering Digital LED Innovation -->
        <div class="carousel-slide absolute inset-0 w-full h-full opacity-100 transition-opacity duration-1000 ease-in-out z-20" data-index="0">
            <!-- Background Image -->
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
                 style="background-image: url('{{ asset('assets/images/carousel/slider1/gbtx_slide1_bg.webp') }}');">
            </div>

            <!-- Content Container (Responsive for all phones up to ultrawide desktops) -->
            <div class="relative h-full w-full max-w-[1720px] mx-auto px-4 sm:px-8 md:pl-8 lg:pl-12 xl:pl-16 md:pr-4 lg:pr-6 xl:pr-8 flex flex-col md:flex-row items-center justify-between z-10 pt-6 sm:pt-8 md:pt-0 pb-0 gap-0">
                
                <!-- Left Section: Pioneer Text & 23 Years Emblem (Centered on mobile with clear gap spaces) -->
                <div class="w-full md:w-[48%] lg:w-[46%] xl:w-[44%] flex flex-col justify-center items-center md:items-start text-center md:text-left z-10 shrink-0 md:pl-16 lg:pl-28 xl:pl-36">
                    <!-- Pioneer Text (Centered on mobile) -->
                    <div class="w-full max-w-[270px] xs:max-w-[310px] sm:max-w-[380px] md:max-w-[380px] lg:max-w-[450px] xl:max-w-[530px] flex justify-center md:justify-start">
                        <img src="{{ asset('assets/images/carousel/slider1/GBTX-slider_PIONEER-TEXT.webp') }}" 
                             alt="Pioneering the Future of Digital LED Innovation." 
                             class="w-full h-auto object-contain drop-shadow-[0_4px_16px_rgba(0,0,0,0.6)] mx-auto md:mx-0">
                    </div>

                    <!-- 23 Years Emblem (Centered on mobile with generous gap space) -->
                    <div class="mt-5 xs:mt-6 sm:mt-7 md:mt-2.5 lg:mt-3.5 w-full max-w-[145px] xs:max-w-[165px] sm:max-w-[195px] md:max-w-[160px] lg:max-w-[210px] xl:max-w-[260px] flex justify-center md:justify-start">
                        <img src="{{ asset('assets/images/carousel/slider1/GBTX-slider_23-years.webp') }}" 
                             alt="Celebrating 23 Years - LED by Vision, Built by Trust" 
                             class="w-full h-auto object-contain drop-shadow-[0_4px_18px_rgba(0,0,0,0.5)] mx-auto md:mx-0">
                    </div>
                </div>

                <!-- Right Section: Globie Mascot 3D Billboard (At bottom of carousel on mobile & desktop, enlarged on mobile) -->
                <div class="hero-mascot-container w-full md:w-[55%] lg:w-[58%] xl:w-[60%] h-auto md:h-full flex items-end justify-center md:justify-end md:pr-10 lg:pr-14 xl:pr-18 pb-0 z-10 overflow-visible mt-auto md:mt-0">
                    <img src="{{ asset('assets/images/carousel/slider1/Globie-Bacoor-GIF_07.25.25.gif') }}" 
                         alt="Globie 3D Anamorphic LED Billboard" 
                         class="hero-mascot-gif h-[330px] xs:h-[360px] sm:h-[390px] md:h-[92%] lg:h-[95%] xl:h-[98%] max-h-[880px] w-auto object-contain drop-shadow-[0_20px_40px_rgba(0,0,0,0.8)] md:scale-105 lg:scale-110 xl:scale-115 transform origin-bottom md:origin-bottom-right translate-y-0 md:translate-y-2 transition-transform duration-500">
                </div>

            </div>
        </div>

        <!-- Slide 2: Digital Display Solution -->
        <div class="carousel-slide absolute inset-0 w-full h-full bg-[#07011f] opacity-0 pointer-events-none transition-opacity duration-1000 ease-in-out z-10" data-index="1">
            <!-- Background Image -->
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
                 style="background-image: url('{{ asset('assets/images/carousel/slider2/gbtx_slide2_bg.jpg') }}');">
            </div>
            
            <!-- Soft gradient vignette overlay for optimal text contrast and rich atmosphere -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#030014]/85 via-[#07011f]/40 to-[#030014]/60"></div>

            <!-- Content Container (Centered layout with straight text beside large display) -->
            <div class="relative h-full w-full max-w-7xl xl:max-w-[1560px] mx-auto px-6 sm:px-10 lg:px-14 flex flex-col md:flex-row items-center justify-center gap-8 lg:gap-12 xl:gap-16 z-10 py-6 md:py-0">
                
                <!-- Left Section: Heading & Copy (Straight left-aligned just like in the image) -->
                <div class="w-full md:w-[48%] lg:w-[46%] xl:w-[44%] flex flex-col justify-center items-start text-left z-10 shrink-0">
                    
                    <!-- Headline: DIGITAL [DISPLAY] SOLUTION (Straight on one line) -->
                    <h2 class="text-2xl sm:text-3xl md:text-2xl lg:text-3xl xl:text-[42px] font-black text-white tracking-tight uppercase leading-none whitespace-nowrap drop-shadow-[0_4px_16px_rgba(0,0,0,0.85)]">
                        DIGITAL <span class="px-2.5 py-0.5 rounded text-white shadow-md inline-block">DISPLAY</span> SOLUTION
                    </h2>

                    <!-- Descriptive Paragraph (Straight left-aligned 3-line format) -->
                    <p class="mt-4 sm:mt-5 text-white/95 text-sm sm:text-base md:text-sm lg:text-base xl:text-lg font-normal leading-relaxed text-left drop-shadow-[0_2px_8px_rgba(0,0,0,0.7)] max-w-xl">
                        Globaltronics has a wide range of digital signage solutions<br class="hidden lg:inline"> that will help your brand effectively reach its target<br class="hidden lg:inline"> audience.
                    </p>
                </div>

                <!-- Right Section: 3X Brighter Multi-panel LED Display Artwork (Large and prominent) -->
                <div class="w-full md:w-[52%] lg:w-[54%] xl:w-[56%] flex items-center justify-center z-10 py-2 md:py-0">
                    <div class="relative w-full flex items-center justify-center">
                        <img src="{{ asset('assets/images/carousel/slider2/DIGITAL-DISPLAY-SOLUTIONS-PNG-1-1.webp') }}" 
                             alt="Globaltronics Digital Display Solution - 3X Brighter than LCD Display" 
                             class="h-[280px] sm:h-[340px] md:h-[400px] lg:h-[500px] xl:h-[600px] max-h-[75vh] w-auto max-w-full object-contain drop-shadow-[0_25px_60px_rgba(0,0,0,0.95)] hover:scale-[1.02] transition-transform duration-500">
                    </div>
                </div>

            </div>
        </div>

        <!-- Slide 3: Philips Commercial Display Screens -->
        <div class="carousel-slide absolute inset-0 w-full h-full bg-[#07011f] opacity-0 pointer-events-none transition-opacity duration-1000 ease-in-out z-10" data-index="2">
            <!-- Background Image -->
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
                 style="background-image: url('{{ asset('assets/images/carousel/slider3/GBTX-slider-Philips_BG.jpg') }}');">
            </div>
            
            <!-- Soft gradient vignette overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#001030]/90 via-[#002050]/50 to-[#001030]/60"></div>

            <!-- Content Container -->
            <div class="relative h-full w-full max-w-7xl xl:max-w-[1560px] mx-auto px-6 sm:px-10 lg:px-14 flex flex-col md:flex-row items-center justify-center gap-8 lg:gap-12 xl:gap-16 z-10 py-6 md:py-0">
                
                <!-- Left Section: Philips Signage Solutions Artwork & Copy -->
                <div class="w-full md:w-[48%] lg:w-[46%] xl:w-[45%] flex flex-col justify-center items-start text-left z-10 shrink-0">
                    <div class="w-full max-w-[340px] sm:max-w-[440px] md:max-w-[480px] lg:max-w-[560px] xl:max-w-[640px]">
                        <img src="{{ asset('assets/images/carousel/slider3/Philips-and-commercial-display.png') }}" 
                             alt="Philips Signage Solutions - Commercial Display Screens" 
                             class="w-full h-auto object-contain drop-shadow-[0_4px_16px_rgba(0,0,0,0.8)]">
                    </div>

                    <p class="mt-4 sm:mt-5 text-white/95 text-sm sm:text-base md:text-sm lg:text-base xl:text-lg font-normal leading-relaxed text-left drop-shadow-[0_2px_8px_rgba(0,0,0,0.7)] max-w-xl">
                        Globaltronics' partnership with Philips has strengthened the former's leadership in the digital display field.<br class="hidden lg:inline"> Together, Globaltronics and Philips can provide products and services that cater to just every digital display need.
                    </p>
                </div>

                <!-- Right Section: Philips Screen Animated Display -->
                <div class="w-full md:w-[52%] lg:w-[54%] xl:w-[56%] flex items-center justify-center z-10 py-2 md:py-0">
                    <div class="relative w-full flex items-center justify-center">
                        <img src="{{ asset('assets/images/carousel/slider3/Philips-screen-GIF_10.23.25.gif') }}" 
                             alt="Philips Commercial Display Screen" 
                             class="h-[280px] sm:h-[340px] md:h-[400px] lg:h-[500px] xl:h-[600px] max-h-[75vh] w-auto max-w-full object-contain drop-shadow-[0_25px_60px_rgba(0,0,0,0.95)] hover:scale-[1.02] transition-transform duration-500">
                    </div>
                </div>

            </div>
        </div>

        <!-- Slide 4: Lease Now, Own It Fast! -->
        <div class="carousel-slide absolute inset-0 w-full h-full bg-[#07011f] opacity-0 pointer-events-none transition-opacity duration-1000 ease-in-out z-10" data-index="3">
            <!-- Background Image -->
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
                 style="background-image: url('{{ asset('assets/images/carousel/slider4/Lease-to-Own-Slider-01-BG.png') }}');">
            </div>
            
            <!-- Soft gradient vignette overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#001030]/85 via-transparent to-[#001030]/60"></div>

            <!-- Content Container -->
            <div class="relative h-full w-full max-w-7xl xl:max-w-[1560px] mx-auto px-6 sm:px-10 lg:px-14 flex flex-col md:flex-row items-center justify-center gap-8 lg:gap-12 xl:gap-16 z-10 py-6 md:py-0">
                
                <!-- Left Section: Lease to Own Artwork -->
                <div class="w-full md:w-[48%] lg:w-[46%] xl:w-[44%] flex flex-col justify-center items-start text-left z-10 shrink-0">
                    <div class="w-full max-w-[320px] sm:max-w-[420px] md:max-w-[460px] lg:max-w-[540px] xl:max-w-[620px]">
                        <img src="{{ asset('assets/images/carousel/slider4/Lease-to-Own-Slider-02-scaled.webp') }}" 
                             alt="Lease Now, Own It Fast! Flexible payment schemes for top-quality LED display solutions" 
                             class="w-full h-auto object-contain drop-shadow-[0_4px_18px_rgba(0,0,0,0.85)]">
                    </div>
                </div>

                <!-- Right Section: Digital Display Kiosks Artwork with Hotline -->
                <div class="w-full md:w-[52%] lg:w-[54%] xl:w-[56%] flex items-center justify-center z-10 py-2 md:py-0">
                    <div class="relative w-full flex items-center justify-center">
                        <img src="{{ asset('assets/images/carousel/slider4/Lease-to-Own-Slider-04.webp') }}" 
                             alt="Digital Display Kiosks - 0917 7013 272" 
                             class="h-[300px] sm:h-[360px] md:h-[430px] lg:h-[530px] xl:h-[630px] max-h-[80vh] w-auto max-w-full object-contain drop-shadow-[0_25px_60px_rgba(0,0,0,0.95)] hover:scale-[1.02] transition-transform duration-500">
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Navigation Arrows (Hidden on mobile, visible on desktop) -->
    <button onclick="prevSlide()" class="carousel-nav-btn absolute left-2 sm:left-6 md:left-8 top-1/2 -translate-y-1/2 w-8 h-8 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-black/40 hover:bg-[#0047ba] text-white border border-white/20 hover:border-blue-400 items-center justify-center transition-all duration-300 backdrop-blur-md z-30 group shadow-lg" title="Previous Slide">
        <i class="fa-solid fa-chevron-left text-xs sm:text-base group-hover:-translate-x-0.5 transition-transform"></i>
    </button>

    <button onclick="nextSlide()" class="carousel-nav-btn absolute right-2 sm:right-6 md:right-8 top-1/2 -translate-y-1/2 w-8 h-8 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-black/40 hover:bg-[#0047ba] text-white border border-white/20 hover:border-blue-400 items-center justify-center transition-all duration-300 backdrop-blur-md z-30 group shadow-lg" title="Next Slide">
        <i class="fa-solid fa-chevron-right text-xs sm:text-base group-hover:translate-x-0.5 transition-transform"></i>
    </button>

    <!-- Slide Indicators & Progress Bar (Hidden on mobile, visible on desktop, lifted higher with comfortable padding) -->
    <div class="carousel-indicators-pill absolute bottom-6 sm:bottom-7 md:bottom-8 left-1/2 -translate-x-1/2 items-center space-x-2 sm:space-x-2.5 z-30 bg-black/60 px-3.5 sm:px-4 py-1.5 sm:py-2 rounded-full backdrop-blur-md border border-white/15 shadow-xl">
        <button onclick="goToSlide(0)" class="carousel-dot w-6 sm:w-8 h-2 rounded-full bg-[#0047ba] transition-all duration-300 shadow-sm" title="Slide 1"></button>
        <button onclick="goToSlide(1)" class="carousel-dot w-2 sm:w-2.5 h-2 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-300" title="Slide 2"></button>
        <button onclick="goToSlide(2)" class="carousel-dot w-2 sm:w-2.5 h-2 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-300" title="Slide 3"></button>
        <button onclick="goToSlide(3)" class="carousel-dot w-2 sm:w-2.5 h-2 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-300" title="Slide 4"></button>
    </div>
</div>

<!-- About / Leader in Digital LED Technology Section -->
<section id="about" class="py-20 lg:py-28 bg-white text-slate-800 relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12">
        
        <!-- Top Row: Leader Info + 23 Years Badge & Video Card -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center mb-16 lg:mb-20">
            
            <!-- Left Column -->
            <div class="lg:col-span-6 space-y-6">
                <!-- Main Section Title -->
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0047ba] leading-[1.2] tracking-tight">
                    The Country's Leader in <br class="hidden sm:inline">
                    Digital LED Technology.
                </h2>

                <!-- Subtitle Paragraph (Enlarged) -->
                <p class="text-slate-700 text-base sm:text-lg lg:text-xl font-normal leading-relaxed">
                    For <strong class="text-lg sm:text-2xl text-[#0047ba] font-bold">23 years</strong>, Globaltronics is recognized as the industry leader in Digital LED Technology and have consistent by exceeding clients expectations by delivering first world digital solutions and services.
                </p>

                <!-- Powered by Experience Artwork -->
                <div class="py-2">
                    <img src="{{ asset('assets/images/logos/poweredby.webp') }}" 
                         alt="Powered by Experience" 
                         loading="lazy"
                         decoding="async"
                         class="h-16 sm:h-20 md:h-24 w-auto object-contain transition-opacity duration-300">
                </div>

                <!-- Mission Text (Enlarged) -->
                <p class="text-slate-700 text-base sm:text-lg lg:text-xl font-normal leading-relaxed">
                    We are <strong class="text-[#0047ba] font-bold">EXPERIENCED INNOVATORS</strong> enlightening people's lives through <strong class="text-[#0047ba] font-bold">DIGITAL DISPLAYS</strong>.
                </p>

                <!-- More About US Button (Centered) -->
                <div class="pt-4 flex justify-center">
                    <a href="#company" class="inline-flex items-center justify-center px-10 py-3.5 rounded-full border-2 border-[#0047ba] text-[#0047ba] hover:bg-[#0047ba] hover:text-white font-bold text-sm sm:text-base transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                        More About US
                    </a>
                </div>
            </div>

            <!-- Right Column: 23 Years Logo + Video Card -->
            <div class="lg:col-span-6 flex flex-col items-center lg:items-end space-y-6">
                
                <!-- 23 Years Celebrating Logo (Enlarged on Mobile & Desktop) -->
                <div class="w-full flex justify-center lg:justify-end pr-0 lg:pr-4 py-2">
                    <img src="{{ asset('assets/images/logos/13yrs.webp') }}" 
                         alt="Celebrating 23 Years - LED by Vision, Built by Trust" 
                         loading="lazy"
                         decoding="async"
                         class="h-48 sm:h-52 md:h-56 lg:h-64 max-w-[320px] sm:max-w-[440px] w-auto object-contain drop-shadow-md hover:scale-105 transition-transform duration-300">
                </div>

                <!-- Video Showcase Card (Embedded YouTube Milestone Video) -->
                <div class="w-full max-w-xl rounded-2xl overflow-hidden shadow-2xl bg-black border border-slate-200">
                    <div class="relative aspect-video w-full">
                        <iframe class="w-full h-full" 
                                src="https://www.youtube.com/embed/Ea4w1kRoydQ" 
                                title="20th Anniversary Milestone" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share; compute-pressure" 
                                referrerpolicy="strict-origin-when-cross-origin" 
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>

            </div>

        </div>

        <!-- Bottom Statement Row -->
        <div class="pt-10 border-t border-slate-200 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-6">
                <h3 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#0047ba] leading-tight tracking-tight">
                    We continue to provide <br class="hidden sm:inline">
                    innovative products and <br class="hidden sm:inline">
                    excellent services
                </h3>
            </div>
            <div class="lg:col-span-6">
                <p class="text-slate-700 text-base sm:text-lg lg:text-xl font-normal leading-relaxed">
                    GLOBALTRONICS has provided end-to-end full service LED display systems and created digital monuments for various reputable Philippine-based enterprises.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- Products and Services Section -->
<section id="services" class="py-20 lg:py-24 bg-white text-slate-800 relative z-10 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 mb-12 text-center">
        <!-- Section Header -->
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0047ba] uppercase tracking-wide mb-4">
            OUR PRODUCTS AND SERVICES
        </h2>
        <div class="max-w-3xl mx-auto space-y-1 text-slate-600 text-sm sm:text-base leading-relaxed">
            <p>Clients trust companies that they see, like, and connect with.</p>
            <p>Whatever your campaign, branding, or grand idea is, we have the right tools to make them happen.</p>
        </div>
    </div>

    <!-- 6-Image Showcase Grid -->
    <div class="w-full max-w-[1440px] mx-auto px-2 sm:px-4 lg:px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-4">
            
            <!-- Card 1: Nustar Outdoor & Indoor LED Screens -->
            <a href="{{ route('services.led-displays') }}" target="_blank" 
               class="group relative aspect-[4/3] sm:aspect-[16/11] overflow-hidden rounded-xl shadow-md bg-slate-900 cursor-pointer block">
                <img src="{{ asset('assets/images/products_services/nustar_1.webp') }}" 
                     alt="Digital LED Screens Outdoor & Indoor" 
                     loading="lazy"
                     decoding="async"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:bg-black/60 transition-colors duration-300"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-end items-center text-center text-white z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-xl sm:text-2xl font-black uppercase tracking-wider mb-3 drop-shadow-lg group-hover:text-yellow-300 transition-colors">
                        DIGITAL LED SCREENS<br>OUTDOOR & INDOOR
                    </h3>
                    <span class="px-6 py-2 bg-white text-[#0047ba] hover:bg-[#0047ba] hover:text-white font-bold text-xs sm:text-sm uppercase tracking-wider rounded-full shadow-lg transition-all duration-300 transform hover:scale-105">
                        SEE MORE
                    </span>
                </div>
            </a>

            <!-- Card 2: LED Truck / Mobile LED Billboard -->
            <a href="{{ route('solutions.electronics-led') }}" target="_blank" 
               class="group relative aspect-[4/3] sm:aspect-[16/11] overflow-hidden rounded-xl shadow-md bg-slate-900 cursor-pointer block">
                <img src="{{ asset('assets/images/products_services/ledtruck_2.webp') }}" 
                     alt="LED Truck & Mobile LED Billboards" 
                     loading="lazy"
                     decoding="async"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:bg-black/60 transition-colors duration-300"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-end items-center text-center text-white z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-xl sm:text-2xl font-black uppercase tracking-wider mb-3 drop-shadow-lg group-hover:text-yellow-300 transition-colors">
                        MOBILE LED TRUCKS
                    </h3>
                    <span class="px-6 py-2 bg-white text-[#0047ba] hover:bg-[#0047ba] hover:text-white font-bold text-xs sm:text-sm uppercase tracking-wider rounded-full shadow-lg transition-all duration-300 transform hover:scale-105">
                        SEE MORE
                    </span>
                </div>
            </a>

            <!-- Card 3: Digital Menu Boards & Quick Service Retail -->
            <a href="{{ route('solutions.philips') }}" target="_blank" 
               class="group relative aspect-[4/3] sm:aspect-[16/11] overflow-hidden rounded-xl shadow-md bg-slate-900 cursor-pointer block">
                <img src="{{ asset('assets/images/products_services/flamegrilled_3.webp') }}" 
                     alt="Digital Menu Boards & Commercial Retail Displays" 
                     loading="lazy"
                     decoding="async"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:bg-black/60 transition-colors duration-300"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-end items-center text-center text-white z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-xl sm:text-2xl font-black uppercase tracking-wider mb-3 drop-shadow-lg group-hover:text-yellow-300 transition-colors">
                        DIGITAL MENU BOARDS
                    </h3>
                    <span class="px-6 py-2 bg-white text-[#0047ba] hover:bg-[#0047ba] hover:text-white font-bold text-xs sm:text-sm uppercase tracking-wider rounded-full shadow-lg transition-all duration-300 transform hover:scale-105">
                        SEE MORE
                    </span>
                </div>
            </a>

            <!-- Card 4: Digital Interactive Kiosks -->
            <a href="{{ route('projects.kiosk') }}" target="_blank" 
               class="group relative aspect-[4/3] sm:aspect-[16/11] overflow-hidden rounded-xl shadow-md bg-slate-900 cursor-pointer block">
                <img src="{{ asset('assets/images/products_services/kiosks_4.webp') }}" 
                     alt="Digital Interactive Kiosks" 
                     loading="lazy"
                     decoding="async"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:bg-black/60 transition-colors duration-300"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-end items-center text-center text-white z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-xl sm:text-2xl font-black uppercase tracking-wider mb-3 drop-shadow-lg group-hover:text-yellow-300 transition-colors">
                        INTERACTIVE KIOSKS
                    </h3>
                    <span class="px-6 py-2 bg-white text-[#0047ba] hover:bg-[#0047ba] hover:text-white font-bold text-xs sm:text-sm uppercase tracking-wider rounded-full shadow-lg transition-all duration-300 transform hover:scale-105">
                        SEE MORE
                    </span>
                </div>
            </a>

            <!-- Card 5: In-Mall DOOH & 3D Visual Experiences -->
            <a href="{{ route('services.led-displays') }}" target="_blank" 
               class="group relative aspect-[4/3] sm:aspect-[16/11] overflow-hidden rounded-xl shadow-md bg-slate-900 cursor-pointer block">
                <img src="{{ asset('assets/images/products_services/glorietta_5.webp') }}" 
                     alt="In-Mall Digital Displays & Ambient Signage" 
                     loading="lazy"
                     decoding="async"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:bg-black/60 transition-colors duration-300"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-end items-center text-center text-white z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-xl sm:text-2xl font-black uppercase tracking-wider mb-3 drop-shadow-lg group-hover:text-yellow-300 transition-colors">
                        DIGITAL SIGNAGE & DOOH
                    </h3>
                    <span class="px-6 py-2 bg-white text-[#0047ba] hover:bg-[#0047ba] hover:text-white font-bold text-xs sm:text-sm uppercase tracking-wider rounded-full shadow-lg transition-all duration-300 transform hover:scale-105">
                        SEE MORE
                    </span>
                </div>
            </a>

            <!-- Card 6: Content Management & Engineering -->
            <a href="{{ route('services.digital-design-consultancy') }}" target="_blank" 
               class="group relative aspect-[4/3] sm:aspect-[16/11] overflow-hidden rounded-xl shadow-md bg-slate-900 cursor-pointer block">
                <img src="{{ asset('assets/images/products_services/ivan_6.webp') }}" 
                     alt="Creative Content Management & Technical Operations" 
                     loading="lazy"
                     decoding="async"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent group-hover:bg-black/60 transition-colors duration-300"></div>
                <div class="absolute inset-0 p-6 flex flex-col justify-end items-center text-center text-white z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-xl sm:text-2xl font-black uppercase tracking-wider mb-3 drop-shadow-lg group-hover:text-yellow-300 transition-colors">
                        CONTENT MANAGEMENT
                    </h3>
                    <span class="px-6 py-2 bg-white text-[#0047ba] hover:bg-[#0047ba] hover:text-white font-bold text-xs sm:text-sm uppercase tracking-wider rounded-full shadow-lg transition-all duration-300 transform hover:scale-105">
                        SEE MORE
                    </span>
                </div>
            </a>

        </div>
    </div>
</section>

<!-- Reference Projects Section -->
<section id="reference-projects" class="py-20 lg:py-28 bg-[#f8fafc] text-slate-800 relative z-10 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0047ba] uppercase tracking-wide">
                REFERENCE PROJECTS
            </h2>
        </div>

        <!-- 3-Column Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
            
            <!-- Card 1: PHILIPS -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100 flex flex-col justify-between group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 cursor-pointer"
                 onclick="window.open('{{ route('projects.philips') }}', '_blank')">
                <!-- Project Image -->
                <div class="relative aspect-[4/3] w-full overflow-hidden bg-slate-100">
                    <img src="{{ asset('assets/images/ref_proj/Reference-Projects-Philips.webp') }}" 
                         alt="Philips Reference Projects" 
                         loading="lazy"
                         decoding="async"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>

                <!-- Project Body with Left Blue Accent -->
                <div class="p-8 flex-1 flex flex-col justify-between items-center text-center relative border-l-4 border-[#0047ba]">
                    <div>
                        <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 group-hover:text-[#0047ba] transition-colors uppercase tracking-wider mb-4">
                            PHILIPS
                        </h3>
                        <p class="text-slate-600 text-sm sm:text-[15px] leading-relaxed mb-8">
                            As the exclusive partner of PHILIPS, we have captured a wider audience, redesigned how businesses should look, and developed display solutions that can help grow businesses.
                        </p>
                    </div>
                    <a href="{{ route('projects.philips') }}" target="_blank" class="px-8 py-2.5 bg-[#0047ba] hover:bg-blue-700 text-white font-bold text-sm rounded-md shadow-md hover:shadow-lg transition-all duration-300 transform group-hover:scale-105">
                        See More
                    </a>
                </div>
            </div>

            <!-- Card 2: LED INSTALLATIONS -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100 flex flex-col justify-between group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 cursor-pointer"
                 onclick="window.open('{{ route('projects.led') }}', '_blank')">
                <!-- Project Image -->
                <div class="relative aspect-[4/3] w-full overflow-hidden bg-slate-100">
                    <img src="{{ asset('assets/images/ref_proj/Reference-Projects-LED-Installation-1.webp') }}" 
                         alt="LED Installation Projects" 
                         loading="lazy"
                         decoding="async"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>

                <!-- Project Body with Left Blue Accent -->
                <div class="p-8 flex-1 flex flex-col justify-between items-center text-center relative border-l-4 border-[#0047ba]">
                    <div>
                        <h3 class="text-lg sm:text-xl font-extrabold text-[#0047ba] uppercase tracking-wider mb-4">
                            LED INSTALLATIONS
                        </h3>
                        <p class="text-slate-600 text-sm sm:text-[15px] leading-relaxed mb-8">
                            We are the top choice supplier for dynamic indoor and outdoor LED displays that can be relied upon under any weather condition.
                        </p>
                    </div>
                    <a href="{{ route('projects.led') }}" target="_blank" class="px-8 py-2.5 bg-[#0047ba] hover:bg-blue-700 text-white font-bold text-sm rounded-md shadow-md hover:shadow-lg transition-all duration-300 transform group-hover:scale-105">
                        See More
                    </a>
                </div>
            </div>

            <!-- Card 3: DIGITAL DISPLAY KIOSK INSTALLATIONS -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100 flex flex-col justify-between group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 cursor-pointer"
                 onclick="window.open('{{ route('projects.kiosk') }}', '_blank')">
                <!-- Project Image -->
                <div class="relative aspect-[4/3] w-full overflow-hidden bg-slate-100">
                    <img src="{{ asset('assets/images/ref_proj/kioks.webp') }}" 
                         alt="Digital Display Kiosk Installations" 
                         loading="lazy"
                         decoding="async"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>

                <!-- Project Body with Left Blue Accent -->
                <div class="p-8 flex-1 flex flex-col justify-between items-center text-center relative border-l-4 border-[#0047ba]">
                    <div>
                        <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 group-hover:text-[#0047ba] transition-colors uppercase tracking-wider mb-4 leading-tight">
                            DIGITAL DISPLAY KIOSK<br>INSTALLATIONS
                        </h3>
                        <p class="text-slate-600 text-sm sm:text-[15px] leading-relaxed mb-8">
                            Our digital kiosk can be fully tailored. It engages customers at a glance and gives an exciting visual experience while enhancing the user's brand.
                        </p>
                    </div>
                    <a href="{{ route('projects.kiosk') }}" target="_blank" class="px-8 py-2.5 bg-[#0047ba] hover:bg-blue-700 text-white font-bold text-sm rounded-md shadow-md hover:shadow-lg transition-all duration-300 transform group-hover:scale-105">
                        See More
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Projects Installations Section (Full Width Edge-to-Edge - Grand Scale) -->
<section id="installations" class="pt-24 lg:pt-32 pb-0 bg-white text-slate-800 relative z-10 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12">
        <!-- Header & Intro Copy (Enlarged) -->
        <div class="max-w-5xl mx-auto text-center mb-16 lg:mb-20">
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[#0047ba] mb-6 tracking-tight">
                Projects Installations
            </h2>
            <p class="text-slate-700 text-sm sm:text-base md:text-lg lg:text-xl leading-relaxed max-w-5xl mx-auto font-normal">
                As a premier provider of end-to-end LED display solutions, we continue to deliver comprehensive display systems to forward-thinking companies, showcasing the latest in creating captivating digital monuments. Our unwavering commitment to exceptional service has driven our growth and established us as a trusted partner in the rapidly evolving market. With our extensive experience and dedication to excellence, we continue to push the boundaries of innovation and redefine the standards for digital signage solutions.
            </p>
        </div>
    </div>

    <!-- Full Width Edge-to-Edge Mosaic Photo Grid (Large Scale, Zero Gap) -->
    <div class="w-full bg-black leading-none m-0 p-0 block">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 bg-black">
            
            <!-- Column 1: Left (Tall Corner LED + Mobile LED Truck) -->
            <div class="flex flex-col">
                <!-- Tall Mall Corner 3D LED Screen -->
                <div class="group relative overflow-hidden bg-slate-900 h-[500px] sm:h-[600px] lg:h-[680px] cursor-pointer">
                    <img src="{{ asset('assets/images/installations/inst1.jpg') }}" 
                         alt="Indoor Corner LED Installation" 
                         loading="lazy"
                         decoding="async"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-8">
                        <span class="text-white text-base font-bold uppercase tracking-wider bg-black/60 px-5 py-2 rounded-full backdrop-blur-md">In-Mall 3D LED Display</span>
                    </div>
                </div>

                <!-- Mobile LED Billboard Truck -->
                <div class="group relative overflow-hidden bg-slate-900 h-[300px] sm:h-[360px] lg:h-[400px] cursor-pointer">
                    <img src="{{ asset('assets/images/installations/inst2.jpg') }}" 
                         alt="Mobile LED Truck Billboard" 
                         loading="lazy"
                         decoding="async"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-8">
                        <span class="text-white text-base font-bold uppercase tracking-wider bg-black/60 px-5 py-2 rounded-full backdrop-blur-md">Mobile LED Advertising Truck</span>
                    </div>
                </div>
            </div>

            <!-- Column 2: Center (Pharmacy Displays + Retail Displays + Building Facade) -->
            <div class="flex flex-col">
                <!-- Pharmacy Counter Displays -->
                <div class="group relative overflow-hidden bg-slate-900 h-[260px] sm:h-[320px] lg:h-[360px] cursor-pointer">
                    <img src="{{ asset('assets/images/installations/inst3.jpg') }}" 
                         alt="Pharmacy Health Store Digital Signage" 
                         loading="lazy"
                         decoding="async"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-8">
                        <span class="text-white text-base font-bold uppercase tracking-wider bg-black/60 px-5 py-2 rounded-full backdrop-blur-md">Retail Pharmacy Digital Displays</span>
                    </div>
                </div>

                <!-- Luxury Storefront Digital Totems -->
                <div class="group relative overflow-hidden bg-slate-900 h-[270px] sm:h-[320px] lg:h-[360px] cursor-pointer">
                    <img src="{{ asset('assets/images/installations/inst4.jpg') }}" 
                         alt="Retail Storefront Digital Columns" 
                         loading="lazy"
                         decoding="async"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-8">
                        <span class="text-white text-base font-bold uppercase tracking-wider bg-black/60 px-5 py-2 rounded-full backdrop-blur-md">Commercial Mall Digital Totems</span>
                    </div>
                </div>

                <!-- Building Facade Billboard Screen -->
                <div class="group relative overflow-hidden bg-slate-900 h-[270px] sm:h-[320px] lg:h-[360px] cursor-pointer">
                    <img src="{{ asset('assets/images/installations/inst6.jpg') }}" 
                         alt="Outdoor Building LED Billboard" 
                         loading="lazy"
                         decoding="async"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-8">
                        <span class="text-white text-base font-bold uppercase tracking-wider bg-black/60 px-5 py-2 rounded-full backdrop-blur-md">Outdoor Highway LED Billboard</span>
                    </div>
                </div>
            </div>

            <!-- Column 3: Right (Giant Outdoor Curved LED + Airport Info Desk + Restaurant Menu) -->
            <div class="flex flex-col">
                <!-- Giant Outdoor Curved 3D LED Billboard -->
                <div class="group relative overflow-hidden bg-slate-900 h-[280px] sm:h-[340px] lg:h-[380px] cursor-pointer">
                    <img src="{{ asset('assets/images/installations/inst5.jpg') }}" 
                         alt="Giant Outdoor Curved 3D Billboard" 
                         loading="lazy"
                         decoding="async"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-8">
                        <span class="text-white text-base font-bold uppercase tracking-wider bg-black/60 px-5 py-2 rounded-full backdrop-blur-md">Curved 3D Anamorphic LED</span>
                    </div>
                </div>

                <!-- Smart City / Information Terminal Displays -->
                <div class="group relative overflow-hidden bg-slate-900 h-[260px] sm:h-[310px] lg:h-[350px] cursor-pointer">
                    <img src="{{ asset('assets/images/installations/inst7.jpg') }}" 
                         alt="Interactive Digital Terminal" 
                         loading="lazy"
                         decoding="async"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-8">
                        <span class="text-white text-base font-bold uppercase tracking-wider bg-black/60 px-5 py-2 rounded-full backdrop-blur-md">Transit Information LED Systems</span>
                    </div>
                </div>

                <!-- Fast Food Restaurant Digital Menu Boards -->
                <div class="group relative overflow-hidden bg-slate-900 h-[260px] sm:h-[310px] lg:h-[350px] cursor-pointer">
                    <img src="{{ asset('assets/images/installations/inst8.webp') }}" 
                         alt="QSR Restaurant Digital Menu Boards" 
                         loading="lazy"
                         decoding="async"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-8">
                        <span class="text-white text-base font-bold uppercase tracking-wider bg-black/60 px-5 py-2 rounded-full backdrop-blur-md">Commercial QSR Digital Menu Boards</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Interactive LED Pixel Pitch & Distance Calculator Component -->
@include('components.led-calculator')

<!-- Our Clients / Testimonials Section (Clean Borderless) -->
<section id="testimonials" class="py-20 lg:py-28 bg-white text-slate-800 relative z-10">
    
    <!-- Section Header (Centered Container) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12">
        <div class="text-center mb-10 lg:mb-14">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0047ba] tracking-tight">
                Our Clients
            </h2>
        </div>
    </div>

    @php
        $clientLogos = [
            'ADIDAS.png', 'AYALA LAND.png', 'BGC.png', 'BPI.png', 'BURGER KING.png',
            'GLOBE.png', 'GLORIETTA.png', 'GMA.png', 'GOLDILOCKS.png', 'HONDA.png',
            'KFC.png', 'MCDO.png', 'MEGAWORLD.png', 'MERALCO.png', 'METROBANK.png',
            'NUSTAR.png', 'PENSHOPPE.png', 'PLDT.png', 'ROBINSON LAND.png', 'SAN MIGUEL.png',
            'SM MALL OF ASIA.png', 'SM SUPERMALLS.png', 'SOLAIRE.png', 'SUZUKI.png',
            'TOKYO TOKYO.png', 'TRINOMA.png', 'TV5.png', 'VANS.png', 'WATSONS.png', 'YOSHINOYA.png'
        ];
    @endphp

    <!-- Continuous Infinite Client Logo Slider (100% Full Width Edge-to-Edge - Borderless) -->
    <div class="w-full overflow-hidden relative py-8 sm:py-10 mb-16 sm:mb-20 bg-slate-50/40">
        <!-- Left & Right Fade Masks -->
        <div class="absolute left-0 inset-y-0 w-20 sm:w-40 bg-gradient-to-r from-white via-white/80 to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 inset-y-0 w-20 sm:w-40 bg-gradient-to-l from-white via-white/80 to-transparent z-10 pointer-events-none"></div>
        
        <div class="animate-marquee-infinite items-center">
            <!-- Group 1 -->
            <div class="flex items-center space-x-12 sm:space-x-16 lg:space-x-20 shrink-0 pr-12 sm:pr-16 lg:pr-20">
                @foreach($clientLogos as $logo)
                    <div class="h-16 sm:h-20 lg:h-24 w-36 sm:w-48 lg:w-56 flex items-center justify-center grayscale hover:grayscale-0 opacity-70 hover:opacity-100 transition-all duration-300 transform hover:scale-110">
                        <img src="{{ asset('assets/images/client_logo/' . $logo) }}" 
                             alt="{{ pathinfo($logo, PATHINFO_FILENAME) }}" 
                             width="224"
                             height="96"
                             loading="lazy"
                             decoding="async"
                             style="aspect-ratio: 224 / 96;"
                             class="max-h-full max-w-full w-auto h-auto object-contain filter drop-shadow-sm">
                    </div>
                @endforeach
            </div>
            <!-- Group 2 (Duplicate for Seamless Loop) -->
            <div class="flex items-center space-x-12 sm:space-x-16 lg:space-x-20 shrink-0 pr-12 sm:pr-16 lg:pr-20" aria-hidden="true">
                @foreach($clientLogos as $logo)
                    <div class="h-16 sm:h-20 lg:h-24 w-36 sm:w-48 lg:w-56 flex items-center justify-center grayscale hover:grayscale-0 opacity-70 hover:opacity-100 transition-all duration-300 transform hover:scale-110">
                        <img src="{{ asset('assets/images/client_logo/' . $logo) }}" 
                             alt="{{ pathinfo($logo, PATHINFO_FILENAME) }}" 
                             width="224"
                             height="96"
                             loading="lazy"
                             decoding="async"
                             style="aspect-ratio: 224 / 96;"
                             class="max-h-full max-w-full w-auto h-auto object-contain filter drop-shadow-sm">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-8 lg:px-12">
        <!-- Carousel Outer Wrapper with Prev/Next Navigation -->
        <div class="relative flex items-center justify-between gap-4 sm:gap-8">
            
            <!-- Prev Button -->
            <button onclick="prevTestimonial()" class="text-[#0047ba] hover:text-blue-700 p-2 sm:p-3 transition-all duration-300 transform hover:scale-125 focus:outline-none shrink-0" title="Previous Testimonial">
                <i class="fa-solid fa-play fa-rotate-180 text-xl sm:text-2xl"></i>
            </button>

            <!-- Testimonial Slider Card Container (Clean Overflow-Hidden Viewport) -->
            <div id="testimonial-carousel" class="w-full max-w-4xl bg-white rounded-2xl shadow-lg border border-slate-100 min-h-[240px] flex flex-col justify-between overflow-hidden relative p-0">
                
                <!-- Horizontal Sliding Track -->
                <div id="testimonial-track" class="flex transition-transform duration-700 ease-in-out w-full">
                    
                    <!-- Slide 1: Marcjill General Merchandise / Viewall -->
                    <div class="testimonial-slide w-full shrink-0 p-6 sm:p-10 lg:p-12 flex flex-col md:flex-row items-center md:items-start gap-6 sm:gap-10 box-border">
                        <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-2 border-[#0047ba] p-3 flex items-center justify-center bg-white shadow-sm shrink-0">
                            <img src="{{ asset('assets/images/testimonials/viewall.webp') }}" 
                                 alt="Marcjill General Merchandise" 
                                 loading="lazy"
                                 decoding="async"
                                 class="w-full h-full object-contain">
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <p class="text-slate-600 italic text-base sm:text-lg leading-relaxed mb-6 font-normal">
                                "Your services are commendable. We applaud your professional work and high ethical standards in assuring total customer satisfaction."
                            </p>
                            <div class="flex items-center justify-center md:justify-start space-x-3">
                                <span class="w-6 h-0.5 bg-slate-900 hidden md:inline-block"></span>
                                <div>
                                    <h4 class="font-extrabold text-slate-900 text-sm sm:text-base">Engr. Estela Macapagal</h4>
                                    <p class="text-slate-500 text-xs sm:text-sm">Authorized Manager, Marcjill General Merchandise</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2: Honda Philippines -->
                    <div class="testimonial-slide w-full shrink-0 p-6 sm:p-10 lg:p-12 flex flex-col md:flex-row items-center md:items-start gap-6 sm:gap-10 box-border">
                        <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-2 border-[#0047ba] p-3 flex items-center justify-center bg-white shadow-sm shrink-0">
                            <img src="{{ asset('assets/images/testimonials/HONDA-PNG-1-150x150.webp') }}" 
                                 alt="Honda Philippines" 
                                 loading="lazy"
                                 decoding="async"
                                 class="w-full h-full object-contain">
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <p class="text-slate-600 italic text-base sm:text-lg leading-relaxed mb-6 font-normal">
                                "Globaltronics delivered exceptional LED display installations that elevated our showroom experience. Their technical expertise and after-sales support are truly world-class."
                            </p>
                            <div class="flex items-center justify-center md:justify-start space-x-3">
                                <span class="w-6 h-0.5 bg-slate-900 hidden md:inline-block"></span>
                                <div>
                                    <h4 class="font-extrabold text-slate-900 text-sm sm:text-base">Honda Philippines Inc.</h4>
                                    <p class="text-slate-500 text-xs sm:text-sm">Marketing & Brand Operations</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3: Nikostek -->
                    <div class="testimonial-slide w-full shrink-0 p-6 sm:p-10 lg:p-12 flex flex-col md:flex-row items-center md:items-start gap-6 sm:gap-10 box-border">
                        <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-2 border-[#0047ba] p-3 flex items-center justify-center bg-white shadow-sm shrink-0">
                            <img src="{{ asset('assets/images/testimonials/Nikostek.webp') }}" 
                                 alt="Nikostek" 
                                 loading="lazy"
                                 decoding="async"
                                 class="w-full h-full object-contain">
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <p class="text-slate-600 italic text-base sm:text-lg leading-relaxed mb-6 font-normal">
                                "Superb digital signage quality and seamless project management. Working with Globaltronics on high-impact LED projects has always been a smooth and successful collaboration."
                            </p>
                            <div class="flex items-center justify-center md:justify-start space-x-3">
                                <span class="w-6 h-0.5 bg-slate-900 hidden md:inline-block"></span>
                                <div>
                                    <h4 class="font-extrabold text-slate-900 text-sm sm:text-base">Nikostek Industrial</h4>
                                    <p class="text-slate-500 text-xs sm:text-sm">Engineering & Infrastructure Partner</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4: Euroasia -->
                    <div class="testimonial-slide w-full shrink-0 p-6 sm:p-10 lg:p-12 flex flex-col md:flex-row items-center md:items-start gap-6 sm:gap-10 box-border">
                        <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-2 border-[#0047ba] p-3 flex items-center justify-center bg-white shadow-sm shrink-0">
                            <img src="{{ asset('assets/images/testimonials/euroasia.webp') }}" 
                                 alt="Euroasia" 
                                 loading="lazy"
                                 decoding="async"
                                 class="w-full h-full object-contain">
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <p class="text-slate-600 italic text-base sm:text-lg leading-relaxed mb-6 font-normal">
                                "Reliable, durable, and brilliant digital LED screens. Globaltronics continues to be our trusted digital media partner for commercial display solutions."
                            </p>
                            <div class="flex items-center justify-center md:justify-start space-x-3">
                                <span class="w-6 h-0.5 bg-slate-900 hidden md:inline-block"></span>
                                <div>
                                    <h4 class="font-extrabold text-slate-900 text-sm sm:text-base">Euroasia Executive</h4>
                                    <p class="text-slate-500 text-xs sm:text-sm">Commercial Media Division</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Navigation Indicator Dots -->
                <div class="flex justify-center items-center space-x-2 pb-6 pt-0">
                    <button onclick="goToTestimonial(0)" class="testimonial-dot w-6 h-1.5 rounded-full bg-[#0047ba] transition-all duration-300" title="Slide 1"></button>
                    <button onclick="goToTestimonial(1)" class="testimonial-dot w-2 h-1.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all duration-300" title="Slide 2"></button>
                    <button onclick="goToTestimonial(2)" class="testimonial-dot w-2 h-1.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all duration-300" title="Slide 3"></button>
                    <button onclick="goToTestimonial(3)" class="testimonial-dot w-2 h-1.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all duration-300" title="Slide 4"></button>
                </div>

            </div>

            <!-- Next Button -->
            <button onclick="nextTestimonial()" class="text-[#0047ba] hover:text-blue-700 p-2 sm:p-3 transition-all duration-300 transform hover:scale-125 focus:outline-none shrink-0" title="Next Testimonial">
                <i class="fa-solid fa-play text-xl sm:text-2xl"></i>
            </button>

        </div>
    </div>
</section>

<!-- What's New Section -->
<section id="news" class="py-20 lg:py-28 bg-[#f8fafc] text-slate-800 relative z-10 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12">
        
        <!-- Section Header -->
        <div class="text-center mb-14 lg:mb-16">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0047ba] tracking-tight underline decoration-4 decoration-[#0047ba] underline-offset-8 inline-block">
                What's New
            </h2>
        </div>

        @php
            // If not provided by route or empty, retrieve active news from database with fallback
            if (!isset($newsArticles) || (is_countable($newsArticles) && count($newsArticles) === 0)) {
                $newsArticles = \App\Models\News::where('is_active', true)
                    ->orderByDesc('published_date')
                    ->orderByDesc('id')
                    ->take(5)
                    ->get();
            }
        @endphp

        <!-- Automatic Moving News Slider Container -->
        <div id="news-carousel-container" class="relative overflow-hidden w-full pb-4">
            
            <!-- Sliding Track -->
            <div id="news-track" class="flex transition-transform duration-700 ease-in-out -mx-3 sm:-mx-4">
                @forelse($newsArticles as $index => $article)
                    @php
                        $articleTitle = is_object($article) ? $article->title : $article['title'];
                        $articleDesc = is_object($article) ? $article->description : $article['description'];
                        $articleDate = is_object($article) ? $article->formatted_date : $article['date'];
                        $articleBadge = is_object($article) ? ($article->badge ?? 'GLOBALTRONICS') : ($article['badge'] ?? 'GLOBALTRONICS');
                        $articleImage = is_object($article) ? $article->image_url : asset($article['image']);
                        $articleLink = is_object($article) ? $article->read_url : ($article['link_url'] ?? '#news');
                    @endphp
                    <div class="news-card-slide w-full md:w-1/2 lg:w-1/3 shrink-0 px-3 sm:px-4 flex">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl border border-slate-100 flex flex-col w-full h-full transition-all duration-300 transform hover:-translate-y-1.5 group">
                            
                            <!-- Image Banner with Globaltronics Badge (Clickable, Opens in New Tab) -->
                            <a href="{{ $articleLink }}" target="_blank" rel="noopener noreferrer" class="block relative h-56 sm:h-64 w-full overflow-hidden bg-slate-900 shrink-0">
                                <img src="{{ $articleImage }}" 
                                     alt="{{ $articleTitle }}" 
                                     loading="lazy"
                                     decoding="async"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                                     onerror="this.src='{{ asset('assets/images/news/news1.jpg') }}'">
                                
                                <!-- Top Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/40"></div>
                                
                                <!-- Globaltronics Overlay Badge / Category (Small & Compact Pill) -->
                                <div class="absolute top-3 left-3 inline-flex items-center space-x-1.5 bg-black/65 backdrop-blur-md px-2.5 py-1 rounded-full border border-white/20 shadow-sm z-10" style="max-width: fit-content;">
                                    <img src="{{ asset('assets/images/logos/global_logo.webp') }}" 
                                         alt="Globaltronics" 
                                         class="object-contain brightness-0 invert shrink-0"
                                         style="height: 11px; max-height: 11px; width: auto; max-width: 56px; display: block;">
                                    <span class="text-[9px] font-extrabold uppercase tracking-wider text-white border-l border-white/30 pl-1.5 leading-none">
                                        {{ $articleBadge }}
                                    </span>
                                </div>

                                @if(is_object($article) && $article->has_video)
                                    <!-- Video Available Badge -->
                                    <div class="absolute top-3 right-3 flex items-center space-x-1.5 bg-red-600/90 backdrop-blur-md px-2.5 py-1 rounded-full text-white text-[9px] font-extrabold shadow-md uppercase tracking-wider z-10">
                                        <i class="fa-brands fa-youtube text-xs"></i>
                                        <span>Video</span>
                                    </div>

                                    <!-- Centered Play Icon Overlay -->
                                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-red-600/90 text-white flex items-center justify-center shadow-2xl group-hover:scale-110 group-hover:bg-red-600 transition-all duration-300">
                                            <i class="fa-solid fa-play text-sm sm:text-base translate-x-0.5"></i>
                                        </div>
                                    </div>
                                @endif
                            </a>

                            <!-- News Content Card Area -->
                            <div class="p-6 sm:p-7 flex flex-col flex-1 text-center justify-between">
                                <div>
                                    <!-- Date -->
                                    <p class="text-xs font-semibold text-slate-400 mb-3 uppercase tracking-wider">
                                        Date: <span class="text-slate-600 font-medium">{{ $articleDate }}</span>
                                    </p>

                                    <!-- Title (Clickable, Opens in New Tab) -->
                                    <h3 class="text-lg sm:text-xl font-extrabold text-[#0047ba] mb-3 leading-snug group-hover:text-blue-700 transition-colors">
                                        <a href="{{ $articleLink }}" target="_blank" rel="noopener noreferrer" class="hover:underline">
                                            {{ $articleTitle }}
                                        </a>
                                    </h3>

                                    <!-- Description -->
                                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mb-6 font-normal">
                                        {{ $articleDesc }}
                                    </p>
                                </div>

                                <!-- Read More & Video CTA Buttons -->
                                <div class="pt-2 flex flex-wrap items-center justify-center gap-2">
                                    <a href="{{ $articleLink }}" target="_blank" rel="noopener noreferrer" class="inline-block px-5 py-2.5 rounded-lg bg-[#0047ba] text-white text-xs sm:text-sm font-bold tracking-wide hover:bg-blue-700 active:scale-95 transition-all shadow-md hover:shadow-blue-500/30">
                                        Read More
                                    </a>
                                    @if(is_object($article) && $article->has_video)
                                        <button type="button" 
                                                onclick="openVideoModal('{{ $article->youtube_embed_url }}')" 
                                                class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg bg-red-600 hover:bg-red-700 text-white text-xs sm:text-sm font-bold tracking-wide active:scale-95 transition-all shadow-md hover:shadow-red-500/30">
                                            <i class="fa-brands fa-youtube"></i>
                                            <span>Watch Video</span>
                                        </button>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="w-full text-center py-12 text-slate-500">
                        <p class="text-base font-semibold">No news updates at this moment.</p>
                    </div>
                @endforelse
            </div>

            <!-- News Slider Controls & Indicator Dots -->
            @if(count($newsArticles) > 1)
            <div class="flex items-center justify-center space-x-4 mt-10">
                <button onclick="prevNewsSlide()" class="w-10 h-10 rounded-full bg-white shadow-md border border-slate-200 text-[#0047ba] hover:bg-[#0047ba] hover:text-white flex items-center justify-center transition-all duration-300 focus:outline-none" title="Previous News">
                    <i class="fa-solid fa-chevron-left text-sm"></i>
                </button>

                <div class="flex items-center space-x-2" id="news-dots">
                    @foreach($newsArticles as $index => $article)
                        <button onclick="goToNewsSlide({{ $index }})" class="news-dot w-3 h-3 rounded-full {{ $index === 0 ? 'bg-[#0047ba] w-8' : 'bg-slate-300 hover:bg-slate-400' }} transition-all duration-300" title="News {{ $index + 1 }}"></button>
                    @endforeach
                </div>

                <button onclick="nextNewsSlide()" class="w-10 h-10 rounded-full bg-white shadow-md border border-slate-200 text-[#0047ba] hover:bg-[#0047ba] hover:text-white flex items-center justify-center transition-all duration-300 focus:outline-none" title="Next News">
                    <i class="fa-solid fa-chevron-right text-sm"></i>
                </button>
            </div>
            @endif

        </div>

        <!-- Load More Action Button -->
        <div class="text-center mt-12 sm:mt-14">
            <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2.5 px-10 py-3.5 rounded-xl bg-[#0047ba] text-white text-sm sm:text-base font-extrabold hover:bg-blue-700 active:scale-95 transition-all shadow-lg hover:shadow-blue-600/30">
                <span>Load More News & Articles</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

    </div>
</section>



<!-- Video Popup Modal -->
<div id="video-modal" class="fixed inset-0 bg-black/85 backdrop-blur-md z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300 ease-out" onclick="if(event.target === this) closeVideoModal()">
    <div class="bg-black rounded-2xl overflow-hidden shadow-2xl w-full max-w-4xl relative">
        <button onclick="closeVideoModal()" class="absolute top-4 right-4 text-white hover:text-yellow-400 p-2 z-20 focus:outline-none" title="Close Video">
            <i class="fa-solid fa-xmark text-2xl"></i>
        </button>
        <div class="relative aspect-video w-full">
            <iframe id="video-iframe" class="w-full h-full" src="" title="Globaltronics Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    let autoSlideInterval;

    function showSlide(index) {
        if (!slides.length) return;

        // Wrap index around
        currentSlide = (index + slides.length) % slides.length;

        slides.forEach((slide, i) => {
            if (i === currentSlide) {
                slide.classList.remove('opacity-0', 'pointer-events-none', 'z-10');
                slide.classList.add('opacity-100', 'z-20');
            } else {
                slide.classList.remove('opacity-100', 'z-20');
                slide.classList.add('opacity-0', 'pointer-events-none', 'z-10');
            }
        });

        dots.forEach((dot, i) => {
            if (i === currentSlide) {
                dot.className = 'carousel-dot w-6 sm:w-8 h-2 rounded-full bg-[#0047ba] transition-all duration-300 shadow-sm';
            } else {
                dot.className = 'carousel-dot w-2 sm:w-2.5 h-2 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-300';
            }
        });
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
        resetAutoSlide();
    }

    function prevSlide() {
        showSlide(currentSlide - 1);
        resetAutoSlide();
    }

    function goToSlide(index) {
        showSlide(index);
        resetAutoSlide();
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            showSlide(currentSlide + 1);
        }, 5500);
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    // Video Modal Handlers
    function openVideoModal(videoUrl) {
        const modal = document.getElementById('video-modal');
        const iframe = document.getElementById('video-iframe');
        if (!modal || !iframe) return;

        let targetUrl = videoUrl || "https://www.youtube.com/embed/Ea4w1kRoydQ";
        if (!targetUrl.includes('autoplay=1')) {
            targetUrl += (targetUrl.includes('?') ? '&' : '?') + 'autoplay=1';
        }

        iframe.src = targetUrl;
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100', 'pointer-events-auto');
    }

    function closeVideoModal() {
        const modal = document.getElementById('video-modal');
        const iframe = document.getElementById('video-iframe');
        if (!modal || !iframe) return;

        iframe.src = "";
        modal.classList.remove('opacity-100', 'pointer-events-auto');
        modal.classList.add('opacity-0', 'pointer-events-none');
    }

    // Testimonials Carousel Horizontal Sliding Logic
    let currentTestimonial = 0;
    const testimonialTrack = document.getElementById('testimonial-track');
    const testimonialSlides = document.querySelectorAll('.testimonial-slide');
    const testimonialDots = document.querySelectorAll('.testimonial-dot');
    let testimonialInterval;

    function showTestimonial(index) {
        if (!testimonialSlides.length || !testimonialTrack) return;
        currentTestimonial = (index + testimonialSlides.length) % testimonialSlides.length;

        // Smooth horizontal slide translation
        testimonialTrack.style.transform = `translateX(-${currentTestimonial * 100}%)`;

        testimonialDots.forEach((dot, i) => {
            if (i === currentTestimonial) {
                dot.className = 'testimonial-dot w-6 h-1.5 rounded-full bg-[#0047ba] transition-all duration-300';
            } else {
                dot.className = 'testimonial-dot w-2 h-1.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all duration-300';
            }
        });
    }

    function nextTestimonial() {
        showTestimonial(currentTestimonial + 1);
        resetTestimonialInterval();
    }

    function prevTestimonial() {
        showTestimonial(currentTestimonial - 1);
        resetTestimonialInterval();
    }

    function goToTestimonial(index) {
        showTestimonial(index);
        resetTestimonialInterval();
    }

    function startTestimonialInterval() {
        clearInterval(testimonialInterval);
        testimonialInterval = setInterval(() => {
            showTestimonial(currentTestimonial + 1);
        }, 4000);
    }

    function resetTestimonialInterval() {
        clearInterval(testimonialInterval);
        startTestimonialInterval();
    }

    // News Multi-Card Automatic Carousel Logic
    let currentNewsIndex = 0;
    const newsTrack = document.getElementById('news-track');
    const newsCards = document.querySelectorAll('.news-card-slide');
    const newsDots = document.querySelectorAll('.news-dot');
    let newsSlideInterval;

    function getVisibleNewsCardsCount() {
        if (window.innerWidth >= 1024) return 3;
        if (window.innerWidth >= 768) return 2;
        return 1;
    }

    function showNewsSlide(index) {
        if (!newsCards.length || !newsTrack) return;
        const visibleCount = getVisibleNewsCardsCount();
        const maxIndex = Math.max(0, newsCards.length - visibleCount);

        if (index > maxIndex) {
            currentNewsIndex = 0;
        } else if (index < 0) {
            currentNewsIndex = maxIndex;
        } else {
            currentNewsIndex = index;
        }

        const shiftPercentage = (currentNewsIndex * (100 / visibleCount));
        newsTrack.style.transform = `translateX(-${shiftPercentage}%)`;

        newsDots.forEach((dot, i) => {
            if (i === currentNewsIndex) {
                dot.className = 'news-dot h-3 rounded-full bg-[#0047ba] w-8 transition-all duration-300';
            } else {
                dot.className = 'news-dot w-3 h-3 rounded-full bg-slate-300 hover:bg-slate-400 transition-all duration-300';
            }
        });
    }

    function nextNewsSlide() {
        showNewsSlide(currentNewsIndex + 1);
        resetNewsInterval();
    }

    function prevNewsSlide() {
        showNewsSlide(currentNewsIndex - 1);
        resetNewsInterval();
    }

    function goToNewsSlide(index) {
        showNewsSlide(index);
        resetNewsInterval();
    }

    function startNewsInterval() {
        clearInterval(newsSlideInterval);
        newsSlideInterval = setInterval(() => {
            showNewsSlide(currentNewsIndex + 1);
        }, 4500);
    }

    function resetNewsInterval() {
        clearInterval(newsSlideInterval);
        startNewsInterval();
    }

    function toggleLoadMoreNews(btn) {
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-2"></i> Loading updates...';
        setTimeout(() => {
            btn.innerHTML = 'All Updates Loaded <i class="fa-solid fa-check ml-2"></i>';
            btn.classList.remove('bg-[#0047ba]', 'hover:bg-blue-700');
            btn.classList.add('bg-emerald-600', 'hover:bg-emerald-700');
        }, 700);
    }

    // Hero Carousel: Pause on hover, Keyboard navigation & Touch Swipe for mobile
    const carouselContainer = document.getElementById('hero-carousel');
    if (carouselContainer) {
        carouselContainer.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
        carouselContainer.addEventListener('mouseleave', startAutoSlide);

        // Touch Swipe
        let heroTouchStartX = 0;
        let heroTouchEndX = 0;
        carouselContainer.addEventListener('touchstart', (e) => {
            heroTouchStartX = e.changedTouches[0].screenX;
        }, { passive: true });
        carouselContainer.addEventListener('touchend', (e) => {
            heroTouchEndX = e.changedTouches[0].screenX;
            if (heroTouchEndX < heroTouchStartX - 45) {
                nextSlide();
            } else if (heroTouchEndX > heroTouchStartX + 45) {
                prevSlide();
            }
        }, { passive: true });
    }

    // Keyboard Arrow navigation for hero carousel
    document.addEventListener('keydown', (e) => {
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;
        if (e.key === 'ArrowLeft') prevSlide();
        if (e.key === 'ArrowRight') nextSlide();
    });

    const newsContainer = document.getElementById('news-carousel-container');
    if (newsContainer) {
        newsContainer.addEventListener('mouseenter', () => clearInterval(newsSlideInterval));
        newsContainer.addEventListener('mouseleave', startNewsInterval);
    }

    window.addEventListener('resize', () => {
        showNewsSlide(currentNewsIndex);
    });

    // Background Preloader (Ready for additional slides)
    function preloadRemainingSlides() {
        // Reserved for future slider assets
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', () => {
        showSlide(0);
        startAutoSlide();
        showTestimonial(0);
        startTestimonialInterval();
        showNewsSlide(0);
        startNewsInterval();
        preloadRemainingSlides();
    });
</script>
@endsection
