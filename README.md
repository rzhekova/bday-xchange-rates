This is my submission for the E3Creative Tech Test which took me just under 3 days to complete.

## Installation

After cloning the repo, run the following commands:

Install all composer depndencies

```
composer install
```

Create a .env file and add the following line to it

```
FIXER_API_KEY=<insert your fixer api key here>
```

Run the migrations

```
php artisan migrate
```

And, finally, to initiate the server run the following command

```
php artisan serve
```
