<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Laravel Vue2 Members Test 
This is a plain, un-authenticated SPA single listview with Laravel Rest Api on the back. Rest API can be consumed from this application or directly onto the API. The front-end uses Vue2 Javascript framework. Styling is with Bootstrap.  <a href="http://intellipharm.headstation.com">Live demo here</a>

## Installation
Clone or Download this repo. These instructions assume that you have installed Composer, Laravel 5.5, PHP7, Node Package Manager and MySQL.

Once downloaded, cd into repo directory and start installation:

````ruby
composer install 
````

Create a new mysql database:
````ruby
mysql -u root -p
create database laravel_vue2_crud;
CREATE USER 'homestead'@'%' IDENTIFIED BY 'secret';
grant all privileges on *.* to 'homestead'@'%';
````

Copy .env.example to .env and change the database variable in .env:
````ruby
DB_DATABASE=laravel_vue2_crud
````

Generate the Artisan key:
````ruby
php artisan key:generate
````

Migrate the tables and seed the database. Adds about 100 members with random data:
````ruby
php artisan migrate:refresh --seed
````

Install Vue2 components listed in package.json:
````ruby
npm install
````

Run NPM dev to compile js:
````ruby
npm run dev
````

and serve the application with artisan:
````ruby
php artisan serve
````

You should now be able to browse this app on http://localhost:8000. 

## Rest API
Api can be consumed directly. Following is an example of a call to retrieve all members.
````ruby
http://localhost:8000/api/members
````
