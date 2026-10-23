<!-- Request a Quote & Project Inquiry Modal -->
<div id="quote-modal" 
     class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-3 sm:p-6 overflow-y-auto hidden opacity-0 transition-opacity duration-300"
     role="dialog"
     aria-modal="true"
     aria-labelledby="quote-modal-title">
    
    <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden my-auto transform scale-95 transition-transform duration-300"
         id="quote-modal-card">
        
        <!-- Modal Top Header Banner -->
        <div class="bg-gradient-to-r from-[#003896] to-[#0047ba] text-white p-6 sm:p-8 relative">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-white/15 text-blue-100 text-[10px] sm:text-[11px] font-black uppercase tracking-wider mb-2 border border-white/20">
                <i class="fa-solid fa-calculator"></i>
                <span>Direct B2B Sales & Engineering</span>
            </div>
            <h3 id="quote-modal-title" class="text-xl sm:text-2xl font-black tracking-tight text-white">
                Request a Project Quote
            </h3>
            <p class="text-blue-100 text-xs sm:text-sm mt-1 leading-relaxed">
                Tell us about your LED screen, billboard, or digital display requirements. Our technical sales team will provide a tailored proposal.
            </p>

            <button type="button" 
                    onclick="closeQuoteModal()" 
                    class="absolute top-5 right-5 w-9 h-9 rounded-full bg-white/10 hover:bg-white/25 text-white flex items-center justify-center transition-all focus:outline-none cursor-pointer"
                    aria-label="Close modal">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>

        <!-- Modal Body & Form -->
        <div class="p-6 sm:p-8 max-h-[75vh] overflow-y-auto">
            
            <!-- Success Notification Alert -->
            <div id="quote-success-box" class="hidden mb-6 p-5 rounded-2xl bg-emerald-50 border border-emerald-200 text-center">
                <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto mb-3 text-lg">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <h4 class="text-base font-extrabold text-emerald-900 mb-1">Inquiry Submitted Successfully!</h4>
                <p id="quote-success-msg" class="text-xs text-emerald-700 leading-relaxed max-w-md mx-auto">
                    Thank you! Your quote request has been received. Our sales engineering team will review your specs and contact you within 24 business hours.
                </p>
                <button type="button" 
                        onclick="closeQuoteModal()" 
                        class="mt-4 px-6 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition-all shadow-md">
                    Done
                </button>
            </div>

            <!-- Error Notification Alert -->
            <div id="quote-error-box" class="hidden mb-5 p-4 rounded-xl bg-rose-50 border border-rose-200 text-xs text-rose-700">
                <p class="font-bold flex items-center gap-1.5 mb-1 text-rose-800">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span>Please correct the errors below:</span>
                </p>
                <ul id="quote-error-list" class="list-disc pl-5 space-y-0.5"></ul>
            </div>

            <form id="quote-inquiry-form" onsubmit="submitQuoteInquiry(event)" class="space-y-4">
                @csrf
                
                <!-- Anti-spam Honeypot Field (hidden from genuine users) -->
                <div class="hidden" aria-hidden="true">
                    <input type="text" name="website_hp" tabindex="-1" autocomplete="off">
                </div>

                <!-- Row 1: Full Name & Company -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Full Name <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="name" 
                               id="quote-name"
                               autocomplete="name"
                               required 
                               placeholder="e.g. Juan dela Cruz" 
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Company / Organization
                        </label>
                        <input type="text" 
                               name="company" 
                               id="quote-company"
                               autocomplete="organization"
                               placeholder="e.g. Ayala Land / SM Malls" 
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all">
                    </div>
                </div>

                <!-- Row 2: Email & Phone/Mobile -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Work Email <span class="text-rose-500">*</span>
                        </label>
                        <input type="email" 
                               name="email" 
                               id="quote-email"
                               autocomplete="email"
                               required 
                               placeholder="juan@company.com" 
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Contact / Mobile / Viber <span class="text-rose-500">*</span>
                        </label>
                        <input type="tel" 
                               name="phone" 
                               id="quote-phone"
                               autocomplete="tel"
                               required 
                               placeholder="0917 123 4567 or (02) 8123-4567" 
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all">
                    </div>
                </div>

                <!-- Row 3: Solution Type & Estimated Screen Size / Pitch -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Solution Interested In <span class="text-rose-500">*</span>
                        </label>
                        <select name="service_type" 
                                id="quote-service-type" 
                                required
                                class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all cursor-pointer">
                            <option value="">Select display category...</option>
                            <option value="Outdoor LED Display Billboard">Outdoor LED Display Billboard</option>
                            <option value="Indoor High-Resolution LED">Indoor High-Resolution LED</option>
                            <option value="Digital iPosters & Portable Kiosks">Digital iPosters & Portable Kiosks</option>
                            <option value="Philips Commercial Displays">Philips Commercial Displays</option>
                            <option value="AVer Video Conferencing Systems">AVer Video Conferencing Systems</option>
                            <option value="Video Wall & Matrix System">Video Wall & Matrix System</option>
                            <option value="DOOH Ad Placement & Rental">DOOH Ad Placement & Rental</option>
                            <option value="Other Custom Digital Engineering">Other Custom Digital Engineering</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Estimated Size / Pixel Pitch
                        </label>
                        <input type="text" 
                               name="estimated_size" 
                               id="quote-estimated-size"
                               autocomplete="off"
                               placeholder="e.g. 6m x 4m (P4 Outdoor) or 100 inches" 
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all">
                    </div>
                </div>

                <!-- Row 4: Project Location & Target Timeline -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Project Location / City
                        </label>
                        <input type="text" 
                               name="project_location" 
                               id="quote-location"
                               autocomplete="address-level2"
                               placeholder="e.g. BGC Taguig, Makati, Cebu City" 
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Target Implementation Timeline
                        </label>
                        <select name="timeline" 
                                id="quote-timeline" 
                                class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all cursor-pointer">
                            <option value="">Select target timeline...</option>
                            <option value="Immediate / Urgent (Within 30 Days)">Immediate / Urgent (Within 30 Days)</option>
                            <option value="1 to 3 Months">1 to 3 Months</option>
                            <option value="3 to 6 Months">3 to 6 Months</option>
                            <option value="Budgeting & Planning Phase">Budgeting & Planning Phase</option>
                        </select>
                    </div>
                </div>

                <!-- Row 5: Detailed Message -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Project Details / Notes <span class="text-rose-500">*</span>
                    </label>
                    <textarea name="message" 
                              id="quote-message" 
                              rows="3" 
                              required
                              placeholder="Please describe your site requirements, viewing distance, whether it will be wall-mounted, free-standing, or any specific brand specs..." 
                              class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all resize-none"></textarea>
                </div>

                <!-- Row 6: Data Privacy Consent -->
                <div class="pt-1">
                    <label class="flex items-start space-x-2.5 cursor-pointer select-none">
                        <input type="checkbox" 
                               name="privacy_consent" 
                               id="quote-privacy-consent" 
                               required 
                               class="mt-0.5 w-4 h-4 rounded text-[#0047ba] focus:ring-[#0047ba] border-slate-300">
                        <span class="text-[11px] sm:text-xs text-slate-500 leading-normal">
                            I understand and agree that my submitted information will be processed by Globaltronics, Inc. in accordance with the <a href="{{ route('privacy.policy') }}" target="_blank" class="text-[#0047ba] underline hover:text-blue-700 font-semibold">Data Privacy Act of 2012</a> for preparing this quotation and coordinating project requirements.
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-2 flex items-center justify-end gap-3">
                    <button type="button" 
                            onclick="closeQuoteModal()" 
                            class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-bold transition-all">
                        Cancel
                    </button>
                    <button type="submit" 
                            id="quote-submit-btn"
                            class="px-7 py-2.5 rounded-xl bg-[#0047ba] hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-md shadow-blue-500/25 flex items-center gap-2 active:scale-95 cursor-pointer">
                        <i class="fa-solid fa-paper-plane text-xs"></i>
                        <span>Submit Quote Request</span>
                    </button>
                </div>

            </form>

        </div>

    </div>
