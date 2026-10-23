@extends('layouts.app')

@section('title', 'Terms of Service | GLOBALTRONICS INC')

@section('content')
<div class="bg-slate-50 text-slate-800 min-h-screen py-12 lg:py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-xs uppercase tracking-wider text-slate-500 font-bold mb-6">
            <a href="{{ url('/') }}" class="hover:text-[#0047ba] transition-colors flex items-center gap-1.5">
                <i class="fa-solid fa-house text-xs"></i>
                <span>Home</span>
            </a>
            <span class="text-slate-300">/</span>
            <span class="text-[#0047ba]">Terms of Service</span>
        </nav>

        <!-- Header Card -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm mb-8">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-blue-50 text-[#0047ba] text-[11px] font-extrabold uppercase tracking-wider mb-4">
                <i class="fa-solid fa-scale-balanced"></i>
                <span>User Agreement</span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight mb-3">
                Terms of Service
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 font-medium">
                Standard Terms and Conditions Governing Website Use and Commercial Inquiries
            </p>
            <p class="text-xs text-slate-400 mt-1">
                Last Updated: {{ date('F d, Y') }}
            </p>
        </div>

        <!-- Content Body -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm space-y-8 text-sm leading-relaxed text-slate-600">
            
            <section>
                <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#0047ba]"></span>
                    1. Acceptance of Terms
                </h2>
                <p>
                    By accessing or using the website of <strong>Globaltronics, Inc.</strong> (the "Website"), you acknowledge that you have read, understood, and agreed to be bound by these Terms of Service. If you do not agree with any part of these terms, you should refrain from using our Website.
                </p>
            </section>

            <section>
                <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#0047ba]"></span>
                    2. Intellectual Property Rights
                </h2>
                <p>
                    All content on this Website — including but not limited to brand logos, registered trademarks, system photography, LED display specifications, product copy, engineering diagrams, software interfaces, and graphical assets — are the exclusive property of Globaltronics, Inc. or its authorized technology partners (e.g., Philips, AVer) and are protected by Philippine and international copyright, trademark, and intellectual property laws.
                </p>
                <p class="mt-2">
                    You may not copy, reproduce, distribute, modify, or create derivative works without prior written authorization from Globaltronics, Inc.
                </p>
            </section>

            <section>
                <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#0047ba]"></span>
                    3. Quotations, Pricing & Spec Disclaimers
                </h2>
                <p>
                    Information, technical specifications, and estimators provided on this Website (such as the LED Pixel Pitch Calculator) are for preliminary planning and informational purposes only. Official quotations, warranty terms, and project contracts are finalized via direct commercial agreements issued by authorized Globaltronics sales representatives.
                </p>
                <p class="mt-2">
                    Product availability, pixel pitch availability, and hardware specifications may change without prior notice due to manufacturer hardware upgrades.
                </p>
            </section>

            <section>
                <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#0047ba]"></span>
                    4. Acceptable Website Use
                </h2>
                <p>When using our website or inquiry portals, you agree not to:</p>
                <ul class="list-disc pl-5 mt-2 space-y-1.5">
                    <li>Submit falsified contact information, deceptive job applications, or fraudulent inquiries.</li>
                    <li>Attempt to breach or bypass server security measures or access administrative CMS portals without authorization.</li>
                    <li>Transmit malicious code, viruses, automated web scraping scripts, or denial-of-service requests.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#0047ba]"></span>
                    5. Governing Law & Dispute Jurisdiction
                </h2>
                <p>
                    These Terms shall be construed and governed in accordance with the laws of the <strong>Republic of the Philippines</strong>. Any legal dispute or proceeding arising out of or related to these Terms or website use shall be brought exclusively before the courts of proper jurisdiction in <strong>Mandaluyong City, Metro Manila, Philippines</strong>.
                </p>
            </section>

            <section>
                <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#0047ba]"></span>
                    6. Contact & Official Notices
                </h2>
                <p>
                    For inquiries or legal notices regarding these Terms, please contact:
                </p>
                <div class="mt-3 p-4 rounded-xl bg-slate-50 border border-slate-200 text-xs">
                    <p class="font-bold text-slate-900">Globaltronics, Inc. — Legal & Corporate Affairs</p>
                    <p class="text-slate-600 mt-1">Shaw Boulevard, Mandaluyong City, Metro Manila, Philippines</p>
                    <p class="text-slate-600">Email: inquiry@globaltronics.net | Phone: (02) 8721-2878</p>
                </div>
            </section>

        </div>

    </div>
</div>
@endsection
