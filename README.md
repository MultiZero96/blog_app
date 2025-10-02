# 🚀 Laravel Blog — Containerized Setup Guide

A fully containerized Laravel blog application.
This README walks you through cloning, configuring, and launching the project using Docker — with backend and frontend build steps included.

---

## 📦 Prerequisites

Before you begin, make sure you have:

- **Docker Engine** ≥ 20.10 — for container runtime
- **Node.js** — for frontend assets outside Docker

---

## ⚙️ Environment Setup
- **For testing purposes the .env file is already included in the repo**:
---

## 📁 Clone the Repository

Clone the repo and move into the project directory:

```bash
git clone git@github.com:your-username/your-laravel-blog.git .
```

## 🐳 Start Docker Containers

Launch services in detached mode:

```bash
docker-compose up -d
```

This will:

- Build the `laravel_app` image
- Start services: `laravel_app`, `mysql`, etc.
- Mount volumes for persistent code and database storage

---

## 🧰 Install Backend Dependencies

Run Composer inside the container:

```bash
docker exec laravel_app composer install
```

---

## 🗃️ Run Migrations and Seeders

Reset and seed the database:

```bash
docker exec laravel_app php artisan migrate:fresh --seed
```

This will:

- Drop all tables
- Re-run migrations
- Populate sample data via seeders

---

## 🎨 Build Frontend Assets

Use npm inside the app source:

```bash
cd src/
npm install && npm run build
```

This will generate production-ready CSS and JS using vite build

---

## 🌐 Access the Application

Visit your app in the browser:

```
http://localhost:8000
```

If you changed ports in `docker-compose.yml`, adjust the URL accordingly.

---



---

## 🙌 Final Notes

After you see the splash screen, you can start by registering, afterwards you can browse posts/test the app:
