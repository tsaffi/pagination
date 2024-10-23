# Pagination

Pagination is a project that implements the display of paginated items with the Items per page, search, and sort filters and ensuring optimal performance.

## Requirements

List of server requirements to have the project running

`PHP 8.2, MySQL 8.1.0`

## Installation and Setup

Step by step procedue to install and configure the project

- Install the packages.
    
    `composer install`

- Run the migrations and seed the data.

    `php artisan migrate --seed`


## Serving the Application

- Start your Laravel development server

    `php artisan serve`.

- Navigate to the page where the Livewire component is rendered (e.g. http://localhost:8000/opportunities).

- Test changing the "Items per page" selection and navigating through pages to ensure
everything works as expected.
