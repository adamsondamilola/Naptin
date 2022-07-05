## Naptin Apps

This repo is intended to contain all apps for Naptin.
<ul>
<ol> <b>Api: </b> Contains all endpoints for web frontend and mobile </ol>
<ol><b>Frontend: </b> Web Application Frontend</ol>
<ol><b>Mobile: </b> Mobile Application Frontend</ol>
</ul>


### To Build the Api

Change Directory into api folder `cd api`

Run `cp .env.example .env`

Run `composer install`

Run `php artisan key:generate`

Run `php artisan migrate:fresh` to remove all tables, migrate it again then seed Country, State and LocalAreas table automatically

Run `php artisan db:seed` to import all roles and permission
