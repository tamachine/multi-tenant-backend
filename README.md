# Getting started

## Description
This is the backend for the Intergalactic spaceship

It is a multi-tenant back-end that uses the package: https://spatie.be/docs/laravel-multitenancy/v3 for the multitenancy. It has a database for every tenant

It also has an API to serve all the differente front-ends

## Pre requisites
This project is using PHP 8.1 with TALL stack (Tailwind 3, Alpine, Livewire and Laravel 9) and Laravel mix 6

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)

Clone the repository

    git clone git@bitbucket.org:scandinavian/nave-intergalactica.git

Switch to the repo folder

    cd nave-intergalactica

Install composer dependencies

    composer install

Install npm dependencies

    npm install

Create the assets

    npm run development

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Copy the tenant.example env file for every tenant. tenant-name must be the same as the name in the landlord database

    cp .env.tenant.example .env.tenant-name

Run the database migrations and default seeder(**Set the database connection in .env before migrating**)
This is a multi tenant site (https://spatie.be/docs/laravel-multitenancy/v3). Migrations should be run like:

    php artisan migrate --path=database/migrations/landlord --database=landlord
    php artisan tenants:artisan "migrate --database=tenant --seed"

If the command only needs to run for a specific tenant, you can pass its id to the tenant option.

    php artisan tenants:artisan "migrate --database=tenant" --tenant=1

You can now access the server at http://localhost:8000

## API token 

There is an API to be consumed from the front-end.

To create a token to access the api run:

    php artisan web:create-token

If your user has a developer role, you'll be able to check the API docs from the administration panel.

## Translations

Translations are stored in database using https://github.com/spatie/laravel-translation-loader package. With this package, all laravel 'trans' function are available. You can mix using language files and the database. If a translation is present in both a file and the database, the database version will be returned.

The structure for the translations is always:

    'group' -> web page name (home, cars, about, etc...)

    'key'   -> something like 'card', 'section1', 'hero'

There is one Seeder for every 'group'. You can run LanguageLineSeeder to run all translations seeders (if you create a new one, include it in LanguageLineSeeder). You can run it as many times as you want since it uses the firstOrCreate method.

## Model Translations

Model translations use the package https://github.com/spatie/laravel-translatable

## Tailwind

In order to start the Tailwind CLI build process in local environment to scan templates files or classes and build your css , run: 

    npx tailwindcss -i ./resources/css/app.css -o ./public/css/app.css --watch (for web styles - styles are css)
    npm run watch (for admin styles - styles are scss)

More information at https://tailwindcss.com/docs

## Cron

There are few scheduled commands.

For local environment use: https://laravel.com/docs/9.x/scheduling#running-the-scheduler-locally

    php artisan schedule:work

For not local environment use: https://laravel.com/docs/9.x/scheduling#running-the-scheduler

    cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1

## Slack

Currently two slack channels are used to send notifications

    #caren-observer
    #nave-intergalactica
