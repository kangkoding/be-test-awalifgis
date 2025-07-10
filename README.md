# VhiWEB BE TEST - AWALIF GHOTAMICHA IRFAN SAPUTRA

This is a simple E-Procurement API system built using Laravel.

## Features

-   User Registration & Login with Sanctum
-   Role-based User (`user`, `vendor`)
-   Vendor registration (only for vendor role)
-   Product Catalog (CRUD) (only accessible by vendor owner)
-   Token-based authentication
-   Postman collection provided
-   Seeder for dummy vendor & product data

## Tech Stack

-   PHP 8.2
-   Laravel 12.x
-   Laravel Sanctum (API token)
-   MySQL / MariaDB
-   Postman (for API testing)

## Installation

```bash
git clone https://github.com/kangkoding/be-test-awalifgis.git
cd be-test-awalifgis
composer install
cp .env.example .env
php artisan key:generate
```

Edit `.env` file to match your DB credentials:

```env
DB_DATABASE=be-test-awalifgis
DB_USERNAME=root
DB_PASSWORD=your_password
```

Then run:

```bash
php artisan migrate --seed
php artisan serve
```

## Default Testing Account

```
Email: vendor@example.com
Password: password
```

## API Endpoints

| Method | Endpoint           | Auth Required | Description               |
| ------ | ------------------ | ------------- | ------------------------- |
| POST   | /api/register      | ❌            | Register user             |
| POST   | /api/login         | ❌            | Login user                |
| POST   | /api/logout        | ✅            | Logout user               |
| POST   | /api/vendors       | ✅            | Register vendor           |
| GET    | /api/products      | ✅            | List all products         |
| POST   | /api/products      | ✅            | Create new product        |
| GET    | /api/products/{id} | ✅            | Get single product detail |
| PUT    | /api/products/{id} | ✅            | Update product            |
| DELETE | /api/products/{id} | ✅            | Delete product            |

## Postman Collection

Download and import this file to Postman:

[Download PDF Answers] (docs/BE-TEST_AwalifGhotamichaIrfanSaputra API Collection.json)

## Text Based Answer

A discussion on how to handle CSV imports efficiently (100k+ rows) and prepare for scaling was included in the written PDF response.

[Download PDF Answers] (docs/ScenarioAndSoftSkillTest_AwalifGhotamichaIrfanSaputra.pdf)

## License

For test purposes only.
