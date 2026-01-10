# 👗 Desi Outfit Planner (Full-Stack)

A smart recommendation engine that translates real-time weather data into cultural fashion advice. Built with **Laravel 11**, **Vue.js 3**, and **Tailwind CSS**.

## 🚀 Features
- **Real-time Weather:** Integrated with OpenWeather API.
- **Dynamic Logic:** Range-based filtering mapping temperature to Desi attire.
- **Modern UI:** Glassmorphic design with Vue skeleton loaders.
- **Defensive Design:** Automatic image fallback and 404 error handling.



## 🛠️ Tech Stack
- **Backend:** Laravel 11 (PHP 8.2+)
- **Frontend:** Vue.js 3 (Composition API)
- **Styling:** Tailwind CSS
- **Database:** MySQL / SQLite

## ⚙️ Installation

1. **Clone & Install:**
   ```bash
   git clone [[https://github.com/your-username/your-repo-name.git](https://github.com/simasud485/desi-outfit-planner.git)]
   composer install && npm install

### 2. Environment Setup
- Copy `.env.example` to `.env`
- Add your `OPENWEATHER_API_KEY`
- Configure your Database settings

### 3. Database Migration & Seeding
```bash
php artisan migrate:fresh --seed
Bash

### 4. Run Application
```bash
php artisan serve
npm run dev
Bash
