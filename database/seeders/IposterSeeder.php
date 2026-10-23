<?php

namespace Database\Seeders;

use App\Models\Iposter;
use Illuminate\Database\Seeder;

class IposterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sharedFeatures = "• Sleek, ultra-slim and lightweight digital display kiosk.\n• Frame Size: 572mm (W) x 1902mm (H) with 35mm display depth.\n• 6mm ultra-slim edge for maximum active visual area.\n• 2880 Hz high refresh rate for smooth brand motion playback.\n• 1200 nits high brightness ensuring vivid daylight and ambient illumination clarity.\n• 160° ultra-wide viewing angle ensuring crisp visibility from all shopper walking directions.\n• Hidden auto-closing inclined bracket and lightweight 32kg portability.";
        $sharedSpecs = "572mm (W) x 1902mm (H) | 1200 Nits | 2880 Hz | 32kg";

        $iposters = [
            [
                'title' => 'AYALA MALLS GLORIETTA',
                'slug' => 'ayala-malls-glorietta',
                'category' => 'Digital iPoster Ad Placement',
                'mall_or_location' => 'Glorietta, Ayala Center, Makati City',
                'image' => 'assets/images/iposters/gallery/glorietta_1.png',
                'gallery_images' => [
                    'assets/images/iposters/gallery/glorietta_1.png',
                    'assets/images/iposters/gallery/glorietta_2.png',
                    'assets/images/iposters/gallery/glorietta_3.png',
                    'assets/images/iposters/gallery/glorietta_4.png',
                    'assets/images/iposters/gallery/glorietta_5.png',
                    'assets/images/iposters/gallery/glorietta_6.png',
                    'assets/images/iposters/gallery/glorietta_7.png',
                    'assets/images/iposters/gallery/glorietta_8.png',
                    'assets/images/iposters/gallery/glorietta_9.png',
                ],
                'short_description' => 'Strategically positioned in high-foot-traffic concourses of Glorietta, Makati to capture affluent shoppers.',
                'features' => $sharedFeatures,
                'specifications' => $sharedSpecs,
                'daily_traffic' => '120,000+ daily foot traffic',
                'cta_label' => 'BOOK YOUR IPOSTER ADS NOW',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'AYALA MALLS CIRCUIT',
                'slug' => 'ayala-malls-circuit',
                'category' => 'Digital iPoster Ad Placement',
                'mall_or_location' => 'Circuit Makati, Hippodromo St, Makati City',
                'image' => 'assets/images/iposters/gallery/circuit/circuit_1.jpg',
                'gallery_images' => [
                    'assets/images/iposters/gallery/circuit/circuit_1.jpg',
                    'assets/images/iposters/gallery/circuit/circuit_2.jpg',
                    'assets/images/iposters/gallery/circuit/circuit_3.jpg',
                    'assets/images/iposters/gallery/circuit/circuit_4.jpg',
                    'assets/images/iposters/gallery/circuit/circuit_5.jpg',
                    'assets/images/iposters/gallery/circuit/circuit_6.png',
                    'assets/images/iposters/gallery/circuit/circuit_7.jpg',
                    'assets/images/iposters/gallery/circuit/circuit_8.jpg',
                ],
                'short_description' => 'Placed along entertainment and dining zones at Circuit Makati, maximizing engagement among young professionals and families.',
                'features' => $sharedFeatures,
                'specifications' => $sharedSpecs,
                'daily_traffic' => '65,000+ daily foot traffic',
                'cta_label' => 'BOOK YOUR IPOSTER ADS NOW',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'AYALA CLOVERLEAF',
                'slug' => 'ayala-cloverleaf',
                'category' => 'Digital iPoster Ad Placement',
                'mall_or_location' => 'Ayala Malls Cloverleaf, A. Bonifacio Ave, Quezon City',
                'image' => 'assets/images/iposters/gallery/cloverleaf/cloverleaf_1.jpg',
                'gallery_images' => [
                    'assets/images/iposters/gallery/cloverleaf/cloverleaf_1.jpg',
                    'assets/images/iposters/gallery/cloverleaf/cloverleaf_2.jpg',
                    'assets/images/iposters/gallery/cloverleaf/cloverleaf_3.jpg',
                    'assets/images/iposters/gallery/cloverleaf/cloverleaf_4.jpg',
                    'assets/images/iposters/gallery/cloverleaf/cloverleaf_5.jpg',
                ],
                'short_description' => 'Landmark digital iPoster network welcoming northern Metro Manila commuters and retail shoppers in Balintawak.',
                'features' => $sharedFeatures,
                'specifications' => $sharedSpecs,
                'daily_traffic' => '85,000+ daily foot traffic',
                'cta_label' => 'BOOK YOUR IPOSTER ADS NOW',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'AYALA MALLS HARBOR POINT SUBIC',
                'slug' => 'ayala-malls-harbor-point-subic',
                'category' => 'Digital iPoster Ad Placement',
                'mall_or_location' => 'Harbor Point, Rizal Highway, Subic Bay Freeport Zone, Zambales',
                'image' => 'assets/images/iposters/gallery/subic/subic_1.jpg',
                'gallery_images' => [
                    'assets/images/iposters/gallery/subic/subic_1.jpg',
                    'assets/images/iposters/gallery/subic/subic_2.jpg',
                    'assets/images/iposters/gallery/subic/subic_3.jpg',
                    'assets/images/iposters/gallery/subic/subic_4.jpg',
                ],
                'short_description' => 'Targeting Freeport zone tourists, expatriates, and regional Central Luzon shoppers at Subic Bay.',
                'features' => $sharedFeatures,
                'specifications' => $sharedSpecs,
                'daily_traffic' => '45,000+ daily foot traffic',
                'cta_label' => 'BOOK YOUR IPOSTER ADS NOW',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'AYALA MALLS MARKET MARKET',
                'slug' => 'ayala-malls-market-market',
                'category' => 'Digital iPoster Ad Placement',
                'mall_or_location' => 'Market! Market!, Bonifacio Global City (BGC), Taguig City',
                'image' => 'assets/images/iposters/gallery/market_market/market_market_1.jpg',
                'gallery_images' => [
                    'assets/images/iposters/gallery/market_market/market_market_1.jpg',
                    'assets/images/iposters/gallery/market_market/market_market_2.jpg',
                    'assets/images/iposters/gallery/market_market/market_market_3.jpg',
                    'assets/images/iposters/gallery/market_market/market_market_4.jpg',
                    'assets/images/iposters/gallery/market_market/market_market_5.jpg',
                ],
                'short_description' => 'Unbeatable foot volume situated at the central transportation and retail hub of Bonifacio Global City.',
                'features' => $sharedFeatures,
                'specifications' => $sharedSpecs,
                'daily_traffic' => '150,000+ daily foot traffic',
                'cta_label' => 'BOOK YOUR IPOSTER ADS NOW',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'AYALA MALLS MARQUEE MALL',
                'slug' => 'ayala-malls-marquee-mall',
                'category' => 'Digital iPoster Ad Placement',
                'mall_or_location' => 'MarQuee Mall, Aniceto Gueco St, Angeles City, Pampanga',
                'image' => 'assets/images/iposters/gallery/marquee_mall/marquee_mall_1.jpg',
                'gallery_images' => [
                    'assets/images/iposters/gallery/marquee_mall/marquee_mall_1.jpg',
                    'assets/images/iposters/gallery/marquee_mall/marquee_mall_2.jpg',
                    'assets/images/iposters/gallery/marquee_mall/marquee_mall_3.jpg',
                    'assets/images/iposters/gallery/marquee_mall/marquee_mall_4.jpg',
                    'assets/images/iposters/gallery/marquee_mall/marquee_mall_5.jpg',
                    'assets/images/iposters/gallery/marquee_mall/marquee_mall_6.jpg',
                ],
                'short_description' => 'Connecting premier national brands with high-spending Central Luzon and Pampanga consumers.',
                'features' => $sharedFeatures,
                'specifications' => $sharedSpecs,
                'daily_traffic' => '70,000+ daily foot traffic',
                'cta_label' => 'BOOK YOUR IPOSTER ADS NOW',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($iposters as $data) {
            Iposter::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
