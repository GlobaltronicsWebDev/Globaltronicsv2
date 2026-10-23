@extends('layouts.app')

@section('title', 'Privacy Policy | GLOBALTRONICS INC')

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
            <span class="text-[#0047ba]">Privacy Policy</span>
        </nav>

        <!-- Header Card -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm mb-8">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-blue-50 text-[#0047ba] text-[11px] font-extrabold uppercase tracking-wider mb-4">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Compliance & Trust</span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight mb-3">
                Privacy Policy
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 font-medium">
                In compliance with Philippine Republic Act No. 10173 (Data Privacy Act of 2012)
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
                    1. Statement of Policy
                </h2>
                <p>
                    <strong>Globaltronics, Inc.</strong> ("Globaltronics", "we", "us", or "our") is dedicated to protecting your personal data in accordance with Republic Act No. 10173, otherwise known as the <em>Data Privacy Act of 2012 (DPA)</em>, its Implementing Rules and Regulations, and other relevant policies and issuances of the National Privacy Commission (NPC) of the Philippines.
                </p>
                <p class="mt-2">
                    This Privacy Policy outlines how we collect, use, process, disclose, and safeguard your personal information when you visit our website, submit job applications, or request product quotations and technical inquiries.
                </p>
            </section>

            <section>
                <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#0047ba]"></span>
                    2. Personal Data We Collect
                </h2>
                <p>We may collect personal information through voluntary submissions on our website:</p>
                <ul class="list-disc pl-5 mt-2 space-y-2">
                    <li>
                        <strong>Business & Project Inquiries:</strong> Full name, company/organization name, email address, contact phone/mobile number, installation location, project specifications, and any details provided in inquiry messages.
                    </li>
                    <li>
                        <strong>Job Applications & Career Submissions:</strong> Full name, email address, mobile number, home/current address, educational background, employment history, uploaded resumes/curriculum vitae (CVs), and statements of interest.
                    </li>
                    <li>
                        <strong>Technical & Web Browsing Information:</strong> IP address, browser type, operating system, pages visited, time spent, and cookies to ensure website security, performance optimization, and analytics.
                    </li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#0047ba]"></span>
                    3. Purpose and Legal Basis of Processing
                </h2>
                <p>We process your personal data strictly for legitimate business and recruitment purposes, including:</p>
                <ul class="list-disc pl-5 mt-2 space-y-1.5">
                    <li>Evaluating qualifications and contacting applicants for employment opportunities.</li>
                    <li>Preparing commercial quotations, technical display proposals, and answering inquiries.</li>
                    <li>Maintaining client relationships, delivery coordination, and technical after-sales support.</li>
                    <li>Compliance with statutory, regulatory, and legal requirements.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#0047ba]"></span>
                    4. Data Protection, Storage & Retention
                </h2>
                <p>
                    Globaltronics implements organizational, physical, and technical security measures designed to protect your personal data against accidental loss, unauthorized access, alteration, and improper disclosure.
                </p>
                <p class="mt-2">
                    Personal data is retained only for as long as necessary to fulfill the purposes for which it was gathered, or as required by applicable Philippine laws and accounting/retention standards. Recruitment records of unhired candidates are securely deleted or purged after one (1) year unless express consent is provided for future job pool consideration.
                </p>
            </section>

            <section>
                <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#0047ba]"></span>
                    5. Your Rights as a Data Subject
                </h2>
                <p>Under the Data Privacy Act of 2012, you are entitled to the following statutory rights:</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-3">
                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                        <strong class="text-slate-900 text-xs uppercase tracking-wider block mb-1">Right to be Informed</strong>
                        <p class="text-xs text-slate-500">Know how your personal data will be processed and used.</p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                        <strong class="text-slate-900 text-xs uppercase tracking-wider block mb-1">Right to Access</strong>
                        <p class="text-xs text-slate-500">Request reasonable access to your personal information in our possession.</p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                        <strong class="text-slate-900 text-xs uppercase tracking-wider block mb-1">Right to Rectification</strong>
                        <p class="text-xs text-slate-500">Dispute inaccuracies and correct any incomplete or outdated data.</p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                        <strong class="text-slate-900 text-xs uppercase tracking-wider block mb-1">Right to Erasure / Blocking</strong>
                        <p class="text-xs text-slate-500">Suspend, withdraw, or order the removal of your personal data when applicable.</p>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="text-lg sm:text-xl font-black text-slate-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#0047ba]"></span>
                    6. Contact the Data Protection Officer (DPO)
                </h2>
                <p>
                    If you have questions, feedback, or wish to exercise any of your data privacy rights, please contact our designated Data Protection Officer:
                </p>
                <div class="mt-4 p-5 rounded-2xl bg-blue-50/60 border border-blue-200 text-slate-800 text-xs space-y-1.5">
                    <p class="font-bold text-slate-900 text-sm">Globaltronics, Inc. — Data Protection Office</p>
                    <p><i class="fa-solid fa-location-dot text-[#0047ba] mr-1.5"></i> 2nd Floor, Globaltronics Building, Shaw Boulevard, Mandaluyong City, Metro Manila, Philippines</p>
                    <p><i class="fa-solid fa-phone text-[#0047ba] mr-1.5"></i> (02) 8721-2878</p>
                    <p><i class="fa-solid fa-envelope text-[#0047ba] mr-1.5"></i> dpo@globaltronics.net / inquiry@globaltronics.net</p>
                </div>
            </section>

        </div>

    </div>
</div>
@endsection
