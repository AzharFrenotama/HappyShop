@extends('layouts.app')

@section('title', 'Kontak - Happy Shop')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-50 via-white to-pink-50 py-20 overflow-hidden">
        <div class="blob w-96 h-96 bg-primary-300 -top-48 -left-48"></div>
        <div class="blob w-80 h-80 bg-secondary-300 -bottom-40 -right-40" style="animation-delay: 2s;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span class="inline-block px-4 py-2 bg-primary-100 text-primary-600 rounded-full text-sm font-semibold mb-6">
                    Hubungi Kami
                </span>
                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-6">
                    {{ $contactPage->title ?? 'Ada Pertanyaan? Hubungi Kami!' }}
                </h1>
                <p class="text-lg text-gray-600">
                    {{ $contactPage->subtitle ?? 'Tim kami siap membantu Anda menemukan mainan terbaik untuk si kecil. Jangan ragu untuk menghubungi kami!' }}
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8 mb-16">
                <!-- WhatsApp -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-3xl p-8 text-center h-full">
                    <div class="w-20 h-20 bg-green-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">WhatsApp</h3>
                    <p class="text-gray-600 mb-4">Respon cepat dalam hitungan menit</p>
                    <span class="text-green-600 font-bold text-lg">{{ $contactPage->phone ?? '+62 852 0106 0671' }}</span>
                </div>
                
                <!-- Email -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-3xl p-8 text-center h-full">
                    <div class="w-20 h-20 bg-primary-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Email</h3>
                    <p class="text-gray-600 mb-4">Kirim pertanyaan kapan saja</p>
                    <span class="text-primary-600 font-bold text-lg">{{ $contactPage->email ?? 'brebeshappyshop@gmail.com' }}</span>
                </div>
                
                <!-- Location -->
                <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-3xl p-8 text-center h-full">
                    <div class="w-20 h-20 bg-secondary-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Lokasi</h3>
                    <p class="text-gray-600 mb-4">Kunjungi toko kami</p>
                    <span class="text-secondary-600 font-bold">{{ $contactPage->address ?? 'Jl. KH. Ahmad Dahlan, Kabupaten Brebes' }}</span>
                </div>
            </div>
            
            <!-- Operating Hours -->
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl p-8 max-w-2xl mx-auto">
                <h3 class="text-2xl font-bold text-gray-900 text-center mb-6">Jam Operasional</h3>
                <div class="text-center p-6 bg-white rounded-2xl">
                    <p class="font-semibold text-gray-900 mb-2">Setiap Hari</p>
                    <p class="text-primary-600 font-bold text-xl">{{ $contactPage->hours ?? '08.00 - 20.00 WIB' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm overflow-hidden">
                <div class="aspect-video">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63374.844506731286!2d108.92416067132059!3d-6.899240772581821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb0877f1b0b3f%3A0x71c1b4a5de2efbde!2sHappy%20Shop!5e0!3m2!1sen!2sid!4v1770297033754!5m2!1sen!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">
                    💬 Tanya <span class="gradient-text">AI Assistant</span>
                </h2>
                <p class="text-gray-600">Punya pertanyaan? Chat langsung dengan AI Customer Service kami!</p>
            </div>
            
            <!-- Chat Container -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                <!-- Chat Header -->
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4 flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-lg">AI Assistant</h3>
                        <div class="flex items-center gap-1.5">
                            <span id="chat-status-dot" class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                            <span id="chat-status-text" class="text-white/80 text-sm">Online</span>
                        </div>
                    </div>
                    <button onclick="clearChat()" class="ml-auto text-white/60 hover:text-white transition-colors" title="Hapus percakapan">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>

                <!-- Chat Messages Area -->
                <div id="chat-messages" class="h-[400px] sm:h-[450px] overflow-y-auto p-4 sm:p-6 space-y-4 bg-gradient-to-b from-gray-50 to-white scroll-smooth">
                    <!-- Welcome Message -->
                    <div class="flex items-start gap-3 chat-bubble-in">
                        <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-sm">🤖</span>
                        </div>
                        <div class="bg-white rounded-2xl rounded-tl-md px-4 py-3 shadow-sm border border-gray-100 max-w-[85%]">
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Halo! Selamat datang di Happy Shop 🎉<br><br>
                                Saya siap membantu Anda seputar produk mainan, pemesanan, pengiriman, dan lainnya.<br><br>
                                Silakan pilih pertanyaan atau ketik sendiri! 👇
                            </p>
                        </div>
                    </div>

                    <!-- Suggested Questions -->
                    <div id="suggested-questions" class="space-y-2 px-2 chat-bubble-in">
                        <p class="text-xs text-gray-500 font-semibold mb-2">💡 Pertanyaan Populer:</p>
                        <div class="flex flex-wrap gap-2">
                            <button onclick="sendSuggestedQuestion(this)" data-question="Apakah semua mainan sudah bersertifikasi SNI?" class="suggestion-pill bg-white hover:bg-primary-50 border border-primary-200 text-primary-700 px-4 py-2 rounded-full text-xs sm:text-sm font-medium transition-all hover:shadow-md hover:border-primary-400">
                                🏷️ Sertifikasi SNI?
                            </button>
                            <button onclick="sendSuggestedQuestion(this)" data-question="Bagaimana cara memesan produk?" class="suggestion-pill bg-white hover:bg-primary-50 border border-primary-200 text-primary-700 px-4 py-2 rounded-full text-xs sm:text-sm font-medium transition-all hover:shadow-md hover:border-primary-400">
                                🛒 Cara Pesan?
                            </button>
                            <button onclick="sendSuggestedQuestion(this)" data-question="Apakah tersedia layanan pengiriman?" class="suggestion-pill bg-white hover:bg-primary-50 border border-primary-200 text-primary-700 px-4 py-2 rounded-full text-xs sm:text-sm font-medium transition-all hover:shadow-md hover:border-primary-400">
                                🚚 Pengiriman?
                            </button>
                            <button onclick="sendSuggestedQuestion(this)" data-question="Jam buka toko Happy Shop?" class="suggestion-pill bg-white hover:bg-primary-50 border border-primary-200 text-primary-700 px-4 py-2 rounded-full text-xs sm:text-sm font-medium transition-all hover:shadow-md hover:border-primary-400">
                                ⏰ Jam Buka?
                            </button>
                            <button onclick="sendSuggestedQuestion(this)" data-question="Apakah ada garansi untuk produk?" class="suggestion-pill bg-white hover:bg-primary-50 border border-primary-200 text-primary-700 px-4 py-2 rounded-full text-xs sm:text-sm font-medium transition-all hover:shadow-md hover:border-primary-400">
                                ✅ Garansi?
                            </button>
                            <button onclick="sendSuggestedQuestion(this)" data-question="Mainan apa yang cocok untuk anak umur 3 tahun?" class="suggestion-pill bg-white hover:bg-primary-50 border border-primary-200 text-primary-700 px-4 py-2 rounded-full text-xs sm:text-sm font-medium transition-all hover:shadow-md hover:border-primary-400">
                                👶 Rekomendasi Umur?
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Typing Indicator (Hidden by default) -->
                <div id="typing-indicator" class="hidden px-4 sm:px-6 pb-2">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-sm">🤖</span>
                        </div>
                        <div class="bg-white rounded-2xl rounded-tl-md px-4 py-3 shadow-sm border border-gray-100">
                            <div class="flex gap-1.5 items-center h-5">
                                <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0ms"></span>
                                <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 150ms"></span>
                                <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 300ms"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chat Input Area -->
                <div class="border-t border-gray-100 p-4 sm:p-5 bg-white">
                    <form id="chat-form" onsubmit="sendMessage(event)" class="flex gap-3">
                        <input 
                            type="text" 
                            id="chat-input" 
                            placeholder="Ketik pertanyaan Anda..." 
                            maxlength="500"
                            autocomplete="off"
                            class="flex-1 px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent focus:bg-white transition-all text-sm placeholder-gray-400"
                        >
                        <button 
                            type="submit" 
                            id="chat-send-btn"
                            class="px-5 py-3 bg-primary-500 hover:bg-primary-600 disabled:bg-gray-300 disabled:cursor-not-allowed text-white rounded-xl transition-all flex items-center gap-2 font-semibold text-sm"
                        >
                            <span class="hidden sm:inline">Kirim</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                        </button>
                    </form>
                    <p class="text-xs text-gray-400 mt-2 text-center">
                        AI dapat membuat kesalahan. Untuk info pasti, hubungi WhatsApp kami.
                    </p>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
    <style>
        .chat-bubble-in {
            animation: bubbleIn 0.3s ease-out;
        }
        @keyframes bubbleIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .suggestion-pill {
            animation: slideIn 0.4s ease-out;
            animation-fill-mode: both;
        }
        .suggestion-pill:nth-child(1) { animation-delay: 0.05s; }
        .suggestion-pill:nth-child(2) { animation-delay: 0.1s; }
        .suggestion-pill:nth-child(3) { animation-delay: 0.15s; }
        .suggestion-pill:nth-child(4) { animation-delay: 0.2s; }
        .suggestion-pill:nth-child(5) { animation-delay: 0.25s; }
        .suggestion-pill:nth-child(6) { animation-delay: 0.3s; }
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-15px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .suggestion-pill:active {
            transform: scale(0.95);
        }
        #chat-messages::-webkit-scrollbar {
            width: 6px;
        }
        #chat-messages::-webkit-scrollbar-track {
            background: transparent;
        }
        #chat-messages::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 3px;
        }
        #chat-messages::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        const chatMessages = document.getElementById('chat-messages');
        const chatInput = document.getElementById('chat-input');
        const chatSendBtn = document.getElementById('chat-send-btn');
        const typingIndicator = document.getElementById('typing-indicator');
        const statusDot = document.getElementById('chat-status-dot');
        const statusText = document.getElementById('chat-status-text');
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}';
        
        let conversationHistory = [];
        let isLoading = false;

        function scrollToBottom() {
            chatMessages.scrollTo({ top: chatMessages.scrollHeight, behavior: 'smooth' });
        }

        function hideSuggestions() {
            const suggestions = document.getElementById('suggested-questions');
            if (suggestions) {
                suggestions.style.transition = 'opacity 0.3s ease-out, transform 0.3s ease-out';
                suggestions.style.opacity = '0';
                suggestions.style.transform = 'translateY(-10px)';
                setTimeout(() => suggestions.remove(), 300);
            }
        }

        function sendSuggestedQuestion(buttonElement) {
            const question = buttonElement.getAttribute('data-question');
            if (!question || isLoading) return;

            // Set input value and trigger form submission
            chatInput.value = question;
            document.getElementById('chat-form').dispatchEvent(new Event('submit'));
        }

        function addMessage(content, role) {
            const wrapper = document.createElement('div');
            wrapper.className = 'chat-bubble-in';

            if (role === 'user') {
                wrapper.className += ' flex justify-end';
                wrapper.innerHTML = `
                    <div class="bg-primary-500 text-white rounded-2xl rounded-tr-md px-4 py-3 shadow-sm max-w-[85%]">
                        <p class="text-sm leading-relaxed">${escapeHtml(content)}</p>
                    </div>
                `;
            } else {
                wrapper.innerHTML = `
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-sm">🤖</span>
                        </div>
                        <div class="bg-white rounded-2xl rounded-tl-md px-4 py-3 shadow-sm border border-gray-100 max-w-[85%]">
                            <div class="text-gray-700 text-sm leading-relaxed ai-response">${formatResponse(content)}</div>
                        </div>
                    </div>
                `;
            }

            chatMessages.appendChild(wrapper);
            scrollToBottom();
        }

        function addErrorMessage(message) {
            const wrapper = document.createElement('div');
            wrapper.className = 'chat-bubble-in';
            wrapper.innerHTML = `
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-sm">⚠️</span>
                    </div>
                    <div class="bg-red-50 rounded-2xl rounded-tl-md px-4 py-3 shadow-sm border border-red-100 max-w-[85%]">
                        <p class="text-red-600 text-sm leading-relaxed">${escapeHtml(message)}</p>
                    </div>
                </div>
            `;
            chatMessages.appendChild(wrapper);
            scrollToBottom();
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        function formatResponse(text) {
            // Convert markdown-like formatting
            let html = escapeHtml(text);
            // Bold: **text**
            html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            // Line breaks
            html = html.replace(/\n/g, '<br>');
            // Bullet points: - text or • text
            html = html.replace(/^[-•]\s(.+)/gm, '<span class="flex items-start gap-1"><span class="text-primary-500">•</span><span>$1</span></span>');
            return html;
        }

        function setLoading(loading) {
            isLoading = loading;
            chatInput.disabled = loading;
            chatSendBtn.disabled = loading;
            typingIndicator.classList.toggle('hidden', !loading);
            
            if (loading) {
                statusText.textContent = 'Mengetik...';
                statusDot.className = 'w-2 h-2 bg-yellow-400 rounded-full animate-pulse';
            } else {
                statusText.textContent = 'Online';
                statusDot.className = 'w-2 h-2 bg-green-400 rounded-full animate-pulse';
            }

            if (loading) scrollToBottom();
        }

        async function sendMessage(e) {
            e.preventDefault();
            
            const message = chatInput.value.trim();
            if (!message || isLoading) return;

            // Hide suggested questions on first message
            hideSuggestions();

            // Add user message to UI & history
            addMessage(message, 'user');
            conversationHistory.push({ role: 'user', content: message });
            chatInput.value = '';
            
            setLoading(true);

            try {
                const response = await fetch('{{ route("ai.chat") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        message: message,
                        history: conversationHistory.slice(-18), // Last 18 messages max
                    }),
                });

                const data = await response.json();

                if (data.success && data.reply) {
                    addMessage(data.reply, 'assistant');
                    conversationHistory.push({ role: 'assistant', content: data.reply });
                } else {
                    const errorMsg = data.message || 'Maaf, terjadi kesalahan. Silakan coba lagi.';
                    addErrorMessage(errorMsg);
                }
            } catch (error) {
                console.error('Chat error:', error);
                addErrorMessage('Koneksi gagal. Periksa internet Anda dan coba lagi.');
            } finally {
                setLoading(false);
                chatInput.focus();
            }
        }

        function clearChat() {
            if (!confirm('Hapus semua percakapan?')) return;
            conversationHistory = [];
            chatMessages.innerHTML = `
                <div class="flex items-start gap-3 chat-bubble-in">
                    <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-sm">🤖</span>
                    </div>
                    <div class="bg-white rounded-2xl rounded-tl-md px-4 py-3 shadow-sm border border-gray-100 max-w-[85%]">
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Halo! Selamat datang di Happy Shop 🎉<br><br>
                            Saya siap membantu Anda seputar produk mainan, pemesanan, pengiriman, dan lainnya.<br><br>
                            Silakan pilih pertanyaan atau ketik sendiri! 👇
                        </p>
                    </div>
                </div>

                <!-- Suggested Questions -->
                <div id="suggested-questions" class="space-y-2 px-2 chat-bubble-in">
                    <p class="text-xs text-gray-500 font-semibold mb-2">💡 Pertanyaan Populer:</p>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="sendSuggestedQuestion(this)" data-question="Apakah semua mainan sudah bersertifikasi SNI?" class="suggestion-pill bg-white hover:bg-primary-50 border border-primary-200 text-primary-700 px-4 py-2 rounded-full text-xs sm:text-sm font-medium transition-all hover:shadow-md hover:border-primary-400">
                            🏷️ Sertifikasi SNI?
                        </button>
                        <button onclick="sendSuggestedQuestion(this)" data-question="Bagaimana cara memesan produk?" class="suggestion-pill bg-white hover:bg-primary-50 border border-primary-200 text-primary-700 px-4 py-2 rounded-full text-xs sm:text-sm font-medium transition-all hover:shadow-md hover:border-primary-400">
                            🛒 Cara Pesan?
                        </button>
                        <button onclick="sendSuggestedQuestion(this)" data-question="Apakah tersedia layanan pengiriman?" class="suggestion-pill bg-white hover:bg-primary-50 border border-primary-200 text-primary-700 px-4 py-2 rounded-full text-xs sm:text-sm font-medium transition-all hover:shadow-md hover:border-primary-400">
                            🚚 Pengiriman?
                        </button>
                        <button onclick="sendSuggestedQuestion(this)" data-question="Jam buka toko Happy Shop?" class="suggestion-pill bg-white hover:bg-primary-50 border border-primary-200 text-primary-700 px-4 py-2 rounded-full text-xs sm:text-sm font-medium transition-all hover:shadow-md hover:border-primary-400">
                            ⏰ Jam Buka?
                        </button>
                        <button onclick="sendSuggestedQuestion(this)" data-question="Apakah ada garansi untuk produk?" class="suggestion-pill bg-white hover:bg-primary-50 border border-primary-200 text-primary-700 px-4 py-2 rounded-full text-xs sm:text-sm font-medium transition-all hover:shadow-md hover:border-primary-400">
                            ✅ Garansi?
                        </button>
                        <button onclick="sendSuggestedQuestion(this)" data-question="Mainan apa yang cocok untuk anak umur 3 tahun?" class="suggestion-pill bg-white hover:bg-primary-50 border border-primary-200 text-primary-700 px-4 py-2 rounded-full text-xs sm:text-sm font-medium transition-all hover:shadow-md hover:border-primary-400">
                            👶 Rekomendasi Umur?
                        </button>
                    </div>
                </div>
            `;
        }

        // Enter to send, Shift+Enter for new line (not applicable for single-line input)
        chatInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                document.getElementById('chat-form').dispatchEvent(new Event('submit'));
            }
        });
    </script>
    @endpush

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-secondary-500 to-primary-500 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold mb-4">
                Butuh Bantuan Memilih Mainan?
            </h2>
            <p class="text-xl text-white/90 mb-8">
                Tim kami siap membantu Anda menemukan mainan yang tepat sesuai usia dan minat anak
            </p>
            <a href="https://wa.me/6285201060671?text={{ urlencode('Halo, saya butuh bantuan untuk memilih mainan') }}" target="_blank" class="inline-flex items-center px-8 py-4 bg-white text-primary-600 font-bold rounded-full hover:bg-gray-100 transform hover:scale-105 transition-all shadow-lg">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Chat via WhatsApp
            </a>
        </div>
    </section>
@endsection
