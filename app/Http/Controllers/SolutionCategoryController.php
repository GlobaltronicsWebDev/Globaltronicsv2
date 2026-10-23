<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolutionCategoryController extends Controller
{
    /**
     * 1. Electronics LED Display
     */
    public function electronicsLed()
    {
        $category = [
            'slug' => 'electronics-led-display',
            'title' => 'ELECTRONICS LED DISPLAY',
            'badge' => 'Display Electronics & Video Hardware',
            'subtitle' => 'High-resolution indoor and outdoor LED modules, flexible screens, transparent mesh, and mobile LED displays engineered for maximum visual impact and reliability.',
            'products' => [
                [
                    'title' => 'FLEX SERIES',
                    'tag' => 'Creative & Curved Architecture',
                    'image' => 'assets/images/solutions/electronics-led/flex_series.webp',
                    'description' => 'Compact and ultra-flexible LED module designed for curved walls, cylindrical columns, and bespoke creative architectural installations with seamless visual fluidity.',
                    'specs' => ['Curvature: 360° Flexible', 'Maintenance: Front & Rear Service', 'Application: Creative Indoor/Architectural']
                ],
                [
                    'title' => 'FINE PITCH LED',
                    'tag' => 'Ultra HD Command Centers',
                    'image' => 'assets/images/solutions/electronics-led/fine_pitch_led.webp',
                    'description' => 'Ultra-fine pixel pitch LED display delivering cinematic 4K/8K resolution with vibrant color fidelity for control rooms, boardrooms, and premium lobbies.',
                    'specs' => ['Pixel Pitch: P0.9 - P1.8', 'Refresh Rate: ≥3840Hz', 'Aspect Ratio: Native 16:9 Panel']
                ],
                [
                    'title' => 'RC SERIES',
                    'tag' => 'Rental & Event Production',
                    'image' => 'assets/images/solutions/electronics-led/rc_series.webp',
                    'description' => 'Quick-lock die-cast aluminum rental LED panels engineered for fast rigging, touring concert stages, exhibitions, and live broadcast events.',
                    'specs' => ['Assembly: Tool-free Quick Lock', 'Weight: Lightweight Die-cast Aluminum', 'Protection: IP65 Outdoor Rated']
                ],
                [
                    'title' => 'E SERIES',
                    'tag' => 'Commercial Billboards',
                    'image' => 'assets/images/solutions/electronics-led/e_series.webp',
                    'description' => 'Energy-efficient outdoor LED billboard modules built to withstand tropical typhoons, high heat, and humidity while cutting operational energy costs.',
                    'specs' => ['Brightness: ≥7500 nits', 'Energy Saving: Up to 35% Reduction', 'Weatherproofing: IP65 Waterproof']
                ],
                [
                    'title' => 'KB SERIES',
                    'tag' => 'High-Impact Outdoor Screens',
                    'image' => 'assets/images/solutions/electronics-led/kb_series.webp',
                    'description' => 'Rugged outdoor roadside billboard panels delivering brilliant contrast under direct sunlight with automated brightness sensing.',
                    'specs' => ['Contrast Ratio: 5000:1', 'Viewing Angle: 160° H / 140° V', 'Lifespan: 100,000 Hours']
                ],
                [
                    'title' => 'RW SERIES',
                    'tag' => 'Indoor Commercial Displays',
                    'image' => 'assets/images/solutions/electronics-led/rw_series.webp',
                    'description' => 'Super-slim indoor commercial LED screen designed for malls, hotel lobbies, and corporate headquarters with silent fanless heat dissipation.',
                    'specs' => ['Thickness: Ultra-thin 38mm', 'Acoustics: Fanless Silent Operation', 'Cabinet: Precision CNC Cast']
                ],
                [
                    'title' => 'RD SERIES',
                    'tag' => 'Retail & Showroom LED',
                    'image' => 'assets/images/solutions/electronics-led/rd_series.webp',
                    'description' => 'High-refresh retail LED wall series delivering true-to-life colors that boost foot traffic, visual merchandising, and in-store engagement.',
                    'specs' => ['Grayscale: 16-bit True Color', 'Frame Rate: 60fps Smooth Motion', 'Mounting: Wall Flush Mount']
                ],
                [
                    'title' => 'IPOSTER',
                    'tag' => 'Smart Freestanding Digital Totem',
                    'image' => 'assets/images/solutions/electronics-led/iposter.webp',
                    'description' => 'Plug-and-play freestanding ultra-slim LED poster totem with built-in media player, Wi-Fi cloud management, and cascade multi-screen mode.',
                    'specs' => ['Orientation: Vertical / Horizontal', 'Control: Cloud Wi-Fi & USB', 'Cascade: Multi-iPoster Synchronized']
                ],
                [
                    'title' => 'LED TRUCK',
                    'tag' => 'Mobile OOH Advertising',
                    'image' => 'assets/images/solutions/electronics-led/led_truck.webp',
                    'description' => 'Truck-mounted dynamic hydraulic LED display systems for mobile roving roadshows, political campaigns, and live community broadcasts.',
                    'specs' => ['Hydraulics: 360° Rotating Mast', 'Audio: Integrated PA Sound System', 'Mobility: Road-legal Truck Chassis']
                ],
                [
                    'title' => 'LED MESH TRANSPARENT',
                    'tag' => 'Building Facade Media Architecture',
                    'image' => 'assets/images/solutions/electronics-led/led_mesh.webp',
                    'description' => 'Lightweight transparent LED mesh for building glass curtain walls that maintains natural sunlight while illuminating the skyline.',
                    'specs' => ['Transparency: Up to 80%', 'Wind Resistance: Aerodynamic Mesh', 'Weight: ≤12kg per sqm']
                ],
                [
                    'title' => 'HIGH TRANSPARENT GLASS',
                    'tag' => 'Storefront Holographic Effect',
                    'image' => 'assets/images/solutions/electronics-led/high_transparent_glass.webp',
                    'description' => 'Invisible transparent LED glass screens attached directly onto retail shopfront windows, delivering holographic floating visuals.',
                    'specs' => ['Transparency: 85% Optical Clarity', 'Thickness: 3mm Glass Film', 'Installation: Direct Glass Adhesion']
                ]
            ]
        ];

        return view('solutions.category', compact('category'));
    }

    /**
     * 2. Philips Commercial Display
     */
    public function philips()
    {
        $category = [
            'slug' => 'philips-commercial-display',
            'title' => 'PHILIPS COMMERCIAL DISPLAY',
            'badge' => 'Official Exclusive Commercial Partner',
            'subtitle' => 'State-of-the-art professional display monitors, video wall series, and interactive touchscreen displays from Philips, certified for 24/7 continuous enterprise operation.',
            'products' => [
                [
                    'title' => 'VIDEO WALL SERIES',
                    'tag' => 'Ultra-Narrow Bezel Displays',
                    'image' => 'assets/images/solutions/philips/video_wall.webp',
                    'description' => 'Command center and retail video wall monitors featuring ultra-narrow bezels (0.88mm - 3.5mm) with FailOver automatic input redundancy.',
                    'specs' => ['Bezel Width: Ultra-Narrow 0.88mm', 'Operation: 24/7 Continuous Duty', 'Technology: IPS High Contrast Panel']
                ],
                [
                    'title' => 'QL SERIES',
                    'tag' => 'Eco-Friendly 4K Signage',
                    'image' => 'assets/images/solutions/philips/ql_series.webp',
                    'description' => 'Eco-friendly 4K UHD professional displays powered by Android SoC with built-in CMND & Control for remote fleet management.',
                    'specs' => ['Resolution: 4K UHD (3840x2160)', 'OS: Android System-on-Chip (SoC)', 'Management: Philips CMND & Create']
                ],
                [
                    'title' => 'EL SERIES',
                    'tag' => 'Entry Commercial Signage',
                    'image' => 'assets/images/solutions/philips/el_series.webp',
                    'description' => 'Cost-effective high-definition commercial monitors engineered for corporate meeting rooms, classrooms, and secondary retail zones.',
                    'specs' => ['Brightness: 350-400 nits', 'Duty Cycle: 16/7 Daily Operation', 'Connectivity: HDMI, VGA, USB Playback']
                ],
                [
                    'title' => 'D SERIES',
                    'tag' => 'High-Performance 24/7 Signage',
                    'image' => 'assets/images/solutions/philips/d_series.webp',
                    'description' => 'Flagship 24/7 digital signage displays equipped with internal storage, multi-window tiling, and integrated quad-core processor.',
                    'specs' => ['Processor: Quad-Core Cortex', 'Internal Memory: 16GB eMMC', 'Orientation: Landscape / Portrait Mode']
                ],
                [
                    'title' => 'MULTI TOUCH SERIES',
                    'tag' => 'Capacitive Interactive Touch',
                    'image' => 'assets/images/solutions/philips/multi_touch_series.webp',
                    'description' => 'Multi-touch interactive displays supporting up to 20 simultaneous touch points, anti-glare toughened glass, and palm rejection for kiosks and classrooms.',
                    'specs' => ['Touch Points: 20-Point Multi-Touch', 'Glass: 4mm Tempered Anti-Glare', 'Compatibility: Windows, Mac, Android']
                ],
                [
                    'title' => 'P SERIES',
                    'tag' => 'Heavy-Duty Industrial Monitors',
                    'image' => 'assets/images/solutions/philips/p_series.webp',
                    'description' => 'Heavy-duty commercial displays built with robust metal chassis, 700-nit high brightness, and thermal management for demanding public venues.',
                    'specs' => ['Brightness: 700 nits Sunlight Visible', 'Chassis: Industrial All-Metal', 'Sensor: Ambient Light Sensor']
                ],
                [
                    'title' => 'U-LINE',
                    'tag' => 'Ultra-Wide Panoramic Display',
                    'image' => 'assets/images/solutions/philips/u_line.webp',
                    'description' => 'Stretched ultra-wide aspect ratio commercial bar displays tailored for transit concourses, shelf headers, and architectural columns.',
                    'specs' => ['Aspect Ratio: Ultra-Wide Bar', 'Resolution: Panoramic High DPI', 'Mounting: Ceiling / Header Suspended']
                ]
            ]
        ];

        return view('solutions.category', compact('category'));
    }

    /**
     * 3. AVer Camera Video Conferencing
     */
    public function aver()
    {
        $category = [
            'slug' => 'aver-camera-video-conferencing',
            'title' => 'AVER CAMERA VIDEO CONFERENCING',
            'badge' => 'Enterprise Hybrid Collaboration',
            'subtitle' => 'Certified high-definition PTZ conference cameras, intelligent all-in-one soundbars, and speakerphones optimized for Zoom Rooms, Microsoft Teams, and Google Meet.',
            'products' => [
                [
                    'title' => 'CAM520 PRO 2',
                    'tag' => 'Enterprise PTZ Camera',
                    'image' => 'assets/images/solutions/aver/cam520_pro2.png',
                    'description' => 'Flagship PTZ conference camera with 24X total zoom, AVer SmartFrame auto-framing, and Sony True WDR for medium-to-large boardrooms.',
                    'specs' => ['Zoom: 24X Total (12X Optical)', 'Sensor: Full HD 60fps Sony Sensor', 'Certification: Zoom Certified & MS Teams']
                ],
                [
                    'title' => 'CAM340+',
                    'tag' => '4K Huddle Room Webcam',
                    'image' => 'assets/images/solutions/aver/cam340_plus.png',
                    'description' => 'Ultra-portable 4K 30fps conference camera with 120° ultra-wide field of view designed for huddle rooms and desktop executives.',
                    'specs' => ['Resolution: 4K UHD Ultra-Clear', 'FOV: 120° Wide Angle Lens', 'Form Factor: Plug-and-Play Clip Mount']
                ],
                [
                    'title' => 'CAM130',
                    'tag' => '4K Intelligent Light Camera',
                    'image' => 'assets/images/solutions/aver/cam130.png',
                    'description' => 'Intelligent 4K camera with integrated professional fill lighting, privacy shutter, and beamforming microphones for crystal-clear meetings.',
                    'specs' => ['Lighting: Built-in Fill Light', 'Privacy: Integrated Lens Shutter', 'Audio: Dual Beamforming Mics']
                ],
                [
                    'title' => 'CAM550',
                    'tag' => 'Dual-Lens AI Conference Camera',
                    'image' => 'assets/images/solutions/aver/cam550.png',
                    'description' => 'Dual-lens conference camera with AI gesture control, dynamic framing of participants, and panoramic AI secondary tracking lens.',
                    'specs' => ['Optics: Dual-Lens AI Architecture', 'Control: AI Touchless Gesture Control', 'Tracking: Smart Gallery Participant Cutouts']
                ],
                [
                    'title' => 'CAM570',
                    'tag' => 'Voice-Tracking PTZ Camera',
                    'image' => 'assets/images/solutions/aver/cam570.png',
                    'description' => 'Premium PTZ camera with built-in voice-tracking audio sensors that automatically pivot and zoom to the active speaker in the conference hall.',
                    'specs' => ['Audio Sensor: 3 Built-in Audio Pickups', 'Tracking: Audio Voice Triggered PTZ', 'Zoom: 36X Total Zoom']
                ],
                [
                    'title' => 'VC550',
                    'tag' => 'All-in-One Dual Lens System',
                    'image' => 'assets/images/solutions/aver/vc550.png',
                    'description' => 'Modular enterprise conferencing system bundling dual-lens PTZ camera with expandable high-clarity daisy-chain speakerphone.',
                    'specs' => ['System: PTZ Camera + Speakerphone', 'Audio: Full Duplex with Noise Cancellation', 'Coverage: Expandable Daisy Chain Mics']
                ],
                [
                    'title' => 'VC520 PRO 2',
                    'tag' => 'Professional Conference System',
                    'image' => 'assets/images/solutions/aver/vc520_pro2.png',
                    'description' => 'Professional conference system featuring high-resolution optical PTZ optics and 360° voice pickup speakerphone for enterprise teams.',
                    'specs' => ['Microphone: 360° Omnidirectional', 'Audio Range: Up to 9 meters coverage', 'Presets: 10 Camera Preset Positions']
                ],
                [
                    'title' => 'VB342 PRO',
                    'tag' => '4K Video Bar with Audio Fence',
                    'image' => 'assets/images/solutions/aver/vb342_pro.png',
                    'description' => 'All-in-one 4K video bar equipped with AVer Audio Fence technology to eliminate unwanted background noise beyond the meeting area.',
                    'specs' => ['Sound: Hi-Fi Conference Speakers', 'Audio Fence: Noise Barrier Suppression', 'Resolution: 4K PTZ Camera']
                ],
                [
                    'title' => 'VB130',
                    'tag' => 'Compact Video Bar',
                    'image' => 'assets/images/solutions/aver/vb130.png',
                    'description' => 'Sleek all-in-one huddle room soundbar and 4K camera with intelligent automated lighting for flawless hybrid collaboration.',
                    'specs' => ['Dimensions: Slim Compact Footprint', 'Setup: Single USB Cable Connection', 'Lighting: Auto Light Adjustment']
                ]
            ]
        ];

        return view('solutions.category', compact('category'));
    }

    /**
     * 4. Digital Signage Solution
     */
    public function digitalSignage()
    {
        $category = [
            'slug' => 'digital-signage-solution',
            'title' => 'DIGITAL SIGNAGE SOLUTION',
            'badge' => 'Interactive Signage & Smart Displays',
            'subtitle' => 'Turnkey digital signage kiosks, smart interactive mirrors, and cloud-connected digital whiteboards for retail malls, museums, and healthcare environments.',
            'products' => [
                [
                    'title' => 'MIRROR KIOSK',
                    'tag' => 'Smart Interactive Retail Mirror',
                    'image' => 'assets/images/solutions/signage/mirror_kiosk.webp',
                    'description' => 'High-tech optical mirror display that acts as a reflective glass mirror when idle and transitions into an interactive touchscreen showcase for retail and hospitality.',
                    'specs' => ['Glass: Optical Dielectric Mirror', 'Touch: Capacitive Multi-Touch Screen', 'Application: Retail Dressing Rooms & Lobbies']
                ],
                [
                    'title' => 'DIGITAL WHITEBOARD',
                    'tag' => 'Interactive Collaborative Board',
                    'image' => 'assets/images/solutions/signage/digital_whiteboard.webp',
                    'description' => 'Fast, intuitive interactive digital whiteboard for classrooms and corporate meeting rooms with wireless screen casting and cloud annotation.',
                    'specs' => ['Screen: 4K UHD Anti-Glare Panel', 'Writing: Zero-Latency Stylus & Finger', 'Connectivity: Wireless Screen Cast from Any Device']
                ],
                [
                    'title' => 'DIGITAL KIOSK',
                    'tag' => 'Freestanding Advertising Totem',
                    'image' => 'assets/images/solutions/signage/digital_kiosk.webp',
                    'description' => 'Durable steel-enclosure freestanding digital signage kiosk with integrated high-brightness commercial screen and remote content scheduling.',
                    'specs' => ['Housing: Cold-Rolled Steel Enclosure', 'Display: 55"/65" High-Brightness Panel', 'Player: Cloud Digital Signage CMS']
                ]
            ]
        ];

        return view('solutions.category', compact('category'));
    }

    /**
     * 5. Video Matrix Solution
     */
    public function videoMatrix()
    {
        $category = [
            'slug' => 'video-matrix-solution',
            'title' => 'VIDEO MATRIX SOLUTION',
            'badge' => 'Signal Switching & Video Wall Processing',
            'subtitle' => 'High-performance modular video matrix switchers, KVM-over-IP management processors, and multi-input signal routing hardware for zero-latency command centers.',
            'products' => [
                [
                    'title' => 'VM3250',
                    'tag' => '32x32 Modular Matrix Switch',
                    'image' => 'assets/images/solutions/video-matrix/vm3250.webp',
                    'description' => 'Modular 32x32 video matrix switcher delivering real-time seamless switching, video wall scaling, and redundant power supply for mission-critical operations.',
                    'specs' => ['Capacity: Up to 32 Inputs & 32 Outputs', 'Switching: Seamless Zero-Latency Switching', 'Power: Redundant Power Supply (RPS)']
                ],
                [
                    'title' => 'CN9600',
                    'tag' => '1-Local/Remote Share DVI KVM-over-IP',
                    'image' => 'assets/images/solutions/video-matrix/cn9600.webp',
                    'description' => 'Compact and space-saving KVM over IP processor that enables remote server monitoring, BIOS-level console access, and dual LAN redundancy.',
                    'specs' => ['Access: Remote Over-IP BIOS Level', 'Security: FIPS 140-2 Level 1 Compliant', 'Network: Dual Gigabit LAN Ports']
                ],
                [
                    'title' => 'CN8600',
                    'tag' => 'DVI KVM-over-IP Switch Gateway',
                    'image' => 'assets/images/solutions/video-matrix/cn8600.webp',
                    'description' => 'Cost-efficient DVI KVM over IP switch allowing secure remote console access with multi-platform support and high-definition video capture.',
                    'specs' => ['Resolution: Full HD DVI Video Capture', 'Control: Serial Console & Virtual Media', 'Design: 1U Rackmount Chassis']
                ]
            ]
        ];

        return view('solutions.category', compact('category'));
    }

    /**
     * 6. Brackets
     */
    public function brackets()
    {
        $category = [
            'slug' => 'brackets',
            'title' => 'BRACKETS & MOUNTING HARDWARE',
            'badge' => 'Engineered Commercial Mounts & Trolleys',
            'subtitle' => 'Professional heavy-duty video wall pop-out modules, motorized mobile trolleys, and engineered turn-and-tilt display wall mounts certified for public safety.',
            'products' => [
                [
                    'title' => 'PFW 6870 VIDEO WALL POP-OUT MODULE',
                    'tag' => 'Precision Pop-Out Mount',
                    'image' => 'assets/images/solutions/brackets/pfw_6870.webp',
                    'description' => 'Multi-display video wall pop-out module featuring click-to-release push mechanism for ultra-fast maintenance access and micro-adjustments in 6 directions.',
                    'specs' => ['Screen Size: 37" - 65" Displays', 'Max Weight: 72 kg (160 lbs)', 'Mechanism: Spring-Loaded Pop-Out']
                ],
                [
                    'title' => 'PFW 6880 VIDEO WALL POP-OUT MODULE SLIM',
                    'tag' => 'Ultra-Slim Pop-Out Mount',
                    'image' => 'assets/images/solutions/brackets/pfw_6880.webp',
                    'description' => 'Ultra-slim profile video wall pop-out bracket specifically designed for recessed wall alcoves with push-to-open and precise screen alignment.',
                    'specs' => ['Profile: Ultra-Slim 50mm depth', 'Adjustment: Multi-Axis Precision Leveling', 'VESA: Up to 600x400 mm']
                ],
                [
                    'title' => 'PFW 6855 DISPLAY WALL MOUNT, TURN & TILT',
                    'tag' => 'Heavy-Duty Articulating Arm',
                    'image' => 'assets/images/solutions/brackets/pfw_6855.webp',
                    'description' => 'Dual-arm articulating wall mount offering smooth swivel, turn, and tilt capabilities for heavy large-format commercial monitors.',
                    'specs' => ['Swivel: Up to 90° Turn', 'Tilt: -10° to +10°', 'Capacity: Up to 100 kg']
                ],
                [
                    'title' => 'PFW 6851 DISPLAY WALL MOUNT TURN & TILT',
                    'tag' => 'Articulating Single Arm Mount',
                    'image' => 'assets/images/solutions/brackets/pfw_6851.webp',
                    'description' => 'Flexible commercial display mount engineered for corner installations, reception counters, and conference rooms.',
                    'specs' => ['Rotation: Turn and Tilt Adjustable', 'Cable Management: Integrated Cable Routing', 'Safety: Lockable Anti-Theft Padlock Slot']
                ],
                [
                    'title' => 'PFW 6852 DISPLAY WALL MOUNT, TURN & TILT',
                    'tag' => 'Full-Motion Display Mount',
                    'image' => 'assets/images/solutions/brackets/pfw_6852.webp',
                    'description' => 'Reinforced full-motion commercial bracket offering generous reach and smooth viewing angle adjustability for hotel suites and retail stores.',
                    'specs' => ['Reach: Extended Arm Outreach', 'Material: Heavy-Duty Structural Steel', 'Finish: Durable Powder Coated Black']
                ],
                [
                    'title' => 'TE1164 MOTORIZED TROLLEY',
                    'tag' => 'Motorized Height-Adjustable Cart',
                    'image' => 'assets/images/solutions/brackets/te1164.webp',
                    'description' => 'Motorized mobile electric lift trolley for interactive touch screens and video conferencing boards, featuring lockable casters and remote height control.',
                    'specs' => ['Lift: Motorized Push-Button Electric', 'Mobility: Heavy-Duty Lockable Wheels', 'Compatibility: Touchscreens up to 86"']
                ],
                [
                    'title' => 'PFW 6858 DISPLAY WALL MOUNT',
                    'tag' => 'Fixed Heavy-Duty Flush Mount',
                    'image' => 'assets/images/solutions/brackets/pfw_6858.webp',
                    'description' => 'Low-profile heavy-duty flush display mount with auto-locking security latch for digital menu boards and corridor signage.',
                    'specs' => ['Profile: Slim 34mm Distance to Wall', 'Load: Up to 75 kg', 'Lock: Auto-Click Latching Security']
                ],
                [
                    'title' => 'PFW 4510 DISPLAY WALL MOUNT TILT',
                    'tag' => 'Commercial Tilt Bracket',
                    'image' => 'assets/images/solutions/brackets/pfw_4510.webp',
                    'description' => 'Commercial tilting wall bracket allowing up to 15° downward tilt to eliminate ceiling glare in elevated overhead display deployments.',
                    'specs' => ['Tilt Angle: 0° to 15° Continuous Tilt', 'Safety: TUV Rheinland Certified', 'VESA: 200x200 to 400x400 mm']
                ],
                [
                    'title' => 'PFW 4710 DISPLAY WALL MOUNT TILT',
                    'tag' => 'Large-Format Tilt Bracket',
                    'image' => 'assets/images/solutions/brackets/pfw_4710.webp',
                    'description' => 'Extra-wide commercial tilting mount for extra-large 65" - 90" displays with integrated bubble level and anti-theft locking bars.',
                    'specs' => ['Screen Size: 65" - 90" Extra-Large Displays', 'Tilt: 0° to 15° Step-Free Tilt', 'Bar: Anti-Theft Padlock Security Bar']
                ]
            ]
        ];

        return view('solutions.category', compact('category'));
    }
}
