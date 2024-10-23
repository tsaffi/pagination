# Pagination

Pagination is a project that implements the display of paginated items with the option to change the number of items rendered per page and search and sort items in ascending/descending order of their name, while taking into consideration performance with large datasets.

## Requirements

List of server requirements to have the project running:

`PHP 8.2, MySQL 8.1.0, Web Server (e.g. Nginx)`

## Installation and Setup

Step by step procedure to install and configure the project:

- Install dependencies:
    
    `composer install`

- Run the migrations and seed the data:

    `php artisan migrate --seed`


## Serving the Application

- Start your Laravel development server:

    `php artisan serve`

- Navigate to the page where the Livewire component is rendered (e.g. http://localhost:8000/opportunities).

- Test changing the "Items per page", "search", and "sort" selections and navigating through pages to ensure everything works as expected.
