# GameCollector

GameCollector is a Laravel-based web app that lets you store information about your video game collection.

# Before You Begin
Want to use Game Collector but don't want to / can't host it yourself? Sign up here: https://gamecollector.online

# Features

 * Uses [Laravel Nova](https://nova.laravel.com) for a robust front-end
 * Has lots of fields useful for collectors and sellers, including:
   * When and where you bought an item and how much it cost you.
   * Selling fields such as where you sold it, for how much, and how much you listed it for.
   * The condition of the item
   * Metadata field so you can add arbitrary information such as publisher, serial numbers, CD keys etc.
   * Tags for marking things as on your wishlist, reproduction, games you've played / are playing
 * Upload images for each item so you can see what you have, what condition it's in, and so on. Also great for preserving game manuals, insets and such.
 * Create collections. They can be as broad as "All my Pokémon Games", or as specific as "Games bought at a garage sale on June 29th 2019"
 * Search to quickly find a game, tag, note or almost anything else about the game.
 * Comes with Laravel Cashier support, so you can plug in your own Stripe details.

# Requirements

 * PHP 7.2
 * MySQL 5.7.8 or later (for JSON support)
 * **A valid Laravel Nova 2.0 license**

# Installation

 * Set up your webserver of choice.
 * Create a new database in MySQL.
 * [Set up a queue worker (with Redis, database, etc.)](https://laravel.com/docs/7.x/queues)
 * Copy `.env.example` to `.env`
 * Edit `.env` and set your options as necessary.
 * Run `composer install` and provide your Laravel Nova login details.
 * Run `php artisan migrate --seed`
 * Use `php artisan tinker` to create a new user.
 * Go to `/collect` on your webserver to get started (e.g. http://localhost/gamecollector/collection)

# Support

This project is a work in progress. Initially, things will change and break. Make sure to take regular backups, as I hold no responsibility for any lost data in this development version.

If you wish to contribute, please ensure that any changes you make are backwards compatible. If you're not sure, submit an issue to discuss it first.

# Screenshots

[![Viewing details about a game](https://imgur.com/Z8uDYNw.jpg)](https://imgur.com/Z8uDYNw.jpg)

[![Stats on the dashboard](https://imgur.com/XBvSbMU.jpg)](https://imgur.com/XBvSbMU.jpg)

[![Viewing a list of items](https://imgur.com/ShmZaqs.jpg)](https://imgur.com/ShmZaqs.jpg)

[![Updating an item](https://imgur.com/CSuWNyl.jpg)](https://imgur.com/CSuWNyl.jpg)

[![Adding metadata and media](https://imgur.com/fTnGCw8.jpg)](https://imgur.com/fTnGCw8.jpg)

[![Tagging an item](https://imgur.com/L8Vz5X2.jpg)](https://imgur.com/L8Vz5X2.jpg)

[![Searching for an item](https://imgur.com/0OqsyBh.gif)](https://imgur.com/0OqsyBh.gif)
