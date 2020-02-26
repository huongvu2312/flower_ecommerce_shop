# Flower Ecommerce Shop - VTH Blumen

Flower ecommerce shop, including both admin and user section.

## Getting Started

The website could be deployed locally per [XAMPP](https://www.apachefriends.org/index.html)

### Prerequisites

XAMPP

### Installing

* Install XAMPP
* Run XAMPP Control Panel.
* In Config option, open httpd.conf and change DocumentRoot and Directory to be the location you put the project in.
* Start Apache and MySQL in XAMPP Control Panel.
* Open localhost's [phpMyAdmin](http://localhost/phpmyadmin/)
* Create new database named **vthblumen**. You can choose to give the database a password. If you don't want to use a password, open `db_connection.php` in **storescripts** folder and change `$password` to `''`.
* Import the data onto **vthblumen** database through `SQL-Datei.sql` in **storescripts** folder.
* Open [index.php](http://localhost/).

## Features

- Authentication (Register/Login/Logout) for admin and user
- Admin control:
  + Delete user
  + Create, view, edit, delete products and categories
- User:
  + Create and manage account
  + Shopping cart
  + Contact with admin per contact form (with email)
  
## Build with
* PHP
* MySQL
* HTML5
* CSS3

## Live action

**User Interface**

![User GIF](https://media.giphy.com/media/XZUNOZZLszCXTPlRJ8/giphy.gif)

**Admin Interface**

![Admin GIF](https://media.giphy.com/media/QXJGFpYw5K4lOaqFoj/giphy.gif)

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
  

