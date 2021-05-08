
Shopping-Cart!

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.4/installation#installation)

Clone the repository

    git clone https://github.com/sanjaygithub-94/shopping-cart.git

Switch to the repo folder

    cd shopping-cart

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate
    
Run the seeder for creating admin user

    php artisan db:seed

    Admin Credentials:
    username: admin@gmail.com
    password: 123456789


Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve


