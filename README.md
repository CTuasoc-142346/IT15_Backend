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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# IT15 AMS Portal
### Academic Management System — Full-Stack Web Application
> Built with **Laravel 11** (Backend) · **React + Vite** (Frontend) · **MySQL** (Database)

---

## Table of Contents

- [Project Overview](#project-overview)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Prerequisites](#prerequisites)
- [Backend Setup](#backend-setup)
- [Frontend Setup](#frontend-setup)
- [Environment Variables](#environment-variables)
- [Database](#database)
- [API Overview](#api-overview)
- [Features](#features)
- [Common Issues](#common-issues)

---

## Project Overview

The IT15 AMS Portal is an academic management system designed for a Philippine college. It provides a dashboard for administrators to view student enrollment data, program offerings, subject curricula, course listings, posts and announcements, and academic calendar information — all served through a RESTful Laravel API consumed by a React frontend.

---

## Tech Stack

| Layer     | Technology                          |
|-----------|-------------------------------------|
| Backend   | Laravel 11, PHP 8.2+, Sanctum       |
| Frontend  | React 18, Vite, Recharts            |
| Database  | MySQL 8.0+                          |
| Auth      | Laravel Sanctum (token-based)       |
| Styling   | Inline styles, DM Sans + Syne fonts |

---

## Project Structure

```
IT15/
├── IT15_Backend/          # Laravel API
│   ├── app/
│   │   ├── Http/Controllers/Api/
│   │   │   ├── AuthController.php
│   │   │   ├── StudentController.php
│   │   │   ├── CourseController.php
│   │   │   ├── ProgramController.php
│   │   │   ├── SubjectController.php
│   │   │   ├── PostController.php
│   │   │   └── SchoolDayController.php
│   │   └── Models/
│   │       ├── Student.php
│   │       ├── Course.php
│   │       ├── Department.php
│   │       ├── Program.php
│   │       ├── Subject.php
│   │       ├── Enrollment.php
│   │       ├── Post.php
│   │       ├── Category.php
│   │       └── SchoolDay.php
│   ├── database/
│   │   ├── migrations/
│   │   └── seeders/
│   └── routes/
│       └── api.php
│
└── IT15_Frontend/         # React + Vite SPA
    └── src/
        ├── api/
        │   └── auth.js
        ├── assets/
        │   └── logo.ico
        ├── components/
        │   ├── Dashboard.jsx
        │   ├── PostsPage.jsx
        │   ├── ProgramList.jsx
        │   ├── SubjectList.jsx
        │   ├── SideBar.jsx
        │   ├── WeatherWidget.jsx
        │   ├── LogoutConfirm.jsx
        │   └── UI.jsx
        ├── hooks/
        │   ├── useFetch.js
        │   └── useWeather.js
        ├── pages/
        │   └── loginPage.jsx
        ├── App.jsx
        └── theme.js
```

---

## Prerequisites

Make sure the following are installed on your machine before starting:

- **PHP** 8.2 or higher — https://www.php.net/downloads
- **Composer** 2.x — https://getcomposer.org
- **Node.js** 18 or higher — https://nodejs.org
- **npm** 9 or higher (comes with Node.js)
- **MySQL** 8.0 or higher — https://dev.mysql.com/downloads
- **Git** — https://git-scm.com

To verify your installations:

```bash
php --version
composer --version
node --version
npm --version
mysql --version
```

---

## Backend Setup

### 1. Navigate to the backend directory

```bash
cd IT15/IT15_Backend
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Create the environment file

```bash
cp .env.example .env
```

### 4. Generate the application key

```bash
php artisan key:generate
```

### 5. Configure your database

Open `.env` and update the database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tuasoc_backend
DB_USERNAME=root
DB_PASSWORD=your_password_here
```

> Create the database in MySQL first if it doesn't exist:
> ```sql
> CREATE DATABASE tuasoc_backend;
> ```

### 6. Run migrations and seed the database

```bash
php artisan migrate:fresh --seed
```

This will create all tables and populate them with:
- 1 admin user account
- 6 post categories + 12 sample posts
- 8 departments
- 19 academic programs
- 215+ subjects with full curriculum per program
- 24 courses linked to departments
- 520 students with demographic data
- 684 enrollment records
- Full AY 2025–2026 academic calendar with attendance data

### 7. Start the development server

```bash
php artisan serve
```

The API will be available at `http://localhost:8000`

---

## Frontend Setup

### 1. Open a new terminal and navigate to the frontend directory

```bash
cd IT15/IT15_Frontend
```

### 2. Install Node dependencies

```bash
npm install
```

### 3. Create the environment file

```bash
cp .env.example .env
```

### 4. Configure the API URL and OpenWeatherMap key

Open `.env` and set:

```env
VITE_API_URL=http://localhost:8000/api
VITE_OWM_KEY=your_openweathermap_api_key_here
```

> **Weather widget:** The weather widget in the sidebar uses OpenWeatherMap.
> Get a free API key at https://openweathermap.org/api
> If you skip this, the weather widget will show an error but everything else works normally.

### 5. Start the development server

```bash
npm run dev
```

The app will be available at `http://localhost:5173`

---

## Environment Variables

### Backend — `IT15_Backend/.env`

| Variable          | Description                              | Example                  |
|-------------------|------------------------------------------|--------------------------|
| `APP_NAME`        | Application name                         | `IT15 AMS Portal`        |
| `APP_ENV`         | Environment mode                         | `local`                  |
| `APP_KEY`         | Generated app key (auto-set)             | `base64:...`             |
| `APP_URL`         | Backend base URL                         | `http://localhost:8000`  |
| `DB_CONNECTION`   | Database driver                          | `mysql`                  |
| `DB_HOST`         | Database host                            | `127.0.0.1`              |
| `DB_PORT`         | Database port                            | `3306`                   |
| `DB_DATABASE`     | Database name                            | `tuasoc_backend`         |
| `DB_USERNAME`     | Database username                        | `root`                   |
| `DB_PASSWORD`     | Database password                        | `your_password`          |
| `SANCTUM_STATEFUL_DOMAINS` | Allowed frontend domains        | `localhost:5173`         |

### Frontend — `IT15_Frontend/.env`

| Variable         | Description                               | Example                        |
|------------------|-------------------------------------------|--------------------------------|
| `VITE_API_URL`   | Laravel API base URL                      | `http://localhost:8000/api`    |
| `VITE_OWM_KEY`   | OpenWeatherMap API key (weather widget)   | `abc123...`                    |

---

## Database

### Default Admin Account

After seeding, log in with:

```
Email:    admin@school.edu.ph
Password: password
```

### Migration Order

The migrations run in this order to satisfy foreign key constraints:

```
users
cache / jobs
categories
posts
students
personal_access_tokens
departments          ← new
programs             ← depends on departments
subjects             ← depends on programs
courses              ← depends on departments
enrollments          ← depends on students + courses
school_days
```

### Re-seeding

To wipe all data and start fresh:

```bash
php artisan migrate:fresh --seed
```

> ⚠️ This drops all tables and deletes all data. Any existing Sanctum tokens will be invalidated — you will need to log in again after running this command.

### Running Only Migrations (No Data Wipe)

```bash
php artisan migrate
```

---

## API Overview

All API routes are prefixed with `/api`. Protected routes require a Bearer token in the `Authorization` header obtained from `POST /api/login`.

| Method | Endpoint                        | Auth     | Description                          |
|--------|---------------------------------|----------|--------------------------------------|
| POST   | `/api/login`                    | Public   | Login and receive token              |
| POST   | `/api/logout`                   | Required | Revoke token                         |
| GET    | `/api/me`                       | Required | Authenticated user profile           |
| GET    | `/api/students`                 | Required | Paginated student list               |
| GET    | `/api/students/stats`           | Required | Enrollment statistics                |
| GET    | `/api/students/{id}`            | Required | Single student + enrolled courses    |
| GET    | `/api/courses`                  | Required | Paginated course list                |
| GET    | `/api/courses/stats`            | Required | Course statistics                    |
| GET    | `/api/courses/{id}/students`    | Required | Students in a course                 |
| GET    | `/api/departments`              | Required | All departments + program count      |
| GET    | `/api/programs`                 | Required | Programs (filterable by department)  |
| GET    | `/api/programs/{id}`            | Required | Program + full curriculum            |
| GET    | `/api/subjects`                 | Required | Subjects (filterable)                |
| GET    | `/api/categories`               | Required | Post categories + post count         |
| GET    | `/api/posts`                    | Required | Paginated posts (filterable)         |
| GET    | `/api/posts/{id}`               | Required | Single post                          |
| GET    | `/api/school-days`              | Required | Academic calendar                    |
| GET    | `/api/school-days/stats`        | Required | Attendance statistics                |
| GET    | `/api/school-days/upcoming`     | Required | Next upcoming events                 |

For full request parameters and response shapes, refer to the `IT15_AMS_API_Documentation.docx` file.

---

## Features

### Dashboard
- Live stat cards: Total Students, Courses Offered, Departments, Enrolled
- Monthly Enrollment bar chart
- Students by Department pie chart
- Attendance Patterns area chart (AY 2025–2026)
- Recently enrolled students list
- Active courses list

### Posts
- Post feed with category filter sidebar
- Category colour-coded badges (General, Announcements, Questions/Help, Discussion, News, Events)
- Search by title, body, or author name
- Post detail modal with full body text and posted date

### Program Offerings
- Department dropdown filter with dean/contact info
- Program cards showing code, name, duration, units, description
- "View Curriculum" modal — subjects grouped by year level and semester

### Subject Offerings
- Filter by program, year level (1st–4th), semester (1st, 2nd, Summer)
- Search by subject code or title
- Subject cards showing units, type, prerequisites

### Sidebar
- Collapsible desktop sidebar
- Weather widget (OpenWeatherMap) showing Tagum City weather by default
- City search + geolocation support in weather modal
- Dark / light mode toggle

---

## Common Issues

### "Unauthenticated" on all requests after migrate:fresh

Running `migrate:fresh` drops the `personal_access_tokens` table, invalidating all existing tokens. Just log in again at the frontend login page.

### CORS errors in the browser

Make sure `SANCTUM_STATEFUL_DOMAINS` in your `.env` includes your frontend origin:

```env
SANCTUM_STATEFUL_DOMAINS=localhost:5173
```

Then restart the Laravel server:

```bash
php artisan serve
```

### "Column not found" error during seeding

You may have an old migration file still present. Check `database/migrations/` for any of these old files and delete them:

```
2026_03_13_000001_add_demographics_to_students_table.php
2026_03_13_000002_add_details_to_courses_table.php
2026_03_13_000003_create_school_days_table.php
2026_02_13_144633_create_enrollments_table.php  ← old enrollments migration
```

Then re-run `php artisan migrate:fresh --seed`.

### Weather widget shows "Invalid API key"

Add your OpenWeatherMap key to the frontend `.env` file:

```env
VITE_OWM_KEY=68a8a719f7ab69c7d47f3aab0e39d7a9
```

Then restart the Vite dev server (`Ctrl+C`, then `npm run dev`).

### Port already in use

If port `8000` is taken:

```bash
php artisan serve --port=8001
```

Update `VITE_API_URL` in the frontend `.env` to match:

```env
VITE_API_URL=http://localhost:8001/api
```

If port `5173` is taken, Vite will automatically pick the next available port and display it in the terminal.

### npm install fails on Node version

This project requires Node.js 18 or higher. Check your version:

```bash
node --version
```

If you're on an older version, update at https://nodejs.org or use a version manager like `nvm`.

---

> **Note:** The `/api/token-test` route is a development helper that returns a Sanctum token for the first user. Remove this route from `routes/api.php` before deploying to production.