# GameCollector

GameCollector is a Laravel-based web app that lets you store information about your video game collection.

# Requirements

 * PHP 7.2
 * MySQL 5.7.8 or later (for JSON support)
 * **A valid Laravel Nova 2.0 license**
 * `intl` PHP extension for currency

# Installation

 * Set up your webserver of choice.
 * Create a new database in MySQL.
 * Copy `.env.example` to `.env`
 * Edit `.env` and set your options as necessary.
 * Run `composer install` and provide your Laravel Nova login details.
 * Run `php artisan migrate --seed`
 * Use `php artisan tinker` to create a new user.
 * Go to `/collection` on your webserver to get started (e.g. http://localhost/gamecollector/collection)

# Support

This project is a work in progress. Things will change and break. Make sure to take regular backups, as I hold no responsibility for any lost data that occurs as a result of using this software.
