<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50 text-slate-800">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') | Globaltronics CMS</title>

    <!-- Browser Favicon & Touch Icons -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=3">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}?v=3">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}?v=3">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=3">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}?v=3">

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Tailwind CSS (Vite or CDN Fallback) -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            brand: {
                                50: '#eff6ff',
                                100: '#dbeafe',
                                500: '#3b82f6',
                                600: '#0047ba',
                                700: '#003896',
                                800: '#1e3a8a',
                                900: '#172554',
                            }
                        },
                        fontFamily: {
                            sans: ['Poppins', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    @endif

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
        }
        /* Custom scrollbar for CMS tables and sidebars */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Clean White Admin Theme & High Contrast Font Overrides */
        .bg-slate-900 {
            background-color: #ffffff !important;
            border-color: #e2e8f0 !important;
            color: #0f172a !important;
        }

        .bg-slate-950 {
            background-color: #ffffff !important;
            border-color: #cbd5e1 !important;
            color: #0f172a !important;
        }

        .bg-slate-950\/60,
        .bg-slate-950\/40 {
            background-color: #f8fafc !important;
            border-color: #e2e8f0 !important;
        }

        .border-slate-800,
        .border-slate-800\/80,
        .border-slate-800\/60,
        .border-slate-700 {
            border-color: #e2e8f0 !important;
        }

        .divide-slate-800,
        .divide-slate-800\/60 {
            border-color: #f1f5f9 !important;
        }

        /* High-contrast readable typography */
        .text-slate-400 {
            color: #64748b !important;
        }

        .text-slate-300 {
            color: #334155 !important;
        }

        .text-slate-200 {
            color: #1e293b !important;
        }

        /* Turn text-white into bold readable dark text, EXCEPT on primary colored buttons/badges */
        .text-white:not(button.bg-\[\#0047ba\]):not(button.bg-\[\#0047ba\] *):not(a.bg-\[\#0047ba\]):not(a.bg-\[\#0047ba\] *):not(button.bg-red-600):not(button.bg-red-600 *):not(a.bg-red-600):not(a.bg-red-600 *):not(button.bg-blue-600):not(button.bg-blue-600 *):not(a.bg-blue-600):not(a.bg-blue-600 *):not(button.bg-emerald-600):not(button.bg-emerald-600 *):not(a.bg-emerald-600):not(a.bg-emerald-600 *):not(.bg-amber-500 *):not(#admin-top-brand *):not(.badge-white-text):not(.text-white-force) {
            color: #0f172a !important;
        }

        .text-white-force {
            color: #ffffff !important;
        }

        /* Drop Zone */
        #drop-zone {
            background-color: #f8fafc !important;
            border-color: #cbd5e1 !important;
        }
        #drop-zone:hover {
            background-color: #f1f5f9 !important;
            border-color: #0047ba !important;
        }
        #drop-zone #upload-prompt .text-sm {
            color: #0f172a !important;
        }
        #drop-zone #upload-prompt .text-xs {
            color: #64748b !important;
        }
        #drop-zone #upload-prompt i {
            color: #0047ba !important;
        }

        /* Form Labels & Controls */
        label {
            color: #334155 !important;
        }

        input:not([type="checkbox"]):not([type="radio"]):not([type="submit"]):not([type="button"]),
        select,
        textarea {
            background-color: #ffffff !important;
            color: #0f172a !important;
            border: 1px solid #cbd5e1 !important;
        }

        input::placeholder,
        textarea::placeholder {
            color: #94a3b8 !important;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #0047ba !important;
            box-shadow: 0 0 0 3px rgba(0, 71, 186, 0.12) !important;
            outline: none !important;
        }

        /* Toggle switches */
        .bg-slate-700 {
            background-color: #cbd5e1 !important;
        }

        /* Tables */
        table thead tr {
            background-color: #f8fafc !important;
            color: #475569 !important;
            border-bottom: 1px solid #e2e8f0 !important;
        }

        table tbody tr:hover {
            background-color: #f8fafc !important;
        }

        /* Secondary Buttons & Pills */
        .bg-slate-800:not(.bg-amber-500):not(.bg-\[\#0047ba\]):not(.bg-emerald-600):not(.bg-red-600) {
            background-color: #f1f5f9 !important;
            color: #334155 !important;
            border-color: #e2e8f0 !important;
        }

        .bg-slate-800:hover:not(.bg-amber-500):not(.bg-\[\#0047ba\]):not(.bg-emerald-600):not(.bg-red-600) {
            background-color: #e2e8f0 !important;
            color: #0f172a !important;
        }
    </style>

    @stack('styles')
</head>
<body class="h-full bg-slate-50 text-slate-800 flex flex-col md:flex-row antialiased">
@php
    $currentUser = Auth::user();
    $homeRoute = route('admin.news.index');
    $badgeText = 'CMS';
    if ($currentUser) {
        if ($currentUser->role === 'sales') {
            $homeRoute = route('admin.inquiries.index');
            $badgeText = 'SALES';
        } elseif ($currentUser->role === 'hr') {
            $homeRoute = route('admin.careers.index');
            $badgeText = 'HR';
        }
    }
@endphp

    <!-- Mobile Top Navigation Header -->
    <header class="md:hidden bg-[#0047ba] text-white px-4 py-3 flex items-center justify-between shadow-md sticky top-0 z-40">
        <a href="{{ $homeRoute }}" class="flex items-center space-x-2">
            <img src="{{ asset('assets/images/logos/global_logo.webp') }}" alt="Globaltronics" class="h-7 w-auto object-contain brightness-0 invert">
            <span class="text-xs font-bold uppercase tracking-wider bg-white/20 px-2 py-0.5 rounded">{{ $badgeText }}</span>
        </a>
        <button type="button" onclick="toggleAdminSidebar()" class="p-2 text-white hover:bg-white/10 rounded-lg focus:outline-none" aria-label="Toggle Navigation">
            <i class="fa-solid fa-bars text-lg"></i>
        </button>
    </header>

    <!-- Sidebar Overlay for Mobile -->
    <div id="sidebar-overlay" onclick="toggleAdminSidebar()" class="fixed inset-0 bg-black/40 backdrop-blur-xs z-40 hidden md:hidden"></div>

    <!-- Desktop & Drawer Sidebar -->
    <aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-50 w-72 bg-white border-r border-slate-200 flex flex-col justify-between transform -translate-x-full md:translate-x-0 md:static md:inset-auto transition-transform duration-300 ease-in-out shadow-xs">
        <div>
            <!-- Sidebar Header Brand -->
            <div id="admin-top-brand" class="h-20 bg-gradient-to-r from-[#003896] to-[#0047ba] px-6 flex items-center justify-between border-b border-blue-800/40">
                <a href="{{ $homeRoute }}" class="flex items-center space-x-3">
                    <img src="{{ asset('assets/images/logos/global_logo.webp') }}" alt="Globaltronics" class="h-9 w-auto object-contain brightness-0 invert">
                </a>
                <span class="text-[10px] font-extrabold uppercase tracking-wider bg-white/20 text-white px-2.5 py-0.5 rounded-full border border-white/20">
                    {{ $badgeText }}
                </span>
            </div>

            <!-- Current Logged In Profile -->
            <div class="p-5 border-b border-slate-200 bg-slate-50/70">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-[#0047ba] text-white flex items-center justify-center font-bold text-base shadow-xs">
                        {{ strtoupper(substr($currentUser->name ?? 'User', 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-slate-900 truncate">
                            {{ $currentUser->name ?? 'User' }}
                        </p>
                        <div class="flex items-center gap-2 mt-0.5">
                            <span class="inline-block text-[10px] font-extrabold uppercase tracking-wider px-2 py-0.5 rounded-md bg-blue-50 text-[#0047ba] border border-blue-200">
                                {{ $currentUser->role_title ?? 'Staff' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-2 text-sm font-medium">
                @if(Auth::user() && Auth::user()->isAdmin())
                    <!-- Content Management Section -->
                    <div>
                        <button type="button" 
                                onclick="toggleSidebarSection('nav-section-content', 'chevron-section-content')"
                                class="w-full flex items-center justify-between px-3 pt-2 pb-1.5 text-[11px] font-extrabold uppercase tracking-wider text-slate-500 hover:text-slate-800 transition-colors cursor-pointer select-none group">
                            <span>Content Management</span>
                            <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 group-hover:text-slate-600 transition-transform duration-200" id="chevron-section-content"></i>
                        </button>

                        <div id="nav-section-content" class="space-y-1 transition-all duration-200">
                            <a href="{{ route('admin.news.index') }}" 
                               class="group flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.news.index') ? 'bg-[#0047ba] text-white shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-100 hover:text-[#0047ba]' }}">
                                <i class="fa-regular fa-newspaper w-5 text-center text-sm {{ request()->routeIs('admin.news.index') ? 'text-white' : 'text-slate-500 group-hover:text-[#0047ba]' }}"></i>
                                <span>What's New (CMS)</span>
                                <span class="ml-auto text-xs px-2 py-0.5 rounded-full {{ request()->routeIs('admin.news.index') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }}">
                                    {{ \App\Models\News::count() }}
                                </span>
                            </a>

                            <a href="{{ route('admin.news.create') }}" 
                               class="group flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.news.create') ? 'bg-[#0047ba] text-white shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-100 hover:text-[#0047ba]' }}">
                                <i class="fa-solid fa-plus w-5 text-center text-sm {{ request()->routeIs('admin.news.create') ? 'text-white' : 'text-slate-500 group-hover:text-[#0047ba]' }}"></i>
                                <span>Upload New News</span>
                            </a>
                        </div>
                    </div>
                @endif

                @if($currentUser && ($currentUser->isAdmin() || $currentUser->role === 'hr'))
                    <!-- Careers Portal Section -->
                    <div>
                        <button type="button" 
                                onclick="toggleSidebarSection('nav-section-careers', 'chevron-section-careers')"
                                class="w-full flex items-center justify-between px-3 pt-3 pb-1.5 text-[11px] font-extrabold uppercase tracking-wider text-slate-500 hover:text-slate-800 transition-colors cursor-pointer select-none group">
                            <span>{{ $currentUser && !$currentUser->isAdmin() ? 'Careers & Hiring' : 'Careers Portal' }}</span>
                            <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 group-hover:text-slate-600 transition-transform duration-200" id="chevron-section-careers"></i>
                        </button>

                        <div id="nav-section-careers" class="space-y-1 transition-all duration-200">
                            <a href="{{ route('admin.careers.index') }}" 
                               class="group flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.careers.index') ? 'bg-[#0047ba] text-white shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-100 hover:text-[#0047ba]' }}">
                                <i class="fa-solid fa-briefcase w-5 text-center text-sm {{ request()->routeIs('admin.careers.index') ? 'text-white' : 'text-slate-500 group-hover:text-[#0047ba]' }}"></i>
                                <span>Careers (CMS)</span>
                                <span class="ml-auto text-xs px-2 py-0.5 rounded-full {{ request()->routeIs('admin.careers.index') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }}">
                                    {{ \App\Models\Career::count() }}
                                </span>
                            </a>

                            <a href="{{ route('admin.careers.create') }}" 
                               class="group flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.careers.create') ? 'bg-[#0047ba] text-white shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-100 hover:text-[#0047ba]' }}">
                                <i class="fa-solid fa-plus w-5 text-center text-sm {{ request()->routeIs('admin.careers.create') ? 'text-white' : 'text-slate-500 group-hover:text-[#0047ba]' }}"></i>
                                <span>Post New Job</span>
                            </a>

                            <a href="{{ route('admin.applications.index') }}" 
                               class="group flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.applications.*') ? 'bg-[#0047ba] text-white shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-100 hover:text-[#0047ba]' }}">
                                <i class="fa-solid fa-file-lines w-5 text-center text-sm {{ request()->routeIs('admin.applications.*') ? 'text-white' : 'text-slate-500 group-hover:text-[#0047ba]' }}"></i>
                                <span>Job Applications</span>
                                @php
                                    $pendingAppsCount = \App\Models\JobApplication::where('status', 'new')->count();
                                @endphp
                                <span class="ml-auto text-xs px-2 py-0.5 rounded-full {{ $pendingAppsCount > 0 ? 'bg-amber-100 text-amber-800 font-bold border border-amber-300' : (request()->routeIs('admin.applications.*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600') }}">
                                    {{ \App\Models\JobApplication::count() }}
                                </span>
                            </a>
                        </div>
                    </div>
                @endif

                @if($currentUser && ($currentUser->isAdmin() || $currentUser->role === 'sales'))
                    <!-- Client Inquiries & Quotes Section -->
                    <div>
                        <button type="button" 
                                onclick="toggleSidebarSection('nav-section-inquiries', 'chevron-section-inquiries')"
                                class="w-full flex items-center justify-between px-3 pt-3 pb-1.5 text-[11px] font-extrabold uppercase tracking-wider text-slate-500 hover:text-slate-800 transition-colors cursor-pointer select-none group">
                            <span>Client Inquiries & Quotes</span>
                            <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 group-hover:text-slate-600 transition-transform duration-200" id="chevron-section-inquiries"></i>
                        </button>

                        <div id="nav-section-inquiries" class="space-y-1 transition-all duration-200">
                            <a href="{{ route('admin.inquiries.index') }}" 
                               class="group flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.inquiries.*') ? 'bg-[#0047ba] text-white shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-100 hover:text-[#0047ba]' }}">
                                <i class="fa-solid fa-inbox w-5 text-center text-sm {{ request()->routeIs('admin.inquiries.*') ? 'text-white' : 'text-slate-500 group-hover:text-[#0047ba]' }}"></i>
                                <span>Project Inquiries</span>
                                @php
                                    $newInquiriesCount = \App\Models\Inquiry::where('status', 'new')->count();
                                @endphp
                                <span class="ml-auto text-xs px-2 py-0.5 rounded-full {{ $newInquiriesCount > 0 ? 'bg-amber-100 text-amber-800 font-bold border border-amber-300' : (request()->routeIs('admin.inquiries.*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600') }}">
                                    {{ \App\Models\Inquiry::count() }}
                                </span>
                            </a>
                        </div>
                    </div>
                @endif

                @if($currentUser && $currentUser->isAdmin())
                    <!-- Services: LED & iPosters Section -->
                    <div>
                        <button type="button" 
                                onclick="toggleSidebarSection('nav-section-services', 'chevron-section-services')"
                                class="w-full flex items-center justify-between px-3 pt-3 pb-1.5 text-[11px] font-extrabold uppercase tracking-wider text-slate-500 hover:text-slate-800 transition-colors cursor-pointer select-none group">
                            <span>Services: LED & iPosters</span>
                            <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 group-hover:text-slate-600 transition-transform duration-200" id="chevron-section-services"></i>
                        </button>

                        <div id="nav-section-services" class="space-y-1 transition-all duration-200">
                            <a href="{{ route('admin.solutions.index') }}" 
                               class="group flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.solutions.*') ? 'bg-[#0047ba] text-white shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-100 hover:text-[#0047ba]' }}">
                                <i class="fa-solid fa-tv w-5 text-center text-sm {{ request()->routeIs('admin.solutions.*') ? 'text-white' : 'text-slate-500 group-hover:text-[#0047ba]' }}"></i>
                                <span>LED Display Systems</span>
                                <span class="ml-auto text-xs px-2 py-0.5 rounded-full {{ request()->routeIs('admin.solutions.*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }}">
                                    {{ \App\Models\Solution::count() }}
                                </span>
                            </a>

                            <a href="{{ route('admin.solutions.create') }}" 
                               class="group flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.solutions.create') ? 'bg-[#0047ba] text-white shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-100 hover:text-[#0047ba]' }}">
                                <i class="fa-solid fa-plus w-5 text-center text-sm {{ request()->routeIs('admin.solutions.create') ? 'text-white' : 'text-slate-500 group-hover:text-[#0047ba]' }}"></i>
                                <span>Upload LED System</span>
                            </a>

                            <a href="{{ route('admin.iposters.index') }}" 
                               class="group flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.iposters.*') ? 'bg-[#0047ba] text-white shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-100 hover:text-[#0047ba]' }}">
                                <i class="fa-solid fa-mobile-screen w-5 text-center text-sm {{ request()->routeIs('admin.iposters.*') ? 'text-white' : 'text-slate-500 group-hover:text-[#0047ba]' }}"></i>
                                <span>Digital iPosters</span>
                                <span class="ml-auto text-xs px-2 py-0.5 rounded-full {{ request()->routeIs('admin.iposters.*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }}">
                                    {{ \App\Models\Iposter::count() }}
                                </span>
                            </a>

                            <a href="{{ route('admin.iposters.create') }}" 
                               class="group flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.iposters.create') ? 'bg-[#0047ba] text-white shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-100 hover:text-[#0047ba]' }}">
                                <i class="fa-solid fa-plus w-5 text-center text-sm {{ request()->routeIs('admin.iposters.create') ? 'text-white' : 'text-slate-500 group-hover:text-[#0047ba]' }}"></i>
                                <span>Upload iPoster</span>
                            </a>
                        </div>
                    </div>

                    <!-- Data & System Tools Section -->
                    <div>
                        <button type="button" 
                                onclick="toggleSidebarSection('nav-section-tools', 'chevron-section-tools')"
                                class="w-full flex items-center justify-between px-3 pt-3 pb-1.5 text-[11px] font-extrabold uppercase tracking-wider text-slate-500 hover:text-slate-800 transition-colors cursor-pointer select-none group">
                            <span>Data & System Tools</span>
                            <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 group-hover:text-slate-600 transition-transform duration-200" id="chevron-section-tools"></i>
                        </button>

                        <div id="nav-section-tools" class="space-y-1 transition-all duration-200">
                            <a href="{{ route('admin.backup.index') }}" 
                               class="group flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.backup.*') ? 'bg-[#0047ba] text-white shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-100 hover:text-[#0047ba]' }}">
                                <i class="fa-solid fa-database w-5 text-center text-sm {{ request()->routeIs('admin.backup.*') ? 'text-white' : 'text-slate-500 group-hover:text-[#0047ba]' }}"></i>
                                <span>Backup & Export Data</span>
                            </a>

                            <a href="{{ route('admin.users.index') }}" 
                               class="group flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.users.*') ? 'bg-[#0047ba] text-white shadow-sm font-semibold' : 'text-slate-700 hover:bg-slate-100 hover:text-[#0047ba]' }}">
                                <i class="fa-solid fa-user-gear w-5 text-center text-sm {{ request()->routeIs('admin.users.*') ? 'text-white' : 'text-slate-500 group-hover:text-[#0047ba]' }}"></i>
                                <span>User Accounts & Passwords</span>
                            </a>
                        </div>
                    </div>
                @endif

                <div class="px-3 pt-5 pb-1 text-[11px] font-extrabold uppercase tracking-wider text-slate-400">
                    Website Preview
                </div>

                @php
                    $previewUrl = url('/');
                    $previewLabel = 'View Public Website';
                    if ($currentUser && $currentUser->role === 'sales') {
                        $previewUrl = url('/#solutions');
                        $previewLabel = 'Preview Products & Catalog';
                    } elseif ($currentUser && $currentUser->role === 'hr') {
                        $previewUrl = route('careers.index');
                        $previewLabel = 'Preview Live Careers';
                    }
                @endphp

                <a href="{{ $previewUrl }}" target="_blank" 
                   class="group flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-slate-700 hover:bg-slate-100 hover:text-[#0047ba] transition-all font-medium">
                    <i class="fa-solid fa-arrow-up-right-from-square w-5 text-center text-sm text-slate-500 group-hover:text-[#0047ba] transition-colors"></i>
                    <span>{{ $previewLabel }}</span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer & Logout -->
        <div class="p-4 border-t border-slate-200 bg-white">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" 
                        class="w-full flex items-center justify-center space-x-2 px-4 py-2.5 rounded-xl bg-slate-50 hover:bg-red-50 text-slate-700 hover:text-red-700 border border-slate-200 hover:border-red-200 transition-all font-semibold text-xs">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Sign Out</span>
                </button>
            </form>
            <p class="text-center text-[11px] text-slate-500 mt-3">
                &copy; {{ date('Y') }} Globaltronics CMS v2.0
            </p>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto bg-slate-50">
        
        <!-- Top App Bar -->
        <header class="bg-white/95 backdrop-blur-md border-b border-slate-200 h-20 px-6 sm:px-8 flex items-center justify-between sticky top-0 z-30 shadow-xs">
            <div>
                <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight flex items-center gap-2.5">
                    @yield('header-title', "What's New CMS")
                </h1>
                <p class="text-xs text-slate-500 mt-0.5">
                    @yield('header-subtitle', 'Manage banner articles, announcements, and uploads on the live site.')
                </p>
            </div>

            <div class="flex items-center space-x-3">
                @if($currentUser && $currentUser->isAdmin())
                    <a href="{{ url('/#news') }}" target="_blank" 
                       class="hidden sm:inline-flex items-center space-x-2 px-4 py-2 rounded-xl bg-white hover:bg-slate-50 text-xs font-semibold text-slate-700 border border-slate-200 shadow-xs transition-colors">
                        <i class="fa-regular fa-eye text-slate-500"></i>
                        <span>Preview Live News</span>
                    </a>

                    <a href="{{ route('admin.news.create') }}" 
                       class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl bg-[#0047ba] hover:bg-blue-700 text-xs font-bold text-white shadow-sm transition-all active:scale-95">
                        <i class="fa-solid fa-plus"></i>
                        <span>Upload Article</span>
                    </a>
                @elseif($currentUser && $currentUser->role === 'sales')
                    <a href="{{ url('/#solutions') }}" target="_blank" 
                       class="hidden sm:inline-flex items-center space-x-2 px-4 py-2 rounded-xl bg-white hover:bg-slate-50 text-xs font-semibold text-slate-700 border border-slate-200 shadow-xs transition-colors">
                        <i class="fa-regular fa-eye text-slate-500"></i>
                        <span>Preview Live Products</span>
                    </a>

                    <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}" 
                       class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl bg-amber-500 hover:bg-amber-600 text-xs font-bold text-slate-950 shadow-sm transition-all active:scale-95">
                        <i class="fa-regular fa-bell"></i>
                        <span>New Inquiries ({{ \App\Models\Inquiry::where('status', 'new')->count() }})</span>
                    </a>
                @else
                    <a href="{{ route('careers.index') }}" target="_blank" 
                       class="hidden sm:inline-flex items-center space-x-2 px-4 py-2 rounded-xl bg-white hover:bg-slate-50 text-xs font-semibold text-slate-700 border border-slate-200 shadow-xs transition-colors">
                        <i class="fa-regular fa-eye text-slate-500"></i>
                        <span>Preview Live Careers</span>
                    </a>

                    <a href="{{ route('admin.careers.create') }}" 
                       class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl bg-[#0047ba] hover:bg-blue-700 text-xs font-bold text-white shadow-sm transition-all active:scale-95">
                        <i class="fa-solid fa-plus"></i>
                        <span>Post New Job</span>
                    </a>
                @endif

                <form action="{{ route('admin.logout') }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" 
                            class="inline-flex items-center space-x-1.5 px-3 py-2 rounded-xl bg-white hover:bg-red-50 text-slate-600 hover:text-red-700 border border-slate-200 hover:border-red-200 text-xs font-semibold shadow-xs transition-all" 
                            title="Sign Out">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span class="hidden md:inline">Sign Out</span>
                    </button>
                </form>
            </div>
        </header>

        <!-- Flash Messages -->
        <div class="px-6 sm:px-8 pt-6">
            @if(session('success'))
                <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-start space-x-3 shadow-xs mb-4">
                    <i class="fa-regular fa-circle-check text-emerald-600 text-lg mt-0.5 shrink-0"></i>
                    <div class="flex-1 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif

            @if(session('warning'))
                <div class="p-4 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 flex items-start space-x-3 shadow-xs mb-4">
                    <i class="fa-regular fa-triangle-exclamation text-amber-600 text-lg mt-0.5 shrink-0"></i>
                    <div class="flex-1 text-sm font-medium">
                        {{ session('warning') }}
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-amber-500 hover:text-amber-800">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif

            @if(session('info'))
                <div class="p-4 rounded-xl bg-blue-50 border border-blue-200 text-blue-800 flex items-start space-x-3 shadow-xs mb-4">
                    <i class="fa-regular fa-circle-info text-blue-600 text-lg mt-0.5 shrink-0"></i>
                    <div class="flex-1 text-sm font-medium">
                        {{ session('info') }}
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-blue-500 hover:text-blue-800">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif

            @if(session('error') || $errors->any())
                <div class="p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 flex items-start space-x-3 shadow-xs mb-4">
                    <i class="fa-regular fa-circle-xmark text-red-600 text-lg mt-0.5 shrink-0"></i>
                    <div class="flex-1 text-sm">
                        <div class="font-bold mb-1">{{ session('error') ?? 'Please check the form for errors:' }}</div>
                        @if($errors->any())
                            <ul class="list-disc list-inside space-y-0.5 text-xs text-red-700">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-800">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif
        </div>

        <!-- Main Workspace Body -->
        <main class="flex-1 px-6 sm:px-8 py-4 pb-16">
            @yield('content')
        </main>
    </div>

    <!-- Sidebar & Accordion Toggle Scripts -->
    <script>
        function toggleAdminSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            if (!sidebar || !overlay) return;

            const isClosed = sidebar.classList.contains('-translate-x-full');
            if (isClosed) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        function toggleSidebarSection(sectionId, chevronId) {
            const section = document.getElementById(sectionId);
            const chevron = document.getElementById(chevronId);
            if (!section) return;

            const isHidden = section.classList.toggle('hidden');
            if (chevron) {
                chevron.style.transform = isHidden ? 'rotate(-90deg)' : 'rotate(0deg)';
            }
            try {
                localStorage.setItem('cms_sidebar_' + sectionId, isHidden ? 'closed' : 'open');
            } catch (e) {}
        }

        // Restore accordion state from localStorage on page load
        document.addEventListener('DOMContentLoaded', () => {
            const sections = [
                { id: 'nav-section-content', chevron: 'chevron-section-content' },
                { id: 'nav-section-careers', chevron: 'chevron-section-careers' },
                { id: 'nav-section-services', chevron: 'chevron-section-services' },
                { id: 'nav-section-inquiries', chevron: 'chevron-section-inquiries' },
                { id: 'nav-section-tools', chevron: 'chevron-section-tools' }
            ];

            sections.forEach(item => {
                const section = document.getElementById(item.id);
                const chevron = document.getElementById(item.chevron);
                if (!section) return;

                // If currently on an active route inside this section, keep it open!
                const hasActive = section.querySelector('.bg-\\[\\#0047ba\\]') !== null;
                if (hasActive) {
                    section.classList.remove('hidden');
                    if (chevron) chevron.style.transform = 'rotate(0deg)';
                    return;
                }

                try {
                    const saved = localStorage.getItem('cms_sidebar_' + item.id);
                    if (saved === 'closed') {
                        section.classList.add('hidden');
                        if (chevron) chevron.style.transform = 'rotate(-90deg)';
                    } else {
                        section.classList.remove('hidden');
                        if (chevron) chevron.style.transform = 'rotate(0deg)';
                    }
                } catch (e) {}
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
