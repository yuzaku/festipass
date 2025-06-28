# 🎫 FestiPass - Ticket Booking Platform

FestiPass adalah platform pemesanan tiket konser berbasis web yang dikembangkan menggunakan Laravel dan TailwindCSS. Pengguna dapat melihat daftar konser, memilih tiket berdasarkan kategori, memesan tiket, dan melakukan pembayaran.


---

## 🚀 Fitur Utama

- Melihat daftar event konser yang tersedia
- Pemesanan tiket konser dengan batas maksimum 3 tiket per kategori
- Validasi stok dan input secara real-time (frontend & backend)
- Penyimpanan data pemesanan ke database
- Menampilkan detail pemesanan & total harga
- Mendukung penyimpanan gambar/poster konser

---

## 🧱 Teknologi yang Digunakan

- **Laravel 12** - Framework backend PHP
- **TailwindCSS** - Framework styling responsif
- **MySQL** - Database relasional
- **Blade** - Templating engine Laravel

---

## 📂 Struktur Database

- `users` - menyimpan data pengguna
- `events` - informasi event konser
- `tickets` - jenis tiket untuk setiap event
- `orders` - menyimpan pemesanan
- `order_items` - detail item tiket pada pemesanan
- `event_reviews` - menyimpan ulasan pengguna
  
---

## ⚙️ Cara Menjalankan Proyek Ini

### 1. Clone Repositori
```bash
https://github.com/yuzaku/festipass.git
cd festipass
```

### 2. Install Dependency
```bash
composer install
```

### 3. Setup Environment
Duplikat file .env.example lalu rename menjadi .env
Sesuaikan beberapa parameter berikut dengan koneksi database local
```bash
DB_DATABASE=YOUR DATABASE NAME
DB_USERNAME=YOUR DATABASE USERNAME
DB_PASSWORD=YOUR DATABASE PASSWORD
```

### 4. Migrasi dan Seeder
```bash
php artisan migrate --seed
```

### 5. Jalankan Server Lokal
```bash
php artisan serve
```

Akses di: `http://127.0.0.1:8000`
