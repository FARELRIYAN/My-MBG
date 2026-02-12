# SPPG Kokrosono (My_MBG Portal)

**Sistem Pelayanan Pemenuhan Gizi (SPPG) Kokrosono** adalah aplikasi web berbasis Laravel yang dirancang untuk mendukung transparansi dan manajemen program **Makan Bergizi Gratis (MBG)**. Aplikasi ini memfasilitasi publik untuk memantau menu dan gizi, serta memberikan wadah bagi petugas untuk mengelola data operasional harian.

![SPPG Landing Page](https://placehold.co/1200x600/e2e8f0/1e293b?text=SPPG+Kokrosono+Preview)

## Fitur Utama

### 1. Halaman Publik (Guest)

- **Hero Section**: Informasi utama branding SPPG Kokrosono.
- **Menu Hari Ini**: Menampilkan menu spesial hari ini lengkap dengan foto dan detail Informasi Nilai Gizi (AKG).
- **Riwayat Menu**: Daftar menu 30 hari terakhir dengan fitur **Filter Bulan** dan **Filter Sekolah**.
- **Layanan Pengaduan**:
    - Formulir pelaporan masyarakat (bisa anonim).
    - Daftar laporan publik yang transparan (status & tindak lanjut).
- **Pojok Edukasi**: Artikel dan video edukasi tentang gizi seimbang.
- **Tim & Lokasi**: Profil tim ahli gizi dan lokasi kantor pelayanan.

### 2. Dashboard Admin

- **Manajemen User**: CRUD pengguna (Admin, Petugas Gizi, Petugas Pengaduan).
- **Manajemen Sekolah**: CRUD data sekolah mitra penerima manfaat.
- **Monitoring (Read-Only)**:
    - Monitoring Riwayat Menu Global.
    - Monitoring Laporan Pengaduan Masuk.

### 3. Dashboard Petugas Gizi

- **Manajemen Menu**:
    - Input menu harian dan jadwal penyajian.
    - **Kalkulator Gizi**: Input detail Kalori, Protein, Karbohidrat, Lemak, dan Serat.
    - **Target Sekolah**: Penugasan menu ke sekolah tertentu.
- **Upload Foto**: Manajemen foto dokumentasi menu.

### 4. Dashboard Petugas Pengaduan

- **Manajemen Laporan**:
    - Melihat laporan masuk dari masyarakat.
    - Update status laporan (Pending -> Diproses -> Selesai).
    - Verifikasi bukti foto laporan.

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Blade Templates, Alpine.js v3, TailwindCSS v4
- **Database**: MySQL
- **Build Tool**: Vite v7

## Instalasi & Konfigurasi

Ikuti langkah-langkah berikut untuk menjalankan project di komputer lokal Anda.

### Prasyarat

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL Server

### Langkah Instalasi

1.  **Clone Repository**

    ```bash
    git clone https://github.com/username/my-mbg.git
    cd my-mbg
    ```

2.  **Install Dependencies**

    ```bash
    composer install
    npm install
    ```

3.  **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env` dan sesuaikan koneksi database.

    ```bash
    cp .env.example .env
    ```

    Buka file `.env` dan atur:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_mbg
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Generate App Key**

    ```bash
    php artisan key:generate
    ```

5.  **Migrasi & Seeding Database**
    Jalankan migrasi dan isi data awal (User, Sekolah, Menu Dummy).

    ```bash
    php artisan migrate:fresh --seed
    ```

6.  **Jalankan Aplikasi**
    Buka dua terminal terpisah untuk menjalankan server Laravel dan Vite.

    _Terminal 1 (Laravel Server):_

    ```bash
    php artisan serve
    ```

    _Terminal 2 (Vite Build Asset):_

    ```bash
    npm run dev
    ```

7.  **Akses Aplikasi**
    Buka browser dan kunjungi: `http://127.0.0.1:8000`

---

## Akun Default (Login)

Gunakan akun berikut untuk masuk ke dashboard sistem:

| Role                  | Email           | Password   |
| :-------------------- | :-------------- | :--------- |
| **Admin System**      | `admin@mbg.com` | `password` |
| **Petugas Gizi**      | `gizi@bg.com`   | `password` |
| **Petugas Pengaduan** | `aduan@bg.com`  | `password` |

> **Catatan:** Jangan lupa untuk mengganti password default saat pertama kali implementasi di production.

---

## Lisensi

Project ini dilisensikan di bawah [MIT License](LICENSE).

---

_Dibuat untuk UKK RPL 2026 - Paket 3 (Aplikasi Pelaporan Pengaduan Masyarakat & Portal Gizi)_
