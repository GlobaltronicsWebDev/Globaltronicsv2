<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectViewController extends Controller
{
    /**
     * Philips Reference Projects Page
     */
    public function philips()
    {
        $projects = [
            [
                'title' => 'ANYTIME FITNESS, SM ORTIGAS',
                'category' => 'Fitness & Wellness',
                'image' => 'assets/images/projects/philips/anytime_fitness.png',
                'description' => 'High-brightness commercial display system installed at Anytime Fitness, SM City East Ortigas for 24/7 continuous dynamic workout visuals.'
            ],
            [
                'title' => 'ASC',
                'category' => 'Corporate & Broadcast',
                'image' => 'assets/images/projects/philips/asc.png',
                'description' => 'Multi-screen video wall setup powered by Philips ultra-narrow bezel commercial displays for executive operations.'
            ],
            [
                'title' => 'CAPITOL COMMONS',
                'category' => 'Real Estate & Retail',
                'image' => 'assets/images/projects/philips/capitol_commons.png',
                'description' => 'Architectural Philips digital signage video wall installed at Capitol Commons showroom and lounge.'
            ],
            [
                'title' => 'COMELEC',
                'category' => 'Government & Command Center',
                'image' => 'assets/images/projects/philips/comelec.png',
                'description' => 'Mission-critical command center monitoring display wall installed for the Commission on Elections.'
            ],
            [
                'title' => "GERRY'S GRILL",
                'category' => 'Restaurant & Hospitality',
                'image' => 'assets/images/projects/philips/gerrys_grill.png',
                'description' => 'Digital menu board and promotional screens delivering vibrant visual appetite appeal across dining concourses.'
            ],
            [
                'title' => 'HONG KONG MRT',
                'category' => 'Mass Transit & Infrastructure',
                'image' => 'assets/images/projects/philips/hong_kong_mrt.png',
                'description' => 'Passenger information display networks designed for ultra-heavy foot traffic and round-the-clock duty cycles.'
            ],
            [
                'title' => 'KFC',
                'category' => 'Quick Service Retail (QSR)',
                'image' => 'assets/images/projects/philips/kfc.png',
                'description' => 'Standardized high-definition Philips digital menu boards streamlining counter ordering workflows.'
            ],
            [
                'title' => "MCDONALD'S",
                'category' => 'Quick Service Retail (QSR)',
                'image' => 'assets/images/projects/philips/mcdonalds.png',
                'description' => 'Drive-thru and counter commercial display screens delivering synchronized promotions and order queuing.'
            ],
            [
                'title' => 'METROBANK',
                'category' => 'Banking & Finance',
                'image' => 'assets/images/projects/philips/metrobank.png',
                'description' => 'Branch lobby customer information screens and rate board displays deployed across national banking centers.'
            ],
            [
                'title' => 'PBCOM AYALA',
                'category' => 'Corporate Banking & Financial Center',
                'image' => 'assets/images/projects/philips/pbcom_ayala.png',
                'description' => 'High-resolution Philips commercial video display system installed at PBCOM Tower along Ayala Avenue, Makati.'
            ],
            [
                'title' => 'SYKES',
                'category' => 'BPO & Enterprise Solutions',
                'image' => 'assets/images/projects/philips/sykes.png',
                'description' => 'Freestanding high-definition Philips digital information totem and internal communications display deployed at Sykes Asia.'
            ],
            [
                'title' => 'SM MARIKINA CASHIER',
                'category' => 'Retail & Department Store',
                'image' => 'assets/images/projects/philips/sm_marikina_cashier.png',
                'description' => 'Synchronized multi-screen Philips overhead commercial display lineup at SM City Marikina cashier checkout concourse.'
            ],
            [
                'title' => 'SOLAIRE',
                'category' => 'Hospitality & Sportsbook Lounge',
                'image' => 'assets/images/projects/philips/solaire.png',
                'description' => 'Large-format Philips commercial video wall delivering real-time sports broadcasts at the Solaire Sportsbook lounge.'
            ],
            [
                'title' => 'THE PEAK TOWER MAKATI',
                'category' => 'Commercial Real Estate & Lobby',
                'image' => 'assets/images/projects/philips/the_peak_tower_makati.png',
                'description' => 'Philips architectural video wall installed in the main reception lobby of The Peak Tower in Salcedo Village, Makati.'
            ],
            [
                'title' => 'TOKYO TOKYO',
                'category' => 'Quick Service Retail (QSR)',
                'image' => 'assets/images/projects/philips/tokyo_tokyo.png',
                'description' => 'High-brightness Philips digital menu boards and counter queuing displays across Tokyo Tokyo restaurant locations.'
            ],
            [
                'title' => 'TRUE RELIGION',
                'category' => 'Fashion & Retail Storefront',
                'image' => 'assets/images/projects/philips/true_religion.png',
                'description' => 'High-contrast portrait Philips commercial showcase displays delivering vivid runway fashion campaigns at True Religion.'
            ],
            [
                'title' => 'UNTV',
                'category' => 'Broadcast Studio & Media Network',
                'image' => 'assets/images/projects/philips/untv.png',
                'description' => 'Professional studio backdrop video wall powered by Philips ultra-narrow bezel commercial displays for UNTV Hataw Balita.'
            ],
            [
                'title' => 'W TOWER',
                'category' => 'Corporate Headquarters & Lobby',
                'image' => 'assets/images/projects/philips/w_tower.png',
                'description' => 'Sleek executive Philips digital signage and tenant directory video wall installed in the grand lobby of W Tower, BGC.'
            ],
        ];

        return view('projects.philips', compact('projects'));
    }

    /**
     * LED Projects & Installations Page
     */
    public function led()
    {
        $projects = [
            [
                'title' => 'GREENHILLS THEATER MALL',
                'category' => 'Commercial Mall',
                'image' => 'assets/images/projects/led/greenhills.png',
                'description' => 'Prominent high-impact indoor LED billboard installed in the main atrium of Greenhills Theater Mall, San Juan City.'
            ],
            [
                'title' => "BATAAN PEOPLE'S CENTER",
                'category' => 'Government & Arena',
                'image' => 'assets/images/projects/led/bataan.png',
                'description' => 'Grand stadium-scale LED display system for civic gatherings, provincial events, and sports tournaments.'
            ],
            [
                'title' => 'PASAY CITY HALL',
                'category' => 'Government & Civic Center',
                'image' => 'assets/images/projects/led/pasay.png',
                'description' => 'Public information LED facade delivering civic advisories, community news, and governmental campaigns.'
            ],
            [
                'title' => 'GLORIETTA ACTIVITY CENTER',
                'category' => 'Premier Shopping Center',
                'image' => 'assets/images/projects/led/glorietta.png',
                'description' => 'Flagship multi-story giant curved LED screen suspended in the heart of Glorietta Activity Center, Ayala Center Makati.'
            ],
            [
                'title' => 'SMILEE',
                'category' => 'Retail Flagship',
                'image' => 'assets/images/projects/led/smilee.png',
                'description' => 'Custom creative indoor LED wall engineered for immersive in-store retail brand activation.'
            ],
            [
                'title' => 'SOLAIRE',
                'category' => 'Luxury Hospitality & Gaming',
                'image' => 'assets/images/projects/led/solaire.png',
                'description' => 'Ultra-fine pixel pitch LED video screens delivering ultra-luxury visual aesthetics at Solaire Resort & Casino.'
            ],
            [
                'title' => 'ADIDAS MEGAMALL',
                'category' => 'Sportswear Flagship Store',
                'image' => 'assets/images/projects/led/adidas_megamall.png',
                'description' => 'High-refresh dynamic LED backdrop installed at the Brand Center in SM Megamall.'
            ],
            [
                'title' => 'ASEANA',
                'category' => 'Urban Development',
                'image' => 'assets/images/projects/led/aseana.png',
                'description' => 'Outdoor roadside LED billboard strategically positioned along Aseana City commercial thoroughfares.'
            ],
            [
                'title' => 'ASICS BGC',
                'category' => 'Retail Store',
                'image' => 'assets/images/projects/led/asics_bgc.png',
                'description' => 'Sleek in-store digital LED wall showcasing performance sportswear campaigns at Bonifacio High Street.'
            ],
        ];

        return view('projects.led', compact('projects'));
    }

    /**
     * Digital Display Kiosk Installations Page
     */
    public function kiosk()
    {
        $projects = [
            [
                'title' => 'ADIDAS',
                'category' => 'Interactive Retail Kiosk',
                'image' => 'assets/images/projects/kiosk/adidas_kiosk.jpg',
                'description' => 'Custom freestanding digital interactive kiosk for product lookbooks and interactive shoe selector.'
            ],
            [
                'title' => 'NBA CAFE',
                'category' => 'Sports Dining & Entertainment',
                'image' => 'assets/images/projects/kiosk/nba_cafe.jpg',
                'description' => 'Interactive gaming and sports information digital kiosks deployed at NBA Cafe Manila.'
            ],
            [
                'title' => 'PHIVOLCS',
                'category' => 'Government & Public Science',
                'image' => 'assets/images/projects/kiosk/phivolcs.png',
                'description' => 'Seismic and volcano hazard mapping interactive kiosks developed for public information at PHIVOLCS.'
            ],
            [
                'title' => 'SUZUKI',
                'category' => 'Automotive Showroom',
                'image' => 'assets/images/projects/kiosk/suzuki.jpg',
                'description' => 'Showroom digital vehicle spec kiosk allowing car buyers to explore trims, features, and pricing.'
            ],
            [
                'title' => 'NOVARTIS',
                'category' => 'Pharmaceutical & Healthcare',
                'image' => 'assets/images/projects/kiosk/novartis.png',
                'description' => 'Corporate lobby interactive information kiosk for healthcare research highlights and guest navigation.'
            ],
        ];

        return view('projects.kiosk', compact('projects'));
    }
}
