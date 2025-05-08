# Aplikasi Artikel dengan CodeIgniter 4

Ini adalah aplikasi artikel sederhana menggunakan framework **CodeIgniter 4**. Aplikasi ini memiliki fitur:
- Menampilkan daftar artikel
- Menambahkan artikel dengan upload gambar
- Mengedit artikel
- Menghapus artikel

---

## Persyaratan Sistem

- PHP >= 7.4
- Composer
- MySQL
- Web Server (Apache/Nginx)
- Ekstensi PHP:
    - `intl`
    - `mbstring`
    - `mysqli`
    - `gd` (untuk upload gambar)

---

## Instalasi

### 1. Clone Repositori

```bash
git clone https://github.com/username/nama-project.git
cd nama-project
```

### 2. Install Dependensi via Composer

```bash
composer install
```

### 3. Salin File `.env` dan Konfigurasi

```bash
cp env .env
```

Edit file `.env` sesuai pengaturan database lokal:

```ini
database.default.hostname = localhost
database.default.database = nama_database
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```

### 4. Generate Encryption Key

```bash
php spark key:generate
```

### 5. Jalankan Migrasi

```bash
php spark migrate
```

---

## Menjalankan Aplikasi

### 1. Dengan Web Server Lokal CodeIgniter

```bash
php spark serve
```

Akses di browser melalui: [http://localhost:8080](http://localhost:8080)

### 2. Atau dengan XAMPP / Apache

- Arahkan `DocumentRoot` ke folder `public/` proyek ini.
- Pastikan file `.htaccess` aktif.

---

## ✅ Fitur

- CRUD Artikel (Create, Read, Update, Delete)
- Upload dan tampilan gambar
- Validasi form
- Modal konfirmasi saat hapus

---

## Lisensi

Proyek ini menggunakan lisensi MIT.

---