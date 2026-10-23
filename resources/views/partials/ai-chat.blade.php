<!-- Globaltronics AI Chat Support Floating Widget (Accurately Styled Based on DB AI Reference) -->
<div id="ai-chat-widget" style="bottom: 4.75rem; right: 24px;" class="fixed z-50 flex flex-col items-end select-none font-sans">
    
    <!-- Floating Chat Window Card -->
    <div id="ai-chat-window" 
         class="hidden mb-3.5 flex flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-2xl transition-all duration-200 transform scale-95 opacity-0 origin-bottom-right"
         style="width: 384px; min-width: 320px; max-width: calc(100vw - 2rem); height: 67vh; min-height: 540px; max-height: calc(100vh - 140px);"
         role="dialog"
         aria-labelledby="ai-chat-title">
        
        <!-- Header Banner: Gradient Blue -->
        <div class="gt-ai-header flex items-center justify-between px-4 py-3 text-white shrink-0 shadow-sm">
            <div class="flex items-center gap-2.5">
                <!-- Globie Mascot Logo -->
                <img src="{{ asset('assets/images/globie.png') }}" 
                     alt="Globie Logo" 
                     class="w-6 h-6 object-contain shrink-0 drop-shadow select-none" />
                <h3 id="ai-chat-title" class="font-bold text-base tracking-wide">Chat with Globie!</h3>
            </div>
            
            <div class="flex items-center gap-1.5">
                <!-- Close Button -->
                <button type="button" 
                        onclick="toggleAiChat()" 
                        class="rounded p-1 text-white/80 hover:text-white hover:bg-white/20 transition cursor-pointer leading-none text-lg px-1.5"
                        aria-label="Close Chat">
                    ✕
                </button>
            </div>
        </div>

        <!-- AI Disclaimer Banner: Amber alert box with clear text contrast -->
        <div id="ai-disclaimer-banner" style="background-color: #fefce8 !important; color: #854d0e !important; border-bottom: 1px solid #fef08a !important;" class="flex items-start gap-2.5 p-2.5 text-xs shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="size-4 shrink-0 mt-0.5 text-[#a16207]">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <p class="flex-1 text-[11px] leading-snug" style="color: #713f12 !important;">
                <strong class="font-bold" style="color: #854d0e !important;">AI Disclaimer:</strong> Responses may contain inaccuracies. Please verify important information from official sources.
            </p>
            <button type="button" 
                    onclick="dismissAiDisclaimer()" 
                    style="color: #854d0e !important;"
                    class="shrink-0 p-0.5 hover:bg-yellow-200/50 rounded transition cursor-pointer leading-none text-xs px-1" 
                    aria-label="Dismiss disclaimer">
                ✕
            </button>
        </div>

        <!-- Chat Conversation Stream Container: Pure White Background -->
        <div id="ai-chat-messages" onclick="resetAiInactivityTimer()" class="flex-1 p-3.5 space-y-3 overflow-y-auto overscroll-contain bg-white">
            
            <!-- Dynamic Messages List -->
            <div id="ai-chat-dynamic-list" class="space-y-3"></div>

            <!-- Suggestion Chips: Rendered after Globie's greetings -->
            <div id="ai-suggestion-chips" class="hidden flex flex-col items-center gap-2 pt-1 pb-2"></div>

            <!-- Typing Indicator Bubble -->
            <div id="ai-typing-indicator" class="hidden flex justify-start">
                <div class="gt-ai-bubble-bot text-xs shadow-sm flex items-center space-x-1 py-1.5 px-3">
                    <span class="w-1.5 h-1.5 rounded-full bg-white animate-bounce"></span>
                    <span class="w-1.5 h-1.5 rounded-full bg-white animate-bounce [animation-delay:0.2s]"></span>
                    <span class="w-1.5 h-1.5 rounded-full bg-white animate-bounce [animation-delay:0.4s]"></span>
                </div>
            </div>

        </div>

        <!-- Footer Input Area -->
        <div id="ai-chat-input-area" class="flex gap-1.5 flex-col border-t border-gray-100 bg-white p-2.5 shrink-0">
            <p class="text-[10px] text-gray-400 text-center select-none">AI may provide inaccurate information. Verify critical data.</p>
            <div class="flex gap-2 items-center">
                <input id="ai-chat-input" 
                       type="text" 
                       placeholder="Type a message..." 
                       oninput="resetAiInactivityTimer()"
                       onfocus="resetAiInactivityTimer()"
                       onkeydown="handleAiInputKey(event)"
                       class="flex-1 rounded-full border border-gray-200 px-3.5 py-1.5 text-xs text-gray-800 transition focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-100 disabled:cursor-not-allowed disabled:bg-gray-100 placeholder-gray-400">
                <button type="button" 
                        id="ai-chat-send-btn" 
                        onclick="handleAiChatSubmit()" 
                        class="gt-ai-btn-send flex items-center justify-center rounded-full px-3.5 py-1.5 font-medium text-white transition hover:opacity-90 active:scale-95 disabled:cursor-not-allowed disabled:opacity-50 cursor-pointer shadow-sm shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5">
                        <path d="m3 3 3 9-3 9 19-9Z"></path>
                        <path d="M6 12h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Chat Ended Footer (displayed when conversation ends due to inactivity) -->
        <div id="ai-chat-ended-area" class="hidden flex flex-col items-center justify-center p-3 bg-slate-50 border-t border-gray-200 shrink-0 space-y-2">
            <div class="flex items-center gap-1.5 text-xs text-slate-600 font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-amber-500">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <span>Conversation ended due to inactivity</span>
            </div>
            <button type="button" 
                    onclick="startNewAiChatConversation()" 
                    class="w-full py-2 px-4 rounded-xl bg-[#0047ba] hover:bg-blue-700 text-white font-bold text-xs shadow-sm flex items-center justify-center gap-2 transition active:scale-95 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
                    <path d="M3 3v5h5"></path>
                </svg>
                <span>Start New Conversation</span>
            </button>
        </div>

    </div>

    <!-- Floating Circular Launcher Button -->
    <button type="button" 
            id="ai-chat-toggle-btn" 
            onclick="toggleAiChat()" 
            class="gt-ai-btn-launcher group relative flex items-center justify-center shadow-xl transition-all duration-300 active:scale-95 focus:outline-none cursor-pointer select-none"
            aria-label="Toggle AI Chat" 
            title="Chat with Globie!">
        
        <!-- Animated Pulse Ripple Halo -->
        <span class="gt-ai-pulse-ring"></span>

        <!-- Online Status Indicator Dot -->
        <span class="absolute top-0.5 right-0.5 flex h-3 w-3 pointer-events-none z-10">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500 border-2 border-white shadow-sm"></span>
        </span>

        <!-- Globie Mascot Graphic with Wiggle Animation -->
        <img src="{{ asset('assets/images/globie.png') }}" 
             alt="Globie AI" 
             class="gt-ai-mascot-img w-8 h-8 object-contain drop-shadow select-none pointer-events-none" />
    </button>

</div>

<style>
    /* Globaltronics Blue Theme Styles for AI Chat Widget */
    .gt-ai-header {
        background: linear-gradient(135deg, #003380 0%, #0047ba 55%, #005ce6 100%) !important;
    }
    .gt-ai-bubble-bot {
        background: linear-gradient(135deg, #003896 0%, #0047ba 100%) !important;
        color: #ffffff !important;
        border-radius: 12px 12px 12px 2px !important;
        padding: 6px 11px !important;
        font-size: 12px !important;
        line-height: 1.4 !important;
        box-shadow: 0 2px 8px -2px rgba(0, 56, 150, 0.25) !important;
    }
    .gt-ai-bubble-user {
        background-color: #2563eb !important;
        color: #ffffff !important;
        border-radius: 12px 12px 2px 12px !important;
        padding: 5px 11px !important;
        font-size: 12px !important;
        line-height: 1.35 !important;
        box-shadow: 0 2px 6px -1px rgba(37, 99, 235, 0.25) !important;
    }
    .gt-ai-btn-send {
        background: linear-gradient(135deg, #0047ba 0%, #005ce6 100%) !important;
    }
    .gt-ai-btn-send:hover {
        background: linear-gradient(135deg, #003380 0%, #0047ba 100%) !important;
    }
    .gt-ai-btn-launcher {
        background: linear-gradient(135deg, #0047ba 0%, #0062f0 50%, #003896 100%) !important;
        width: 56px !important;
        height: 56px !important;
        border-radius: 9999px !important;
        box-shadow: 0 0 0 3px #ffffff, 0 10px 25px -4px rgba(0, 71, 186, 0.45) !important;
        position: relative;
    }
    .gt-ai-btn-launcher:not(.is-chat-open) {
        animation: globieFloat 3.2s ease-in-out infinite;
    }
    .gt-ai-btn-launcher:hover {
        transform: translateY(-2px) scale(1.06) !important;
        box-shadow: 0 0 0 3px #ffffff, 0 14px 30px -2px rgba(0, 71, 186, 0.6), 0 0 20px rgba(0, 98, 240, 0.35) !important;
    }
    .gt-ai-pulse-ring {
        position: absolute;
        inset: -5px;
        border-radius: 9999px;
        background: radial-gradient(circle, rgba(0, 98, 240, 0.5) 0%, rgba(0, 71, 186, 0) 72%);
        animation: globiePulseRing 2.8s cubic-bezier(0.25, 1, 0.5, 1) infinite;
        pointer-events: none;
        z-index: -1;
    }
    .gt-ai-btn-launcher.is-chat-open .gt-ai-pulse-ring {
        display: none;
    }
    .gt-ai-btn-launcher.is-chat-open {
        animation: none !important;
    }
    @keyframes globiePulseRing {
        0% {
            transform: scale(0.92);
            opacity: 0.85;
        }
        60% {
            transform: scale(1.45);
            opacity: 0;
        }
        100% {
            transform: scale(1.45);
            opacity: 0;
        }
    }
    @keyframes globieFloat {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-6px);
        }
    }
    @keyframes globieWiggle {
        0%, 68%, 100% {
            transform: rotate(0deg) scale(1);
        }
        73% {
            transform: rotate(-12deg) scale(1.1);
        }
        78% {
            transform: rotate(10deg) scale(1.1);
        }
        83% {
            transform: rotate(-7deg) scale(1.06);
        }
        88% {
            transform: rotate(3deg) scale(1.02);
        }
        93% {
            transform: rotate(0deg) scale(1);
        }
    }
    .gt-ai-mascot-img {
        animation: globieWiggle 4.2s ease-in-out infinite;
        transform-origin: center bottom;
        transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .gt-ai-btn-launcher:hover .gt-ai-mascot-img {
        animation-play-state: paused;
        transform: scale(1.16) rotate(-3deg);
    }
    .gt-ai-btn-launcher.is-chat-open .gt-ai-mascot-img {
        animation: none;
    }
    @keyframes gtBubbleFadeIn {
        0% {
            opacity: 0;
            transform: translateY(5px) scale(0.98);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    .gt-ai-bubble-bot, .gt-ai-bubble-user {
        animation: gtBubbleFadeIn 0.22s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .gt-ai-suggestion-chip {
        background-color: #ffffff !important;
        border: 1px solid #7dd3fc !important;
        color: #0284c7 !important;
        border-radius: 9999px !important;
        padding: 6px 16px !important;
        font-size: 12px !important;
        font-weight: 500 !important;
        text-align: center !important;
        line-height: 1.3 !important;
        transition: all 0.2s ease !important;
        box-shadow: 0 1px 3px rgba(56, 189, 248, 0.12) !important;
        cursor: pointer !important;
        animation: gtBubbleFadeIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .gt-ai-suggestion-chip:hover {
        border-color: #0047ba !important;
        color: #0047ba !important;
        background-color: #f0f7ff !important;
        transform: translateY(-1px) scale(1.01) !important;
        box-shadow: 0 3px 8px rgba(0, 71, 186, 0.16) !important;
    }
    .gt-ai-suggestion-chip:active {
        transform: scale(0.97) !important;
    }
</style>

<script>
    const DEFAULT_AI_GREETINGS = [
        "Hi there! I'm Globie.",
        "How can I help you today?"
    ];
    const DEFAULT_SUGGESTION_CHIPS = [
        "What LED display solutions do you offer?",
        "Where are your Digital iPosters located?",
        "How can I request a project quotation?"
    ];
    let aiChatHistory = [];
    let isAiChatOpen = false;
    let isAiSending = false;
    let hasAnimatedGreeting = false;
    let greetingTimeouts = [];

    // Inactivity / Idle reminder tracking
    let aiInactivityTimer = null;
    let aiInactivityFollowupTimer = null;
    let hasPromptedInactivity = false;
    let isAwaitingInactivityResponse = false;
    const INACTIVITY_TIMEOUT_MS = 50000; // 50 seconds of idle time triggers reminder
    const INACTIVITY_FOLLOWUP_MS = 60000; // 60 seconds after reminder if still no response

    function clearGreetingTimeouts() {
        greetingTimeouts.forEach(t => clearTimeout(t));
        greetingTimeouts = [];
    }

    let isAiChatEnded = false;

    function resetAiInactivityTimer() {
        clearTimeout(aiInactivityTimer);
        clearTimeout(aiInactivityFollowupTimer);

        if (!isAiChatOpen || isAiSending || isAiChatEnded) return;

        isAwaitingInactivityResponse = false;
        hasPromptedInactivity = false;

        aiInactivityTimer = setTimeout(triggerAiInactivityReminder, INACTIVITY_TIMEOUT_MS);
    }

    function clearAiInactivityTimers() {
        clearTimeout(aiInactivityTimer);
        clearTimeout(aiInactivityFollowupTimer);
        isAwaitingInactivityResponse = false;
    }

    function triggerAiInactivityReminder() {
        if (!isAiChatOpen || isAiSending || hasPromptedInactivity || isAiChatEnded) return;

        hasPromptedInactivity = true;
        isAwaitingInactivityResponse = true;

        const reminderMessages = [
            "Still there? 😊 Just checking in! Let me know if you need help exploring our LED displays or want a quick quote.",
            "Still browsing? 👋 I'm right here if you'd like recommendations on our LED screens or mall iPosters!",
            "Need any help? ✨ Feel free to ask anything about our display solutions."
        ];

        const msg = reminderMessages[Math.floor(Math.random() * reminderMessages.length)];

        showAiTyping(true);
        setTimeout(() => {
            showAiTyping(false);
            appendAiBubble('assistant', msg);
            aiChatHistory.push({ role: 'assistant', content: msg });
            persistAiChat();

            showSuggestionChips(true, [
                "Yes, I'm still here! 👋",
                "💰 Request a project quote",
                "I'm all set, thank you! 👍"
            ]);

            // Set follow-up timer in case user never replies -> will end the conversation
            clearTimeout(aiInactivityFollowupTimer);
            aiInactivityFollowupTimer = setTimeout(triggerAiInactivityFollowup, INACTIVITY_FOLLOWUP_MS);
        }, 600);
    }

    function triggerAiInactivityFollowup() {
        if (!isAiChatOpen || isAiSending || !isAwaitingInactivityResponse || isAiChatEnded) return;
        endAiChatConversation('inactivity');
    }

    function endAiChatConversation(reason = 'inactivity') {
        isAiChatEnded = true;
        isAwaitingInactivityResponse = false;
        clearAiInactivityTimers();
        showSuggestionChips(false);

        const list = document.getElementById('ai-chat-dynamic-list');
        const inputArea = document.getElementById('ai-chat-input-area');
        const endedArea = document.getElementById('ai-chat-ended-area');

        const endingMessage = "This chat ended due to inactivity. Feel free to start a new chat anytime whenever you need assistance! 👋";

        showAiTyping(true);
        setTimeout(() => {
            showAiTyping(false);
            appendAiBubble('assistant', endingMessage);
            aiChatHistory.push({ role: 'assistant', content: endingMessage, isEndingNotice: true });

            // Append stylized 'Conversation Ended' divider in the chat stream
            if (list) {
                const divider = document.createElement('div');
                divider.className = 'my-3 flex items-center justify-center text-[10px] text-gray-400 font-bold uppercase tracking-wider gap-2 select-none';
                divider.innerHTML = '<span class="h-px bg-gray-200 flex-1"></span><span>Conversation Ended</span><span class="h-px bg-gray-200 flex-1"></span>';
                list.appendChild(divider);
            }

            // Swap input bar for 'Conversation Ended' bar
            if (inputArea) inputArea.classList.add('hidden');
            if (endedArea) endedArea.classList.remove('hidden');

            persistAiChat();
            scrollAiToBottom();
        }, 500);
    }

    function startNewAiChatConversation() {
        isAiChatEnded = false;
        const inputArea = document.getElementById('ai-chat-input-area');
        const endedArea = document.getElementById('ai-chat-ended-area');

        if (endedArea) endedArea.classList.add('hidden');
        if (inputArea) inputArea.classList.remove('hidden');

        clearAiChat();
    }

    // Expose testers for verification
    window.testAiInactivityReminder = function() {
        triggerAiInactivityReminder();
    };

    window.testEndAiChatConversation = function() {
        endAiChatConversation('inactivity');
    };

    function showSuggestionChips(show, customChips = null) {
        const container = document.getElementById('ai-suggestion-chips');
        if (!container) return;

        if (!show) {
            container.classList.add('hidden');
            container.innerHTML = '';
            return;
        }

        const chips = customChips && customChips.length ? customChips : DEFAULT_SUGGESTION_CHIPS;

        container.innerHTML = chips.map(chip => `
            <button type="button" 
                    onclick="handleSuggestionChipClick(this.getAttribute('data-query'))" 
                    data-query="${escapeHtml(chip)}"
                    class="gt-ai-suggestion-chip">
                ${escapeHtml(chip)}
            </button>
        `).join('');

        container.classList.remove('hidden');
        scrollAiToBottom();
    }

    function handleSuggestionChipClick(text) {
        showSuggestionChips(false);
        const input = document.getElementById('ai-chat-input');
        if (input) input.value = '';
        sendAiUserMessage(text);
    }

    // Load persisted chat on load (uses sessionStorage so it automatically resets on fresh browser open)
    document.addEventListener('DOMContentLoaded', function() {
        // Clean up legacy localStorage if present
        try {
            localStorage.removeItem('globaltronics_ai_chat_history');
        } catch(e) {}

        try {
            const savedHistory = sessionStorage.getItem('globaltronics_ai_chat_history');
            if (savedHistory) {
                aiChatHistory = JSON.parse(savedHistory);
            }
        } catch(e) {}

        const hasUserMessage = aiChatHistory && aiChatHistory.some(m => m.role === 'user');

        if (!aiChatHistory || !aiChatHistory.length || !hasUserMessage) {
            // Fresh greeting state - will trigger typing animation when opened
            aiChatHistory = [];
            hasAnimatedGreeting = false;
        } else {
            // Existing user conversation - render immediately
            hasAnimatedGreeting = true;
            renderPersistedAiHistory();
        }
    });

    function playAnimatedGreeting() {
        clearGreetingTimeouts();
        showSuggestionChips(false);
        const list = document.getElementById('ai-chat-dynamic-list');
        if (!list) return;

        list.innerHTML = '';
        aiChatHistory = [];
        showAiTyping(true);

        const t1 = setTimeout(() => {
            showAiTyping(false);
            const msg1 = DEFAULT_AI_GREETINGS[0];
            aiChatHistory.push({ role: 'assistant', content: msg1 });
            appendAiBubble('assistant', msg1);
            persistAiChat();

            // Typing animation before second greeting bubble
            showAiTyping(true);

            const t2 = setTimeout(() => {
                showAiTyping(false);
                const msg2 = DEFAULT_AI_GREETINGS[1];
                aiChatHistory.push({ role: 'assistant', content: msg2 });
                appendAiBubble('assistant', msg2);
                persistAiChat();

                // Show suggestion chips after greetings appear
                showSuggestionChips(true);

                const input = document.getElementById('ai-chat-input');
                if (input) input.focus();
                hasAnimatedGreeting = true;
                resetAiInactivityTimer();
            }, 750);
            greetingTimeouts.push(t2);

        }, 650);
        greetingTimeouts.push(t1);
    }

    function toggleAiChat() {
        const win = document.getElementById('ai-chat-window');
        const toggleBtn = document.getElementById('ai-chat-toggle-btn');
        if (!win) return;

        isAiChatOpen = !isAiChatOpen;

        if (toggleBtn) {
            toggleBtn.classList.toggle('is-chat-open', isAiChatOpen);
        }

        if (isAiChatOpen) {
            win.classList.remove('hidden');
            requestAnimationFrame(() => {
                win.classList.remove('scale-95', 'opacity-0');
                win.classList.add('scale-100', 'opacity-100');
            });

            if (!hasAnimatedGreeting) {
                playAnimatedGreeting();
            } else {
                renderPersistedAiHistory();
                const hasUserMessage = aiChatHistory && aiChatHistory.some(m => m.role === 'user');
                if (!hasUserMessage) {
                    showSuggestionChips(true);
                }
                setTimeout(() => {
                    const input = document.getElementById('ai-chat-input');
                    if (input) input.focus();
                    scrollAiToBottom();
                    resetAiInactivityTimer();
                }, 100);
            }
        } else {
            clearAiInactivityTimers();
            if (!hasAnimatedGreeting) {
                clearGreetingTimeouts();
                showAiTyping(false);
                aiChatHistory = DEFAULT_AI_GREETINGS.map(msg => ({ role: 'assistant', content: msg }));
                persistAiChat();
                renderPersistedAiHistory();
                hasAnimatedGreeting = true;
            }
            win.classList.remove('scale-100', 'opacity-100');
            win.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                win.classList.add('hidden');
            }, 200);
        }
    }

    function dismissAiDisclaimer() {
        const banner = document.getElementById('ai-disclaimer-banner');
        if (banner) banner.classList.add('hidden');
    }

    function handleAiInputKey(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            handleAiChatSubmit();
        }
    }

    function handleAiChatSubmit() {
        const input = document.getElementById('ai-chat-input');
        if (!input) return;
        const msg = input.value.trim();
        if (!msg || isAiSending) return;

        input.value = '';
        sendAiUserMessage(msg);
    }

    function sendAiUserMessage(userText) {
        clearGreetingTimeouts();
        clearAiInactivityTimers();
        showSuggestionChips(false);
        hasAnimatedGreeting = true;
        isAiSending = true;
        const sendBtn = document.getElementById('ai-chat-send-btn');
        if (sendBtn) sendBtn.disabled = true;

        // Render User Message: Blue bubble rounded-br-none
        appendAiBubble('user', userText);

        aiChatHistory.push({ role: 'user', content: userText });
        persistAiChat();

        showAiTyping(true);

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        fetch("{{ route('chat.message') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken || ''
            },
            body: JSON.stringify({
                message: userText,
                history: aiChatHistory.slice(0, -1).slice(-8)
            })
        })
        .then(async res => {
            if (!res.ok) {
                const errData = await res.json().catch(() => ({}));
                console.warn('Chat request failed with status:', res.status, errData);
                throw new Error(errData.message || 'Error ' + res.status);
            }
            return res.json();
        })
        .then(data => {
            showAiTyping(false);
            isAiSending = false;
            if (sendBtn) sendBtn.disabled = false;

            const reply = data.reply || "You're very welcome! Let me know if you need anything else with our LED displays.";
            appendAiBubble('assistant', reply, data.action || null);

            aiChatHistory.push({ role: 'assistant', content: reply });
            persistAiChat();
            resetAiInactivityTimer();

            // Display dynamic follow-up suggestions from Globie
            if (data.suggestions && data.suggestions.length > 0) {
                showSuggestionChips(true, data.suggestions);
            }
        })
        .catch(err => {
            showAiTyping(false);
            isAiSending = false;
            if (sendBtn) sendBtn.disabled = false;

            // If user expressed gratitude or polite remarks, provide a warm fallback directly
            const lower = userText.toLowerCase();
            let fallback;
            if (/thank|thanks|salamat|ty|tysm|appreciate|bye|goodbye/i.test(lower)) {
                fallback = "You're very welcome! 😊 Glad I could help. Just ask anytime if you need anything else!";
            } else {
                fallback = "Our network seems a bit busy right now. Feel free to call us at (02) 8721-2878 or email inquiry@globaltronics.net!";
            }
            appendAiBubble('assistant', fallback);
            aiChatHistory.push({ role: 'assistant', content: fallback });
            persistAiChat();
            resetAiInactivityTimer();
        });
    }

    function appendAiBubble(role, rawContent, action = null) {
        const list = document.getElementById('ai-chat-dynamic-list');
        if (!list) return;

        const wrapper = document.createElement('div');
        wrapper.className = role === 'user' ? 'flex justify-end' : 'flex justify-start';

        if (role === 'user') {
            wrapper.innerHTML = `<div class="gt-ai-bubble-user max-w-[80%] text-xs shadow-sm leading-relaxed break-words">${escapeHtml(rawContent.trim())}</div>`;
        } else {
            const formatted = formatAiMarkdown(rawContent);
            let actionHtml = '';
            if (action && action.type) {
                if (action.type === 'open_quote_modal') {
                    const svc = escapeHtml(action.serviceType || '');
                    const sz = escapeHtml(action.estimatedSize || '');
                    actionHtml = `
                        <div class="mt-2 pt-1.5 border-t border-white/20">
                            <button type="button" 
                                    onclick="triggerQuoteModalFromAi('${svc}', '${sz}')" 
                                    class="w-full px-3 py-1.5 rounded-lg bg-white text-[#0047ba] font-bold text-[11px] hover:bg-blue-50 transition shadow-sm flex items-center justify-center gap-1 cursor-pointer">
                                <span>${escapeHtml(action.label || 'Request a Project Quote')}</span>
                            </button>
                        </div>
                    `;
                } else if (action.type === 'scroll_to' && action.target) {
                    actionHtml = `
                        <div class="mt-2 pt-1.5 border-t border-white/20">
                            <button type="button" 
                                    onclick="scrollAiTarget('${action.target}')" 
                                    class="w-full px-3 py-1.5 rounded-lg bg-white text-[#0047ba] font-bold text-[11px] hover:bg-blue-50 transition shadow-sm flex items-center justify-center gap-1 cursor-pointer">
                                <span>${escapeHtml(action.label || 'Go to Calculator')}</span>
                            </button>
                        </div>
                    `;
                } else if (action.type === 'navigate' && action.url) {
                    actionHtml = `
                        <div class="mt-2 pt-1.5 border-t border-white/20">
                            <a href="${action.url}" 
                               class="w-full px-3 py-1.5 rounded-lg bg-white text-[#0047ba] font-bold text-[11px] hover:bg-blue-50 transition shadow-sm flex items-center justify-center gap-1">
                                <span>${escapeHtml(action.label || 'Learn More')}</span>
                            </a>
                        </div>
                    `;
                }
            }

            wrapper.innerHTML = `<div class="gt-ai-bubble-bot max-w-[80%] text-xs shadow-sm leading-relaxed break-words">${formatted}${actionHtml}</div>`;
        }

        list.appendChild(wrapper);
        scrollAiToBottom();
    }

    function showAiTyping(show) {
        const indicator = document.getElementById('ai-typing-indicator');
        if (indicator) {
            if (show) {
                indicator.classList.remove('hidden');
            } else {
                indicator.classList.add('hidden');
            }
        }
        scrollAiToBottom();
    }

    function scrollAiToBottom() {
        const container = document.getElementById('ai-chat-messages');
        if (container) {
            requestAnimationFrame(() => {
                container.scrollTop = container.scrollHeight;
            });
        }
    }

    function triggerQuoteModalFromAi(serviceType = '', estimatedSize = '') {
        if (typeof openQuoteModal === 'function') {
            openQuoteModal(serviceType, estimatedSize, 'Inquired via GT AI Assistant');
        } else {
            window.location.href = "{{ url('/#contact') }}";
        }
    }

    function scrollAiTarget(targetSelector) {
        const el = document.querySelector(targetSelector);
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
            if (window.innerWidth < 640) {
                toggleAiChat();
            }
        } else {
            window.location.href = "{{ url('/') }}" + targetSelector;
        }
    }

    function clearAiChat() {
        clearGreetingTimeouts();
        clearAiInactivityTimers();
        isAiChatEnded = false;
        const inputArea = document.getElementById('ai-chat-input-area');
        const endedArea = document.getElementById('ai-chat-ended-area');
        if (endedArea) endedArea.classList.add('hidden');
        if (inputArea) inputArea.classList.remove('hidden');
        showSuggestionChips(false);
        try {
            sessionStorage.removeItem('globaltronics_ai_chat_history');
            localStorage.removeItem('globaltronics_ai_chat_history');
        } catch(e) {}
        hasAnimatedGreeting = false;
        playAnimatedGreeting();
    }

    function persistAiChat() {
        try {
            sessionStorage.setItem('globaltronics_ai_chat_history', JSON.stringify(aiChatHistory.slice(-15)));
        } catch(e) {}
    }

    function renderPersistedAiHistory() {
        const list = document.getElementById('ai-chat-dynamic-list');
        if (!list || !aiChatHistory.length) return;
        list.innerHTML = '';
        aiChatHistory.forEach(item => {
            appendAiBubble(item.role, item.content);
            if (item.isEndingNotice) {
                const divider = document.createElement('div');
                divider.className = 'my-3 flex items-center justify-center text-[10px] text-gray-400 font-bold uppercase tracking-wider gap-2 select-none';
                divider.innerHTML = '<span class="h-px bg-gray-200 flex-1"></span><span>Conversation Ended</span><span class="h-px bg-gray-200 flex-1"></span>';
                list.appendChild(divider);
            }
        });

        const hasEndedNotice = aiChatHistory.some(m => m.isEndingNotice);
        if (hasEndedNotice) {
            isAiChatEnded = true;
            const inputArea = document.getElementById('ai-chat-input-area');
            const endedArea = document.getElementById('ai-chat-ended-area');
            if (inputArea) inputArea.classList.add('hidden');
            if (endedArea) endedArea.classList.remove('hidden');
        }
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function formatAiMarkdown(text) {
        if (!text) return '';
        let str = escapeHtml(text);

        // Headers: ### Title
        str = str.replace(/^### (.*$)/gim, '<div class="font-bold text-xs text-yellow-200 mt-1 mb-0.5">$1</div>');
        
        // Bold: **text**
        str = str.replace(/\*\*(.*?)\*\*/g, '<strong class="font-bold text-white">$1</strong>');

        // Italic: *text* or _text_
        str = str.replace(/\*(.*?)\*/g, '<em class="italic text-blue-100">$1</em>');
        str = str.replace(/_(.*?)_/g, '<em class="italic text-blue-100">$1</em>');

        // Bullet points: • or - or * (with optional leading whitespace)
        str = str.replace(/^\s*(?:•|-|\*)\s+(.*$)/gim, '<div class="flex items-start gap-1 pl-0.5 my-0.5"><span class="text-blue-200 font-bold leading-tight">•</span><span>$1</span></div>');

        // Markdown Links: [text](url) - supports https, http, relative paths, tel, mailto
        str = str.replace(/\[(.*?)\]\(((?:https?:\/\/|\/|mailto:|tel:).*?)\)/g, '<a href="$2" target="_blank" rel="noopener noreferrer" class="text-yellow-300 underline font-bold hover:text-white transition-colors">$1</a>');

        // Auto-link emails and hotline phone number
        str = str.replace(/\b([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})\b/g, '<a href="mailto:$1" class="text-yellow-300 underline font-semibold hover:text-white">$1</a>');
        str = str.replace(/\((02)\)\s*(8721-2878)/g, '<a href="tel:0287212878" class="text-yellow-300 underline font-semibold hover:text-white">(02) 8721-2878</a>');

        // Newlines to <br>
        str = str.replace(/\n\n/g, '<div class="h-1"></div>');
        str = str.replace(/\n/g, '<br>');

        return str;
    }
</script>
