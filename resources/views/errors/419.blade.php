@extends('layouts.app')

@section('title', 'Sesi Berakhir - Happy Shop')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-pink-50">
    <div class="text-center px-4">
        <div class="mb-8">
            <span class="text-9xl font-bold gradient-text">419</span>
        </div>
        <div class="text-6xl mb-6">⏰</div>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Sesi Telah Berakhir</h1>
        <p class="text-gray-600 mb-8 max-w-md mx-auto">
            Halaman ini sudah kedaluwarsa. Silakan refresh halaman dan coba lagi.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="javascript:location.reload()" 
               class="inline-flex items-center justify-center px-8 py-4 bg-primary-500 text-white font-bold rounded-full hover:bg-primary-600 transform hover:scale-105 transition-all shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Refresh Halaman
            </a>
            <a href="{{ route('home') }}" 
               class="inline-flex items-center justify-center px-8 py-4 bg-secondary-500 text-white font-bold rounded-full hover:bg-secondary-600 transform hover:scale-105 transition-all shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection
