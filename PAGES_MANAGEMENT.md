# 📄 Panduan Mengelola Halaman (Pages Management)

## Apa itu Pages Management?

Admin panel Pages Management memungkinkan Anda mengedit **tulisan dan gambar** di halaman-halaman penting website Anda tanpa perlu mengubah kode. Semua perubahan disimpan otomatis di database.

---

## 📍 Halaman yang Bisa Diatur

### 1. **Home Page** (Halaman Utama)
- **Endpoint:** `/`
- **Slug:** `home`
- Field yang bisa diedit:
  - 📝 **Judul** → Muncul di hero section
  - 📝 **Subtitle** → Muncul di bawah tagline
  - 📝 **Deskripsi** → Keterangan singkat tentang toko
  - 🖼️ **Gambar** → Foto hero di sebelah kanan
  - 📋 **Konten Lengkap** → Opsional (untuk editing lanjutan)

### 2. **About Page** (Tentang Kami)
- **Endpoint:** `/tentang-kami`
- **Slug:** `about`
- Field yang bisa diedit:
  - 📝 **Judul** → Kategori "Cerita Kami"
  - 📝 **Subtitle** → Heading opsional
  - 📝 **Konten** → Cerita lengkap tentang toko + visi/misi
  - 🖼️ **Gambar** → Foto toko/about image

### 3. **Contact Page** (Hubungi Kami)
- **Endpoint:** `/kontak`
- **Slug:** `contact`
- Field yang bisa diedit:
  - 📝 **Judul** → Heading halaman kontak
  - 📝 **Subtitle** → Deskripsi singkat
  - 📝 **Konten** → Info kontak detail
  - 🖼️ **Gambar** → Opsional

---

## 🎨 Cara Menggunakan Admin Panel

### Step 1: Akses Admin Panel
```
URL: https://happyshop.my.id/admin  (atau http://localhost:8000/admin untuk local)
```

### Step 2: Cari "Halaman" di Menu
- Login dengan akun admin Anda
- Di sidebar, cari menu **"Halaman"** (atau bisa juga di navigasi atas)
- Pilih halaman yang ingin diedit: **Home**, **About**, atau **Contact**

### Step 3: Edit Konten

#### Mengedit Teks:
1. Klik pada field teks yang ingin diedit (misalnya: **Judul**, **Subtitle**)
2. Hapus teks lama dan ketik teks baru
3. Untuk **Deskripsi** dan **Konten**, ada toolbar formatting:
   - **Bold** (⌘B) → Teks tebal
   - **Italic** (⌘I) → Teks miring
   - **Link** → Tambah hyperlink
   - **Bullet/Ordered List** → Buat daftar

#### Mengedit Gambar:
1. Klik field **"Gambar Halaman"**
2. Pilih file gambar dari komputer (format: JPG, PNG)
3. Ukuran maksimal: **2 MB**
4. Opsional: Isi **"Alt Text Gambar"** untuk deskripsi aksesibilitas
5. Sistem akan **auto-crop/resize** jika diperlukan

### Step 4: Simpan Perubahan
- Klik tombol **"Simpan"** atau **"Update"** di bagian bawah form
- Tunggu sampai notifikasi "Berhasil disimpan" muncul
- Perubahan langsung live di website!

---

## 📱 Contoh Penggunaan

### Contoh 1: Ganti Hero Title di Home
**Sebelumnya:**
```
Temukan Kebahagiaan untuk Si Kecil
```

**Sesudah:**
```
Temukan Mainan Impian Si Kecil di Happy Shop
```

Cukup klik field "Judul" di Home Page, ubah teksnya, dan simpan!

### Contoh 2: Upload Foto Toko Baru
1. Go to **Halaman > About**
2. Scroll ke bagian **"Gambar Halaman"**
3. Klik field upload
4. Pilih foto toko terbaru (misalnya: `toko_baru_2024.jpg`)
5. Klik **"Simpan"**
6. Foto akan otomatis muncul di halaman `/tentang-kami`

---

## 🔧 Technical Details

### Database Schema
```sql
Table: pages
- id (Primary Key)
- slug (Unique) → home, about, contact
- title → Judul Halaman
- subtitle → Subtitle
- description → Deskripsi Singkat
- content → Konten Lengkap (HTML)
- image → Path gambar (di storage/app/public/pages/)
- image_alt → Alt text gambar
- meta_data → JSON flexible field
- created_at, updated_at
```

### Filament Resource
```
App\Filament\Resources\PageResource
```
- Listed di menu admin dengan sorting default by slug
- Support untuk upload gambar dengan auto-resize
- Rich text editor untuk content field

---

## 📤 Deployment ke Hosting

Setelah membuat perubahan di local, ikuti langkah deployment:

### Via Git (Recommended):
```bash
git add .
git commit -m "Update pages management"
git push origin main
```

Kemudian di hosting (cPanel):
1. Pull changes: `git pull origin main`
2. Run migration: `php artisan migrate --force`
3. Clear cache: `php artisan cache:clear`

### Via cPanel File Manager (Manual):
1. Upload file `.php` baru ke folder `/app/Models/` dan `/app/Filament/Resources/`
2. Upload migration file ke `/database/migrations/`
3. Jalankan SQL di phpMyAdmin:
```sql
CREATE TABLE pages (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(255) UNIQUE NOT NULL,
    title VARCHAR(255),
    subtitle VARCHAR(255),
    description LONGTEXT,
    content LONGTEXT,
    image VARCHAR(255),
    image_alt VARCHAR(255),
    meta_data JSON,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```
4. Insert initial data:
```sql
INSERT INTO pages (slug, title, subtitle, description, created_at, updated_at) VALUES
('home', 'Temukan Kebahagiaan untuk Si Kecil', 'Selamat Datang di Toko Mainan Anak', '...', NOW(), NOW()),
('about', 'Tentang Happy Shop', 'Cerita Kami', '...', NOW(), NOW()),
('contact', 'Hubungi Kami', 'Kontak Happy Shop', '...', NOW(), NOW());
```

---

## ⚠️ Tips & Tricks

### ✅ DO:
- ✓ Gunakan RichEditor untuk formatting teks
- ✓ Upload gambar berkualitas tinggi (min. 1200x800px recommended)
- ✓ Test perubahan di halaman sebelum push ke production
- ✓ Backup database sebelum membuat perubahan besar

### ❌ DON'T:
- ✗ Jangan ubah field "Slug" setelah dibuat (akan break sistem)
- ✗ Jangan upload gambar lebih dari 2 MB
- ✗ Jangan delete halaman penting (Home, About, Contact)
- ✗ Jangan copy-paste dari Word (gunakan plain text)

---

## 🆘 Troubleshooting

| Problem | Solution |
|---------|----------|
| Gambar tidak muncul di halaman | Pastikan gambar sudah terupload di `/storage/pages/`. Jika tidak, re-upload di admin panel |
| Teks tidak ter-update | Clear browser cache (Ctrl+F5 atau Cmd+Shift+R) |
| Error "Slug sudah ada" | Slug harus unik. Gunakan slug berbeda atau edit existing page |
| Rich text formatting hilang | Pastikan menggunakan HTML valid. Hindari script tags |

---

## 📞 Support

Hubungi admin jika ada masalah dengan:
- Upload gambar
- Formatting teks
- Slug conflicts
- Database issues

---

**Last Updated:** 31 Maret 2026
**Version:** 1.0
