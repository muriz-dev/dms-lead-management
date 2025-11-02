# DMS Lead Management Dashboard

> Simple internal lead management system for PT Dynamics Management Solution

[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?style=flat-square&logo=php)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-06B6D4?style=flat-square&logo=tailwind-css)](https://tailwindcss.com)

---

## 🎯 About

Internal web application untuk mengelola prospek klien (leads) dengan sistem CRUD lengkap, status tracking, dan dashboard statistics.

**Brand Colors:** 🟠 Orange `#FF6900` | ⚫ Black `#000000` | ⚪ White `#FFFFFF`

---

## ✨ Features

- 🔐 **Authentication** - Login/logout dengan Laravel Breeze
- 📊 **Dashboard** - Real-time statistics (Total, New, Contacted, Interested, Converted)
- 👥 **Lead CRUD** - Create, Read, Update, Delete leads
- 🔍 **Search & Filter** - Cari berdasarkan nama/email/company, filter by status
- 📝 **Status Tracking** - 5 status: New, Contacted, Interested, Not Interested, Converted
- 👤 **User Assignment** - Assign leads ke team members
- 📱 **Responsive** - Mobile-friendly design

---

## 🚀 Quick Start

### Prerequisites
- PHP 8.3+, Composer, Node.js 18+, MySQL 8.0+

### Installation

```bash
# Clone repository
git clone https://github.com/dynamics-ms/dms-lead-management.git
cd dms-lead-management

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure database di .env, lalu:
php artisan migrate
php artisan db:seed

# Build & run
npm run dev          # Terminal 1
php artisan serve    # Terminal 2
```

Visit: `http://localhost:8000`

---

## 👤 Default Login

```
Email: admin@dynamics-ms.com
Password: password
```

⚠️ **Change password in production!**

---

## 📊 Lead Status

| Status | Meaning | Color |
|--------|---------|-------|
| 🔵 **NEW** | Lead baru masuk | Blue |
| 🟡 **CONTACTED** | Sudah dihubungi | Yellow |
| 🟢 **INTERESTED** | Menunjukkan ketertarikan | Green |
| 🔴 **NOT INTERESTED** | Tidak tertarik saat ini | Red |
| 🟠 **CONVERTED** | Berhasil jadi customer! | Orange |

---

## 🛠️ Tech Stack

- **Backend:** Laravel 12, PHP 8.3+, MySQL
- **Frontend:** Blade, Tailwind CSS 3.x, Vite
- **Auth:** Laravel Breeze

---

## 📁 Key Files

```
app/
├── Http/Controllers/
│   ├── DashboardController.php    # Dashboard stats
│   └── LeadController.php         # Lead CRUD
├── Models/
│   └── Lead.php                   # Lead model
└── Enums/
    └── LeadStatus.php             # Status enum

resources/views/
├── dashboard.blade.php            # Dashboard
└── leads/                         # Lead views
    ├── index.blade.php
    ├── create.blade.php
    ├── edit.blade.php
    └── show.blade.php
```

---

## 🧪 Testing

```bash
php artisan test
```

---

## 🚀 Deployment

```bash
# Production build
npm run build

# Optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force
```

Set `.env`:
```
APP_ENV=production
APP_DEBUG=false
```

---

## 📝 Contributing

Baca [CONTRIBUTING.md](CONTRIBUTING.md) untuk guidelines.

**Commit Convention:**
```bash
feat: add CSV export
fix: resolve dashboard bug
docs: update README
```

---

## 📄 License

**Proprietary** - © 2025 PT Dynamics Management Solution. All Rights Reserved.  
For internal use only.

---

## 📞 Support

- 📧 Email: it-support@dynamics-ms.com
- 💬 Slack: #dms-tech-support

---

## 🌟 PT Dynamics Management Solution

**Services:** AI Services • Cybersecurity • Digital Protection  
**Website:** [dynamics-ms.com](https://www.dynamics-ms.com)  
**Tagline:** *Protect, Predict, and Prevent, with Intelligent Defense.*

---

**Made with ❤️ by DMS Development Team**
