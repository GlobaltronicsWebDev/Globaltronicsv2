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
                'title' => 'ACCOUNT MANAGER (CEBU BASED)',
                'slug' => 'account-manager-cebu-based',
                'department' => 'Sales & Marketing',
                'employment_type' => 'Full-time',
                'location' => 'CEBU BASED',
                'experience_level' => '1–2 Years relevant experience',
                'salary_range' => 'Competitive Base + Commission',
                'description' => 'Manage end-to-end sales activities for digital advertising placements and LED display products',
                'responsibilities' => "• Manage end-to-end sales activities for digital advertising placements and LED display products\n• Identify, prospect, and develop new business opportunities across assigned territories\n• Build and maintain strong client relationships, ensuring high levels of satisfaction and repeat business\n• Conduct client presentations, product demonstrations, and solution proposals\n• Collaborate with internal teams (operations, creatives, technical) to deliver seamless project execution.\n• Monitor market trends, competitor activities, and customer insights to support sales strategy\n• Achieve monthly and quarterly sales targets\n• Maintain accurate sales reports, forecasts, and account documentation",
                'requirements' => "• Bachelor’s degree in Business Administration, Marketing, Entrepreneurship or any related field.\n• Minimum of 1–2 years of relevant work experience in sales, business development, account management, or customer service.\n• Experience in sales and marketing, ideally from IT industry or related industries\n• Ability to understand technical product features and translate them into client value",
                'benefits' => "• HMO coverage\n• Paid leaves and annual leave conversion\n• Annual merit increase",
                'application_email' => 'hr.specialist@globaltronics.net',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'ACCOUNT MANAGER (MANILA BASED)',
                'slug' => 'account-manager-manila-based',
                'department' => 'Sales & Marketing',
                'employment_type' => 'Full-time',
                'location' => 'Mandaluyong City, Metro Manila',
                'experience_level' => 'Associate / Mid Level (2+ Years)',
                'salary_range' => 'Competitive Base + Commission',
                'description' => 'Drive strategic media partnerships, corporate DOOH accounts, and turnkey display solutions with top commercial brands.',
                'responsibilities' => "• Manage end-to-end sales activities for digital advertising placements and LED display products\n• Identify, prospect, and develop new business opportunities across assigned territories\n• Build and maintain strong client relationships, ensuring high levels of satisfaction and repeat business\n• Conduct client presentations, product demonstrations, and solution proposals\n• Collaborate with internal teams (operations, creatives, technical) to deliver seamless project execution.\n• Monitor market trends, competitor activities, and customer insights to support sales strategy\n• Achieve monthly and quarterly sales targets\n• Maintain accurate sales reports, forecasts, and account documentation",
                'requirements' => "• Bachelor’s degree in Business Administration, Marketing, Entrepreneurship or any related field.\n• Minimum of 1–2 years of relevant work experience in sales, business development, account management, or customer service.\n• Experience in sales and marketing, ideally from IT industry or related industries\n• Ability to understand technical product features and translate them into client value",
                'benefits' => "• HMO coverage\n• Paid leaves and annual leave conversion\n• Annual merit increase",
                'application_email' => 'hr.specialist@globaltronics.net',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'ACCOUNT MANAGER (ADS SALES)',
                'slug' => 'account-manager-ads-sales',
                'department' => 'Sales & Marketing',
                'employment_type' => 'Full-time',
                'location' => 'Mandaluyong City, Metro Manila',
                'experience_level' => 'Mid-Senior Level (3+ Years)',
                'salary_range' => 'Competitive Base + Commission',
                'description' => 'Spearhead national DOOH campaign narratives and digital media engagement across Globaltronics premier display networks.',
                'responsibilities' => "• Manage a portfolio of accounts to achieve long-term success\n• Develop positive relationships with clients\n• Act as the point of contact and handle customers’ individual needs\n• Generate new business using existing and potential customer networks\n• Resolve conflicts and provide solutions to customers in a timely manner\n• Supervise account representatives to ensure sales increase\n• Report on the status of accounts and transactions\n• Set and track sales account targets, aligned with company objectives\n• Monitor sales metrics (e.g. quarterly sales results and annual forecasts)\n• Suggest actions to improve sales performance and identify opportunities for growth",
                'requirements' => "• Bachelor’s degree in Business Ad, Marketing, or communications-related field, with very good communication skills.\n• At least 3 years’ experience in corporate sales\n• Preferably from outdoor advertising or any advertising media sales\n• Track record in hitting sales targets\n• Adept in continuous account acquisition\n• Hands on experience in sales and an ability to deliver excellent customer experience\n• Knowledge of CRM software and MS Office (MS Excel in particular)\n• Understanding of sales performance metrics",
                'benefits' => "• HMO coverage\n• Paid leaves and annual leave conversion\n• Annual merit increase",
                'application_email' => 'hr.specialist@globaltronics.net',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'BUSINESS DEVELOPMENT SPECIALIST',
                'slug' => 'business-development-specialist',
                'department' => 'Sales & Marketing',
                'employment_type' => 'Full-time',
                'location' => 'Mandaluyong City, Metro Manila',
                'experience_level' => 'At least 1-year successful B2B or B2C sales work experience',
                'salary_range' => 'Competitive Salary + Performance Bonuses',
                'description' => 'Generate sales from Globaltronics present and future products and services, acquire new customers, and develop new business opportunities.',
                'responsibilities' => "• Generate sales from Globaltronics present and future products and services\n• Acquire new customers and foster long-term partnerships\n• Develop and execute strategies for new business opportunities\n• Coordinate with technical and operations teams for customer requirements",
                'requirements' => "• At least a Bachelor’s degree in business and/or marketing\n• At least 1-year successful B2B or B2C sales work experience\n• Strong interpersonal skills\n• Ability to persuade and influence others\n• Highly computer-literate\n• Excellent written and verbal communication skills (fluent in English and Filipino)\n• Positive attitude and highly developed analytical skills",
                'benefits' => "• HMO coverage\n• Paid leaves and annual leave conversion\n• Annual merit increase",
                'application_email' => 'hr.specialist@globaltronics.net',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'TECHNICAL COORDINATOR',
                'slug' => 'technical-coordinator',
                'department' => 'Technical & Engineering',
                'employment_type' => 'Full-time',
                'location' => 'Mandaluyong City, Metro Manila',
                'experience_level' => 'Minimum 1 year work experience in the same field',
                'salary_range' => 'Competitive Technical Package',
                'description' => 'Coordinate and monitor technical project schedules, team actions, client liaison, and repair service requests.',
                'responsibilities' => "• Maintain and monitor technical project plans, project schedule, and work loads\n• Document and follow up actions and decisions related to the technical team\n• Prepare requests for installation and repair services\n• Carry out administrative tasks and liaise with clients\n• Determine project changes and ensure projects are closely monitored",
                'requirements' => "• At least a bachelor’s degree in any field\n• Minimum 1 year work experience in the same field\n• Good communication and interpersonal skills\n• Advance administrative skills (letter writing, report writing, filing, etc.)\n• Effective time management and analytical skills\n• Keen attention to details and ability to work under minimal supervision",
                'benefits' => "• HMO coverage\n• Paid leaves and annual leave conversion\n• Annual merit increase",
                'application_email' => 'hr.specialist@globaltronics.net',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'WAREHOUSE ASSISTANT',
                'slug' => 'warehouse-assistant',
                'department' => 'Operations & Logistics',
                'employment_type' => 'Full-time',
                'location' => 'Mandaluyong City (Hybrid setup available)',
                'experience_level' => 'Mid-Senior Level (3+ Years)',
                'salary_range' => 'Competitive Operations Package',
                'description' => 'Receive, inspect, and verify incoming deliveries against purchase orders and delivery documents, and manage warehouse inventory.',
                'responsibilities' => "• Receive, inspect, and verify incoming deliveries against purchase orders and delivery documents\n• Load, unload, transport, and stack materials using a forklift in accordance with safety procedures\n• Store products and materials in designated warehouse locations\n• Pick, pack, and prepare orders for delivery or shipment\n• Assist in inventory monitoring, cycle counts, and annual physical inventory\n• Maintain accurate warehouse documentation and safety standards",
                'requirements' => "• High school diploma, vocational certificate, or college degree\n• At least 2-3 years experience in warehousing, logistics, or inventory handling\n• Forklift operation knowledge / safety certification is a plus\n• Physically fit, highly organized, and reliable",
                'benefits' => "• HMO coverage\n• Paid leaves and annual leave conversion\n• Annual merit increase",
                'application_email' => 'hr.specialist@globaltronics.net',
                'order' => 6,
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
