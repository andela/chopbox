# Chopbox Community Portal


This is the repository for the [Chopbox](chopbox-staging.herokuapp.com) application. The code is entirely open source and it is a practice app for the andela php team.

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Frontend](#frontend)
- [Maintainers](#maintainers)

## Requirements

We use Laravel Homestead for local development. Please review [the Homestead documentation](http://laravel.com/docs/homestead) to install it.

In order to compile stylesheets you will also need Ruby, Sass, and Compass installed.

## Installation

1. Clone this repository: `git clone https://github.com/andela/chopbox.git/`
2. Update your `Homestead.yml` with the following settings:
    1. Add the path for the cloned chopbox repository to the `folders` list
    2. Add a site `chopbox.app` for the chopbox repository to the `sites` list
    3. Add a database called `chopbox` to the `databases` list
    4. Run `homestead provision`
3. SSH into your Homestead box and run the following commands:
    1. `composer install`
    2. `php artisan migrate --seed --env=local`
4. Add `192.168.10.10 chopbox.app` to your computer's `hosts` file
5. Follow the configuration steps below to configure the external services

## Configuration


## Frontend

Because we keep the generated / minified css out of the repository, we must have a workflow for compiling the styles.

- Be sure you have Ruby, Sass, and Compass installed on your machine
- When running any compass command in the terminal, be sure to run it from your `/public` folder.
- Compass is the tool used to compile Sass source files into CSS files; you can run `compass compile` to run it once, or `compass watch` to trigger a script that will watch your Sass files for changes and trigger a new compass compile on each change

## Maintainers

The Chopbox portal is currently maintained by [Prosper Otemuyiwa](https://github.com/busayo), [Kolawole Erinoso](https://github.com/andela-kerinoso), [Oladosu Dara](https://github.com/andela-doladosu),[Oduye Oluwayemisi](https://github.com/andela-ooduye),[Verem Dugeri](https://github.com/vdugeri) and [Chidozie Ijeomah](https://github.com/andela-cijeomah). 



