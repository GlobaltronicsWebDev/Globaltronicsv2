<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $careers = [
            [
                'title' => 'LED Systems Field Engineer',
                'slug' => 'led-systems-field-engineer',
                'department' => 'Engineering',
                'employment_type' => 'Full-time',
                'location' => 'Mandaluyong City & Nationwide Field Sites',
                'experience_level' => 'Mid-Senior Level (2-4 Years)',
                'salary_range' => 'Competitive Salary + Field Allowances',
                'description' => 'Responsible for hardware installation, calibration, controller setup, and proactive maintenance of outdoor and indoor LED displays nationwide.',
                'responsibilities' => "• Install, wire, calibrate, and commission outdoor and indoor LED video walls and DOOH billboards.\n• Configure sending cards, receiving cards, video processors, and Novastar / Colorlight controllers.\n• Conduct scheduled diagnostic tests, structural alignment checks, and thermal dissipation assessments.\n• Respond swiftly to on-site technical emergencies and component troubleshooting.\n• Collaborate with civil and electrical contractors to ensure safety and code compliance.",
                'requirements' => "• Bachelor's Degree in Electrical, Electronics and Communications (ECE), or Computer Engineering.\n• At least 2 years hands-on experience in commercial LED display systems, electrical wiring, or digital signage.\n• Solid understanding of AC/DC power supplies, signal routing, fiber optic distribution, and network protocols.\n• Willingness to conduct on-site field visits and occasional provincial deployment.\n• Strong problem-solving mindset and height safety certification is a plus.",
                'benefits' => "• Comprehensive HMO healthcare upon regularization\n• Field work and transportation allowances\n• High-altitude and safety equipment provided\n• Continuing product certifications and technical training\n• Performance bonus and career advancement tracks",
                'application_email' => 'careers@globaltronics.net',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Corporate Account Executive',
                'slug' => 'corporate-account-executive',
                'department' => 'Sales & Marketing',
                'employment_type' => 'Full-time',
                'location' => 'Mandaluyong City, Metro Manila',
                'experience_level' => 'Associate / Mid Level (2+ Years)',
                'salary_range' => 'Competitive Base + Lucrative Sales Commission',
                'description' => 'Drive strategic media partnerships, corporate DOOH accounts, and turnkey display solutions with top commercial brands.',
                'responsibilities' => "• Identify, prospect, and close new business opportunities for LED display monuments and DOOH advertising.\n• Develop persuasive media pitches, customized proposals, and return-on-investment analyses for enterprise clients.\n• Maintain strong relationship with media agencies, mall operators, real estate developers, and corporate clients.\n• Coordinate with engineering and technical teams to ensure seamless project delivery and client satisfaction.\n• Meet and exceed monthly and quarterly revenue targets.",
                'requirements' => "• Bachelor's degree in Marketing, Business Administration, Advertising, Communications, or related field.\n• Proven track record in B2B corporate sales, out-of-home advertising, or architectural tech solutions.\n• Outstanding presentation, negotiation, and interpersonal communication skills.\n• Self-driven, goal-oriented, and confident dealing with high-level corporate executives and brand managers.\n• Knowledge of the Philippine media and advertising landscape.",
                'benefits' => "• Competitive base salary with uncapped commission scheme\n• Corporate mobile and travel allowance\n• Comprehensive HMO insurance coverage\n• Opportunity to handle landmark high-visibility national brand accounts\n• Energetic, collaborative company culture",
                'application_email' => 'careers@globaltronics.net',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => '3D Anamorphic Motion Designer',
                'slug' => '3d-anamorphic-motion-designer',
                'department' => 'Creative / Tech',
                'employment_type' => 'Full-time',
                'location' => 'Mandaluyong City (Hybrid setup available)',
                'experience_level' => 'Mid-Senior Level (3+ Years)',
                'salary_range' => 'Competitive Portfolio-based Package',
                'description' => 'Craft mind-blowing 3D visual illusions, anamorphic content, and high-impact digital animations for landmark curved LED billboards.',
                'responsibilities' => "• Conceptualize, model, texturize, light, and animate breathtaking 3D anamorphic perspective illusions for curved and corner LED screens.\n• Collaborate with creative directors and advertising brand clients to storyboard captivating visual narratives.\n• Render high-resolution video assets optimized for large-scale outdoor and indoor screen resolutions.\n• Conduct on-site screen tests to calibrate viewing angles, optical perspective points, and color fidelity.\n• Stay at the forefront of CGI, motion graphics, and naked-eye 3D visual trends.",
                'requirements' => "• Strong creative portfolio showcasing impressive 3D animation, visual effects, or anamorphic illusion pieces.\n• Proficiency in 3D software such as Blender, Cinema 4D, Maya, 3ds Max, along with After Effects and Unreal Engine.\n• Thorough understanding of camera projection, optical perspective, parallax effect, and lighting.\n• Ability to deliver high-quality creative work within agreed production deadlines.\n• Excellent eye for detail, movement timing, and visual aesthetics.",
                'benefits' => "• High-performance creative workstation with top-tier GPUs\n• Hybrid working arrangement options\n• Comprehensive HMO healthcare\n• Showcase your creative work on the nation's premier LED billboards\n• Continuous learning and creative freedom",
                'application_email' => 'careers@globaltronics.net',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($careers as $career) {
            Career::updateOrCreate(
                ['title' => $career['title']],
                $career
            );
        }
    }
}
