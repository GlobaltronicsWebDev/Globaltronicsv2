<?php

namespace Database\Seeders;

use App\Models\Solution;
use Illuminate\Database\Seeder;

class SolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $solutions = [
            [
                'title' => 'AYALA MANILA BAY - CENTRAL GARDEN',
                'slug' => 'ayala-manila-bay-central-garden',
                'category' => 'LED Display System',
                'image' => 'assets/images/solutions/ayala_manila_bay.png',
                'short_description' => 'Reach larger market in Mega Manila with this LED billboard',
                'features' => "• Full Video High Definition LED Display System.\n• Comes with a LED size of 25.92M(W) x 14.4m(H).\n• 3D capable LED – 4k resolution.\n• Embrace the digital ambiance nestled at Macapagal Boulevard and Aseana Avenue, complemented by awe-inspiring digital LED display.",
                'specs' => "25.92M(W) x 14.4m(H) | 4K 3D Capable",
                'location' => 'Macapagal Boulevard & Aseana Avenue, Parañaque City, Metro Manila',
                'cta_label' => 'BOOK YOUR ADS NOW',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'AYALA MALLS GLORIETTA - CINEMA',
                'slug' => 'ayala-malls-glorietta-cinema',
                'category' => 'LED Display System',
                'image' => 'assets/images/solutions/ayala_glorietta.webp',
                'short_description' => 'Globaltronics, the new LED panels feature an incredible 13K resolution across the 300sqm wall and ceiling.',
                'features' => "• Seamless synchronized LED panels featuring an incredible 13K ultra-high resolution.\n• Spans across an expansive 300sqm wall and immersive ceiling canopy.\n• Dynamic architectural ambient lighting synchronized with high-framerate brand motion graphics.\n• Positioned at the premier Ayala Malls Glorietta cinema entrance lobby attracting high-density affluent shoppers.",
                'specs' => "300sqm Wall & Ceiling | 13K Resolution",
                'location' => 'Ayala Malls Glorietta Cinema, Makati City, Metro Manila',
                'cta_label' => 'BOOK YOUR ADS NOW',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'BACOOR MCDONALDS',
                'slug' => 'bacoor-mcdonalds',
                'category' => 'LED Display System',
                'image' => 'assets/images/solutions/bacoor_mcdo.webp',
                'short_description' => 'Reach larger market in Mega Manila with this LED billboard - the first in CALABARZON!',
                'features' => "• Landmark outdoor high-brightness digital LED pylon billboard - the first of its kind in CALABARZON.\n• Engineered for vibrant, crisp visibility even under intense direct tropical sunlight.\n• Captures continuous high-volume vehicular traffic along major southern thoroughfares and commercial retail plazas.\n• Full-motion digital spot loops with remote scheduling and real-time impression analytics.",
                'specs' => "High-Brightness Outdoor Pylon | Southern Luzon Corridor",
                'location' => 'Aguinaldo Highway, Bacoor, Cavite (CALABARZON)',
                'cta_label' => 'BOOK YOUR ADS NOW',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($solutions as $item) {
            Solution::updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}
