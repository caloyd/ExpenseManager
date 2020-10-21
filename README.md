<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

### Setting database 
- Edit the .env file and fill the database information ( DB_DATABASE, DB_USERNAME, DB_PASSWORD )
    - DB_DATABASE=expense_manager
- php artisan migrate:fresh --seed
- Run php artisan serve

### Default Accounts
- Administrator:
    - email: carloedison@example.com
    - password: password1

- User:
    - email: userone@example.com
    - password: password2

### Default Password for newly created user
- default123
