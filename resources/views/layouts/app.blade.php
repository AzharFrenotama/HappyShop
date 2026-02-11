<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Happy Shop - Toko Mainan Anak Terlengkap">
    <title>@yield('title', 'Happy Shop - Toko Mainan Anak')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">
    @if(file_exists(public_path('images/logo.png')))
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    @endif
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        'secondary': {
                            50: '#fdf2f8',
                            100: '#fce7f3',
                            200: '#fbcfe8',
                            300: '#f9a8d4',
                            400: '#f472b6',
                            500: '#ec4899',
                            600: '#db2777',
                            700: '#be185d',
                            800: '#9d174d',
                            900: '#831843',
                        },
                        'accent': {
                            'blue': '#3b82f6',
                            'pink': '#f472b6',
                            'yellow': '#fbbf24',
                        }
                    },
                    fontFamily: {
                        'nunito': ['Nunito', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #f472b6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
        }
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -4px;
            left: 50%;
            background: linear-gradient(90deg, #3b82f6, #f472b6);
            transition: all 0.3s ease;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.4;
            animation: blob 7s infinite;
        }
        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
    </style>
    @stack('styles')
</head>
<body class="bg-white font-nunito">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-md shadow-sm fixed w-full z-50 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    @if(file_exists(public_path('images/logo.png')))
                        <img src="{{ asset('images/logo.png') }}" alt="Happy Shop" class="h-16 w-auto">
                    @else
                        <img src="{{ asset('images/logo.svg') }}" alt="Happy Shop" class="h-14 w-auto">
                    @endif
                    <span class="text-2xl font-bold gradient-text hidden sm:block">Happy Shop</span>
                </a>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="nav-link text-gray-700 hover:text-primary-600 font-semibold {{ request()->routeIs('home') ? 'active text-primary-600' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('products.index') }}" class="nav-link text-gray-700 hover:text-primary-600 font-semibold {{ request()->routeIs('products.*') ? 'active text-primary-600' : '' }}">
                        Produk
                    </a>
                    <a href="{{ route('about') }}" class="nav-link text-gray-700 hover:text-primary-600 font-semibold {{ request()->routeIs('about') ? 'active text-primary-600' : '' }}">
                        Tentang Kami
                    </a>
                    <a href="{{ route('contact') }}" class="nav-link text-gray-700 hover:text-primary-600 font-semibold {{ request()->routeIs('contact') ? 'active text-primary-600' : '' }}">
                        Kontak
                    </a>
                    
                    <!-- Cart Icon -->
                    <a href="{{ route('cart.index') }}" class="relative p-2 text-gray-700 hover:text-primary-600 transition-colors {{ request()->routeIs('cart.*') ? 'text-primary-600' : '' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span class="cart-badge absolute -top-1 -right-1 bg-secondary-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center {{ \App\Models\Cart::getCartCount() > 0 ? '' : 'hidden' }}">
                            {{ \App\Models\Cart::getCartCount() }}
                        </span>
                    </a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center gap-4">
                    <!-- Mobile Cart Icon -->
                    <a href="{{ route('cart.index') }}" class="relative p-2 text-gray-700 hover:text-primary-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span class="cart-badge absolute -top-1 -right-1 bg-secondary-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center {{ \App\Models\Cart::getCartCount() > 0 ? '' : 'hidden' }}">
                            {{ \App\Models\Cart::getCartCount() }}
                        </span>
                    </a>
                    <button type="button" onclick="toggleMobileMenu()" class="text-gray-700 hover:text-primary-600 p-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div id="mobileMenu" class="md:hidden hidden bg-white border-t">
            <div class="px-4 py-4 space-y-3">
                <a href="{{ route('home') }}" class="block py-2 text-gray-700 hover:text-primary-600 font-semibold {{ request()->routeIs('home') ? 'text-primary-600' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('products.index') }}" class="block py-2 text-gray-700 hover:text-primary-600 font-semibold {{ request()->routeIs('products.*') ? 'text-primary-600' : '' }}">
                    Produk
                </a>
                <a href="{{ route('about') }}" class="block py-2 text-gray-700 hover:text-primary-600 font-semibold {{ request()->routeIs('about') ? 'text-primary-600' : '' }}">
                    Tentang Kami
                </a>
                <a href="{{ route('contact') }}" class="block py-2 text-gray-700 hover:text-primary-600 font-semibold {{ request()->routeIs('contact') ? 'text-primary-600' : '' }}">
                    Kontak
                </a>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main class="pt-20">
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="bg-gradient-to-br from-primary-900 via-primary-800 to-primary-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                <!-- Brand -->
                <div class="lg:col-span-1">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 mb-6">
                        @if(file_exists(public_path('images/logo.png')))
                            <img src="{{ asset('images/logo.png') }}" alt="Happy Shop" class="h-16 w-auto brightness-0 invert">
                        @else
                            <span class="text-3xl">🧸</span>
                        @endif
                        <span class="text-2xl font-bold">Happy Shop</span>
                    </a>
                    <p class="text-gray-300 mb-6">
                        Toko mainan anak terlengkap dengan koleksi mainan berkualitas untuk perkembangan dan kebahagiaan si kecil.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/happyshop.happyshop.14289210" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-secondary-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="https://www.instagram.com/happyshop06.brebes/" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-secondary-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="https://www.tiktok.com/@happy.shop.brebes" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-secondary-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 00-.79-.05A6.34 6.34 0 003.15 15.2a6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.34-6.34V8.71a8.19 8.19 0 004.76 1.52v-3.4a4.85 4.85 0 01-1-.14z"/></svg>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Menu</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-secondary-400 transition-colors">Beranda</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:text-secondary-400 transition-colors">Produk</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-secondary-400 transition-colors">Tentang Kami</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-secondary-400 transition-colors">Kontak</a></li>
                    </ul>
                </div>
                
                <!-- Categories -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Kategori</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('products.index') }}?category=boneka" class="text-gray-300 hover:text-secondary-400 transition-colors">Boneka</a></li>
                        <li><a href="{{ route('products.index') }}?category=puzzle" class="text-gray-300 hover:text-secondary-400 transition-colors">Puzzle</a></li>
                        <li><a href="{{ route('products.index') }}?category=lego" class="text-gray-300 hover:text-secondary-400 transition-colors">Lego & Building Blocks</a></li>
                        <li><a href="{{ route('products.index') }}?category=mainan-edukatif" class="text-gray-300 hover:text-secondary-400 transition-colors">Mainan Edukatif</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Hubungi Kami</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 mt-1 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="text-gray-300">Jl. KH. Ahmad Dahlan<br>Kabupaten Brebes, Indonesia</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span class="text-gray-300">+62 852 0106 0671</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span class="text-gray-300">brebeshappyshop@gmail.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-white/10 mt-12 pt-8 text-center">
                <p class="text-gray-400">&copy; {{ date('Y') }} Happy Shop. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Global Add to Cart function for product cards
        function addToCart(productId, quantity = 1) {
            fetch(`/keranjang/tambah/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ quantity: quantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart badge
                    updateCartBadge(data.cartCount);
                    // Show success message
                    showNotification(data.message, 'success');
                } else {
                    showNotification(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Terjadi kesalahan. Silakan coba lagi.', 'error');
            });
        }

        function updateCartBadge(count) {
            const badges = document.querySelectorAll('.cart-badge');
            badges.forEach(badge => {
                badge.textContent = count;
                if (count > 0) {
                    badge.classList.remove('hidden');
                } else {
                    badge.classList.add('hidden');
                }
            });
        }

        function showNotification(message, type) {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `fixed top-24 right-4 z-50 px-6 py-4 rounded-xl shadow-lg transform transition-all duration-300 translate-x-full ${
                type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
            }`;
            notification.innerHTML = `
                <div class="flex items-center gap-3">
                    <span class="text-xl">${type === 'success' ? '✓' : '✕'}</span>
                    <span>${message}</span>
                </div>
            `;
            document.body.appendChild(notification);

            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            // Animate out and remove
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }
    </script>
    @stack('scripts')
</body>
</html>
