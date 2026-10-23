<!-- Smooth Back-to-Top Floating Action Button -->
<button id="back-to-top-btn" 
        type="button" 
        onclick="scrollToTop()" 
        style="bottom: 1.25rem; right: 30px;"
        class="fixed z-40 w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-[#0047ba] hover:bg-blue-600 text-white shadow-xl shadow-blue-900/30 flex items-center justify-center transition-all duration-300 transform translate-y-6 opacity-0 pointer-events-none hover:scale-110 active:scale-95 border-2 border-white/20 focus:outline-none"
        aria-label="Back to top"
        title="Scroll to Top">
    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"></path>
    </svg>
</button>

<script>
    (function() {
        const btn = document.getElementById('back-to-top-btn');
        if (!btn) return;

        function checkScroll() {
            if (window.scrollY > 350) {
                btn.classList.remove('translate-y-6', 'opacity-0', 'pointer-events-none');
                btn.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');
            } else {
                btn.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
                btn.classList.add('translate-y-6', 'opacity-0', 'pointer-events-none');
            }
        }

        window.addEventListener('scroll', checkScroll, { passive: true });
        // Initial check on load
        checkScroll();
    })();

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>
