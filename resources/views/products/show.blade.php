@extends('layouts.app')

@section('title', $product->name . ' - Happy Shop')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-gray-50 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-primary-600">Beranda</a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-primary-600">Produk</a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="text-gray-500 hover:text-primary-600">{{ $product->category->name }}</a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-gray-900 font-medium">{{ $product->name }}</span>
            </nav>
        </div>
    </section>

    <!-- Product Detail -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Product Image -->
                <div class="space-y-4">
                    <div class="aspect-square bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl overflow-hidden relative">
                        @if($product->image)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="text-9xl opacity-50">🧸</span>
                            </div>
                        @endif
                        
                        <!-- Badges -->
                        <div class="absolute top-6 left-6 flex flex-col gap-2">
                            @if($product->is_bestseller)
                                <span class="px-3 py-1.5 bg-yellow-400 text-yellow-900 text-sm font-bold rounded-full shadow-lg">
                                    ⭐ Best Seller
                                </span>
                            @endif
                            @if($product->discount_percentage)
                                <span class="px-3 py-1.5 bg-red-500 text-white text-sm font-bold rounded-full shadow-lg">
                                    DISKON {{ $product->discount_percentage }}%
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Product Info -->
                <div>
                    <!-- Category -->
                    <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="inline-flex items-center px-3 py-1 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4 hover:bg-primary-200 transition-colors">
                        {{ $product->category->icon ?? '🎁' }} {{ $product->category->name }}
                    </a>
                    
                    <!-- Title -->
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">
                        {{ $product->name }}
                    </h1>
                    
                    <!-- SKU -->
                    @if($product->sku)
                        <p class="text-sm text-gray-500 mb-4">SKU: {{ $product->sku }}</p>
                    @endif
                    
                    <!-- Price -->
                    <div class="flex items-center gap-4 mb-6">
                        <span class="text-4xl font-extrabold text-secondary-600">
                            {{ $product->formatted_price }}
                        </span>
                        @if($product->original_price && $product->original_price > $product->price)
                            <span class="text-xl text-gray-400 line-through">
                                {{ $product->formatted_original_price }}
                            </span>
                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm font-bold">
                                Hemat {{ $product->discount_percentage }}%
                            </span>
                        @endif
                    </div>
                    
                    <!-- Stock Status -->
                    <div class="mb-6">
                        @if($product->stock > 10)
                            <span class="inline-flex items-center px-3 py-1.5 bg-green-100 text-green-700 rounded-full font-semibold">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                Stok Tersedia
                            </span>
                        @elseif($product->stock > 0)
                            <div class="bg-orange-50 border border-orange-200 rounded-xl p-4">
                                <div class="flex items-center">
                                    <span class="text-2xl mr-3">⚠️</span>
                                    <div>
                                        <p class="font-bold text-orange-700">Segera Habis!</p>
                                        <p class="text-sm text-orange-600">Hanya tersisa <span class="font-bold">{{ $product->stock }} unit</span> - Beli sekarang sebelum kehabisan!</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <span class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 rounded-full font-semibold">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                                Stok Habis
                            </span>
                        @endif
                    </div>
                    
                    <!-- Product Details -->
                    <div class="bg-gray-50 rounded-2xl p-6 mb-6">
                        <h3 class="font-bold text-gray-900 mb-4">Detail Produk</h3>
                        <dl class="grid grid-cols-2 gap-4">
                            @if($product->brand)
                                <div>
                                    <dt class="text-sm text-gray-500">Merk/Brand</dt>
                                    <dd class="font-semibold text-gray-900">{{ $product->brand }}</dd>
                                </div>
                            @endif
                            @if($product->age_range)
                                <div>
                                    <dt class="text-sm text-gray-500">Rentang Usia</dt>
                                    <dd class="font-semibold text-gray-900">{{ $product->age_range }}</dd>
                                </div>
                            @endif
                            <div>
                                <dt class="text-sm text-gray-500">Kategori</dt>
                                <dd class="font-semibold text-gray-900">{{ $product->category->name }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500">Ketersediaan</dt>
                                <dd class="font-semibold text-gray-900">{{ $product->stock > 0 ? 'Tersedia' : 'Habis' }}</dd>
                            </div>
                        </dl>
                    </div>
                    
                    <!-- Contact CTA -->
                    <div class="space-y-4">
                        <a href="https://wa.me/6281226110198?text={{ urlencode('Halo, saya tertarik dengan produk ' . $product->name . ' (' . $product->formatted_price . ')') }}" target="_blank" class="w-full inline-flex items-center justify-center px-8 py-4 bg-green-500 text-white font-bold rounded-full hover:bg-green-600 transform hover:scale-105 transition-all shadow-lg">
                            <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Hubungi via WhatsApp
                        </a>
                        <p class="text-center text-gray-500 text-sm">
                            Klik untuk langsung terhubung dengan kami
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Description -->
            @if($product->description)
                <div class="mt-12 bg-white rounded-2xl shadow-sm p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Deskripsi Produk</h2>
                    <div class="prose prose-lg max-w-none text-gray-600">
                        {!! $product->description !!}
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <section class="py-12 bg-gradient-to-br from-blue-50 via-white to-pink-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">
                        🎁 Produk <span class="gradient-text">Serupa</span>
                    </h2>
                    <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700">
                        Lihat Semua
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $relatedProduct)
                        @include('components.product-card', ['product' => $relatedProduct])
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
