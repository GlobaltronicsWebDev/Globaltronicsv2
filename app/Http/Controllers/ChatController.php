<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Iposter;
use App\Models\News;
use App\Models\Solution;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    /**
     * Quick prompt suggestions for the chat widget.
     */
    public function getSuggestions(): JsonResponse
    {
        return response()->json([
            'suggestions' => [
                [
                    'label' => '📐 What pixel pitch do I need?',
                    'query' => 'How do I calculate the right LED pixel pitch and distance?',
                ],
                [
                    'label' => '📍 Where are your Digital iPosters located?',
                    'query' => 'What malls and locations have Globaltronics digital iPosters?',
                ],
                [
                    'label' => '🏢 Who is William Guido & Globaltronics?',
                    'query' => 'Tell me about William Guido and the history of Globaltronics.',
                ],
                [
                    'label' => '💼 What job openings are available?',
                    'query' => 'What career vacancies are currently open at Globaltronics?',
                ],
                [
                    'label' => '💰 How do I request a project quote?',
                    'query' => 'I would like to request a quotation for an LED display billboard.',
                ],
                [
                    'label' => '📺 Philips Displays & AVer Cameras',
                    'query' => 'Tell me about Philips commercial video walls and AVer conferencing solutions.',
                ],
            ],
        ]);
    }

    /**
     * Process an incoming message and return an AI assistant response.
     */
    public function handleMessage(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        $userMessage = trim($validated['message']);

        // Resilient history sanitization: prevents 422 validation errors on long conversation histories
        $rawHistory = $request->input('history');
        $history = [];
        if (is_array($rawHistory)) {
            foreach ($rawHistory as $item) {
                if (is_array($item) && !empty($item['content'])) {
                    $role = strtolower(trim((string)($item['role'] ?? 'user')));
                    if (!in_array($role, ['user', 'assistant', 'system', 'model'])) {
                        $role = 'user';
                    }
                    $history[] = [
                        'role' => $role === 'model' ? 'assistant' : $role,
                        'content' => mb_substr(trim((string)$item['content']), 0, 4000),
                    ];
                }
            }
        }

        // 1. If an external Generative AI API key is configured, attempt LLM completion with rich website context
        $openaiKey = env('OPENAI_API_KEY');
        $geminiKey = env('GEMINI_API_KEY');

        if (!empty($openaiKey)) {
            $llmResponse = $this->callOpenAI($userMessage, $history, $openaiKey);
            if ($llmResponse) {
                return response()->json($llmResponse);
            }
        } elseif (!empty($geminiKey)) {
            $llmResponse = $this->callGemini($userMessage, $history, $geminiKey);
            if ($llmResponse) {
                return response()->json($llmResponse);
            }
        }

        // 2. High-Precision Domain Knowledge Engine with Dynamic Site Intelligence
        $response = $this->generateKnowledgeResponse($userMessage, $history);

        return response()->json($response);
    }

    /**
     * Deep Domain Knowledge Engine for Globie (Globaltronics AI Assistant).
     */
    protected function generateKnowledgeResponse(string $query, array $history = []): array
    {
        $q = mb_strtolower(trim($query));

        // -------------------------------------------------------------------
        // 1. GREETINGS & CASUAL INTRODUCTIONS
        // -------------------------------------------------------------------
        if (preg_match('/\b(hi|hello|hey|good morning|good afternoon|good evening|kamusta|musta|mabuhay|yo|sup|greetings)\b/i', $q) && mb_strlen($q) < 35) {
            return [
                'reply' => "👋 Hi! I'm **Globie**.\n\nI can help you explore our LED billboards, indoor screens, mall iPosters, or get you a quick project quote. What are you looking for today?",
                'suggestions' => [
                    'What pixel pitch do I need?',
                    'Where are your Digital iPosters located?',
                    'Request a project quote',
                ],
                'action' => null,
            ];
        }

        // -------------------------------------------------------------------
        // 1.1 GRATITUDE, THANKS, APPRECIATION & POLITE CLOSINGS
        // -------------------------------------------------------------------
        if (preg_match('/\b(thank|thanks|salamat|ty|tysm|appreciate|grateful|great job|good job|awesome|bye|goodbye|cya|see you|good day|have a good one|all good|no problem|you are welcome|youre welcome|welcome|ok|okay|noted|alright|sige)\b/i', $q)) {
            $isTagalog = preg_match('/\b(salamat|maraming salamat|sige|salamat po)\b/i', $q);
            $reply = $isTagalog
                ? "Walang anuman! 😊 Masaya akong makatulong sa'yo. Kung may kailangan ka pa tungkol sa LED displays o kailangan mo ng quote, sabihan mo lang ako anytime!"
                : "You're very welcome! 😊 Glad I could help. If you ever have more questions or need a quick quote, just let me know anytime!";

            return [
                'reply' => $reply,
                'suggestions' => [
                    '💰 Request a project quote',
                    '📐 Calculate LED pixel pitch',
                    '📍 Browse iPoster locations',
                ],
                'action' => null,
            ];
        }

        // -------------------------------------------------------------------
        // 1.2 ACTIVITY CHECK & USER CONFIRMATIONS ("Still here", "Yes I am here", etc.)
        // -------------------------------------------------------------------
        if (preg_match('/\b(still here|i am here|i\'m here|im here|yes i am|still active|here|yes still here|im still here|present|still around|still listening|yes i\'m here|yes im here)\b/i', $q)) {
            return [
                'reply' => "Awesome, glad you're still here! 🙌 What can I help you check out—LED billboards, mall iPosters, or a quick quote?",
                'suggestions' => [
                    '💰 Request a project quote',
                    '📐 Calculate LED pixel pitch',
                    '📍 Browse iPoster locations',
                    '💼 View job openings',
                ],
                'action' => null,
            ];
        }

        // -------------------------------------------------------------------
        // 2. WILLIAM GUIDO & COMPANY HISTORY / GGC AFFILIATES
        // -------------------------------------------------------------------
        if (preg_match('/\b(william|guido|william t\. guido|founder|ceo|chairman|owner|who is william|the man behind|ggc|guido group|affiliates|history|anniversary|23 years|about us|who are you)\b/i', $q)) {
            return [
                'reply' => "Mr. **William T. Guido** is our Chairman & CEO! He's the pioneer who brought dynamic LED billboards to the Philippines back in 2003.\n\nGlobaltronics has been leading the digital display market for over 23 years as part of the Guido Group of Companies. Want to see our story or check out our landmark projects?",
                'suggestions' => [
                    'Learn more on About Us page',
                    'View our Reference Projects',
                    'Contact Globaltronics office',
                ],
                'action' => [
                    'type' => 'navigate',
                    'url' => route('about'),
                    'label' => '📖 Visit About Us Page',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 3. LED PIXEL PITCH, VIEWING DISTANCE & CALCULATOR
        // -------------------------------------------------------------------
        if (preg_match('/\b(pitch|pixel pitch|viewing distance|distance|calculator|formula|p1|p1\.2|p1\.5|p1\.8|p2|p2\.5|p3|p4|p5|p6|p8|p10|resolution|how far|nits|brightness)\b/i', $q)) {
            // Extract numeric distance if mentioned (e.g. 5m, 10 meters, 2.5 m)
            preg_match('/(\d+(?:\.\d+)?)\s*(?:m|meter|meters|metro)\b/i', $q, $distanceMatch);
            $customCalculation = "";
            $suggestedPitch = "P2.5 Indoor";

            if (!empty($distanceMatch[1])) {
                $dist = floatval($distanceMatch[1]);
                if ($dist <= 2.0) {
                    $rec = "**P1.2 to P1.8** (super fine pitch, perfect for close-up viewing like boardrooms).";
                    $suggestedPitch = "Indoor P1.5 Video Wall";
                } elseif ($dist <= 4.5) {
                    $rec = "**P2.0 to P2.5** (sharp and cost-effective for lobbies and stores).";
                    $suggestedPitch = "Indoor P2.5 Video Wall";
                } elseif ($dist <= 8.0) {
                    $rec = "**P3.0 to P4.0** (great for retail atriums and event halls).";
                    $suggestedPitch = "Indoor P3.0 / P4.0 Screen";
                } elseif ($dist <= 15.0) {
                    $rec = "**P5.0 to P6.0** (bright and weatherproof for street-level views).";
                    $suggestedPitch = "Outdoor P5.0 Billboard";
                } else {
                    $rec = "**P8.0 to P10.0** (built for highway billboards viewed from afar).";
                    $suggestedPitch = "Outdoor P10 Highway Billboard";
                }
                $customCalculation = "\n\n💡 For **{$dist} meters away**, I'd recommend " . $rec;
            }

            return [
                'reply' => "Here's a quick rule of thumb: **1 meter of viewing distance ≈ 1mm of pixel pitch**!\n\n" .
                           "• **Close-up (2–4m)**: P1.5 to P2.5 looks ultra-sharp indoors.\n" .
                           "• **Far distance (10m+)**: P8 or P10 delivers daylight highway impact without extra cost." .
                           $customCalculation . "\n\n" .
                           "You can test your exact space using our interactive calculator below!",
                'suggestions' => [
                    'Open the Interactive LED Calculator',
                    'Request quote for ' . $suggestedPitch,
                    'Indoor vs Outdoor differences?',
                ],
                'action' => [
                    'type' => 'scroll_to',
                    'target' => '#led-calculator',
                    'label' => '⚡ Open Interactive LED Calculator',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 4. REQUEST A QUOTE / PRICING / COST / MAGKANO
        // -------------------------------------------------------------------
        if (preg_match('/\b(quote|quotation|price|pricing|cost|how much|magkano|estimate|inquire|proposal|presyo|rates|buy|order|purchase)\b/i', $q)) {
            $serviceType = 'Outdoor LED Display Billboard';
            if (preg_match('/indoor/i', $q)) $serviceType = 'Indoor LED Video Wall';
            elseif (preg_match('/iposter|poster|mall/i', $q)) $serviceType = 'Digital iPoster Ad Placement';
            elseif (preg_match('/philips|commercial display/i', $q)) $serviceType = 'Philips Commercial Video Wall';
            elseif (preg_match('/aver|camera|conference/i', $q)) $serviceType = 'AVer Video Conferencing System';
            elseif (preg_match('/curved|transparent/i', $q)) $serviceType = 'Curved / Transparent LED Display';
            elseif (preg_match('/design|creative|3d/i', $q)) $serviceType = 'Digital Design & Content Consultancy';

            return [
                'reply' => "Screen pricing depends on your screen size (width × height), pixel pitch, and whether it's indoor or outdoor.\n\nOur team provides **free custom quotes and proposals within 24 hours**! Click below to send your details or tell me what you're planning.",
                'suggestions' => [
                    'Open the Quote Form',
                    'Calculate pixel pitch first',
                    'Call hotline: (02) 8721-2878',
                ],
                'action' => [
                    'type' => 'open_quote_modal',
                    'label' => '📝 Request a Tailored Quote Now',
                    'serviceType' => $serviceType,
                    'estimatedSize' => '',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 5. DIGITAL IPOSTERS / MALL DOOH ADVERTISING LOCATIONS
        // -------------------------------------------------------------------
        if (preg_match('/\b(iposter|iposters|digital iposter|dooh|mall ads|mall billboard|ad placement|ad rates|advertising|traffic|glorietta|circuit|cloverleaf|harbor point|market market|marquee|subic|bgc)\b/i', $q)) {
            return [
                'reply' => "Our **Digital iPosters** are high-definition screens placed along prime walkways in top malls like Ayala Malls (Glorietta, Circuit, Cloverleaf, Market! Market!) and Harbor Point Subic!\n\nThey run 15–30s video spots with huge foot traffic. Would you like to check out locations or ad rates?",
                'suggestions' => [
                    'Inquire about iPoster ad rates',
                    'Browse all iPoster network sites',
                    'Contact media sales team',
                ],
                'action' => [
                    'type' => 'navigate',
                    'url' => route('services.iposters.index'),
                    'label' => '🗺️ Browse All iPoster Network Locations',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 6. PHILIPS COMMERCIAL DISPLAYS & VIDEO WALLS
        // -------------------------------------------------------------------
        if (preg_match('/\b(philips|commercial display|video wall|menu board|interactive touch|t-line|x-line|q-line|d-line|mediasuite|hospitality tv)\b/i', $q)) {
            return [
                'reply' => "We're an authorized partner for **Philips Professional Displays**! We provide ultra-slim video walls, 4K commercial menu boards, and interactive touch panels for meeting rooms and retail.\n\nLooking for a video wall or commercial signage?",
                'suggestions' => [
                    'Explore Philips Commercial Displays',
                    'Request quote for Philips Video Wall',
                    'View Philips reference projects',
                ],
                'action' => [
                    'type' => 'navigate',
                    'url' => route('solutions.philips'),
                    'label' => '📺 Explore Philips Commercial Displays',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 7. AVER VIDEO CONFERENCING & MEETING ROOMS
        // -------------------------------------------------------------------
        if (preg_match('/\b(aver|video conferencing|conferencing|conference room|ptz camera|soundbar|webcam|zoom room|teams room|hybrid meeting)\b/i', $q)) {
            return [
                'reply' => "We supply enterprise **AVer** video conferencing gear—like 4K PTZ cameras with smart auto speaker tracking and all-in-one soundbars. They work seamlessly with Zoom, Microsoft Teams, and Google Meet.\n\nNeed to equip a conference room or classroom?",
                'suggestions' => [
                    'Explore AVer Video Conferencing',
                    'Request meeting room quotation',
                    'Contact sales engineering',
                ],
                'action' => [
                    'type' => 'navigate',
                    'url' => route('solutions.aver'),
                    'label' => '📹 Explore AVer Video Conferencing',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 8. INDOOR VS OUTDOOR LED DISPLAYS & CURVED/TRANSPARENT
        // -------------------------------------------------------------------
        if (preg_match('/\b(indoor|outdoor|curved|transparent|flexible|billboard|stadium|facade|waterproof|weatherproof)\b/i', $q)) {
            return [
                'reply' => "Here's the quick difference between the two:\n\n" .
                           "• **Indoor LED (P1.2–P2.5)**: High-resolution, seamless, and flicker-free for lobbies and auditoriums.\n" .
                           "• **Outdoor LED (P4–P10)**: Ultra-bright and weatherproof (IP65) so it stays vivid under direct sunlight.\n\n" .
                           "We also build curved and transparent displays! What kind of space are you planning for?",
                'suggestions' => [
                    'Calculate pixel pitch for my project',
                    'Request Outdoor Billboard quote',
                    'Request Indoor Video Wall quote',
                ],
                'action' => [
                    'type' => 'open_quote_modal',
                    'label' => '📝 Request LED Display Quote',
                    'serviceType' => 'Outdoor LED Display Billboard',
                    'estimatedSize' => '',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 9. DIGITAL SIGNAGE CMS, VIDEO MATRIX & BRACKETS
        // -------------------------------------------------------------------
        if (preg_match('/\b(cms|software|content management|schedule|playlist|video matrix|matrix switcher|processor|brackets|rigging|mount|mounting|vogel|hydraulic)\b/i', $q)) {
            return [
                'reply' => "We provide complete screen hardware and software solutions:\n\n" .
                           "• **Cloud CMS**: Update and schedule playlists remotely across all branches.\n" .
                           "• **Video Matrix**: 4K switchers and multi-window processors.\n" .
                           "• **Mounts & Brackets**: Front-service hydraulic brackets for hassle-free maintenance.\n\n" .
                           "Need software or mounting hardware for your screens?",
                'suggestions' => [
                    'Explore Digital Signage Solutions',
                    'View Video Matrix Solutions',
                    'Inquire about custom brackets',
                ],
                'action' => [
                    'type' => 'navigate',
                    'url' => route('solutions.digital-signage'),
                    'label' => '🖥️ View Digital Signage Solutions',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 10. DIGITAL DESIGN CONSULTANCY & 3D ANAMORPHIC BILLBOARDS
        // -------------------------------------------------------------------
        if (preg_match('/\b(creative|creatives|3d|anamorphic|motion graphics|design consultancy|cgi|animation|content creation|graphic design)\b/i', $q)) {
            return [
                'reply' => "Yes! We have an in-house creative team that creates eye-catching **3D anamorphic animations** (naked-eye 3D on corner billboards), 4K motion graphics, and interactive kiosk UI/UX.\n\nLooking for custom 3D content for your screen?",
                'suggestions' => [
                    'Explore Digital Design Consultancy',
                    'Request quotation for 3D content',
                    'Contact creative team',
                ],
                'action' => [
                    'type' => 'navigate',
                    'url' => route('services.digital-design-consultancy'),
                    'label' => '✨ Learn More About Creative Consultancy',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 11. CAREERS & JOB VACANCIES (DYNAMIC DATABASE QUERY)
        // -------------------------------------------------------------------
        if (preg_match('/\b(career|careers|job|jobs|hiring|work|vacanc|openings|apply|resume|cv|internship|trabaho|employment|warehouse|account manager)\b/i', $q)) {
            $careers = Career::where('is_active', true)->orderBy('order')->take(4)->get(['id', 'title', 'slug']);

            $jobList = "";
            if ($careers->isNotEmpty()) {
                $jobList = "\n\nHere are some of our open positions:\n";
                foreach ($careers as $job) {
                    $slug = $job->slug ?: $job->id;
                    $jobList .= "• **[{$job->title}](" . route('careers.show', $slug) . ")**\n";
                }
            }

            return [
                'reply' => "We're always looking for great talent to join Globaltronics!" .
                           $jobList . "\n" .
                           "You can browse all vacancies and apply directly on our Careers page below.",
                'suggestions' => [
                    'View all career job openings',
                    'How do I apply for a job?',
                    'Contact HR Department',
                ],
                'action' => [
                    'type' => 'navigate',
                    'url' => route('careers.index'),
                    'label' => '💼 View All Open Positions & Apply',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 12. LATEST NEWS, PRESS & MILESTONES (DYNAMIC DATABASE QUERY)
        // -------------------------------------------------------------------
        if (preg_match('/\b(news|articles|announcement|press|milestone|updates|what\'s new|chinatown|unioil|cebu|la union|asia ceo)\b/i', $q)) {
            $news = News::where('is_active', true)->orderByDesc('published_date')->take(3)->get(['title', 'slug', 'id']);

            $newsList = "";
            if ($news->isNotEmpty()) {
                $newsList = "\n\nHere are our recent stories:\n";
                foreach ($news as $item) {
                    $slug = $item->slug ?: $item->id;
                    $newsList .= "• **[{$item->title}](" . route('news.show', $slug) . ")**\n";
                }
            }

            return [
                'reply' => "We frequently share our latest project launches and milestone announcements!" .
                           $newsList . "\n" .
                           "You can read the full stories and watch project videos on our News page below.",
                'suggestions' => [
                    'View all News & Articles',
                    'Read about William Guido',
                    'Check our reference projects',
                ],
                'action' => [
                    'type' => 'navigate',
                    'url' => route('news.index'),
                    'label' => '📰 Explore All News & Articles',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 13. REFERENCE PROJECTS & CLIENT PORTFOLIO (DYNAMIC DATABASE QUERY)
        // -------------------------------------------------------------------
        if (preg_match('/\b(project|projects|portfolio|installations|clients|reference|unioil|cebu|ayala|sm|robinsons|nustar|solaire|glorietta|bgc)\b/i', $q)) {
            return [
                'reply' => "Over the past 23 years, we've installed landmark LED screens for **Ayala Land, SM Supermalls, Robinsons, UNIOIL, Solaire, and McDonald's** nationwide.\n\nTake a look at our portfolio below to see our installations in action!",
                'suggestions' => [
                    'View LED Projects',
                    'View Philips Projects',
                    'Request a project quote',
                ],
                'action' => [
                    'type' => 'navigate',
                    'url' => route('projects.led'),
                    'label' => '🏙️ Explore LED Reference Projects',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 14. CONTACT DETAILS, OFFICE ADDRESS & SHOWROOM
        // -------------------------------------------------------------------
        if (preg_match('/\b(contact|phone|telephone|number|hotline|call|email|address|office|location|showroom|hours|visit|san juan|mandaluyong|greenhills)\b/i', $q)) {
            return [
                'reply' => "You can reach us directly at **(02) 8721-2878** or **inquiry@globaltronics.net** (Mon–Fri, 8 AM–5 PM).\n\nYou're also welcome to visit our showroom in Metro Manila to see our live LED displays and video walls!",
                'suggestions' => [
                    'Request a Project Quote',
                    'Connect with Sales Engineering',
                    'Try the LED Calculator',
                ],
                'action' => [
                    'type' => 'open_quote_modal',
                    'label' => '📞 Connect with Sales Engineering',
                    'serviceType' => 'Other Custom Digital Engineering',
                    'estimatedSize' => '',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 15. AFTER-SALES SUPPORT, MAINTENANCE & WARRANTY
        // -------------------------------------------------------------------
        if (preg_match('/\b(warranty|support|maintenance|repair|spare parts|broken|troubleshoot|sla|service level|technician)\b/i', $q)) {
            return [
                'reply' => "All our installations come with comprehensive warranty, spare parts buffer, and 24/7 emergency support for contracted clients.\n\nNeed technical assistance right now? Call us directly at **(02) 8721-2878** or email **inquiry@globaltronics.net**.",
                'suggestions' => [
                    'Call hotline: (02) 8721-2878',
                    'Email technical support',
                    'Request a project quotation',
                ],
                'action' => [
                    'type' => 'open_quote_modal',
                    'label' => '🛠️ Inquire About Maintenance SLA',
                    'serviceType' => 'Other Custom Digital Engineering',
                    'estimatedSize' => '',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 16. TAGALOG / TAGLISH COMMON QUESTIONS
        // -------------------------------------------------------------------
        if (preg_match('/\b(ano|paano|saan|magkano|meron|kailangan|simbahan|mall|screen|pader)\b/i', $q)) {
            return [
                'reply' => "Kamusta! Ako si **Globie** ng Globaltronics! 😊\n\nNandito ako para tulungan ka sa LED screens, billboards, mall iPosters, o presyo. Libre lang ang technical consultation at quotation!\n\nAno ang balak mong i-set up?",
                'suggestions' => [
                    'Mag-request ng Quotation',
                    'Saan may mga iPoster?',
                    'Tingnan ang Job Openings',
                ],
                'action' => [
                    'type' => 'open_quote_modal',
                    'label' => '📝 Humiling ng Libreng Quote',
                    'serviceType' => 'Outdoor LED Display Billboard',
                    'estimatedSize' => '',
                ],
            ];
        }

        // -------------------------------------------------------------------
        // 17. COMPREHENSIVE DEFAULT FALLBACK
        // -------------------------------------------------------------------
        return [
            'reply' => "I'd love to help you with that! As **Globie**, I can answer questions about our LED billboards, indoor video walls, mall iPosters, screen pricing, or company info.\n\nWhat would you like to know more about?",
            'suggestions' => [
                '📐 What pixel pitch do I need?',
                '📍 Where are your iPosters located?',
                '💰 Request a project quote',
                '🏢 Who is William Guido & Globaltronics?',
            ],
            'action' => [
                'type' => 'open_quote_modal',
                'label' => '📝 Request a Tailored Project Quote',
                'serviceType' => '',
                'estimatedSize' => '',
            ],
        ];
    }

    /**
     * Master System Prompt generator for Generative AI (OpenAI & Gemini).
     * Compiles complete website knowledge and active database records.
     */
    protected function buildSystemKnowledgePrompt(): string
    {
        // Fetch active database items dynamically
        $careers = Career::where('is_active', true)->take(6)->pluck('title')->implode(', ');
        $iposters = Iposter::where('is_active', true)->take(6)->pluck('title')->implode(', ');
        $news = News::where('is_active', true)->orderByDesc('published_date')->take(4)->pluck('title')->implode(' | ');

        return "You are 'Globie', the friendly and helpful AI Assistant for Globaltronics, Inc. (www.globaltronics.net).

CORE COMPANY IDENTITY:
- Globaltronics, Inc. ('LED by Vision, Built by Trust').
- Over 23 years of digital display leadership in the Philippines, founded in 2003 by Chairman & CEO William T. Guido.
- Part of Guido Group of Companies (GGC): Globaltronics, Dunham-Bush PH (HVAC), The PARC Foundation, TAC, Philips Signage, Vogel's.
- Office: Metro Manila, Philippines. Hotline: (02) 8721-2878. Email: inquiry@globaltronics.net. Hours: Mon-Fri 8:00 AM - 5:00 PM PHT.

KEY PRODUCTS & SERVICES:
1. Outdoor LED Billboards: Weatherproof (IP65), high-nits daylight readable (P4, P5, P6, P8, P10).
2. Indoor LED Video Walls: Ultra-fine pitch (P1.2, P1.5, P1.8, P2.0, P2.5), high refresh rate, seamless.
3. Curved & Transparent LED Screens: Glass facade displays with 70%+ transparency, pillar wraps.
4. Digital iPosters: Mall DOOH advertising networks: {$iposters}.
5. Philips Commercial Displays: Official partner. Video walls (X-Line), 4K signage & menu boards (Q/D-Line), interactive touchscreens (T-Line).
6. AVer Video Conferencing: 4K PTZ cameras with speaker auto-tracking, soundbars, certified for Zoom/Teams/Meet.
7. Cloud CMS Software, Video Processors, & Hydraulic Video Wall Brackets.
8. Creatives: 3D naked-eye anamorphic billboard animations & 4K motion graphics.

PIXEL PITCH RULE OF THUMB:
- Viewing distance in meters ≈ Pixel pitch in millimeters (e.g., 2.5m viewing distance = P2.5).

LIVE SITE DATA:
- Job Openings: {$careers}.
- Recent News: {$news}.

CONVERSATIONAL GUIDELINES (CRITICAL):
- TALK CASUALLY AND WARMLY TO THE USER, like a real human teammate or consultant chatting on WhatsApp/Messenger.
- KEEP ANSWERS SHORT AND CONCISE (typically 2 to 4 sentences or a few short, punchy bullet points).
- NEVER give long walls of text, giant manuals, or robotic corporate disclaimers unless explicitly asked for technical data.
- When greeted, reply with a short, friendly greeting.
- When thanked, say you're welcome warmly and naturally.
- Answer in English, or Tagalog/Taglish if addressed in Filipino.
- Naturally encourage quotes or checking the calculator without being pushy.";
    }

    /**
     * Optional integration with OpenAI API when OPENAI_API_KEY is configured in .env.
     */
    protected function callOpenAI(string $userMessage, array $history, string $apiKey): ?array
    {
        try {
            $systemPrompt = $this->buildSystemKnowledgePrompt();

            $messages = [
                ['role' => 'system', 'content' => $systemPrompt],
            ];

            foreach (array_slice($history, -6) as $msg) {
                if (isset($msg['role'], $msg['content'])) {
                    $messages[] = [
                        'role' => $msg['role'] === 'assistant' ? 'assistant' : 'user',
                        'content' => $msg['content'],
                    ];
                }
            }

            $messages[] = ['role' => 'user', 'content' => $userMessage];

            $response = Http::timeout(10)
                ->withHeaders([
                    'Authorization' => "Bearer {$apiKey}",
                    'Content-Type' => 'application/json',
                ])
                ->post('https://api.openai.com/v1/chat/completions', [
                    'model' => env('OPENAI_MODEL', 'gpt-4o-mini'),
                    'messages' => $messages,
                    'max_tokens' => 250,
                    'temperature' => 0.7,
                ]);

            if ($response->successful()) {
                $content = $response->json('choices.0.message.content');
                if ($content) {
                    $q = mb_strtolower($userMessage);
                    $action = null;
                    if (!preg_match('/\b(thank|thanks|salamat|ty|tysm|appreciate|good job|awesome|bye|goodbye|see you|ok|okay)\b/i', $q)) {
                        $action = [
                            'type' => 'open_quote_modal',
                            'label' => '📝 Request a Tailored Quote',
                            'serviceType' => '',
                            'estimatedSize' => '',
                        ];
                    }

                    return [
                        'reply' => trim($content),
                        'suggestions' => [
                            '💰 Request a project quote',
                            '📐 What pixel pitch do I need?',
                            '📍 Where are your iPosters located?',
                        ],
                        'action' => $action,
                    ];
                }
            }
        } catch (\Throwable $e) {
            Log::warning('OpenAI chat fallback triggered: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Optional integration with Google Gemini API when GEMINI_API_KEY is configured in .env.
     */
    protected function callGemini(string $userMessage, array $history, string $apiKey): ?array
    {
        try {
            $systemInstruction = $this->buildSystemKnowledgePrompt();

            // Format contents cleanly for Gemini multi-turn conversation
            $contents = [];
            $cleanHistory = [];
            foreach ($history as $msg) {
                if (!empty($msg['content']) && trim($msg['content']) !== trim($userMessage)) {
                    $cleanHistory[] = $msg;
                }
            }

            foreach (array_slice($cleanHistory, -6) as $msg) {
                $role = ($msg['role'] ?? '') === 'assistant' ? 'model' : 'user';
                $text = mb_substr(trim($msg['content']), 0, 2000);

                $lastIndex = count($contents) - 1;
                if ($lastIndex >= 0 && $contents[$lastIndex]['role'] === $role) {
                    $contents[$lastIndex]['parts'][0]['text'] .= "\n\n" . $text;
                } else {
                    $contents[] = [
                        'role' => $role,
                        'parts' => [['text' => $text]],
                    ];
                }
            }

            if (!empty($contents) && end($contents)['role'] === 'user') {
                $contents[] = [
                    'role' => 'model',
                    'parts' => [['text' => 'How can I assist you further?']],
                ];
            }

            $contents[] = [
                'role' => 'user',
                'parts' => [['text' => $userMessage]],
            ];

            // List of fast, capable models to try in sequence
            $models = array_unique([
                env('GEMINI_MODEL', 'gemini-3.5-flash-lite'),
                'gemini-3.5-flash-lite',
                'gemini-flash-latest',
                'gemini-3.5-flash',
            ]);

            foreach ($models as $model) {
                $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";

                $response = Http::timeout(15)->post($url, [
                    'system_instruction' => [
                        'parts' => [['text' => $systemInstruction]],
                    ],
                    'contents' => $contents,
                    'generationConfig' => [
                        'maxOutputTokens' => 300,
                        'temperature' => 0.7,
                    ],
                ]);

                if ($response->successful()) {
                    $text = $response->json('candidates.0.content.parts.0.text');
                    if ($text) {
                        $q = mb_strtolower($userMessage);
                        $action = null;
                        $suggestions = [
                            '💰 Request a project quote',
                            '📐 What pixel pitch do I need?',
                            '📍 Where are your iPosters located?',
                        ];

                        if (preg_match('/\b(thank|thanks|salamat|ty|tysm|appreciate|good job|awesome|bye|goodbye|see you|ok|okay)\b/i', $q)) {
                            $action = null;
                            $suggestions = [
                                '💰 Request a project quote',
                                '📐 Calculate LED pixel pitch',
                                '📍 Browse iPoster locations',
                            ];
                        } elseif (preg_match('/quote|pricing|price|cost|magkano|inquire|proposal/i', $q)) {
                            $action = [
                                'type' => 'open_quote_modal',
                                'label' => '📝 Request a Tailored Quote',
                                'serviceType' => 'Outdoor LED Display Billboard',
                                'estimatedSize' => '',
                            ];
                            $suggestions = ['How to calculate LED pixel pitch?', 'Contact sales hotline', 'View reference projects'];
                        } elseif (preg_match('/pitch|distance|calculator|formula/i', $q)) {
                            $action = [
                                'type' => 'scroll_to',
                                'target' => '#led-calculator',
                                'label' => '⚡ Open Interactive LED Calculator',
                            ];
                            $suggestions = ['Request quotation for LED screen', 'What is the difference between indoor and outdoor?'];
                        } elseif (preg_match('/iposter|poster|mall/i', $q)) {
                            $action = [
                                'type' => 'navigate',
                                'url' => route('services.iposters.index'),
                                'label' => '🗺️ Browse All iPoster Network Locations',
                            ];
                            $suggestions = ['Inquire about iPoster ad rates', 'Request a quote'];
                        } elseif (preg_match('/career|job|hiring|work|apply/i', $q)) {
                            $action = [
                                'type' => 'navigate',
                                'url' => route('careers.index'),
                                'label' => '💼 View All Open Positions & Apply',
                            ];
                            $suggestions = ['How to apply for a job?', 'Contact HR Department'];
                        } elseif (preg_match('/news|milestone|chinatown|update/i', $q)) {
                            $action = [
                                'type' => 'navigate',
                                'url' => route('news.index'),
                                'label' => '📰 Explore All News & Articles',
                            ];
                            $suggestions = ['Read about William Guido', 'View our reference projects'];
                        } elseif (preg_match('/philips/i', $q)) {
                            $action = [
                                'type' => 'navigate',
                                'url' => route('solutions.philips'),
                                'label' => '📺 Explore Philips Commercial Displays',
                            ];
                            $suggestions = ['Request quote for Philips Video Wall', 'Tell me about AVer cameras'];
                        } elseif (preg_match('/aver/i', $q)) {
                            $action = [
                                'type' => 'navigate',
                                'url' => route('solutions.aver'),
                                'label' => '📹 Explore AVer Video Conferencing',
                            ];
                            $suggestions = ['Request meeting room quotation', 'Explore Philips Displays'];
                        } else {
                            $action = [
                                'type' => 'open_quote_modal',
                                'label' => '📝 Request a Project Quote',
                                'serviceType' => '',
                                'estimatedSize' => '',
                            ];
                        }

                        return [
                            'reply' => trim($text),
                            'suggestions' => $suggestions,
                            'action' => $action,
                        ];
                    }
                }
            }
        } catch (\Throwable $e) {
            Log::warning('Gemini chat fallback triggered: ' . $e->getMessage());
        }

        return null;
    }
}
