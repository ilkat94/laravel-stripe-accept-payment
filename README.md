# Laravel Stripe Accept Payment

This is a Laravel application that handles authentication and card charges using Stripe.

## Prerequisites

1. PHP
2. Composer
3. Docker
4. Docker Compose

## Installation

```bash
composer install
```

## Usage

1. Copy `.env.example` file to `.env`
2. Replace `sqlite` value in `DB_CONNECTION` with `mariadb` and comment in `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD`.
3. For database name use `laravel-stripe`, database username use `root` and for password `123456`.
4. Now add `STRIPE_KEY` and `STRIPE_SECRET` variables at the end of `.env` file.
5. Create a Stripe account and in Developers page go to API Keys tab. Copy the keys and add them in `.env` file respectively.
6. In terminal run `docker-compose up -d` to start mariadb and phpmyadmin containers.
7. Run `php artisan migrate`.
8. Run `php artisan serve` to start the app.
