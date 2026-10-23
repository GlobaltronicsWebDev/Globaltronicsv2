<!-- Interactive LED Pixel Pitch & Viewing Distance Calculator -->
<section id="led-calculator" class="py-20 lg:py-28 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white relative overflow-hidden border-t border-b border-blue-900/40">
    
    <!-- Decorative Background Accents -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#0047ba_1px,transparent_1px)] [background-size:24px_24px] opacity-15 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 relative z-10">

        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-14 lg:mb-18">
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/20 text-yellow-300 text-xs font-bold uppercase tracking-wider mb-4">
                <i class="fa-solid fa-calculator text-yellow-400"></i>
                <span>Smart Engineering Tool</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                LED Pixel Pitch & <br class="hidden sm:inline">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-300 via-amber-200 to-white">
                    Distance Calculator
                </span>
            </h2>
            <p class="text-slate-300 text-sm sm:text-base mt-4 leading-relaxed">
                Not sure whether you need a P1.5, P2.5, P4, or P10 screen? Select your environment and slide your target viewing distance to calculate the optimal pitch, resolution, and brightness instantly.
            </p>
        </div>

        <!-- Calculator Interactive Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <!-- Controls Column (5 cols) -->
            <div class="lg:col-span-5 bg-slate-900/90 border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-2xl backdrop-blur-md space-y-7">
                
                <!-- Environment Toggle (Indoor vs Outdoor) -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">
                        1. Select Installation Environment
                    </label>
                    <div class="grid grid-cols-2 gap-3 p-1.5 bg-slate-950 rounded-2xl border border-slate-800">
                        <button type="button" 
                                id="env-indoor-btn" 
                                onclick="setCalcEnv('indoor')" 
                                class="py-3 px-4 rounded-xl text-xs sm:text-sm font-bold uppercase tracking-wider transition-all flex items-center justify-center gap-2 bg-[#0047ba] text-white shadow-md">
                            <i class="fa-solid fa-building"></i>
                            <span>Indoor LED</span>
                        </button>
                        <button type="button" 
                                id="env-outdoor-btn" 
                                onclick="setCalcEnv('outdoor')" 
                                class="py-3 px-4 rounded-xl text-xs sm:text-sm font-bold uppercase tracking-wider transition-all flex items-center justify-center gap-2 text-slate-400 hover:text-white">
                            <i class="fa-solid fa-cloud-sun"></i>
                            <span>Outdoor LED</span>
                        </button>
                    </div>
                    <p id="env-hint" class="text-[11px] text-slate-400 mt-2 italic">
                        Indoor displays prioritize ultra-fine detail, high refresh rate, and anti-glare comfortable brightness.
                    </p>
                </div>

                <!-- Viewing Distance Slider -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="calc-distance" class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            2. Closest Viewing Distance
                        </label>
                        <div class="flex items-center gap-2">
                            <button type="button" 
                                    onclick="autoAdjustDistanceToScreen()" 
                                    title="Auto-calculate recommended viewing distance based on screen height" 
                                    class="text-[10px] text-blue-400 hover:text-amber-300 font-semibold flex items-center gap-1 transition-colors cursor-pointer bg-slate-900 px-2 py-0.5 rounded-lg border border-slate-800 hover:border-blue-500/50">
                                <i class="fa-solid fa-wand-magic-sparkles text-[9px]"></i>
                                <span>Auto-Fit</span>
                            </button>
                            <div class="flex items-baseline gap-1">
                                <span id="distance-val-display" class="text-2xl font-black text-amber-300 font-mono">4.0</span>
                                <span class="text-xs font-bold text-slate-400">meters</span>
                                <span id="distance-ft-display" class="text-xs text-slate-500 ml-1 font-mono">(13.1 ft)</span>
                            </div>
                        </div>
                    </div>
                    
                    <input type="range" 
                           id="calc-distance" 
                           min="1" 
                           max="35" 
                           step="0.5" 
                           value="4" 
                           oninput="updateCalcValues()" 
                           class="w-full h-2.5 bg-slate-950 rounded-lg appearance-none cursor-pointer accent-yellow-400 focus:outline-none">
                    
                    <!-- Quick Preset Buttons -->
                    <div class="flex flex-wrap items-center justify-between gap-1.5 mt-3 text-[10px] font-semibold text-slate-400">
                        <span class="text-slate-500">Distance Presets:</span>
                        <div class="flex flex-wrap gap-1.5">
                            <button type="button" onclick="setCalcDistance(1.5)" class="px-2 py-1 rounded-lg bg-slate-900 border border-slate-800 hover:border-blue-500/50 hover:text-white transition-colors cursor-pointer">1.5m (Close)</button>
                            <button type="button" onclick="setCalcDistance(4.0)" class="px-2 py-1 rounded-lg bg-slate-900 border border-slate-800 hover:border-blue-500/50 hover:text-white transition-colors cursor-pointer">4.0m (Room)</button>
                            <button type="button" onclick="setCalcDistance(8.0)" class="px-2 py-1 rounded-lg bg-slate-900 border border-slate-800 hover:border-blue-500/50 hover:text-white transition-colors cursor-pointer">8.0m (Hall)</button>
                            <button type="button" onclick="setCalcDistance(18.0)" class="px-2 py-1 rounded-lg bg-slate-900 border border-slate-800 hover:border-blue-500/50 hover:text-white transition-colors cursor-pointer">18.0m (Outdoor)</button>
                        </div>
                    </div>
                </div>

                <!-- Screen Dimensions Inputs (Width x Height) -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">
                        3. Approximate Screen Size (Meters)
                    </label>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <div class="flex items-center justify-between text-[11px] text-slate-400 mb-1">
                                <span>Width (m)</span>
                            </div>
                            <input type="number" 
                                   id="calc-width" 
                                   min="1" 
                                   max="50" 
                                   step="0.1" 
                                   value="3.84" 
                                   oninput="updateCalcValues()" 
                                   class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-sm font-mono font-bold text-white focus:ring-2 focus:ring-[#0047ba] focus:outline-none">
                        </div>
                        <div>
                            <div class="flex items-center justify-between text-[11px] text-slate-400 mb-1">
                                <span>Height (m)</span>
                            </div>
                            <input type="number" 
                                   id="calc-height" 
                                   min="0.5" 
                                   max="30" 
                                   step="0.1" 
                                   value="2.16" 
                                   oninput="updateCalcValues()" 
                                   class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-sm font-mono font-bold text-white focus:ring-2 focus:ring-[#0047ba] focus:outline-none">
                        </div>
                    </div>
                    
                    <!-- Aspect Ratio Presets & Form Factors -->
                    <div class="mt-3 pt-3 border-t border-slate-800/80">
                        <div class="flex items-center justify-between text-[11px] text-slate-400 mb-2">
                            <span id="aspect-ratio-label" class="font-mono text-blue-400 font-bold">Aspect: ~16:9 Widescreen (1.78:1)</span>
                            <span class="text-[10px] text-slate-500 font-semibold">Form Factors:</span>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-5 gap-1.5">
                            <button type="button" onclick="setScreenSize(3.84, 2.16, 4.0, 'indoor')" class="px-2 py-1.5 bg-slate-900 hover:bg-blue-900/40 border border-slate-800 hover:border-blue-500/50 rounded-lg text-[10px] text-slate-300 hover:text-white font-medium transition-all text-center cursor-pointer">
                                16:9 Wall
                            </button>
                            <button type="button" onclick="setScreenSize(4.00, 3.00, 6.0, 'indoor')" class="px-2 py-1.5 bg-slate-900 hover:bg-blue-900/40 border border-slate-800 hover:border-blue-500/50 rounded-lg text-[10px] text-slate-300 hover:text-white font-medium transition-all text-center cursor-pointer">
                                4:3 Stage
                            </button>
                            <button type="button" onclick="setScreenSize(8.00, 1.50, 7.5, 'indoor')" class="px-2 py-1.5 bg-slate-900 hover:bg-blue-900/40 border border-slate-800 hover:border-blue-500/50 rounded-lg text-[10px] text-slate-300 hover:text-white font-medium transition-all text-center cursor-pointer">
                                Ribbon Banner
                            </button>
                            <button type="button" onclick="setScreenSize(1.50, 3.00, 2.0, 'indoor')" class="px-2 py-1.5 bg-slate-900 hover:bg-blue-900/40 border border-slate-800 hover:border-blue-500/50 rounded-lg text-[10px] text-slate-300 hover:text-white font-medium transition-all text-center cursor-pointer">
                                Portrait Totem
                            </button>
                            <button type="button" onclick="setScreenSize(12.00, 6.00, 18.0, 'outdoor')" class="col-span-2 sm:col-span-1 px-2 py-1.5 bg-slate-900 hover:bg-blue-900/40 border border-slate-800 hover:border-blue-500/50 rounded-lg text-[10px] text-slate-300 hover:text-white font-medium transition-all text-center cursor-pointer">
                                Billboard
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Results & Visualization Column (7 cols) -->
            <div class="lg:col-span-7 space-y-6">

                <!-- Primary Recommendation Card -->
                <div class="bg-gradient-to-br from-blue-900/60 via-slate-900 to-slate-900 border-2 border-blue-500/40 rounded-3xl p-6 sm:p-8 shadow-2xl relative overflow-hidden">
                    <div class="absolute -right-12 -top-12 w-44 h-44 bg-blue-500/10 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-800/80">
                        <div>
                            <span class="text-[10px] font-extrabold uppercase tracking-widest text-blue-300 bg-blue-500/20 px-3 py-1 rounded-full border border-blue-400/30">
                                Recommended Configuration
                            </span>
                            <div class="flex items-baseline gap-3 mt-3">
                                <h3 id="recommended-pitch" class="text-4xl sm:text-5xl font-black text-yellow-300 font-mono tracking-tight">
                                    P2.5
                                </h3>
                                <span class="text-base text-slate-300 font-semibold">Pixel Pitch (<span id="pitch-mm">2.5</span>mm)</span>
                            </div>
                        </div>

                        <!-- Badge summary -->
                        <div class="sm:text-right bg-slate-950/60 sm:bg-transparent p-3 sm:p-0 rounded-xl border border-slate-800 sm:border-0">
                            <span class="text-[11px] text-slate-400 block font-semibold">Application Profile</span>
                            <span id="application-tag" class="text-sm font-bold text-white">
                                Boardroom & Conference Video Wall
                            </span>
                        </div>
                    </div>

                    <!-- Dynamic Interactive Screen Preview Stage -->
                    <div class="mt-6">
                        <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span>Interactive Screen Preview</span>
                                <span class="hidden sm:inline-flex items-center gap-1 text-[10px] bg-emerald-500/15 text-emerald-400 border border-emerald-500/30 px-2 py-0.5 rounded-full font-mono font-bold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Dynamic Scale
                                </span>
                            </div>
                            <span id="resolution-badge" class="text-yellow-300 font-mono font-bold">1,536 × 864 px (1.33 MP)</span>
                        </div>

                        <!-- Architectural Stage Chamber -->
                        <div id="screen-stage" 
                             class="relative w-full h-72 sm:h-80 md:h-[340px] bg-slate-950/90 rounded-2xl border border-slate-800/90 overflow-hidden flex items-center justify-center p-4 sm:p-6 shadow-inner select-none"
                             style="background-image: radial-gradient(rgba(255,255,255,0.06) 1px, transparent 1px); background-size: 20px 20px;">
                            
                            <!-- Ambient Glow & Subtle Depth Vignette -->
                            <div class="absolute inset-0 bg-gradient-to-b from-blue-950/10 via-transparent to-black/70 pointer-events-none"></div>

                            <!-- Stage Metadata HUD (Top Left & Top Right) -->
                            <div class="absolute top-3 left-3 z-20 flex items-center gap-2 pointer-events-none">
                                <span class="bg-slate-900/90 backdrop-blur-md text-[10px] font-mono text-slate-300 border border-slate-700/70 px-2.5 py-1 rounded-lg shadow-sm flex items-center gap-1.5">
                                    <i class="fa-solid fa-border-all text-blue-400"></i>
                                    <span id="cabinets-display">32 Panels (8W × 4H)</span>
                                </span>
                            </div>

                            <div class="absolute top-3 right-3 z-20 pointer-events-none">
                                <span class="bg-slate-900/90 backdrop-blur-md text-[10px] font-mono text-amber-300 border border-slate-700/70 px-2.5 py-1 rounded-lg shadow-sm flex items-center gap-1.5">
                                    <i class="fa-solid fa-ruler-combined text-amber-400"></i>
                                    <span id="dim-display">3.84m × 2.16m</span>
                                </span>
                            </div>

                            <!-- Bottom Scale Note & Viewer Distance HUD -->
                            <div class="absolute bottom-2.5 left-3 text-[9px] font-mono text-slate-500 uppercase tracking-widest pointer-events-none flex items-center gap-1">
                                <i class="fa-solid fa-display text-[9px] text-blue-500"></i>
                                <span>Globaltronics Dynamic Display Matrix</span>
                            </div>

                            <div class="absolute bottom-2.5 right-3 z-20 pointer-events-none">
                                <span class="bg-slate-900/90 backdrop-blur-md text-[10px] font-mono text-emerald-400 border border-slate-700/70 px-2.5 py-1 rounded-lg shadow-sm flex items-center gap-1.5">
                                    <i class="fa-solid fa-eye text-emerald-400"></i>
                                    <span>Viewer: <strong id="preview-distance-display" class="text-white font-bold">4.0m</strong></span>
                                </span>
                            </div>

                            <!-- The Morphing Screen Preview Frame -->
                            <div id="screen-preview-frame" 
                                 class="relative bg-black rounded-xl border-2 border-slate-600 shadow-[0_0_35px_rgba(0,71,186,0.3),0_15px_30px_rgba(0,0,0,0.9)] overflow-hidden flex items-center justify-center transition-all duration-500 ease-out z-10"
                                 style="width: 480px; height: 270px;">
                                
                                <!-- Cabinet Modular Seam Grid Overlay -->
                                <div id="cabinet-grid-overlay" 
                                     class="absolute inset-0 pointer-events-none z-10 opacity-35"
                                     style="background-image: linear-gradient(to right, rgba(96,165,250,0.3) 1px, transparent 1px), linear-gradient(to bottom, rgba(96,165,250,0.3) 1px, transparent 1px); background-size: 12.5% 25%;"></div>

                                <!-- Simulated LED Matrix Grid -->
                                <div id="simulated-matrix" 
                                     class="absolute inset-0 opacity-20 pointer-events-none z-0" 
                                     style="background-image: radial-gradient(#60a5fa 1px, transparent 1px); background-size: 8px 8px;"></div>
                                
                                <!-- Subtle Bevel Gloss Highlight -->
                                <div class="absolute inset-0 bg-gradient-to-tr from-white/[0.04] to-transparent pointer-events-none z-10"></div>

                                <!-- Inner Display Content Preview -->
                                <div id="screen-inner-content" class="relative z-20 text-center max-w-sm px-3 py-2 pointer-events-none transition-all duration-300 w-full overflow-hidden flex flex-col items-center justify-center">
                                    <div class="inline-flex items-center gap-2 bg-[#0047ba]/80 px-3 py-1 rounded-full text-white text-[11px] font-bold mb-1.5 backdrop-blur-md">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                        <span id="preview-env-tag">Indoor High Definition</span>
                                    </div>
                                    <h4 id="preview-headline" class="text-sm sm:text-base md:text-lg font-black text-white drop-shadow">
                                        Crisp & Seamless at ≥ <span id="min-view-dist">2.5</span>m
                                    </h4>
                                    <p id="preview-area-sub" class="text-[11px] text-slate-300 mt-1">
                                        Total Screen Area: <span id="total-area" class="font-bold text-amber-300">8.29 m²</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Detailed Technical Specifications Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 mt-6">
                        <!-- Optimal Distance -->
                        <div class="bg-slate-950/80 p-3.5 rounded-2xl border border-slate-800">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500 block">Min Distance</span>
                            <p id="spec-distance" class="text-base font-black text-white mt-1 font-mono">≥ 2.5 m</p>
                        </div>

                        <!-- Brightness -->
                        <div class="bg-slate-950/80 p-3.5 rounded-2xl border border-slate-800">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500 block">Brightness</span>
                            <p id="spec-brightness" class="text-base font-black text-amber-300 mt-1 font-mono">800 - 1,000 Nits</p>
                        </div>

                        <!-- IP Rating -->
                        <div class="bg-slate-950/80 p-3.5 rounded-2xl border border-slate-800">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500 block">IP Protection</span>
                            <p id="spec-ip" class="text-base font-black text-emerald-400 mt-1 font-mono">IP30 (Indoor)</p>
                        </div>

                        <!-- Pixel Density -->
                        <div class="bg-slate-950/80 p-3.5 rounded-2xl border border-slate-800">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500 block">Pixel Density</span>
                            <p id="spec-density" class="text-base font-black text-blue-400 mt-1 font-mono">160,000 /m²</p>
                        </div>
                    </div>

                    <!-- CTA Button Linking to Quote Modal -->
                    <div class="mt-7 pt-6 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-xs text-slate-400 text-center sm:text-left">
                            <p class="font-semibold text-white">Satisfied with this configuration?</p>
                            <p class="text-[11px] text-slate-400">Our sales engineers will quote your custom hardware & structure.</p>
                        </div>
                        <button type="button" 
                                onclick="requestQuoteFromCalc()" 
                                class="w-full sm:w-auto px-7 py-3.5 bg-gradient-to-r from-yellow-400 to-amber-500 hover:from-yellow-300 hover:to-amber-400 text-slate-950 font-black text-xs uppercase tracking-wider rounded-2xl shadow-xl shadow-amber-500/20 active:scale-95 transition-all flex items-center justify-center gap-2 group cursor-pointer">
                            <span>Request Quote for This Configuration</span>
                            <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

@push('scripts')
<script>
    let currentCalcEnv = 'indoor';

    function setCalcEnv(env) {
        currentCalcEnv = env;
        const indoorBtn = document.getElementById('env-indoor-btn');
        const outdoorBtn = document.getElementById('env-outdoor-btn');
        const envHint = document.getElementById('env-hint');

        if (env === 'indoor') {
            indoorBtn.className = 'py-3 px-4 rounded-xl text-xs sm:text-sm font-bold uppercase tracking-wider transition-all flex items-center justify-center gap-2 bg-[#0047ba] text-white shadow-md';
            outdoorBtn.className = 'py-3 px-4 rounded-xl text-xs sm:text-sm font-bold uppercase tracking-wider transition-all flex items-center justify-center gap-2 text-slate-400 hover:text-white';
            envHint.textContent = 'Indoor displays prioritize ultra-fine detail, high refresh rate, and anti-glare comfortable brightness.';
        } else {
            outdoorBtn.className = 'py-3 px-4 rounded-xl text-xs sm:text-sm font-bold uppercase tracking-wider transition-all flex items-center justify-center gap-2 bg-[#0047ba] text-white shadow-md';
            indoorBtn.className = 'py-3 px-4 rounded-xl text-xs sm:text-sm font-bold uppercase tracking-wider transition-all flex items-center justify-center gap-2 text-slate-400 hover:text-white';
            envHint.textContent = 'Outdoor displays feature high-nits sunlight readability, IP65 waterproof typhoon-resistance, and long-range visibility.';
        }

        updateCalcValues();
    }

    function setCalcDistance(val) {
        const slider = document.getElementById('calc-distance');
        if (slider) {
            slider.value = val;
            updateCalcValues();
        }
    }

    function setScreenSize(w, h, optDist, optEnv) {
        const wInput = document.getElementById('calc-width');
        const hInput = document.getElementById('calc-height');
        const distSlider = document.getElementById('calc-distance');

        if (wInput && hInput) {
            wInput.value = w;
            hInput.value = h;
        }

        if (optDist && distSlider) {
            distSlider.value = optDist;
        }

        if (optEnv && optEnv !== currentCalcEnv) {
            setCalcEnv(optEnv);
            return;
        }

        updateCalcValues();
    }

    function autoAdjustDistanceToScreen() {
        const hInput = document.getElementById('calc-height');
        const distSlider = document.getElementById('calc-distance');
        if (!hInput || !distSlider) return;

        const h = parseFloat(hInput.value) || 2.16;
        // Standard AV engineering formula: ideal closest viewing distance is ~1.8x screen height for indoor, ~2.8x for outdoor
        const multiplier = currentCalcEnv === 'indoor' ? 1.8 : 2.8;
        let recommendedDist = Math.max(1.0, Math.min(35.0, Math.round(h * multiplier * 2) / 2));
        distSlider.value = recommendedDist;
        updateCalcValues();
    }

    function updateCalcValues() {
        const distSlider = document.getElementById('calc-distance');
        const widthInput = document.getElementById('calc-width');
        const heightInput = document.getElementById('calc-height');

        if (!distSlider || !widthInput || !heightInput) return;

        const distance = parseFloat(distSlider.value) || 4.0;
        const widthM = Math.max(0.5, parseFloat(widthInput.value) || 3.84);
        const heightM = Math.max(0.5, parseFloat(heightInput.value) || 2.16);

        // Distance Readouts
        document.getElementById('distance-val-display').textContent = distance.toFixed(1);
        document.getElementById('distance-ft-display').textContent = `(${(distance * 3.28084).toFixed(1)} ft)`;

        // Preview HUD Distance Display
        const prevDistEl = document.getElementById('preview-distance-display');
        if (prevDistEl) {
            prevDistEl.textContent = `${distance.toFixed(1)}m`;
        }

        // Aspect Ratio Readout
        const ratio = widthM / heightM;
        const ratioLabel = document.getElementById('aspect-ratio-label');
        if (Math.abs(ratio - (16/9)) < 0.1) {
            ratioLabel.textContent = `Aspect: 16:9 Widescreen (${ratio.toFixed(2)}:1)`;
        } else if (Math.abs(ratio - (4/3)) < 0.1) {
            ratioLabel.textContent = `Aspect: 4:3 Standard (${ratio.toFixed(2)}:1)`;
        } else if (ratio >= 3.0) {
            ratioLabel.textContent = `Aspect: Ultra-Wide Ribbon (${ratio.toFixed(2)}:1)`;
        } else if (ratio <= 0.6) {
            ratioLabel.textContent = `Aspect: Vertical Totem (${ratio.toFixed(2)}:1)`;
        } else {
            ratioLabel.textContent = `Aspect: ${ratio.toFixed(2)}:1 Custom`;
        }

        // Calculation Logic according to standard LED AV Engineering Rules
        let recommendedPitch = 2.5;
        let pitchString = 'P2.5';
        let applicationProfile = 'Auditorium & Corporate Display';
        let brightness = '800 - 1,000 Nits';
        let ipRating = 'IP30 (Indoor Dust Protected)';
        let previewEnv = 'Indoor High Definition';

        if (currentCalcEnv === 'indoor') {
            if (distance <= 1.5) {
                recommendedPitch = 1.25;
                pitchString = 'P1.25';
                applicationProfile = 'Broadcast Studio & Executive Boardroom';
            } else if (distance <= 2.2) {
                recommendedPitch = 1.56;
                pitchString = 'P1.5';
                applicationProfile = 'Command & Control Room, Luxury Retail';
            } else if (distance <= 3.2) {
                recommendedPitch = 1.87;
                pitchString = 'P1.8';
                applicationProfile = 'Conference Hall, Corporate Lobbies';
            } else if (distance <= 4.5) {
                recommendedPitch = 2.5;
                pitchString = 'P2.5';
                applicationProfile = 'Auditorium & Commercial Retail Video Wall';
            } else if (distance <= 6.5) {
                recommendedPitch = 3.0;
                pitchString = 'P3.0';
                applicationProfile = 'Shopping Mall Atrium & House of Worship';
            } else if (distance <= 10.0) {
                recommendedPitch = 4.0;
                pitchString = 'P4.0';
                applicationProfile = 'Large Exhibition Hall & Sports Arena Concourse';
            } else {
                recommendedPitch = 5.0;
                pitchString = 'P5.0';
                applicationProfile = 'Grand Indoor Arena & Multi-Level Concourse';
            }
            brightness = '800 - 1,200 Nits';
            ipRating = 'IP30 / IP40 (Indoor)';
            previewEnv = 'Indoor High Definition';
        } else {
            // Outdoor LED
            if (distance <= 4.0) {
                recommendedPitch = 3.9;
                pitchString = 'P3.9';
                applicationProfile = 'Storefront Facade & Pedestrian Plaza';
            } else if (distance <= 7.0) {
                recommendedPitch = 4.8;
                pitchString = 'P4.8';
                applicationProfile = 'Commercial Plaza & Walkway Billboard';
            } else if (distance <= 12.0) {
                recommendedPitch = 6.0;
                pitchString = 'P6.0';
                applicationProfile = 'Roadside Billboard & Commercial Building';
            } else if (distance <= 20.0) {
                recommendedPitch = 8.0;
                pitchString = 'P8.0';
                applicationProfile = 'High-Rise Facade & Highway Pylon Billboard';
            } else {
                recommendedPitch = 10.0;
                pitchString = 'P10.0';
                applicationProfile = 'Massive Overhead Highway & Stadium Screen';
            }
            brightness = '5,500 - 7,500+ Nits';
            ipRating = 'IP65 / IP66 (Weatherproof & Typhoon Proof)';
            previewEnv = 'Outdoor Weatherproof High-Brightness';
        }

        // Resolution & Matrix Calculations
        const widthMm = widthM * 1000;
        const heightMm = heightM * 1000;
        const resX = Math.round(widthMm / recommendedPitch);
        const resY = Math.round(heightMm / recommendedPitch);
        const totalPixels = resX * resY;
        const totalAreaM2 = (widthM * heightM).toFixed(2);
        const pixelDensity = Math.round(1000000 / (recommendedPitch * recommendedPitch));

        // Update DOM elements
        document.getElementById('recommended-pitch').textContent = pitchString;
        document.getElementById('pitch-mm').textContent = recommendedPitch.toString();
        document.getElementById('application-tag').textContent = applicationProfile;

        const resMegapixels = (totalPixels / 1000000).toFixed(2);
        document.getElementById('resolution-badge').textContent = `${resX.toLocaleString()} × ${resY.toLocaleString()} px (${resMegapixels} MP)`;
        document.getElementById('preview-headline').innerHTML = `Crisp & Seamless at ≥ <span id="min-view-dist">${(recommendedPitch * 1.0).toFixed(1)}</span>m`;
        document.getElementById('preview-env-tag').textContent = previewEnv;
        document.getElementById('total-area').textContent = `${totalAreaM2} m²`;

        document.getElementById('spec-distance').textContent = `≥ ${(recommendedPitch * 1.0).toFixed(1)} m`;
        document.getElementById('spec-brightness').textContent = brightness;
        document.getElementById('spec-ip').textContent = ipRating;
        document.getElementById('spec-density').textContent = `${pixelDensity.toLocaleString()} /m²`;

        // Update visual matrix grid density
        const matrixGrid = document.getElementById('simulated-matrix');
        if (matrixGrid) {
            const densityPx = Math.max(3, Math.min(18, Math.round(recommendedPitch * 2.2)));
            matrixGrid.style.backgroundSize = `${densityPx}px ${densityPx}px`;
        }

        // Dynamic Screen Preview Morphing & Modular Cabinet Calculation
        const stage = document.getElementById('screen-stage');
        const frame = document.getElementById('screen-preview-frame');
        const cabinetOverlay = document.getElementById('cabinet-grid-overlay');
        const cabinetsDisplay = document.getElementById('cabinets-display');
        const dimDisplay = document.getElementById('dim-display');
        const envTag = document.getElementById('preview-env-tag');
        const headline = document.getElementById('preview-headline');
        const areaSub = document.getElementById('preview-area-sub');

        if (stage && frame) {
            const padX = window.innerWidth < 640 ? 32 : 56;
            const padY = window.innerWidth < 640 ? 32 : 50;
            const maxW = Math.max(120, stage.clientWidth - padX * 2);
            const maxH = Math.max(80, stage.clientHeight - padY * 2);

            const screenAspect = widthM / heightM;
            const stageAspect = maxW / maxH;

            let finalW, finalH;
            if (screenAspect >= stageAspect) {
                // Wide shape (e.g. ribbon banner, standard 16:9) -> fit to stage width
                finalW = maxW;
                finalH = Math.max(54, Math.round(maxW / screenAspect));
            } else {
                // Tall shape (e.g. portrait totem, 4:3 stage) -> fit to stage height
                finalH = maxH;
                finalW = Math.max(64, Math.round(maxH * screenAspect));
            }

            frame.style.width = `${finalW}px`;
            frame.style.height = `${finalH}px`;

            // Standard LED cabinet sizing: 0.5m x 0.5m (500mm tiles)
            const cols = Math.max(1, Math.round(widthM / 0.5));
            const rows = Math.max(1, Math.round(heightM / 0.5));
            const totalPanels = cols * rows;

            if (cabinetOverlay) {
                cabinetOverlay.style.backgroundSize = `${(100 / cols).toFixed(2)}% ${(100 / rows).toFixed(2)}%`;
            }

            if (cabinetsDisplay) {
                cabinetsDisplay.textContent = `${totalPanels} Panels (${cols}W × ${rows}H)`;
            }

            if (dimDisplay) {
                dimDisplay.textContent = `${widthM.toFixed(2)}m × ${heightM.toFixed(2)}m`;
            }

            // Adaptive inner content presentation for extreme ratios
            if (finalH < 85) {
                // Ultra-wide banner mode
                if (envTag && envTag.parentElement) envTag.parentElement.classList.add('hidden');
                if (headline) headline.className = 'text-xs font-black text-white truncate drop-shadow';
                if (areaSub) areaSub.classList.add('hidden');
            } else if (finalW < 130) {
                // Tall narrow totem mode
                if (envTag && envTag.parentElement) envTag.parentElement.classList.add('hidden');
                if (headline) headline.className = 'text-xs font-black text-white leading-tight drop-shadow';
                if (areaSub) areaSub.classList.remove('hidden');
            } else {
                // Standard comfortable display
                if (envTag && envTag.parentElement) envTag.parentElement.classList.remove('hidden');
                if (headline) headline.className = 'text-sm sm:text-base md:text-lg font-black text-white drop-shadow';
                if (areaSub) areaSub.classList.remove('hidden');
            }
        }
    }

    function requestQuoteFromCalc() {
        const pitchText = document.getElementById('recommended-pitch').textContent.trim();
        const widthM = document.getElementById('calc-width').value;
        const heightM = document.getElementById('calc-height').value;
        const distance = document.getElementById('calc-distance').value;
        const resolution = document.getElementById('resolution-badge').textContent.trim();

        const serviceType = currentCalcEnv === 'indoor' ? 'Indoor High-Resolution LED' : 'Outdoor LED Display Billboard';
        const estimatedSize = `${widthM}m × ${heightM}m (${pitchText})`;
        const notes = `Target Viewing Distance: ${distance} meters.\nCalculated Resolution: ${resolution}.\nConfiguration: ${pitchText} ${currentCalcEnv.toUpperCase()} display.`;

        if (typeof openQuoteModal === 'function') {
            openQuoteModal(serviceType, estimatedSize, notes);
        } else {
            // Fallback: jump to contact form
            window.location.href = '#contact';
        }
    }

    // Initialize calculator on page load and on window resize
    document.addEventListener('DOMContentLoaded', () => {
        updateCalcValues();
    });
    window.addEventListener('resize', () => {
        updateCalcValues();
    });
</script>
@endpush
