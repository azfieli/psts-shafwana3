# 🎓 Pesat Boarding School - Student Grade Management System

Platform manajemen nilai siswa modern untuk Pesat Boarding School.

## 📋 Fitur Utama

- ✅ Dashboard dengan statistik real-time
- ✅ Manajemen Data Siswa
- ✅ Manajemen Data Guru
- ✅ Manajemen Mata Pelajaran
- ✅ Input & Tracking Nilai Siswa
- ✅ Pengaturan Guru Kelas & Guru Mapel
- ✅ Interface Modern & User-Friendly

## 🛠️ Tech Stack

- **Framework**: Laravel 11
- **Database**: MySQL
- **Frontend**: Bootstrap 5 + Custom CSS
- **Icons**: Font Awesome 6.4
- **PHP Version**: 8.2+

## 📊 Database Schema

### Tables

- `users` - User authentication
- `classrooms` - Kelas/Tulad data
- `teachers` - Data Guru
- `subjects` - Mata Pelajaran
- `students` - Data Siswa
- `scores` - Nilai Siswa
- `classroom_teachers` - Relasi Guru Kelas
- `subject_teachers` - Relasi Guru Mapel

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/azfieli/psts-shafwana3.git
cd psts-shafwana3
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database

Edit file `.env`:

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migrasi & Seeding Database

```bash
php artisan migrate:fresh --seed
```

### 6. Jalankan Application

```bash
php artisan serve
```

Aplikasi akan berjalan di: `http://127.0.0.1:8000`

## 📁 Struktur Folder

```
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Providers/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── resources/
│   ├── views/
│   │   ├── dashboard.blade.php
│   │   ├── layouts/
│   │   ├── classrooms/
│   │   ├── students/
│   │   ├── teachers/
│   │   ├── subjects/
│   │   └── scores/
│   ├── css/
│   └── js/
├── routes/
│   └── web.php
└── public/
    └── index.php
```

## 🎨 UI/UX Features

- Modern gradient design dengan warna profesional
- Hero section yang menarik
- Statistics dashboard dengan animated cards
- Responsive layout untuk mobile & desktop
- Smooth transitions & hover effects
- Clean & intuitive navigation

## 📈 Data Demo

Database sudah diisi dengan data sample:

**Siswa Utama:**

- NIS: 222
- Nama: Rida Saputra
- Kelas: 2B
- Nilai: 40.00

**Guru:**

- Total: 6 guru dengan berbagai mata pelajaran

**Mata Pelajaran:**

- Bahasa Indonesia, Pemrograman Web, Basis Data, PBO, Matematika, Bahasa Inggris

## 🔐 Security

- CSRF Protection enabled
- SQL Injection prevention via Eloquent ORM
- Authorization & Authentication ready
- Input validation on all forms

## 📝 Lisensi

Proprietary - Pesat Boarding School

## 👥 Tim Pengembang

Dikembangkan untuk Pesat Boarding School

---

**Dibuat dengan ❤️ untuk Pesat Boarding School**

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

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
