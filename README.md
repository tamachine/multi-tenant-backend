# Getting started

## Description
New Reykjavik auto site (Intergalactic spaceship)

## Pre requisites
This project is using PHP 7.4 version with TALL stack (Tailwind 3, Alpine, Livewire and Laravel)

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone git@bitbucket.org:scandinavian/reykjavik-auto-new.git

Switch to the repo folder

    cd reykjavik-auto-new

Install composer dependencies

    composer install

Install npm dependencies

    npm install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Tailwind

In order to start the Tailwind CLI build process in local environment to scan templates files or classes and build your css , run: 

    npx tailwindcss -i ./resources/css/app.css -o ./public/css/app.css --watch

More information at https://tailwindcss.com/docs