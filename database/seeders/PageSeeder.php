<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Home Page
        Page::updateOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Temukan Kebahagiaan untuk Si Kecil',
                'subtitle' => 'Selamat Datang di Toko Mainan Anak',
                'content' => '<p>Koleksi mainan berkualitas yang aman dan edukatif untuk perkembangan anak Anda. Dari boneka lucu hingga puzzle menarik!</p>',
                'image' => null,
            ]
        );

        // About Page
        Page::updateOrCreate(
            ['slug' => 'about'],
            [
                'title' => 'Tentang Happy Shop',
                'subtitle' => 'Cerita Kami',
                'content' => '<p><strong>Happy Shop</strong> hadir di Brebes tgl 6 Januari 2016, dan Alhamdulillah sampai saat ini masih memenuthi pelanggan kami untuk yang memerutkan permak permk. Ulitah, mainan anak, boneka, aneka buket dan asesori lainnya.</p><p>Alhamdulillah, hingga saat ini Happy Shop tetap dipercaya oleh pelanggan setia kami. Kami terus berusaha memenuhi kebutuhan berbagai pernak-pernik ulang tahun, mulai dari dekorasi, balon, lilin, hingga perlengkapan pesta lainnya. Selain itu, kami juga menyediakan beragam mainan anak, boneka lucu, aneka buket untuk berbagai momen spesial, serta aksesori menarik lainnya.</p><p>Dengan pelayanan yang ramah dan koleksi produk yang selalu diperbarui mengikuti tren, Happy Shop siap menjadi pilihan utama Anda untuk melengkapi setiap momen bahagia bersama keluarga dan orang-orang tercinta.</p>',
                'image' => null,
            ]
        );

        // Contact Page
        Page::updateOrCreate(
            ['slug' => 'contact'],
            [
                'title' => 'Hubungi Kami',
                'subtitle' => 'Kontak Happy Shop',
                'content' => '<p>Kami siap melayani Anda dengan sepenuh hati. Hubungi kami melalui berbagai saluran komunikasi yang tersedia.</p>',
                'phone' => '+62 852 0106 0671',
                'email' => 'brebeshappyshop@gmail.com',
                'address' => 'Jl. KH. Ahmad Dahlan, Kabupaten Brebes',
                'hours' => '08.00 - 20.00 WIB',
                'image' => null,
            ]
        );
    }
}
