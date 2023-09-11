# laravel-test-task
This is a repo for a company's technical task.

# Requirements

- Docker;
- Composer;
- PHP 8.2+;
- Postman or some other application to write requests;

# How to set-up this project:

## Setting up the Laravel project for the first time

1. Git clone this repository:
git clone git@github.com:arturscerjaks/laravel-test-task.git

2. Create the Docker container (skip this step if you already have some DB management tool running).
Open Docker desktop and navigate to CRUD-API-PRODUCTS directory, and run command:
docker compose up

This will create a container with mariadb:10.8.3 and adminer which launches upon opening Docker Desktop.

3. Install project's dependencies with a terminal command inside crud-api-products directory:
php composer install

4. Within the project's .env file edit the rows relating to what database to use, e.g.:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud-api-products
DB_USERNAME=root
DB_PASSWORD=root

Adjust these values depending on your environment;

5. Inside project's folder open a terminal and run command:
php artisan migrate --seed

6. When prompted whether to create a new database, agree;

7. Run command in project folder:
php artisan serve

Project is now running while the terminal is open.

## Running project when already set-up

1. Open Docker Desktop and start the container;

2. Run a terminal command from the Laravel project directory:
php artisan serve

Project is now running while the terminal is open.

# Authentication

After seeding, you can receive a login token by making a POST request to localhost:8000/api/login
with this body:
{
    "email": "test@example.com",
    "password": "password"
}
And this extra header:
{
    "Accept": "application/json"
}

Or just use the publicly available Postman workspace where this and other requests are already prepared:
https://www.postman.com/orbital-module-geologist-16526295/workspace/crud-api-products

Without authenticating you can still use index and show actions.