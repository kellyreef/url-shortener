# <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/100px-Laravel.svg.png"> URL Shortener App 

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.8/installation#installation)


Clone the repository

    git clone https://github.com/kellyreef/url-shortener.git

Switch to the repo folder

    cd url-shortener

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://127.0.0.1:8000

**TL;DR command list**

    git clone https://github.com/kellyreef/url-shortener.git
    cd url-shortener
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations**

    php artisan migrate
    php artisan serve

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers/` - Contains all the controllers for views and redirects
- `app/Http/Controllers/Api/V1` - Contains all the api controllers
- `config` - Contains all the application configuration files
- `database/migrations` - Contains all the database migrations
- `routes` - Contains all the api routes defined in api.php file
- `resources/views/layouts/` Contains the basic template view for the app
- `resources/views/pages/` Contains the home page view
- `public/js/` Contains the javascript logic for the frontend

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api/v1/

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|
| Yes      	| Accept 	        | application/json  |

----------

## Endpoints:

### Create Shortlink:
POST /api/v1/shortlink

Example request body:

```json
{
    "slug": "UsGjqWb",
    "destination": "https://github.com/kellyreef/url-shortener"
}
```

Required fields: destination

Example response:
```json
{
    "slug": "UsGjqWb",
    "destination": "https://github.com/kellyreef/url-shortener",
    "updated_at": "2019-05-27 19:19:43",
    "created_at": "2019-05-27 19:19:43"
}
```

### Get Shortlink:
GET /api/v1/shortlink/{slug}

Example response:
```json
{
    "slug": "UsGjqWb",
    "destination": "https://github.com/kellyreef/url-shortener",
    "clicks": 0,
    "created_at": "2019-05-27 19:19:43",
    "updated_at": "2019-05-27 19:19:43"
}
```

### Get Shortlink Index:
POST /api/v1/shortlink/

Example request body:

```json
{
    "page": 1,
    "per_page": 25
}
```

Example response:
```json
{
    "current_page": 1,
    "data": [
        {
            "slug": "dHOp6yy",
            "destination": "https://github.com/kellyreef/url-shortener",
            "clicks": 1,
            "created_at": "2019-05-27 18:50:30",
            "updated_at": "2019-05-27 18:50:36"
        },
        {
            "slug": "n8XTCbj",
            "destination": "https://google.com",
            "clicks": 0,
            "created_at": "2019-05-27 18:51:19",
            "updated_at": "2019-05-27 18:51:19"
        },
        {
            "slug": "UsGjqWb",
            "destination": "https://yahoo.com",
            "clicks": 0,
            "created_at": "2019-05-27 19:19:43",
            "updated_at": "2019-05-27 19:19:43"
        }
    ],
    "first_page_url": "http://127.0.0.1:8000/api/v1/shortlink?page=1",
    "from": 1,
    "next_page_url": null,
    "path": "http://127.0.0.1:8000/api/v1/shortlink",
    "per_page": 25,
    "prev_page_url": null,
    "to": 3
}
```

### Delete Shortlink:
Delete /api/v1/shortlink/{slug}

Example response:
```json
1
```
