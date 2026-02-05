# Happy Shop - Toko Mainan Anak 🧸

Website toko mainan anak dengan fitur company profile dan katalog produk lengkap dengan dashboard admin menggunakan Filament.

## 🎮 Fitur

### Frontend (Website)
- **Beranda** - Hero section, kategori, produk best seller, produk unggulan, dan produk terbaru
- **Produk** - Katalog produk dengan filter kategori, pencarian, dan sorting
- **Tentang Kami** - Profil toko, visi misi, dan nilai-nilai perusahaan
- **Kontak** - Informasi kontak, WhatsApp, email, dan FAQ

### Backend (Admin Dashboard)
- **Dashboard** - Statistik overview produk dan kategori
- **Manajemen Produk** - CRUD produk dengan upload gambar
- **Manajemen Kategori** - CRUD kategori produk

## 🛠️ Tech Stack

- **Framework:** Laravel 10
- **Admin Panel:** Filament 3
- **Database:** MySQL
- **Styling:** Tailwind CSS (via CDN)
- **Font:** Nunito (Google Fonts)

## 📋 Requirements

- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js (optional, for development)

## 🚀 Instalasi

### 1. Clone Repository
```bash
git clone <repository-url>
cd HappyShop
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database
Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=happyshop
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migrasi dan Seeding
```bash
php artisan migrate --seed
```

### 6. Storage Link
```bash
php artisan storage:link
```

### 7. Jalankan Server
```bash
php artisan serve
```

Website akan berjalan di `http://localhost:8000`

## 🔐 Akses Admin Dashboard

Akses admin panel di: `http://localhost:8000/admin`

**Default Login:**
- Email: `admin@happyshop.id`
- Password: `password123`

> ⚠️ **PENTING:** Segera ganti password setelah login pertama kali!

## 📁 Struktur Folder Penting

```
app/
├── Filament/
│   ├── Resources/          # Filament CRUD resources
│   └── Widgets/             # Dashboard widgets
├── Http/
│   └── Controllers/         # Frontend controllers
└── Models/                  # Eloquent models

resources/
└── views/
    ├── layouts/             # Layout utama
    ├── home.blade.php       # Halaman beranda
    ├── products/            # Halaman produk
    ├── pages/               # Halaman statis
    └── components/          # Komponen blade

database/
├── migrations/              # Database migrations
└── seeders/                 # Database seeders
```

## 🎨 Kustomisasi

### Logo
Ganti logo dengan meletakkan file `logo.png` di folder `public/images/`

### Warna
Warna utama dapat diubah di:
- **Frontend:** `resources/views/layouts/app.blade.php` (Tailwind config)
- **Admin:** `app/Providers/Filament/AdminPanelProvider.php`

### Kontak & WhatsApp
Update nomor WhatsApp di file view:
- `resources/views/layouts/app.blade.php`
- `resources/views/products/show.blade.php`
- `resources/views/pages/contact.blade.php`

## 🌐 Deployment ke Hosting

### Shared Hosting

1. Upload semua file ke folder `public_html` atau subdomain
2. Pindahkan isi folder `public/` ke root hosting
3. Edit `index.php`:
   ```php
   require __DIR__.'/../vendor/autoload.php';
   $app = require_once __DIR__.'/../bootstrap/app.php';
   ```
   Menjadi:
   ```php
   require __DIR__.'/vendor/autoload.php';
   $app = require_once __DIR__.'/bootstrap/app.php';
   ```
4. Buat database dan import
5. Konfigurasi `.env` sesuai hosting

### VPS / Cloud

1. Install LEMP/LAMP stack
2. Clone repository
3. Set permission:
   ```bash
   chmod -R 775 storage bootstrap/cache
   chown -R www-data:www-data storage bootstrap/cache
   ```
4. Konfigurasi Nginx/Apache virtual host
5. Setup SSL dengan Certbot

## 📝 License

MIT License

## 👨‍💻 Developed By

Happy Shop Development Team
