@extends('layouts.app')

@section('title', 'Akses Ditolak - Happy Shop')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-pink-50">
    <div class="text-center px-4">
        <div class="mb-8">
            <span class="text-9xl font-bold gradient-text">403</span>
        </div>
        <div class="text-6xl mb-6">🚫</div>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Akses Ditolak</h1>
        <p class="text-gray-600 mb-8 max-w-md mx-auto">
            Maaf, Anda tidak memiliki izin untuk mengakses halaman ini. 
            Silakan kembali ke beranda untuk menjelajahi produk kami.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center justify-center px-8 py-4 bg-primary-500 text-white font-bold rounded-full hover:bg-primary-600 transform hover:scale-105 transition-all shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Kembali ke Beranda
            </a>
            <a href="{{ route('products.index') }}" 
               class="inline-flex items-center justify-center px-8 py-4 bg-secondary-500 text-white font-bold rounded-full hover:bg-secondary-600 transform hover:scale-105 transition-all shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
                Lihat Produk
            </a>
        </div>
    </div>
</div>
@endsection
