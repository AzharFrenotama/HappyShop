@extends('layouts.app')

@section('title', 'Server Error - Happy Shop')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-pink-50">
    <div class="text-center px-4">
        <div class="mb-8">
            <span class="text-9xl font-bold gradient-text">500</span>
        </div>
        <div class="text-6xl mb-6">⚙️</div>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Oops! Terjadi Kesalahan Server</h1>
        <p class="text-gray-600 mb-8 max-w-md mx-auto">
            Maaf, terjadi kesalahan pada server kami. Tim kami sedang bekerja untuk memperbaikinya. 
            Silakan coba lagi beberapa saat.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="javascript:location.reload()" 
               class="inline-flex items-center justify-center px-8 py-4 bg-primary-500 text-white font-bold rounded-full hover:bg-primary-600 transform hover:scale-105 transition-all shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Coba Lagi
            </a>
            <a href="{{ route('home') }}" 
               class="inline-flex items-center justify-center px-8 py-4 bg-secondary-500 text-white font-bold rounded-full hover:bg-secondary-600 transform hover:scale-105 transition-all shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
        
        <!-- Contact Support -->
        <div class="mt-12 p-6 bg-white/70 rounded-2xl shadow-sm max-w-md mx-auto">
            <p class="text-sm text-gray-600 mb-3">Butuh bantuan? Hubungi kami:</p>
            <a href="https://wa.me/6281234567890" target="_blank" 
               class="inline-flex items-center text-green-600 hover:text-green-700 font-semibold">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                Chat WhatsApp
            </a>
        </div>
    </div>
</div>
@endsection
