# Katalog Online Toko Bisnis Digital Fasilkom UPNVJT

Katalog online modern yang dibangun dengan Laravel 12, Filament v5, Tailwind CSS, dan Alpine.js.

## Fitur Utama
- Admin Panel lengkap dengan fitur pengaturan toko (Filament v5)
- Storefront responsif dan dinamis (Tailwind v4)
- Fitur Cart persisten (Alpine.js)
- Checkout langsung men-generate pesanan ke WhatsApp admin

## Cara Menjalankan Project

1. Clone repository ini
2. Jalankan `composer install`
3. Jalankan `npm install`
4. Copy `.env.example` ke `.env` dan konfigurasikan database MySQL Anda
5. Jalankan `php artisan key:generate`
6. Jalankan `php artisan migrate --seed` (Ini akan membuat akun admin `admin@tokobisnis.com` / `admin123` beserta produk sample)
7. Buat symlink untuk storage: `php artisan storage:link`
8. Jalankan development server: `php artisan serve`
9. Jalankan kompilasi frontend: `npm run dev`

## Akses
- Storefront: `http://localhost:8000`
- Admin Panel: `http://localhost:8000/admin`
