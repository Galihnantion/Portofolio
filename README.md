# 🎯 Portfolio Website - Laravel PHP

Aplikasi **Portfolio Website** yang modern dan responsif, dibangun dengan **Laravel 11** dan **PHP**. Aplikasi ini memungkinkan Anda untuk menampilkan project-project Anda dengan interface yang menarik dan mudah dikelola.

## ✨ Fitur Utama

✅ **Halaman Portfolio Publik** - Tampilan semua project dalam grid responsif  
✅ **Detail Project** - Halaman detail lengkap untuk setiap project  
✅ **Admin Dashboard** - Kelola semua portfolio dari satu panel  
✅ **CRUD Operations** - Create, Read, Update, Delete project  
✅ **Upload Gambar** - Upload dan manage gambar project dengan mudah  
✅ **Form Validation** - Validasi input yang ketat  
✅ **Responsive Design** - Mobile-friendly dengan Bootstrap 5  
✅ **URL Slug** - URL SEO-friendly untuk setiap project  
✅ **Kategori Project** - Organize project berdasarkan kategori  
✅ **Teknologi Tag** - Tampilkan teknologi yang digunakan

## 🚀 Quick Start

### 1. Install & Setup (5 Menit)

```bash
# Clone/masuk ke folder
cd d:\Laravel\Portfolio

# Install dependencies
composer install

# Setup environment
copy .env.example .env
php artisan key:generate

# Database configuration di .env
# Lalu jalankan migrasi
php artisan migrate
php artisan db:seed --class=PortfolioSeeder
php artisan storage:link

# Jalankan server
php artisan serve
```

### 2. Buka di Browser

- **Homepage**: http://localhost:8000
- **Admin Dashboard**: http://localhost:8000/admin/dashboard

---

## 📖 Dokumentasi

- 📘 **[QUICK START](QUICK_START.md)** - Panduan setup cepat
- 📗 **[DOCUMENTATION](PORTFOLIO_DOCUMENTATION.md)** - Dokumentasi lengkap
- 📙 **[SETUP CHECKLIST](SETUP_CHECKLIST.md)** - Checklist untuk memastikan semua berfungsi

---

## 🗂️ Struktur File

```
Portfolio/
├── app/Http/Controllers/
│   └── PortfolioController.php      # Business Logic
├── app/Models/
│   └── Portfolio.php                # Database Model
├── database/
│   ├── migrations/                  # Database Schema
│   └── seeders/                     # Sample Data
├── resources/views/
│   ├── layouts/app.blade.php        # Master Layout
│   ├── portfolio/                   # Public Pages
│   └── admin/                       # Admin Pages
└── routes/web.php                   # URL Routes
```

---

## 🌐 Routes

### Public Routes

- `GET /` - Halaman utama portfolio
- `GET /portfolio/{slug}` - Detail project

### Admin Routes

- `GET /admin/dashboard` - Admin dashboard
- `GET /admin/portfolio/create` - Form tambah
- `POST /admin/portfolio` - Simpan portfolio
- `GET /admin/portfolio/{slug}/edit` - Form edit
- `PUT /admin/portfolio/{slug}` - Update portfolio
- `DELETE /admin/portfolio/{slug}` - Hapus portfolio

---

## 💾 Database Schema

Tabel `portfolios` dengan field:

- `id` - Primary Key
- `title` - Judul project
- `slug` - URL slug (unique)
- `description` - Deskripsi lengkap
- `image` - Path gambar
- `link` - URL project eksternal
- `category` - Kategori
- `technologies` - Teknologi (comma-separated)
- `created_at` / `updated_at`

---

## 🎨 Customization

### Mengubah Warna Tema

Edit `resources/views/layouts/app.blade.php`:

```css
--primary-color: #667eea;
--secondary-color: #764ba2;
--dark-color: #2d3748;
```

### Menambah Kategori

Edit di form create/edit:

```blade
<option value="Kategori Baru">Kategori Baru</option>
```

### Mengubah Grid Layout

Edit CSS `.portfolio-grid` untuk mengatur jumlah kolom

---

## 🔧 Useful Commands

```bash
# Development
php artisan serve                    # Jalankan server
php artisan serve --port=8001        # Custom port

# Database
php artisan migrate                  # Run migrations
php artisan migrate:rollback         # Rollback migrations
php artisan db:seed                  # Run seeder

# Cache
php artisan cache:clear              # Clear cache
php artisan view:clear               # Clear views

# Storage
php artisan storage:link             # Link storage

# Interactive
php artisan tinker                   # Interactive shell
```

---

## 🐛 Troubleshooting

| Masalah                  | Solusi                               |
| ------------------------ | ------------------------------------ |
| Halaman Error            | `php artisan cache:clear`            |
| Gambar tidak muncul      | `php artisan storage:link`           |
| DB Connection Error      | Cek `.env` dan pastikan database ada |
| Port 8000 sudah terpakai | `php artisan serve --port=8001`      |

---

## 📚 Teknologi

- **Laravel 11** - PHP Framework
- **Blade** - Template Engine
- **Eloquent ORM** - Database
- **Bootstrap 5** - CSS Framework
- **Font Awesome** - Icons
- **MySQL/SQLite** - Database

---

## 👥 Fitur untuk User

### 👀 Pengunjung

- ✅ Lihat semua portfolio
- ✅ Lihat detail project
- ✅ Filter by kategori
- ✅ Responsive design

### 🔧 Admin

- ✅ Dashboard manage
- ✅ Tambah portfolio baru
- ✅ Edit portfolio
- ✅ Hapus portfolio
- ✅ Upload gambar

---

## 📊 Default Sample Data

Seeder menyediakan 5 portfolio contoh:

1. Website E-Commerce Modern
2. Aplikasi Manajemen Project
3. Mobile App Banking
4. Platform Learning Online
5. Desain UI/UX Dashboard

---

## ✅ Testing Checklist

- [ ] Server running
- [ ] Homepage tampil
- [ ] Admin dashboard accessible
- [ ] Create portfolio works
- [ ] Edit portfolio works
- [ ] Delete portfolio works
- [ ] Image upload works
- [ ] Responsive di mobile

---

## 💡 Best Practices

✅ Backup database berkala  
✅ Optimize gambar sebelum upload  
✅ Use environment variables  
✅ Test di berbagai browser  
✅ Regular security updates

---

## 📖 Dokumentasi Lengkap

Untuk dokumentasi lebih detail, baca:

- 📘 [QUICK START](QUICK_START.md)
- 📗 [PORTFOLIO DOCUMENTATION](PORTFOLIO_DOCUMENTATION.md)
- 📙 [SETUP CHECKLIST](SETUP_CHECKLIST.md)

---

## 🎓 Skill yang Dipelajari

- Laravel routing & controllers
- Eloquent ORM & migrations
- Blade template engine
- Form validation & error handling
- File upload & storage
- CRUD operations
- MVC architecture
- Bootstrap responsive design

---

## 📝 License

Free to use untuk personal dan commercial projects.

---

**Created with ❤️ using Laravel & PHP**

Siap untuk membuat portfolio Anda? [Mulai sekarang →](QUICK_START.md)
