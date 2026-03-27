# 🚀 Nabdaff Portfolio - Mini Project 2 (PHP)

Welcome to my portfolio repository! This project is an evolution from a static HTML/Vue.js site to a dynamic website powered by **PHP** and **MySQL** database.

## 👤 Informasi Project

* **Nama**: Nabil Daffa Athalasyah
* **NIM**: 2409116090
* **Kelas**: Sistem Informasi C 2024
* **Mata Kuliah**: Praktikum Pemrograman Berbasis Web

---

## 🛠️ Tech Stack
This project utilizes a modern combination of technologies:
* **Frontend:** HTML5, CSS3 (Custom), Bootstrap 5, Vue.js (for reactive data rendering).
* **Backend:** PHP 8.x (Logic and CRUD operations).
* **Database:** MySQL (Local development with Laragon).
* **Server:** Apache (Laragon Environment).

---

## ✨ Features
- [x] **Dynamic Data:** Hero section and About me data fetched directly from MySQL.
- [x] **CRUD System:** Manage "Experiences" data (Create, Read, Update, Delete) through a dedicated dashboard.
- [x] **Reactive UI:** Integrated Vue.js to handle animations and data list rendering smoothly.
- [x] **Glassmorphism Design:** Modern aesthetic with blur effects and neon gradients.
- [x] **Responsive:** Fully optimized for mobile, tablet, and desktop views.

---

## 📸 Screenshots
| Landing Page | Experience Management (CRUD) |
|--------------|-----------------------------|
| ![Landing Page](https://via.placeholder.com/400x200?text=Portfolio+Landing) | ![CRUD](https://via.placeholder.com/400x200?text=Experience+Dashboard) |
> *Note: Replace these with your actual screenshots from the `assets/` folder.*

---

## 🚀 Installation & Usage (Local Development)

1.  **Clone the repository:**
    ```bash
    git clone [https://github.com/nabdaff/nabdaff-portfolio-php.git](https://github.com/nabdaff/nabdaff-portfolio-php.git)
    ```
2.  **Setup Database:**
    - Open **Laragon** or XAMPP.
    - Go to phpMyAdmin and create a database named `nabdaff_db`.
    - Import the provided `.sql` file or run the queries in the database section.
3.  **Configure Connection:**
    - Check `koneksi.php` and match your database credentials (username: `root`, password: ``).
4.  **Run:**
    - Place the folder in `C:/laragon/www/`.
    - Access via `http://localhost/MINPRO2_PHP_NABIL/`.

---

<p align="center">
✨ Pemrograman Berbasis Web - By Nabil Daffa Athalasyah | 2026 All Rights Reserved. ✨
</p>

---

## 📂 Project Structure
```text
MINPRO2_PHP_NABIL/
├── assets/             # Images and Icons
├── index.php           # Main Portfolio Page
├── tambah.php          # Add/View Experience (CRUD)
├── edit.php            # Edit Experience Logic
├── hapus.php           # Delete Experience Logic
├── koneksi.php         # Database Connection
├── style.css           # Custom Styling
└── README.md           # Project Documentation
