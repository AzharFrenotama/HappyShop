<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terjadi Kesalahan - Happy Shop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Nunito', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #f472b6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-pink-50 min-h-screen flex items-center justify-center">
    <div class="text-center px-4">
        <div class="mb-6">
            <span class="text-8xl font-bold gradient-text">Oops!</span>
        </div>
        <div class="text-6xl mb-6">😕</div>
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Terjadi Kesalahan</h1>
        <p class="text-gray-600 mb-8 max-w-md mx-auto">
            Maaf, terjadi kesalahan pada sistem kami. Silakan coba lagi atau kembali ke beranda.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="javascript:location.reload()" 
               class="inline-flex items-center justify-center px-6 py-3 bg-blue-500 text-white font-bold rounded-full hover:bg-blue-600 transition-colors shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Coba Lagi
            </a>
            <a href="/" 
               class="inline-flex items-center justify-center px-6 py-3 bg-pink-500 text-white font-bold rounded-full hover:bg-pink-600 transition-colors shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Beranda
            </a>
        </div>
        
        <div class="mt-10 text-gray-400 text-sm">
            <p>Happy Shop 🧸</p>
        </div>
    </div>
</body>
</html>
