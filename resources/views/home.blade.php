@extends('layouts.app')

@section('title', 'Happy Shop - Toko Mainan Anak Terlengkap')

@section('content')
    {{-- 
        =============================================
        HERO SECTION - Edit teks dan gambar di sini
        =============================================
        Gambar Hero: taruh file di public/images/hero.jpg
    --}}
    <section class="relative min-h-[90vh] flex items-center overflow-hidden bg-gradient-to-br from-blue-50 via-white to-pink-50">
        <!-- Decorative Blobs -->
        <div class="blob w-96 h-96 bg-primary-300 -top-48 -left-48"></div>
        <div class="blob w-80 h-80 bg-secondary-300 -bottom-40 -right-40" style="animation-delay: 2s;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left">
                    <span class="inline-block px-4 py-2 bg-secondary-100 text-secondary-600 rounded-full text-sm font-semibold mb-6">
                        🎈 Selamat Datang di Toko Mainan Anak
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                        Temukan <span class="gradient-text">Kebahagiaan</span> untuk Si Kecil
                    </h1>
                    <p class="text-lg text-gray-600 mb-8 max-w-xl mx-auto lg:mx-0">
                        Koleksi mainan berkualitas yang aman dan edukatif untuk perkembangan anak Anda. Dari boneka lucu hingga puzzle menarik!
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-primary-500 to-primary-600 text-white font-bold rounded-full hover:from-primary-600 hover:to-primary-700 transform hover:scale-105 transition-all shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            Lihat Produk
                        </a>
                        <a href="{{ route('about') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-primary-600 font-bold rounded-full border-2 border-primary-200 hover:border-primary-400 hover:bg-primary-50 transition-all">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Tentang Kami
                        </a>
                    </div>
                </div>
                <div class="relative hidden lg:block">
                    <!-- Hero Image: ganti file public/images/hero.jpg -->
                    <div class="w-full aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl">
                        @if(file_exists(public_path('images/hero.jpg')))
                            <img 
                                src="{{ asset('images/hero.jpg') }}" 
                                alt="Happy Shop"
                                class="w-full h-full object-cover"
                            >
                        @elseif(file_exists(public_path('images/hero.png')))
                            <img 
                                src="{{ asset('images/hero.png') }}" 
                                alt="Happy Shop"
                                class="w-full h-full object-cover"
                            >
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary-100 to-secondary-100 flex items-center justify-center">
                                <div class="text-center p-8">
                                    <span class="text-8xl">🧸</span>
                                    <p class="text-2xl font-bold text-primary-600 mt-4">Mainan Berkualitas</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">
                    Kategori <span class="gradient-text">Mainan</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Temukan berbagai jenis mainan sesuai kebutuhan dan minat si kecil
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                @forelse($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="group">
                        <div class="bg-gradient-to-br from-primary-50 to-secondary-50 rounded-2xl p-6 text-center card-hover">
                            <div class="text-4xl mb-3">{{ $category->icon ?? '🎁' }}</div>
                            <h3 class="font-bold text-gray-900 group-hover:text-primary-600 transition-colors">{{ $category->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $category->active_products_count }} produk</p>
                        </div>
                    </a>
                @empty
                    @foreach(['🧸 Boneka', '🧩 Puzzle', '🎮 Action Figure', '🚗 Kendaraan', '🎨 Mainan Edukatif', '🎲 Board Games'] as $index => $cat)
                        <div class="bg-gradient-to-br from-primary-50 to-secondary-50 rounded-2xl p-6 text-center card-hover">
                            <div class="text-4xl mb-3">{{ explode(' ', $cat)[0] }}</div>
                            <h3 class="font-bold text-gray-900">{{ explode(' ', $cat, 2)[1] ?? $cat }}</h3>
                            <p class="text-sm text-gray-500 mt-1">0 produk</p>
                        </div>
                    @endforeach
                @endforelse
            </div>
        </div>
    </section>

    <!-- Best Seller Section -->
    <section class="py-20 bg-gradient-to-br from-blue-50 via-white to-pink-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-12">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-2">
                        ⭐ <span class="gradient-text">Best Seller</span>
                    </h2>
                    <p class="text-gray-600">Produk terlaris pilihan pelanggan</p>
                </div>
                <a href="{{ route('products.index', ['sort' => 'popular']) }}" class="mt-4 sm:mt-0 inline-flex items-center text-primary-600 font-semibold hover:text-primary-700">
                    Lihat Semua
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($bestsellerProducts as $product)
                    @include('components.product-card', ['product' => $product])
                @empty
                    @for($i = 0; $i < 4; $i++)
                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden card-hover">
                            <div class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                <span class="text-6xl opacity-50">🧸</span>
                            </div>
                            <div class="p-4">
                                <span class="text-xs text-primary-600 font-semibold">Kategori</span>
                                <h3 class="font-bold text-gray-900 mt-1">Nama Produk</h3>
                                <p class="text-lg font-bold text-secondary-600 mt-2">Rp 100.000</p>
                            </div>
                        </div>
                    @endfor
                @endforelse
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-12">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-2">
                        Produk <span class="gradient-text">Unggulan</span>
                    </h2>
                    <p class="text-gray-600">Rekomendasi produk terbaik untuk si kecil</p>
                </div>
                <a href="{{ route('products.index') }}" class="mt-4 sm:mt-0 inline-flex items-center text-primary-600 font-semibold hover:text-primary-700">
                    Lihat Semua
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($featuredProducts as $product)
                    @include('components.product-card', ['product' => $product])
                @empty
                    @for($i = 0; $i < 8; $i++)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover">
                            <div class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                <span class="text-6xl opacity-50">🎮</span>
                            </div>
                            <div class="p-4">
                                <span class="text-xs text-primary-600 font-semibold">Kategori</span>
                                <h3 class="font-bold text-gray-900 mt-1">Nama Produk</h3>
                                <p class="text-lg font-bold text-secondary-600 mt-2">Rp 150.000</p>
                            </div>
                        </div>
                    @endfor
                @endforelse
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 bg-gradient-to-br from-primary-900 via-primary-800 to-primary-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wMyI+PHBhdGggZD0iTTM2IDM0djItSDI0di0yaDEyek0zNiAzMHYySDI0di0yaDEyek0zNiAyNnYySDI0di0yaDEyeiIvPjwvZz48L2c+PC9zdmc+')] opacity-50"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold mb-4">
                    Mengapa Memilih <span class="text-secondary-400">Happy Shop</span>?
                </h2>
                <p class="text-gray-300 max-w-2xl mx-auto">
                    Kami berkomitmen memberikan yang terbaik untuk kebahagiaan dan perkembangan si kecil
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-secondary-400 to-secondary-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">100% Aman</h3>
                    <p class="text-gray-300">Semua produk telah tersertifikasi SNI dan aman untuk anak-anak</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-secondary-400 to-secondary-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Kualitas Terbaik</h3>
                    <p class="text-gray-300">Hanya produk berkualitas tinggi dari brand terpercaya</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-secondary-400 to-secondary-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Harga Terjangkau</h3>
                    <p class="text-gray-300">Harga kompetitif dengan promo menarik setiap bulan</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-secondary-400 to-secondary-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Layanan Ramah</h3>
                    <p class="text-gray-300">Tim customer service siap membantu dengan sepenuh hati</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Products Section -->
    <section class="py-20 bg-gradient-to-br from-pink-50 via-white to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-12">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-2">
                        Produk <span class="gradient-text">Terbaru</span>
                    </h2>
                    <p class="text-gray-600">Koleksi terbaru yang baru saja hadir</p>
                </div>
                <a href="{{ route('products.index', ['sort' => 'latest']) }}" class="mt-4 sm:mt-0 inline-flex items-center text-primary-600 font-semibold hover:text-primary-700">
                    Lihat Semua
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($latestProducts as $product)
                    @include('components.product-card', ['product' => $product])
                @empty
                    @for($i = 0; $i < 4; $i++)
                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden card-hover">
                            <div class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                <span class="text-6xl opacity-50">🎲</span>
                            </div>
                            <div class="p-4">
                                <span class="text-xs text-primary-600 font-semibold">Kategori</span>
                                <h3 class="font-bold text-gray-900 mt-1">Produk Baru</h3>
                                <p class="text-lg font-bold text-secondary-600 mt-2">Rp 200.000</p>
                            </div>
                        </div>
                    @endfor
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-secondary-500 to-primary-500 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold mb-4">
                Siap Memberikan Kebahagiaan?
            </h2>
            <p class="text-xl text-white/90 mb-8">
                Jelajahi koleksi mainan kami dan temukan hadiah sempurna untuk si kecil
            </p>
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-8 py-4 bg-white text-primary-600 font-bold rounded-full hover:bg-gray-100 transform hover:scale-105 transition-all shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                Mulai Belanja
            </a>
        </div>
    </section>
@endsection
