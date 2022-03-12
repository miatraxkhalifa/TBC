# Larawind - Laravel 8.0+ Jetstream and Tailwind CSS Admin Theme

This project is created with [Laravel Jetstream](https://jetstream.laravel.com/1.x/introduction.html) Framework and [Tailwind CSS](https://tailwindcss.com), the admin environment is desing by [Windmill Dashboard](https://windmill-dashboard.vercel.app/).

## Requirements

- Laravel installer
- Composer
- Npm installer

## Installation

```
# Clone the repository from GitHub and open the directory:
git clone https://github.com/miatraxkhalifa/Thebisdakcoder.git

# cd into your project directory
cd larawind

#install composer and npm packages
composer install
npm install && npm run dev

# Start prepare the environment:
setup database credentials //db name Blog
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link

# Run your server
php artisan serve

```