</div>

<script>
    function openQuoteModal(serviceType = '', estimatedSize = '', notes = '') {
        const modal = document.getElementById('quote-modal');
        const card = document.getElementById('quote-modal-card');
        const form = document.getElementById('quote-inquiry-form');
        const successBox = document.getElementById('quote-success-box');
        const errorBox = document.getElementById('quote-error-box');

        if (!modal || !card) return;

        // Reset UI alerts
        if (successBox) successBox.classList.add('hidden');
        if (errorBox) errorBox.classList.add('hidden');
        if (form) form.classList.remove('hidden');

        // Pre-fill parameters if provided (e.g. from LED Calculator or buttons)
        if (serviceType) {
            const serviceSelect = document.getElementById('quote-service-type');
            if (serviceSelect) {
                serviceSelect.value = serviceType;
                if (!serviceSelect.value) {
                    const lower = serviceType.toLowerCase();
                    for (const opt of serviceSelect.options) {
                        if (opt.value.toLowerCase().includes(lower) || lower.includes(opt.value.toLowerCase())) {
                            serviceSelect.value = opt.value;
                            break;
                        }
                    }
                }
            }
        }
        if (estimatedSize) {
            const sizeInput = document.getElementById('quote-estimated-size');
            if (sizeInput) sizeInput.value = estimatedSize;
        }
        if (notes) {
            const msgInput = document.getElementById('quote-message');
            if (msgInput) msgInput.value = notes;
        }

        modal.classList.remove('hidden');
        requestAnimationFrame(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            card.classList.remove('scale-95');
            card.classList.add('scale-100');
        });

        document.body.style.overflow = 'hidden';
    }

    function closeQuoteModal() {
        const modal = document.getElementById('quote-modal');
        const card = document.getElementById('quote-modal-card');

        if (!modal || !card) return;

        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        card.classList.remove('scale-100');
        card.classList.add('scale-95');

        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }

    function submitQuoteInquiry(e) {
        e.preventDefault();

        const form = document.getElementById('quote-inquiry-form');
        const btn = document.getElementById('quote-submit-btn');
        const successBox = document.getElementById('quote-success-box');
        const errorBox = document.getElementById('quote-error-box');
        const errorList = document.getElementById('quote-error-list');

        if (!form || !btn) return;

        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-xs"></i> <span>Submitting...</span>';
        if (errorBox) errorBox.classList.add('hidden');
        if (errorList) errorList.innerHTML = '';

        const formData = new FormData(form);

        fetch("{{ route('inquiries.submit') }}", {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(res => res.json().then(data => ({ status: res.status, body: data })))
        .then(result => {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-paper-plane text-xs"></i> <span>Submit Quote Request</span>';

            if (result.status === 200 && result.body.success) {
                form.classList.add('hidden');
                if (successBox) {
                    document.getElementById('quote-success-msg').textContent = result.body.message;
                    successBox.classList.remove('hidden');
                }
                form.reset();
            } else {
                if (errorBox) errorBox.classList.remove('hidden');
                if (result.body.errors && errorList) {
                    Object.values(result.body.errors).forEach(arr => {
                        arr.forEach(msg => {
                            const li = document.createElement('li');
                            li.textContent = msg;
                            errorList.appendChild(li);
                        });
                    });
                } else if (errorList) {
                    const li = document.createElement('li');
                    li.textContent = result.body.message || 'Something went wrong. Please check your inputs.';
                    errorList.appendChild(li);
                }
            }
        })
        .catch(err => {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-paper-plane text-xs"></i> <span>Submit Quote Request</span>';
            if (errorBox) errorBox.classList.remove('hidden');
            if (errorList) {
                const li = document.createElement('li');
                li.textContent = 'Unable to send quote request right now. Please call (02) 8721-2878 or try again.';
                errorList.appendChild(li);
            }
        });
    }

    window.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('quote-modal');
            if (modal && !modal.classList.contains('hidden')) {
                closeQuoteModal();
            }
        }
    });
</script>
