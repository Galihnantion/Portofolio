# Skema Warna Portfolio - Hitam Pekat & Biru Neon

## Deskripsi

Tampilan portfolio telah diperbarui dengan skema warna yang modern dan striking, menggunakan kombinasi **Hitam Pekat (#000000)** dan **Biru Neon (#00ffff)** untuk menciptakan tema futuristik yang mencolok.

## Palet Warna

### Warna Utama

- **Hitam Pekat**: `#000000` - Background utama
- **Hitam Gelap Sekunder**: `#0d0d0d` - Aksen hitam untuk kedalaman
- **Biru Neon**: `#00ffff` (Cyan) - Aksen utama dengan efek glow

### Warna Teks

- **Teks Terang**: `#ffffff` (Putih) - Teks utama
- **Teks Redup**: `#b0b0b0` (Abu-abu) - Teks sekunder

### Gradient

- **Background Gradient**: `linear-gradient(135deg, #000000 0%, #0a0a0a 100%)`

## Variabel CSS (CSS Root)

```css
:root {
    --primary-dark: #000000;
    --secondary-dark: #0d0d0d;
    --accent-blue: #00ffff;
    --accent-neon: #00ffff;
    --text-light: #ffffff;
    --text-muted: #b0b0b0;
    --bg-gradient: linear-gradient(135deg, #000000 0%, #0a0a0a 100%);
}
```

## Elemen yang Diperbarui

### Header & Navigation

- Background transparan dengan border biru neon
- Logo dengan efek glow cyan
- Underline link dengan warna biru neon

### Tombol

- **Primary Button**: Biru neon dengan glow effect
- **Secondary Button**: Border biru neon dengan transparency

### Kartu (Cards)

- Border biru neon dengan background transparan cyan
- Hover effect dengan shadow cyan yang lebih terang

### Timeline

- Garis timeline dengan warna biru neon dan glow
- Dot dengan border dan shadow cyan

### Form

- Input fields dengan border biru neon
- Focus state dengan glow cyan effect

### Efek Visual

- Semua glow effects menggunakan cyan (#00ffff)
- Text-shadow dengan kombinasi cyan untuk efek neon
- Box-shadow multi-layer untuk kedalaman

## Fitur Glow

Semua elemen interaktif memiliki efek glow neon yang:

- Meningkat pada hover
- Memberikan efek futuristik
- Mudah dipahami dari sisi user experience

## File yang Dimodifikasi

- `resources/views/layouts/app.blade.php` - CSS colors dan styling

## Catatan

- Warna ungu (#b300ff) telah sepenuhnya dihapus
- Semua gradien yang menggunakan warna lain telah diubah menjadi flat colors atau gradient cyan
- Skema ini memberikan tampilan yang lebih clean dan fokus pada brand identity
