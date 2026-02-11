@extends('layouts.app')

@section('title', 'Kontak - Happy Shop')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-50 via-white to-pink-50 py-20 overflow-hidden">
        <div class="blob w-96 h-96 bg-primary-300 -top-48 -left-48"></div>
        <div class="blob w-80 h-80 bg-secondary-300 -bottom-40 -right-40" style="animation-delay: 2s;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span class="inline-block px-4 py-2 bg-primary-100 text-primary-600 rounded-full text-sm font-semibold mb-6">
                    Hubungi Kami
                </span>
                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-6">
                    Ada Pertanyaan? <span class="gradient-text">Hubungi Kami!</span>
                </h1>
                <p class="text-lg text-gray-600">
                    Tim kami siap membantu Anda menemukan mainan terbaik untuk si kecil. Jangan ragu untuk menghubungi kami!
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8 mb-16">
                <!-- WhatsApp -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-3xl p-8 text-center h-full">
                    <div class="w-20 h-20 bg-green-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">WhatsApp</h3>
                    <p class="text-gray-600 mb-4">Respon cepat dalam hitungan menit</p>
                    <span class="text-green-600 font-bold text-lg">+62 852 0106 0671</span>
                </div>
                
                <!-- Email -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-3xl p-8 text-center h-full">
                    <div class="w-20 h-20 bg-primary-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Email</h3>
                    <p class="text-gray-600 mb-4">Kirim pertanyaan kapan saja</p>
                    <span class="text-primary-600 font-bold text-lg"> brebeshappyshop@gmail.com</span>
                </div>
                
                <!-- Location -->
                <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-3xl p-8 text-center h-full">
                    <div class="w-20 h-20 bg-secondary-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Lokasi</h3>
                    <p class="text-gray-600 mb-4">Kunjungi toko kami</p>
                    <span class="text-secondary-600 font-bold">Jl. KH. Ahmad Dahlan<br>Kabupaten Brebes</span>
                </div>
            </div>
            
            <!-- Operating Hours -->
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl p-8 max-w-2xl mx-auto">
                <h3 class="text-2xl font-bold text-gray-900 text-center mb-6">Jam Operasional</h3>
                <div class="text-center p-6 bg-white rounded-2xl">
                    <p class="font-semibold text-gray-900 mb-2">Setiap Hari</p>
                    <p class="text-primary-600 font-bold text-xl">08.00 - 20.00 WIB</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm overflow-hidden">
                <div class="aspect-video">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63374.844506731286!2d108.92416067132059!3d-6.899240772581821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb0877f1b0b3f%3A0x71c1b4a5de2efbde!2sHappy%20Shop!5e0!3m2!1sen!2sid!4v1770297033754!5m2!1sen!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">
                    ❓ Pertanyaan <span class="gradient-text">Umum</span>
                </h2>
                <p class="text-gray-600">Jawaban untuk pertanyaan yang sering diajukan</p>
            </div>
            
            <div class="space-y-4">
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="font-bold text-gray-900 mb-2">Apakah semua mainan sudah tersertifikasi SNI?</h3>
                    <p class="text-gray-600">Ya, semua produk yang kami jual telah memenuhi standar keamanan SNI dan aman untuk anak-anak.</p>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="font-bold text-gray-900 mb-2">Bagaimana cara memesan produk?</h3>
                    <p class="text-gray-600">Anda bisa langsung menghubungi kami via WhatsApp atau datang langsung ke toko kami. Kami akan dengan senang hati membantu Anda!</p>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="font-bold text-gray-900 mb-2">Apakah tersedia layanan pengiriman?</h3>
                    <p class="text-gray-600">Ya, kami menyediakan layanan pengiriman ke seluruh Indonesia melalui berbagai ekspedisi terpercaya.</p>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="font-bold text-gray-900 mb-2">Bagaimana kebijakan pengembalian barang?</h3>
                    <p class="text-gray-600">Kami menerima pengembalian barang dalam kondisi tertentu. Hubungi kami maksimal 3 hari setelah barang diterima jika ada masalah.</p>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="font-bold text-gray-900 mb-2">Apakah ada garansi untuk produk?</h3>
                    <p class="text-gray-600">Beberapa produk memiliki garansi dari produsen. Informasi garansi akan diberikan pada saat pembelian.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-secondary-500 to-primary-500 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold mb-4">
                Butuh Bantuan Memilih Mainan?
            </h2>
            <p class="text-xl text-white/90 mb-8">
                Tim kami siap membantu Anda menemukan mainan yang tepat sesuai usia dan minat anak
            </p>
            <a href="https://wa.me/6285201060671?text={{ urlencode('Halo, saya butuh bantuan untuk memilih mainan') }}" target="_blank" class="inline-flex items-center px-8 py-4 bg-white text-primary-600 font-bold rounded-full hover:bg-gray-100 transform hover:scale-105 transition-all shadow-lg">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Chat via WhatsApp
            </a>
        </div>
    </section>
@endsection
