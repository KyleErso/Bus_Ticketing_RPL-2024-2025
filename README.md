---

# **Sistem Pemesanan Tiket Bus 🚌🎫**

![GitHub](https://img.shields.io/github/license/[username]/[nama-repo]?style=flat-square)  
![GitHub last commit](https://img.shields.io/github/last-commit/[username]/[nama-repo]?style=flat-square)

**Proyek Tugas Besar Mata Kuliah Rekayasa Perangkat Lunak**  
Website pemesanan tiket bus online untuk mempermudah pengguna mencari, memesan, dan mengelola tiket perjalanan antar kota.

---

### 📋 Deskripsi Proyek
Sistem ini dirancang untuk memenuhi tugas besar mata kuliah Rekayasa Perangkat Lunak yang meliputi:
- Desain Use Case
- Activity Diagram
- Sequence Diagram
- Desain sistem (UI/UX & arsitektur)
- Implementasi kode
- Dokumentasi

### 🚀 Fitur Utama
- **Pencarian Rute**: Pencarian rute bus berdasarkan kota asal, tujuan, dan tanggal keberangkatan.
- **Pemesanan Tiket**: Pesan tiket dengan pilihan kursi dan metode pembayaran terintegrasi.

### 💻 Teknologi
**Framework**:  
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)

**Frontend**:  
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat&logo=html5&logoColor=white)  
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat&logo=bootstrap&logoColor=white)

**Database**:  
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)

**Lainnya**:  
![Midtrans](https://img.shields.io/badge/Midtrans-00B200?style=flat&logo=midtrans&logoColor=white) (Payment Gateway)

### 🛠 Instalasi
1. **Clone FORK repositori**:
```bash
git clone https://github.com/KyleErso/Bus_Ticketing_RPL-2024-2025.git
```

2. **Install dependencies Laravel**:
```bash
composer install
```

3. **Install dependencies frontend** (opsional, jika menggunakan npm):
```bash
npm install && npm run dev
```

4. **Buat file `.env` dengan konfigurasi berikut** (contoh):
```env
APP_NAME=BusTicketReservation
APP_ENV=local
APP_KEY=base64:...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tiket_bus
DB_USERNAME= (SESUAIKAN DENGAN ...  MASING-MASING)
DB_PASSWORD= (SESUAIKAN DENGAN ...  MASING-MASING)
```

5. **Jalankan migrasi**:
```bash
php artisan migrate
```

6. **Jalankan server lokal**:
```bash
php artisan serve
```

### 👥 Anggota Kelompok
| Nama                          | NIM      |
|-------------------------------|----------|
| Evan Kristian Pratama         | 2372047  |
| Josh Barnabas                 | 2372048  |
| Alexsander Josse Sulistio     | 2372050  |

### 🤝 Kontribusi
Silakan buka *issue* atau *pull request* untuk berkontribusi dalam pengembangan proyek ini.

---

**Dibuat dengan ❤️ oleh Evan, Josh, Alek**  
📍 Universitas Kristen Maranatha

---
