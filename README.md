# Todo List App
This is a simple web application that allows users to add and remove to-do items from a list. It is built using Laravel 8 and Vue.js.

## Installation
To install this application, follow these steps:

1. Clone the repository:
```
git clone git@github.com:vladowski/todo-list-test.git
```
2. Install the dependencies using Composer and NPM:
```
cd todo-list-test
composer install
npm install
```
3. Create a .env file by copying the example file. (Also do not forget to fill database variables with your values):
```
cp .env.example .env
```
4. Generate an application key:
```
php artisan key:generate
```
5. Set up the database by filling in the database details in the .env file and running the migrations:
```
php artisan migrate
```

## Usage
To use this application, follow these steps:

1. Start the Laravel development server:
```
./vendor/bin/sail up -d
```
2. Build frontend by the following command:
```
npm run dev
```
The application will be accessible in your web browser from the following url: http://localhost

## Tests
To run the PHPUnit tests for this application, run the following command:
```
./vendor/bin/sail artisan test
```
