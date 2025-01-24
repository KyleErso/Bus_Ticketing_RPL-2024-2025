<<<<<<< HEAD
# **Sistem Pemesanan Tiket Bus 🚌🎫**

**Proyek Tugas Besar Mata Kuliah Rekayasa Perangkat Lunak**  
Website pemesanan tiket bus online untuk mempermudah pengguna dalam mencari, memesan, dan mengelola tiket perjalanan antar kota.

---

### 📋 Deskripsi Proyek
Sistem ini dikembangkan sebagai tugas besar mata kuliah Rekayasa Perangkat Lunak yang mencakup:
- Desain Use Case
- Diagram Aktivitas
- Diagram Urutan
- Desain Sistem (UI/UX & Arsitektur)
- Implementasi Kode
- Dokumentasi

### 🚀 Fitur Utama
- **Pencarian Rute**: Pencarian rute bus berdasarkan kota asal, tujuan, dan tanggal keberangkatan.
- **Pemesanan Tiket**: Pemesanan tiket dengan pilihan kursi dan metode pembayaran terintegrasi.

### 💻 Teknologi
**Framework**:  
[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)](https://laravel.com)

**Frontend**:  
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat&logo=html5&logoColor=white)](https://html5.org)  
[![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat&logo=bootstrap&logoColor=white)](https://getbootstrap.com)

**Database**:  
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)](https://www.mysql.com)

**Payment Gateway**:  
[![Midtrans](https://img.shields.io/badge/Midtrans-00B200?style=flat&logo=midtrans&logoColor=white)](https://midtrans.com) 

### 🛠 Instalasi
1. **Clone repositori**:
```bash
git clone https://github.com/KyleErso/Bus_Ticketing_RPL-2024-2025.git
```

2. **Install dependensi Laravel**:
```bash
composer install
```

3. **Install dependensi frontend** :
```bash
npm install && npm run dev
```

4. **Buat file `.env` dengan konfigurasi berikut**:
```env
APP_NAME=BusTicketReservation
APP_ENV=local
APP_KEY=base64:...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tiket_bus
DB_USERNAME= (SESUAIKAN USERNAME)
DB_PASSWORD= (SESUAIKAN PASSWORD)
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
| Nama                          | NRP      |
|-------------------------------|----------|
| Evan Kristian Pratama         | 2372047  |
| Josh Barnabas                 | 2372048  |
| Alexsander Josse Sulistio     | 2372050  |

### 🤝 Kontribusi
Silakan buka *issue* atau *pull request* untuk berkontribusi dalam pengembangan proyek ini.

---

**Dibuat dengan ❤️ oleh Evan, Josh, Alex**  
📍 Universitas Kristen Maranatha

---

=======
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
>>>>>>> 7e12b82 (Add project files)
