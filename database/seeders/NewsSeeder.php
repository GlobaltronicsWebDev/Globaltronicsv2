<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Powering brighter experiences at UNIOIL Guadalupe!',
                'slug' => 'powering-brighter-experiences-at-unioil-guadalupe',
                'badge' => 'GLOBALTRONICS',
                'published_date' => '2026-07-31',
                'description' => 'Another successful LED Display installation at Unioil, Guadalupe',
                'content' => "As part of Unioil's continuing nationwide modernization program, Globaltronics was commissioned to engineer, fabricate, and install a landmark high-brightness, energy-efficient outdoor digital LED display system prominently facing the heavy vehicular and pedestrian traffic corridor of EDSA Guadalupe.\n\nThe display features cutting-edge high refresh rate modules with automated ambient brightness sensors, delivering vibrant, crisp advertising graphics day and night while optimizing energy efficiency.\n\nGlobaltronics continues to drive modern digital presence across the country's most iconic retail and fuel locations, proving once again why we remain the leader in digital out-of-home advertising.",
                'image' => 'assets/images/news/news1.jpg',
                'link_url' => '',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Make your business impossible to ignore.',
                'slug' => 'make-your-business-impossible-to-ignore',
                'badge' => 'GLOBALTRONICS',
                'published_date' => '2026-07-29',
                'description' => 'Choose quality. Choose innovation. Choose Globaltronics',
                'content' => "In a fast-paced urban marketplace, traditional static signage simply cannot compete with the dynamic impact of modern digital LED monuments. Globaltronics offers comprehensive turnkey solutions that elevate retail brands, commercial complexes, and public spaces.\n\nFrom high-resolution indoor video walls to bespoke architectural outdoor installations, our displays capture the imagination of millions of commuters and shoppers every single day.\n\nChoose quality. Choose innovation. Choose Globaltronics to make your brand impossible to ignore.",
                'image' => 'assets/images/news/news2.jpg',
                'link_url' => '',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'NOW LIGHTING UP CEBU!',
                'slug' => 'now-lighting-up-cebu',
                'badge' => 'GLOBALTRONICS',
                'published_date' => '2026-07-23',
                'description' => 'Habang ang online ads ay madaling lampasan, ang OOH advertising ay nakikita ng libu-libong tao araw-araw saan man sila magpunta.',
                'content' => "While online ads can easily be skipped, blocked, or scrolled past, premium Digital Out-Of-Home (DOOH) advertising commands attention from thousands of daily commuters and travelers wherever they go.\n\nGlobaltronics is proud to expand its premier network into Cebu City, bringing state-of-the-art digital LED billboard technology to the Queen City of the South.\n\nOur Cebu installations showcase ultra-vivid colors, weather-sealed IP65 cabinets, and cloud-managed playback scheduling, offering advertisers unprecedented visibility and audience engagement across the Visayas region.",
                'image' => 'assets/images/news/news3.jpg',
                'link_url' => '',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Transforming Public Spaces with Smart City Displays',
                'slug' => 'transforming-public-spaces-with-smart-city-displays',
                'badge' => 'SMART CITY',
                'published_date' => '2026-07-18',
                'description' => 'Empowering smart communities through intelligent interactive digital kiosks and public information terminals.',
                'content' => "Modern cities require intelligent, connected communication channels. Globaltronics smart city display terminals integrate public safety announcements, weather tracking, and interactive community services directly into sleek urban infrastructure.\n\nEquipped with intuitive touch interactivity, robust weather-resistant housings, and remote CMS administration, these public information kiosks empower municipalities and urban business districts to bridge the digital gap with citizens and visitors.",
                'image' => 'assets/images/news/news4.jpg',
                'link_url' => '',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($articles as $article) {
            News::updateOrCreate(
                ['title' => $article['title']],
                $article
            );
        }

        // Also ensure article 5 has full content and link_url null
        $article5 = News::where('title', 'like', '%Curved LED%')->first();
        if ($article5) {
            $article5->update([
                'link_url' => '',
                'content' => "Revolutionizing sports and live stadium experiences with immersive ultra-fine pixel pitch cylindrical displays.\n\nEngineered specifically for expansive indoor venues, the new curved LED series features seamless magnetic panel alignment, HDR10+ processing, and ultra-wide viewing angles ensuring every spectator has an unobstructed, broadcast-grade view.\n\nGlobaltronics engineering team worked round the clock to deliver a breathtaking visual centerpiece that sets a new national standard for sports arenas and concert venues.",
            ]);
        }
    }
}
