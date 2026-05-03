# 🎯 PORTFOLIO WEBSITE LARAVEL - PANDUAN LENGKAP

## 📋 Daftar Isi

1. [Fitur Utama](#fitur-utama)
2. [Instalasi & Setup](#instalasi--setup)
3. [Struktur File](#struktur-file)
4. [Database Schema](#database-schema)
5. [Cara Penggunaan](#cara-penggunaan)
6. [Routes](#routes)
7. [Customization](#customization)
8. [Troubleshooting](#troubleshooting)

---

## ✨ Fitur Utama

✅ **Halaman Portfolio Publik** - Tampilan semua project dalam grid responsif  
✅ **Detail Project** - Halaman detail lengkap untuk setiap project  
✅ **Admin Dashboard** - Kelola semua portfolio dari satu tempat  
✅ **CRUD Operations** - Create, Read, Update, Delete project  
✅ **Upload Gambar** - Upload dan manage gambar project  
✅ **Form Validation** - Validasi input server-side  
✅ **Responsive Design** - Mobile-friendly dengan Bootstrap 5  
✅ **URL Slug** - URL SEO-friendly untuk setiap project

---

## 🚀 Instalasi & Setup

### 1. **Persiapan Awal**

```bash
# Masuk ke folder project
cd d:\Laravel\Portfolio

# Install dependencies PHP
composer install

# Install dependencies Node (jika diperlukan)
npm install
```

### 2. **Setup File Environment**

```bash
# Copy file env (Windows)
copy .env.example .env

# Generate application key
php artisan key:generate
```

### 3. **Konfigurasi Database**

Edit file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 4. **Jalankan Migration & Seed**

```bash
# Buat tabel di database
php artisan migrate

# Isi data contoh
php artisan db:seed --class=PortfolioSeeder

# Setup storage link untuk upload gambar
php artisan storage:link
```

### 5. **Jalankan Development Server**

```bash
php artisan serve
```

Aplikasi akan berjalan di: **http://localhost:8000**

---

## 📁 Struktur File

```
Portfolio/
├── app/
│   ├── Models/
│   │   └── Portfolio.php                   # Model database
│   └── Http/Controllers/
│       └── PortfolioController.php         # Business logic
│
├── database/
│   ├── migrations/
│   │   └── 2026_01_23_000000_create_portfolios_table.php
│   └── seeders/
│       ├── PortfolioSeeder.php             # Data contoh
│       └── DatabaseSeeder.php
│
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php                   # Master layout
│   ├── portfolio/
│   │   ├── index.blade.php                 # Halaman utama
│   │   └── show.blade.php                  # Detail project
│   └── admin/
│       ├── dashboard.blade.php             # Admin list
│       ├── create.blade.php                # Form tambah
│       └── edit.blade.php                  # Form edit
│
├── routes/
│   └── web.php                             # URL routes
│
├── public/
│   └── storage/                            # Folder upload (linked)
│
└── storage/
    └── app/public/portfolio/               # Tempat penyimpanan gambar
```

---

## 💾 Database Schema

### Tabel: `portfolios`

```sql
CREATE TABLE portfolios (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    description LONGTEXT NOT NULL,
    image VARCHAR(255) NULLABLE,
    link VARCHAR(255) NULLABLE,
    category VARCHAR(255) NOT NULL,
    technologies LONGTEXT NULLABLE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

| Field        | Type         | Deskripsi                    |
| ------------ | ------------ | ---------------------------- |
| id           | BIGINT       | Primary key (auto increment) |
| title        | VARCHAR(255) | Judul project                |
| slug         | VARCHAR(255) | URL slug (unique)            |
| description  | LONGTEXT     | Deskripsi lengkap project    |
| image        | VARCHAR(255) | Path gambar project          |
| link         | VARCHAR(255) | URL link project             |
| category     | VARCHAR(255) | Kategori project             |
| technologies | LONGTEXT     | Teknologi yang digunakan     |
| created_at   | TIMESTAMP    | Waktu dibuat                 |
| updated_at   | TIMESTAMP    | Waktu diubah                 |

---

## 🌐 Routes

### Public Routes

| URL                 | Method | Handler   | Deskripsi                              |
| ------------------- | ------ | --------- | -------------------------------------- |
| `/`                 | GET    | `index()` | Halaman utama - tampil semua portfolio |
| `/portfolio/{slug}` | GET    | `show()`  | Detail halaman project                 |

### Admin Routes

| URL                            | Method | Handler       | Deskripsi                        |
| ------------------------------ | ------ | ------------- | -------------------------------- |
| `/admin/dashboard`             | GET    | `dashboard()` | Admin dashboard - list portfolio |
| `/admin/portfolio/create`      | GET    | `create()`    | Form tambah portfolio            |
| `/admin/portfolio`             | POST   | `store()`     | Simpan portfolio baru            |
| `/admin/portfolio/{slug}/edit` | GET    | `edit()`      | Form edit portfolio              |
| `/admin/portfolio/{slug}`      | PUT    | `update()`    | Update portfolio                 |
| `/admin/portfolio/{slug}`      | DELETE | `destroy()`   | Hapus portfolio                  |

---

## 📖 Cara Penggunaan

### 1️⃣ **Melihat Portfolio (Public)**

1. Buka **http://localhost:8000/**
2. Anda akan melihat halaman utama dengan grid portfolio
3. Klik "Lihat Detail" untuk melihat informasi lengkap project
4. Jika ada link, klik "Kunjungi" untuk membuka website project

### 2️⃣ **Membuat Portfolio Baru**

1. Buka **http://localhost:8000/admin/dashboard**
2. Klik tombol "Tambah Portfolio Baru"
3. Isi form:
    - **Judul Project** (required)
    - **Kategori** (required) - Pilih dari dropdown
    - **Deskripsi** (required) - Jelaskan project Anda
    - **Teknologi** (optional) - Contoh: Laravel, PHP, MySQL
    - **Gambar** (optional) - Upload screenshot project
    - **Link Project** (optional) - URL website project

4. Klik "Simpan Portfolio"
5. Portfolio akan muncul di halaman utama

### 3️⃣ **Mengedit Portfolio**

1. Di dashboard, cari portfolio yang ingin diedit
2. Klik tombol Edit (ikon pensil)
3. Ubah data yang diperlukan
4. Klik "Update Portfolio"

### 4️⃣ **Menghapus Portfolio**

1. Di dashboard, klik tombol Hapus (ikon trash)
2. Konfirmasi penghapusan
3. Portfolio akan dihapus

---

## 🎨 Customization

### Mengubah Warna Tema

Edit file `resources/views/layouts/app.blade.php`:

```css
:root {
    --primary-color: #667eea; /* Ubah warna utama */
    --secondary-color: #764ba2; /* Ubah warna sekunder */
    --dark-color: #2d3748; /* Ubah warna gelap */
}
```

### Mengubah Nama Header

Edit file `resources/views/layouts/app.blade.php`:

```blade
<h1><i class="fas fa-briefcase"></i> Nama Portfolio Anda</h1>
```

### Menambah Kategori Baru

Edit di `resources/views/admin/create.blade.php` dan `edit.blade.php`:

```blade
<option value="Kategori Baru">Kategori Baru</option>
```

### Mengubah Layout Grid

Edit file `resources/views/layouts/app.blade.php`:

```css
.portfolio-grid {
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    /* Ubah 250px untuk mengatur ukuran card */
}
```

---

## 🔧 Commands Penting

```bash
# Development
php artisan serve                 # Jalankan dev server
php artisan serve --port=8001     # Jalankan di port lain

# Database
php artisan migrate               # Jalankan migrasi
php artisan migrate:rollback      # Batalkan migrasi
php artisan db:seed               # Jalankan seeder
php artisan db:seed --class=PortfolioSeeder

# Cache
php artisan cache:clear           # Clear cache
php artisan config:cache          # Cache config
php artisan view:clear            # Clear views

# Storage
php artisan storage:link          # Link storage (untuk upload)

# Tinker (Interactive Shell)
php artisan tinker                # Masuk interactive shell

# Generate Kode
php artisan make:model Model      # Buat model baru
php artisan make:migration name   # Buat migration baru
php artisan make:controller Name  # Buat controller baru
```

---

## 🐛 Troubleshooting

### **Masalah: Halaman Error / Blank**

```bash
# Solusi: Clear cache
php artisan cache:clear
php artisan config:cache
php artisan view:clear
```

### **Masalah: Gambar Tidak Muncul**

```bash
# Solusi: Setup storage link
php artisan storage:link

# Jika masih tidak muncul, clear cache
php artisan cache:clear
```

### **Masalah: Database Connection Error**

```bash
# Solusi:
# 1. Cek file .env, pastikan DB credentials benar
# 2. Pastikan database sudah dibuat di MySQL
# 3. Jalankan migrasi ulang
php artisan migrate
```

### **Masalah: Port 8000 Sudah Digunakan**

```bash
# Solusi: Gunakan port lain
php artisan serve --port=8001
php artisan serve --port=8002
```

### **Masalah: File Upload Error**

```bash
# Solusi 1: Cek permissions
# Folder storage harus writable

# Solusi 2: Setup storage link
php artisan storage:link

# Solusi 3: Periksa ukuran file
# Max ukuran: 2MB (bisa diubah di controller)
```

### **Masalah: Migration Conflict**

```bash
# Solusi: Rollback dan jalankan ulang
php artisan migrate:rollback
php artisan migrate
```

---

## 📚 Teknologi yang Digunakan

- **Laravel 11** - PHP Framework
- **Blade** - Template Engine
- **Eloquent ORM** - Database ORM
- **MySQL/SQLite** - Database
- **Bootstrap 5** - CSS Framework
- **Font Awesome** - Icon Library
- **PHP 8.2+** - Programming Language

---

## ✅ Testing Checklist

- [ ] Homepage tampil dengan benar
- [ ] Admin dashboard bisa diakses
- [ ] Form validasi bekerja
- [ ] Upload gambar berhasil
- [ ] Edit portfolio berhasil
- [ ] Hapus portfolio berhasil
- [ ] Halaman detail project muncul
- [ ] URL slug bekerja dengan baik
- [ ] Responsive di mobile
- [ ] Link eksternal berfungsi

---

## 💡 Tips & Best Practices

✅ Selalu gunakan HTTPS di production  
✅ Backup database secara berkala  
✅ Optimize gambar sebelum upload  
✅ Gunakan .env untuk konfigurasi sensitif  
✅ Test di berbagai browser  
✅ Implement error logging  
✅ Gunakan caching untuk performa  
✅ Secure form dengan CSRF token

---

## 🎓 Yang Anda Pelajari

Dalam project ini Anda akan belajar:

- ✅ Laravel routing & controllers
- ✅ Eloquent ORM & migrations
- ✅ Blade template engine
- ✅ Form validation
- ✅ File upload handling
- ✅ CRUD operations
- ✅ MVC architecture
- ✅ Bootstrap responsive design
- ✅ Database relationships
- ✅ Error handling

---

**Happy Coding! 🚀**

Untuk pertanyaan atau bantuan, silakan hubungi support!
