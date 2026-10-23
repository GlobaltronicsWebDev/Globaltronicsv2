<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Iposter;
use App\Models\News;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    /**
     * Master repository of all website navigation menus, submenus, and core sections.
     */
    public static function getMenuItems(): array
    {
        return [
            [
                'title' => 'Home',
                'menu_group' => 'Main Menu',
                'url' => url('/'),
                'description' => 'Globaltronics official homepage: leader in digital innovation, LED billboards, visual displays, and DOOH advertising.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-emerald-500/20 text-emerald-400 border-emerald-500/30',
                'icon' => 'fa-house',
                'keywords' => ['home', 'homepage', 'main', 'landing', 'welcome', 'globaltronics', 'leader in led']
            ],
            [
                'title' => 'Company Overview',
                'menu_group' => 'About Menu',
                'url' => route('about'),
                'description' => 'Learn about Globaltronics history, leadership, vision, mission, and over 20 years of digital LED dominance in the Philippines.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-blue-500/20 text-blue-400 border-blue-500/30',
                'icon' => 'fa-building',
                'keywords' => ['about', 'about us', 'company overview', 'corporate', 'history', 'mission', 'vision', 'who we are', 'board of directors', 'pioneer']
            ],
            [
                'title' => 'Careers & Opportunities',
                'menu_group' => 'About Menu',
                'url' => url('/about#careers'),
                'description' => 'Explore tech engineering, sales, creatives, and digital media career openings at Globaltronics Inc.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-amber-500/20 text-amber-400 border-amber-500/30',
                'icon' => 'fa-briefcase',
                'keywords' => ['careers', 'jobs', 'hiring', 'work with us', 'openings', 'employment', 'vacancies', 'opportunities', 'join us']
            ],
            [
                'title' => 'DigiParc',
                'menu_group' => 'Main Menu',
                'url' => 'https://digiparc.globaltronics.net/',
                'description' => 'DigiParc by Globaltronics: smart digital park, interactive digital experiences, and next-gen outdoor entertainment technology.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-indigo-500/20 text-indigo-400 border-indigo-500/30',
                'icon' => 'fa-tree',
                'keywords' => ['digiparc', 'digi parc', 'smart park', 'digital park', 'interactive park', 'park tech']
            ],
            [
                'title' => 'LED Display Systems',
                'menu_group' => 'Services Menu',
                'url' => route('services.led-displays'),
                'description' => 'High-resolution outdoor and indoor LED billboards, curved displays, 3D naked-eye screens, and stadium perimeters.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-cyan-500/20 text-cyan-400 border-cyan-500/30',
                'icon' => 'fa-tv',
                'keywords' => ['services', 'services menu', 'led display systems', 'led screens', 'billboards', 'outdoor led', 'indoor led', 'display systems']
            ],
            [
                'title' => 'Digital iPoster AD Placement',
                'menu_group' => 'Services Menu',
                'url' => route('services.iposters.index'),
                'description' => 'Premium ultra-slim digital iPoster kiosk networks deployed across high-traffic premier Ayala Malls nationwide.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-purple-500/20 text-purple-400 border-purple-500/30',
                'icon' => 'fa-tablet-screen-button',
                'keywords' => ['services', 'services menu', 'digital iposter ad placement', 'iposter', 'iposters', 'digital poster', 'mall advertising', 'indoor kiosks', 'mall ads']
            ],
            [
                'title' => 'Static AD Placement',
                'menu_group' => 'Services Menu',
                'url' => url('/#services'),
                'description' => 'Prime high-impact static out-of-home (OOH) advertising billboards, banners, and landmark physical advertising structures.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-teal-500/20 text-teal-400 border-teal-500/30',
                'icon' => 'fa-image',
                'keywords' => ['services', 'services menu', 'static ad placement', 'static ads', 'traditional billboards', 'ooh', 'static billboard', 'out of home', 'banners']
            ],
            [
                'title' => 'Digital Design & Consultancy',
                'menu_group' => 'Services Menu',
                'url' => route('services.digital-design-consultancy'),
                'description' => 'Creative multimedia studio: motion graphics, 3D visual content, corporate branding, web design, print, and display layout optimization.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-pink-500/20 text-pink-400 border-pink-500/30',
                'icon' => 'fa-wand-magic-sparkles',
                'keywords' => ['services', 'services menu', 'digital design & consultancy', 'digital design', 'consultancy', 'motion graphics', '3d design', 'content creation', 'prints', 'web design', 'flash application', 'creative services']
            ],
            [
                'title' => 'Electronics LED Display',
                'menu_group' => 'Solutions Menu',
                'url' => route('solutions.electronics-led'),
                'description' => 'Engineering-grade electronic LED display panels, fine-pitch video walls, and custom indoor/outdoor architectural installations.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-blue-500/20 text-blue-400 border-blue-500/30',
                'icon' => 'fa-microchip',
                'keywords' => ['solutions', 'solutions menu', 'electronics led display', 'led hardware', 'led panels', 'fine pitch led', 'led wall', 'display electronics']
            ],
            [
                'title' => 'Philips Commercial Display',
                'menu_group' => 'Solutions Menu',
                'url' => route('solutions.philips'),
                'description' => 'Authorized distributor of Philips professional and commercial displays, high-brightness digital monitors, and video signage.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-sky-500/20 text-sky-400 border-sky-500/30',
                'icon' => 'fa-desktop',
                'keywords' => ['solutions', 'solutions menu', 'philips commercial display', 'philips', 'commercial screens', 'monitors', 'professional displays', 'commercial display']
            ],
            [
                'title' => 'AVer Camera Video Conferencing',
                'menu_group' => 'Solutions Menu',
                'url' => route('solutions.aver'),
                'description' => 'Enterprise AVer video conferencing camera solutions, meeting room collaboration systems, and professional hybrid audio-video tech.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-orange-500/20 text-orange-400 border-orange-500/30',
                'icon' => 'fa-video',
                'keywords' => ['solutions', 'solutions menu', 'aver camera video conferencing', 'aver', 'video conference', 'conference camera', 'zoom rooms', 'meeting room', 'hybrid meetings', 'cameras']
            ],
            [
                'title' => 'Digital Signage Solution',
                'menu_group' => 'Solutions Menu',
                'url' => route('solutions.digital-signage'),
                'description' => 'Enterprise digital signage software, cloud content management, synchronized scheduling, and multi-display playback networks.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-violet-500/20 text-violet-400 border-violet-500/30',
                'icon' => 'fa-network-wired',
                'keywords' => ['solutions', 'solutions menu', 'digital signage solution', 'signage software', 'content management', 'remote display management', 'digital signage']
            ],
            [
                'title' => 'Video Matrix Solution',
                'menu_group' => 'Solutions Menu',
                'url' => route('solutions.video-matrix'),
                'description' => 'High-performance video matrix switchers, video wall processors, HDMI matrices, and multi-input signal routing hardware.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-indigo-500/20 text-indigo-400 border-indigo-500/30',
                'icon' => 'fa-diagram-project',
                'keywords' => ['solutions', 'solutions menu', 'video matrix solution', 'video matrix', 'video wall controller', 'hdmi matrix', 'multi-screen switching', 'matrix switcher']
            ],
            [
                'title' => 'Brackets & Mounting Hardware',
                'menu_group' => 'Solutions Menu',
                'url' => route('solutions.brackets'),
                'description' => 'Heavy-duty wall mounts, ceiling suspensions, freestanding kiosk frames, and engineered mounting brackets for all display sizes.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-slate-500/20 text-slate-400 border-slate-500/30',
                'icon' => 'fa-wrench',
                'keywords' => ['solutions', 'solutions menu', 'brackets', 'mounting brackets', 'wall mounts', 'ceiling mounts', 'led brackets', 'display mounts', 'hardware']
            ],
            [
                'title' => 'News & Articles',
                'menu_group' => 'Main Menu',
                'url' => url('/#news'),
                'description' => 'Latest press releases, product launches, corporate milestones, and digital DOOH industry innovations from Globaltronics.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-blue-500/20 text-blue-400 border-blue-500/30',
                'icon' => 'fa-newspaper',
                'keywords' => ['news & articles', 'news', 'articles', 'press release', 'updates', 'announcements', 'stories', 'media']
            ],
            [
                'title' => 'Contact Us & Booking Inquiries',
                'menu_group' => 'Main Menu',
                'url' => url('/#contact'),
                'description' => 'Reach Globaltronics headquarters in Makati, contact advertising sales representatives, or submit campaign rate card inquiries.',
                'category' => 'Navigation Menu',
                'badge_color' => 'bg-rose-500/20 text-rose-400 border-rose-500/30',
                'icon' => 'fa-envelope',
                'keywords' => ['contact us', 'contact', 'inquiry', 'sales', 'book ad', 'rate card', 'phone', 'email', 'address', 'get in touch']
            ],
            [
                'title' => 'Admin CMS Login',
                'menu_group' => 'Administration',
                'url' => route('admin.login'),
                'description' => 'Secure administration login portal for Globaltronics content management system (CMS).',
                'category' => 'Administration',
                'badge_color' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30',
                'icon' => 'fa-right-to-bracket',
                'keywords' => ['admin', 'login', 'cms', 'portal', 'dashboard', 'management', 'upload']
            ],
            [
                'title' => 'Philips Projects',
                'menu_group' => 'Reference Projects',
                'url' => route('projects.philips'),
                'description' => 'Showcase of 18 commercial display installations powered by Philips: Anytime Fitness, ASC, Capitol Commons, COMELEC, Gerry\'s Grill, Hong Kong MRT, KFC, McDonald\'s, Metrobank, PBCOM Ayala, Sykes, SM Marikina, Solaire, The Peak Tower, Tokyo Tokyo, True Religion, UNTV, and W Tower.',
                'category' => 'Reference Projects',
                'badge_color' => 'bg-sky-500/20 text-sky-400 border-sky-500/30',
                'icon' => 'fa-desktop',
                'keywords' => ['philips', 'philips projects', 'reference projects', 'anytime fitness', 'asc', 'capitol commons', 'comelec', 'gerrys grill', 'hong kong mrt', 'kfc', 'mcdonalds', 'metrobank', 'pbcom', 'pbcom ayala', 'sykes', 'sm marikina', 'solaire', 'the peak tower', 'tokyo tokyo', 'true religion', 'untv', 'w tower', 'commercial displays']
            ],
            [
                'title' => 'LED Projects & Installations',
                'menu_group' => 'Reference Projects',
                'url' => route('projects.led'),
                'description' => 'Landmark indoor and outdoor LED display projects: Greenhills Theater Mall, Bataan People\'s Center, Pasay City Hall, Glorietta Activity Center, Smilee, Solaire, Adidas Megamall, Aseana, and Asics BGC.',
                'category' => 'Reference Projects',
                'badge_color' => 'bg-cyan-500/20 text-cyan-400 border-cyan-500/30',
                'icon' => 'fa-tv',
                'keywords' => ['led projects', 'led installations', 'reference projects', 'greenhills', 'bataan', 'pasay city hall', 'glorietta activity center', 'smilee', 'solaire', 'adidas megamall', 'aseana', 'asics bgc', 'billboards']
            ],
            [
                'title' => 'Digital Display Kiosk Installations',
                'menu_group' => 'Reference Projects',
                'url' => route('projects.kiosk'),
                'description' => 'Custom interactive freestanding touchscreen kiosks: Adidas interactive shoe selector, NBA Cafe Manila, Phivolcs hazard mapping, Suzuki showroom, and Novartis healthcare kiosk.',
                'category' => 'Reference Projects',
                'badge_color' => 'bg-purple-500/20 text-purple-400 border-purple-500/30',
                'icon' => 'fa-tablet-screen-button',
                'keywords' => ['digital display kiosk installations', 'kiosk projects', 'kiosks', 'interactive kiosk', 'adidas kiosk', 'nba cafe', 'phivolcs', 'suzuki', 'novartis', 'touchscreen']
            ]
        ];
    }

    /**
     * Display search results across all modules and navigation menus.
     */
    public function index(Request $request)
    {
        $q = trim($request->input('q', ''));
        $tab = $request->input('tab', 'all');

        $menus = collect();
        $solutions = collect();
        $iposters = collect();
        $news = collect();
        $careers = collect();

        if ($q !== '') {
            $qLower = Str::lower($q);

            // 1. Search All Menus & Submenus
            foreach (self::getMenuItems() as $item) {
                $matched = Str::contains(Str::lower($item['title']), $qLower) ||
                           Str::contains(Str::lower($item['menu_group']), $qLower) ||
                           Str::contains(Str::lower($item['description']), $qLower);

                if (!$matched) {
                    foreach ($item['keywords'] as $kw) {
                        if (Str::contains($qLower, $kw) || Str::contains($kw, $qLower)) {
                            $matched = true;
                            break;
                        }
                    }
                }

                if ($matched) {
                    $menus->push($item);
                }
            }

            // 2. Search LED Display Systems
            $solutions = Solution::where('is_active', true)
                ->where(function ($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                        ->orWhere('location', 'like', "%{$q}%")
                        ->orWhere('short_description', 'like', "%{$q}%")
                        ->orWhere('features', 'like', "%{$q}%")
                        ->orWhere('specs', 'like', "%{$q}%");
                })
                ->orderBy('title', 'asc')
                ->get();

            // 3. Search Digital iPosters
            $iposters = Iposter::where('is_active', true)
                ->where(function ($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                        ->orWhere('mall_or_location', 'like', "%{$q}%")
                        ->orWhere('short_description', 'like', "%{$q}%")
                        ->orWhere('features', 'like', "%{$q}%")
                        ->orWhere('specifications', 'like', "%{$q}%");
                })
                ->orderBy('title', 'asc')
                ->get();

            // 4. Search News & Articles
            $news = News::where('is_active', true)
                ->where(function ($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                        ->orWhere('content', 'like', "%{$q}%")
                        ->orWhere('excerpt', 'like', "%{$q}%")
                        ->orWhere('category', 'like', "%{$q}%")
                        ->orWhere('author', 'like', "%{$q}%");
                })
                ->orderByDesc('published_date')
                ->get();

            // 5. Search Careers & Openings
            $careers = Career::where('is_active', true)
                ->where(function ($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                        ->orWhere('department', 'like', "%{$q}%")
                        ->orWhere('location', 'like', "%{$q}%")
                        ->orWhere('description', 'like', "%{$q}%")
                        ->orWhere('requirements', 'like', "%{$q}%");
                })
                ->orderBy('title', 'asc')
                ->get();
        }

        $totalResults = $menus->count() + $solutions->count() + $iposters->count() + $news->count() + $careers->count();

        return view('search.index', compact(
            'q',
            'tab',
            'menus',
            'solutions',
            'iposters',
            'news',
            'careers',
            'totalResults'
        ));
    }

    /**
     * Live search JSON endpoint for instant preview in the search modal.
     */
    public function live(Request $request)
    {
        $q = trim($request->input('q', ''));

        if (mb_strlen($q) < 2) {
            return response()->json(['results' => [], 'total' => 0]);
        }

        $results = [];
        $qLower = Str::lower($q);

        // 1. Search Menus & Submenus First
        $matchedMenus = 0;
        foreach (self::getMenuItems() as $item) {
            $matched = Str::contains(Str::lower($item['title']), $qLower) ||
                       Str::contains(Str::lower($item['menu_group']), $qLower) ||
                       Str::contains(Str::lower($item['description']), $qLower);

            if (!$matched) {
                foreach ($item['keywords'] as $kw) {
                    if (Str::contains($qLower, $kw) || Str::contains($kw, $qLower)) {
                        $matched = true;
                        break;
                    }
                }
            }

            if ($matched) {
                $results[] = [
                    'title' => $item['title'],
                    'subtitle' => $item['menu_group'] . ' • Direct Link',
                    'url' => $item['url'],
                    'category' => 'Menu Item',
                    'badge_color' => $item['badge_color'],
                    'image' => null,
                    'icon' => $item['icon'],
                ];
                $matchedMenus++;
                if ($matchedMenus >= 4) break;
            }
        }

        // 2. LED Display Systems
        $solutions = Solution::where('is_active', true)
            ->where(function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                    ->orWhere('location', 'like', "%{$q}%")
                    ->orWhere('short_description', 'like', "%{$q}%");
            })
            ->orderBy('title', 'asc')
            ->take(3)
            ->get();

        foreach ($solutions as $item) {
            $results[] = [
                'title' => $item->title,
                'subtitle' => $item->location ?: 'LED Display System',
                'url' => route('services.led-displays.show', $item->slug),
                'category' => 'LED Displays',
                'badge_color' => 'bg-cyan-500/20 text-cyan-400 border-cyan-500/30',
                'image' => $item->image_url,
                'icon' => 'fa-tv',
            ];
        }

        // 3. Digital iPosters
        $iposters = Iposter::where('is_active', true)
            ->where(function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                    ->orWhere('mall_or_location', 'like', "%{$q}%")
                    ->orWhere('short_description', 'like', "%{$q}%");
            })
            ->orderBy('title', 'asc')
            ->take(3)
            ->get();

        foreach ($iposters as $item) {
            $results[] = [
                'title' => $item->title,
                'subtitle' => $item->mall_or_location ?: 'Digital iPoster Kiosk',
                'url' => route('services.iposters.show', $item->slug),
                'category' => 'Digital iPosters',
                'badge_color' => 'bg-purple-500/20 text-purple-400 border-purple-500/30',
                'image' => $item->image_url,
                'icon' => 'fa-tablet-screen-button',
            ];
        }

        // 4. News Articles
        $news = News::where('is_active', true)
            ->where(function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                    ->orWhere('excerpt', 'like', "%{$q}%");
            })
            ->orderByDesc('published_date')
            ->take(2)
            ->get();

        foreach ($news as $item) {
            $results[] = [
                'title' => $item->title,
                'subtitle' => $item->category . ($item->published_date ? ' • ' . $item->published_date->format('M d, Y') : ''),
                'url' => route('news.show', $item->slug),
                'category' => 'News & Article',
                'badge_color' => 'bg-blue-500/20 text-blue-400 border-blue-500/30',
                'image' => $item->image_url,
                'icon' => 'fa-newspaper',
            ];
        }

        // 5. Careers
        $careers = Career::where('is_active', true)
            ->where(function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                    ->orWhere('department', 'like', "%{$q}%");
            })
            ->take(2)
            ->get();

        foreach ($careers as $item) {
            $results[] = [
                'title' => $item->title,
                'subtitle' => $item->department . ($item->location ? ' • ' . $item->location : ''),
                'url' => route('careers.show', $item->slug),
                'category' => 'Careers',
                'badge_color' => 'bg-amber-500/20 text-amber-400 border-amber-500/30',
                'image' => null,
                'icon' => 'fa-briefcase',
            ];
        }

        return response()->json([
            'results' => $results,
            'total' => count($results),
            'view_all_url' => route('search', ['q' => $q]),
        ]);
    }
}
