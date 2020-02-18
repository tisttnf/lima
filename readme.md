# Kebutuhan

- Laravel Framework 5.5.48
- psql (PostgreSQL) 11.5 (Ubuntu 11.5-0ubuntu0.19.04.1)
- PHP 7.2.24-0ubuntu0.19.04.2
- Visual Studio Code 1.41.1
- Bootstrap 4

# Template

- Argon Design System Free https://www.creative-tim.com/product/argon-design-system
- Argon Dashboard Free https://www.creative-tim.com/product/argon-dashboard

# Instalasi Laravel

- composer create-project --prefer-dist laravel/laravel lima "5.5.*"
- Buat repostiroy lima di github dan dihubungkan ke https://github.com/tisttnf/lima

# Konfigurasi Database

- lima/.env
- lima/config/database.php

# Buat Authentication

- php artisan make:auth

# Tabel

- user
- admin
- project_owner
- dosen
- asisten_dosen
- mahasiswa
- prodi
- semester
- peran
- project
- mvp_project
- sprint_project
- log_project
- tim
- member_tim
- tim_skor
- member_tim_skor

# Role

- Admin :
    - Manajemen User
    - Manajemen Absen
    - Manajemen Tabel
- Project Owner :
    - Membuat Project
    - Mereview Project
    - Menilai Project
- Dosen :
    - Memasukkan Tim ke Project    
    - Membuat Tim
    - Memasukkan Asisten Dosen ke Project
    - Membuat Member Tim
    - Memasukkan Member Tim ke Project
    - Menilai Member Tim dan Tim
    - Melihat
- Asisten Dosen :
    -  
- Mahasiswa :
    - MVP Project
    - Sprint Project
    - Log Project

# Referensi

- https://github.com/mazharrasyad/Web-Laravel-Learn
- https://laravel.com/
- https://medium.com/@farahoktarina/a-simple-restful-web-service-in-laravel-fdeed60ecb55
