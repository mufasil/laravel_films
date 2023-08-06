# Laravel Films Project Installation Guide

This document provides step-by-step instructions on how to install and set up a Laravel Films Project. Laravel is a popular PHP framework that simplifies the development of web applications. Before proceeding, ensure that you have the following prerequisites installed on your system:

1. **PHP:** Version 8.0 
2. **Composer:** A dependency manager for PHP. You can download and install it from [getcomposer.org](https://getcomposer.org/).
3. **Web Server:** Apache, Nginx, or any other web server that supports PHP.
4. **Database:** MySQL, PostgreSQL, SQLite, or any other supported database.
5. **Git:** Version control system. You can download and install it from [git-scm.com](https://git-scm.com/).

## Installation Steps

Follow these steps to install the Laravel project:

### 1. Clone the Repository

```bash
git clone https://github.com/mufasil/laravel_films.git
```
### 2. Install Dependencies
```bash
cd <project_directory>
composer install
```

### 3. Environment Configuration
Rename the .env.example file to .env. Update the necessary environment variables in the .env file, such as the database connection details and application key. You can generate the application key using the following command:

```bash
php artisan key:generate
```

### 4. Database Setup
Create a new database for your Laravel project and update the database connection details in the .env file. Then, run the database migrations to create the required tables:

```bash
php artisan key:generate
```