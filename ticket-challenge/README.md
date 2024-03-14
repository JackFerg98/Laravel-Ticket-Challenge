# Ticket Challenge

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

## About

This project is a Laravel-based application developed for a Laravel challenge for a job interview. It's sole purpose is for creating and processing tickets using dummy data periodically every 1 and 5 minutes respectively.

## Instructions

To get started with this project, follow these steps:

1. Clone this repository to your local machine.
2. Navigate to the project directory: 
```cd ticket-challenge```
3. Install PHP dependencies using Composer: 
```composer install```
4. Start the Docker environment: 
```./vendor/bin/sail up -d --build```
5. Run database migrations: 
```./vendor/bin/sail artisan migrate```
6. Seed the database with initial user data: 
```./vendor/bin/sail artisan db:seed --class=UserSeeder```
7. Start the scheduler for main functionality: 
```./vendor/bin/sail artisan schedule:work```
8. Run tests to ensure everything is working: 
```./vendor/bin/sail artisan test```


These instructions will set up the project environment and run it locally for development or testing purposes.

## Laravel Framework

Laravel is a web application framework with expressive, elegant syntax. It provides tools required for large, robust applications.

### Learning Laravel

Laravel has extensive documentation and a video tutorial library making it easy to get started with the framework. You may also try the Laravel Bootcamp or Laracasts for comprehensive learning.

### Laravel Sponsors

We extend our thanks to the sponsors for funding Laravel development.

## Contributing

Thank you for considering contributing to the Laravel framework! Please review the contribution guide in the Laravel documentation.

## Code of Conduct

To ensure the Laravel community is welcoming to all, please review and abide by the Code of Conduct.

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please report it to Taylor Otwell via email.

## License

The Laravel framework is open-sourced software licensed under the MIT license.