@extends('layouts.app')

@section('title', 'Tentang Kami - Happy Shop')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-50 via-white to-pink-50 py-20 overflow-hidden">
        <div class="blob w-96 h-96 bg-primary-300 -top-48 -right-48"></div>
        <div class="blob w-80 h-80 bg-secondary-300 -bottom-40 -left-40" style="animation-delay: 2s;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span class="inline-block px-4 py-2 bg-primary-100 text-primary-600 rounded-full text-sm font-semibold mb-6">
                    Tentang Kami
                </span>
                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-6">
                    Selamat Datang di <span class="gradient-text">Happy Shop</span>
                </h1>
                <p class="text-lg text-gray-600">
                    Toko mainan anak terpercaya yang berkomitmen menghadirkan kebahagiaan dan mendukung perkembangan si kecil melalui mainan berkualitas.
                </p>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-6">
                        📖 Cerita <span class="gradient-text">Kami</span>
                    </h2>
                    <div class="space-y-4 text-gray-600">
                        <p>
                            <strong class="text-gray-900">Happy Shop</strong> hadir di brebes tgl 6 januari 2016, dan Alhamdulillah sampai saat ini masih memenuhi pelanggan kami untuk yang memerlukan pernak pernik Ultah, mainan anak, boneka, aneka buket dan asesoris lainnya
                        </p>
                        <p>
                            Alhamdulillah, hingga saat ini Happy Shop tetap dipercaya oleh pelanggan setia kami. Kami terus berusaha memenuhi kebutuhan berbagai pernak-pernik ulang tahun, mulai dari dekorasi, balon, lilin, hingga perlengkapan pesta lainnya. Selain itu, kami juga menyediakan beragam mainan anak, boneka lucu, aneka buket untuk berbagai momen spesial, serta aksesori menarik lainnya.
                        </p>
                        <p>
                            Dengan pelayanan yang ramah dan koleksi produk yang selalu diperbarui mengikuti tren, Happy Shop siap menjadi pilihan utama Anda untuk melengkapi setiap momen bahagia bersama keluarga dan orang-orang tercinta.
                        </p>
                    </div>
                </div>
                <div class="relative">
                    {{-- Gambar About: taruh file di public/images/about.jpg atau about.png --}}
                    <div class="bg-gradient-to-br from-primary-100 to-secondary-100 rounded-3xl overflow-hidden">
                        @if(file_exists(public_path('images/about.jpg')))
                            <img src="{{ asset('images/about.jpg') }}" alt="Tentang Happy Shop" class="w-full h-auto object-cover">
                        @elseif(file_exists(public_path('images/about.png')))
                            <img src="{{ asset('images/about.png') }}" alt="Tentang Happy Shop" class="w-full h-auto object-cover">
                        @else
                            <div class="p-8 text-center">
                                <div class="text-8xl mb-4">🧸</div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">Sejak 2020</h3>
                                <p class="text-gray-600">Melayani keluarga Indonesia</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission Section -->
    <section class="py-20 bg-gradient-to-br from-primary-900 via-primary-800 to-primary-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12">
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-secondary-400 to-secondary-500 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Visi Kami</h3>
                    <p class="text-gray-300">
                        Menjadi toko pilihan utama di Brebes yang menghadirkan kebahagiaan dan kesejahteraan bagi owner, karyawan, serta pelanggan melalui produk dan pelayanan terbaik.
                    </p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-secondary-400 to-secondary-500 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Misi Kami</h3>
                    <ul class="text-gray-300 space-y-2">
                        <li class="flex items-start">
                            <span class="text-secondary-400 mr-2">✓</span>
                            Memberikan pelayanan terbaik dan profesional.
                        </li>
                        <li class="flex items-start">
                            <span class="text-secondary-400 mr-2">✓</span>
                            Menyediakan produk yang lengkap dan berkualitas.
                        </li>
                        <li class="flex items-start">
                            <span class="text-secondary-400 mr-2">✓</span>
                            Meningkatkan penjualan secara berkelanjutan.
                        </li>
                        <li class="flex items-start">
                            <span class="text-secondary-400 mr-2">✓</span>
                            Menciptakan kerja sama tim yang solid dan produktif.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Mascot Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Mascot Image on Left -->
                <div class="relative">
                    <div class="aspect-square rounded-3xl overflow-hidden shadow-2xl bg-gradient-to-br from-primary-100 to-secondary-100">
                        @if(file_exists(public_path('images/mascot.jpg')))
                            <img src="{{ asset('images/mascot.jpg') }}" alt="Maskot Happy Shop" class="w-full h-full object-cover">
                        @elseif(file_exists(public_path('images/mascot.png')))
                            <img src="{{ asset('images/mascot.png') }}" alt="Maskot Happy Shop" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="text-[12rem]">🧸</span>
                            </div>
                        @endif
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-secondary-200 rounded-full opacity-50 -z-10"></div>
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-primary-200 rounded-full opacity-50 -z-10"></div>
                </div>
                
                <!-- Mascot Description on Right -->
                <div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-6">
                        🧸 Kenalan dengan <span class="gradient-text">Happy Bear</span>
                    </h2>
                    <div class="space-y-4 text-gray-600">
                        <p>
                            <strong class="text-gray-900">Happy Bear</strong> adalah maskot resmi Happy Shop yang menemani setiap petualangan belanja kamu! Dengan senyuman hangatnya, Happy Bear selalu siap menyambut setiap pengunjung dengan penuh kebahagiaan.
                        </p>
                        <p>
                            Happy Bear lahir dari mimpi untuk menciptakan teman bermain yang selalu ada untuk anak-anak Indonesia. Dia percaya bahwa setiap anak berhak mendapatkan mainan yang aman, berkualitas, dan pastinya menyenangkan!
                        </p>
                        <p>
                            Sebagai sahabat setia Happy Shop, Happy Bear selalu memastikan bahwa setiap produk yang kami jual sudah melewati standar keamanan dan kualitas terbaik. Karena kebahagiaan si kecil adalah prioritas utama kami!
                        </p>
                    </div>
                    
                    <!-- Mascot Facts -->
                    <div class="mt-8 p-6 bg-gradient-to-br from-primary-50 to-secondary-50 rounded-2xl">
                        <h3 class="font-bold text-gray-900 mb-4">🌟 Fakta Seru tentang Happy Bear:</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <span class="text-secondary-500 mr-2">💖</span>
                                Warna favorit: Biru dan Pink (seperti logo Happy Shop!)
                            </li>
                            <li class="flex items-start">
                                <span class="text-secondary-500 mr-2">🎈</span>
                                Hobi: Bermain puzzle dan membangun lego
                            </li>
                            <li class="flex items-start">
                                <span class="text-secondary-500 mr-2">🍬</span>
                                Makanan favorit: Es krim strawberry
                            </li>
                            <li class="flex items-start">
                                <span class="text-secondary-500 mr-2">✨</span>
                                Motto: "Bermain adalah belajar yang menyenangkan!"
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-secondary-500 to-primary-500 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold mb-4">
                Mari Berbelanja Bersama Kami!
            </h2>
            <p class="text-xl text-white/90 mb-8">
                Temukan mainan terbaik untuk si kecil sekarang juga
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-primary-600 font-bold rounded-full hover:bg-gray-100 transform hover:scale-105 transition-all shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    Lihat Produk
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-primary-600 transition-all">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>
@endsection
