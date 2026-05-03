# ⚡ QUICK START - PORTFOLIO LARAVEL

## 🎯 Setup dalam 5 Menit

### Langkah 1: Install Dependencies

```bash
cd d:\Laravel\Portfolio
composer install
```

### Langkah 2: Setup Environment

```bash
copy .env.example .env
php artisan key:generate
```

### Langkah 3: Database Configuration

Edit `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=portfolio_db
DB_USERNAME=root
DB_PASSWORD=
```

### Langkah 4: Migration & Seed

```bash
php artisan migrate
php artisan db:seed --class=PortfolioSeeder
php artisan storage:link
```

### Langkah 5: Jalankan Server

```bash
php artisan serve
```

Buka: **http://localhost:8000**

---

## 📍 Halaman Utama

| Halaman     | URL                                          | Fungsi                |
| ----------- | -------------------------------------------- | --------------------- |
| 🏠 Homepage | http://localhost:8000                        | Lihat semua portfolio |
| 📋 Admin    | http://localhost:8000/admin/dashboard        | Manage portfolio      |
| ➕ Tambah   | http://localhost:8000/admin/portfolio/create | Buat portfolio baru   |
| 🔍 Detail   | http://localhost:8000/portfolio/{slug}       | Lihat detail project  |

---

## 💼 Fitur Cepat

### ✨ Untuk Pengunjung

- Melihat portfolio dalam layout grid
- Filter berdasarkan kategori
- Lihat detail project
- Responsive design

### 👨‍💼 Untuk Admin

- Tambah portfolio baru
- Edit portfolio
- Hapus portfolio
- Upload gambar
- Kelola semua data

---

## 🎨 File Penting untuk Customize

| File                                           | Edit Untuk          |
| ---------------------------------------------- | ------------------- |
| `resources/views/layouts/app.blade.php`        | Warna, font, header |
| `resources/views/portfolio/index.blade.php`    | Tampilan grid       |
| `app/Http/Controllers/PortfolioController.php` | Tambah fitur        |

---

## 🗂️ Database Structure

```
portfolios table:
├── id (Primary Key)
├── title (Judul)
├── slug (URL)
├── description (Deskripsi)
├── image (Gambar)
├── link (URL Project)
├── category (Kategori)
├── technologies (Teknologi)
├── created_at
└── updated_at
```

---

## 📚 Default Test Data (dari seeder)

Setelah seed, Anda akan memiliki 5 portfolio:

1. **Website E-Commerce Modern** - E-Commerce
2. **Aplikasi Manajemen Project** - Web Development
3. **Mobile App Banking** - Mobile App
4. **Platform Learning Online** - Web Development
5. **Desain UI/UX Dashboard** - UI/UX Design

---

## 🔄 Workflow Standar

### 1. Create Portfolio

```
Admin Dashboard → Tambah Portfolio → Isi Form → Simpan
```

### 2. View Portfolio

```
Homepage → Card Portfolio → Lihat Detail → Baca Info
```

### 3. Edit Portfolio

```
Admin Dashboard → Edit → Ubah Data → Update
```

### 4. Delete Portfolio

```
Admin Dashboard → Hapus → Konfirmasi
```

---

## 🚀 Perintah Useful

```bash
# Server
php artisan serve

# Database
php artisan migrate
php artisan db:seed

# Cache
php artisan cache:clear

# Storage
php artisan storage:link
```

---

## ✅ Testing Checklist

- [ ] Server running
- [ ] Homepage bisa diakses
- [ ] Admin dashboard muncul
- [ ] Form create bekerja
- [ ] Upload gambar berhasil
- [ ] Edit portfolio bekerja
- [ ] Delete portfolio bekerja
- [ ] Detail page tampil

---

## 🎓 Belajar Lebih Lanjut

Baca file `PORTFOLIO_DOCUMENTATION.md` untuk dokumentasi lengkap!

---

**Siap untuk membuat portfolio Anda? Let's go! 🚀**
