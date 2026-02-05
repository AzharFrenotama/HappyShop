@extends('layouts.app')

@section('title', ($selectedCategory ? $selectedCategory->name . ' - ' : '') . 'Produk - Happy Shop')

@section('content')
    <!-- Header -->
    <section class="bg-gradient-to-br from-blue-50 via-white to-pink-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">
                    @if($selectedCategory)
                        {{ $selectedCategory->icon ?? '🎁' }} {{ $selectedCategory->name }}
                    @else
                        🛍️ Semua <span class="gradient-text">Produk</span>
                    @endif
                </h1>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    @if($selectedCategory && $selectedCategory->description)
                        {{ $selectedCategory->description }}
                    @else
                        Temukan berbagai mainan berkualitas untuk si kecil
                    @endif
                </p>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar -->
                <aside class="lg:w-64 flex-shrink-0">
                    <!-- Search -->
                    <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                        <h3 class="font-bold text-gray-900 mb-4">🔍 Cari Produk</h3>
                        <form action="{{ route('products.index') }}" method="GET">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Ketik nama produk..." class="w-full pl-4 pr-10 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Categories -->
                    <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                        <h3 class="font-bold text-gray-900 mb-4">📁 Kategori</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('products.index', request()->except('category')) }}" class="flex items-center justify-between py-2 px-3 rounded-lg transition-colors {{ !request('category') ? 'bg-primary-100 text-primary-700' : 'hover:bg-gray-100' }}">
                                    <span class="font-medium">Semua Kategori</span>
                                </a>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('products.index', array_merge(request()->except('category'), ['category' => $category->slug])) }}" class="flex items-center justify-between py-2 px-3 rounded-lg transition-colors {{ request('category') == $category->slug ? 'bg-primary-100 text-primary-700' : 'hover:bg-gray-100' }}">
                                        <span class="font-medium">
                                            {{ $category->icon }} {{ $category->name }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <!-- Filter by Sort -->
                    <div class="bg-white rounded-2xl shadow-sm p-6">
                        <h3 class="font-bold text-gray-900 mb-4">⚙️ Urutkan</h3>
                        <form action="{{ route('products.index') }}" method="GET" id="sortForm">
                            @foreach(request()->except('sort') as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach
                            <select name="sort" onchange="document.getElementById('sortForm').submit()" class="w-full py-3 px-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                <option value="latest" {{ request('sort', 'latest') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Terpopuler</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama A-Z</option>
                            </select>
                        </form>
                    </div>
                </aside>
                
                <!-- Products Grid -->
                <div class="flex-1">
                    <!-- Active Filters -->
                    @if(request('search') || request('category'))
                        <div class="bg-white rounded-xl p-4 mb-6 flex flex-wrap items-center gap-2">
                            <span class="text-gray-600 font-medium">Filter aktif:</span>
                            @if(request('search'))
                                <a href="{{ route('products.index', request()->except('search')) }}" class="inline-flex items-center px-3 py-1 bg-primary-100 text-primary-700 rounded-full text-sm font-medium hover:bg-primary-200">
                                    Pencarian: "{{ request('search') }}"
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </a>
                            @endif
                            @if(request('category') && $selectedCategory)
                                <a href="{{ route('products.index', request()->except('category')) }}" class="inline-flex items-center px-3 py-1 bg-secondary-100 text-secondary-700 rounded-full text-sm font-medium hover:bg-secondary-200">
                                    {{ $selectedCategory->name }}
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </a>
                            @endif
                            <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-gray-700 text-sm font-medium ml-auto">
                                Hapus semua filter
                            </a>
                        </div>
                    @endif
                    
                    <!-- Results Count -->
                    <div class="flex items-center justify-between mb-6">
                        <p class="text-gray-600">
                            Menampilkan <span class="font-semibold">{{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }}</span> 
                            dari <span class="font-semibold">{{ $products->total() }}</span> produk
                        </p>
                    </div>
                    
                    @if($products->count() > 0)
                        <!-- Products Grid -->
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                            @foreach($products as $product)
                                @include('components.product-card', ['product' => $product])
                            @endforeach
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-10">
                            {{ $products->links() }}
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="bg-white rounded-2xl shadow-sm p-12 text-center">
                            <div class="text-6xl mb-4">😢</div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Produk Tidak Ditemukan</h3>
                            <p class="text-gray-600 mb-6">Coba ubah kata kunci pencarian atau filter kategori</p>
                            <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 bg-primary-600 text-white font-semibold rounded-full hover:bg-primary-700 transition-colors">
                                Lihat Semua Produk
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
