@extends('layouts.app')

@section('title', 'Dalam Perbaikan - Happy Shop')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-pink-50">
    <div class="text-center px-4">
        <div class="mb-8">
            <span class="text-9xl font-bold gradient-text">503</span>
        </div>
        <div class="text-6xl mb-6">🔧</div>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Sedang Dalam Perbaikan</h1>
        <p class="text-gray-600 mb-8 max-w-md mx-auto">
            Kami sedang melakukan pemeliharaan untuk memberikan pengalaman yang lebih baik. 
            Silakan kembali beberapa saat lagi!
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="javascript:location.reload()" 
               class="inline-flex items-center justify-center px-8 py-4 bg-primary-500 text-white font-bold rounded-full hover:bg-primary-600 transform hover:scale-105 transition-all shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Coba Lagi
            </a>
        </div>
        
        <!-- Time Estimate -->
        <div class="mt-12 p-6 bg-white/70 rounded-2xl shadow-sm max-w-md mx-auto">
            <div class="flex items-center justify-center gap-3 text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Estimasi selesai: Beberapa menit</span>
            </div>
        </div>
    </div>
</div>
@endsection
