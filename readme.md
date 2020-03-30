# Trivago Case Study

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

#### Install postgresql
```
https://www.postgresqltutorial.com/install-postgresql/
```

### Installing

After installed postgresql successfully, you have to start postgres:

```
pg_ctl -D /usr/local/var/postgres start
```

And create database

```
createdb hotel_list
```

### Update your .env

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=hotel_list
DB_USERNAME=
DB_PASSWORD=
```

### Install Composer
```
brew install composer
composer install
```

### Migrate Db
```
php artisan migrate
```

### Serve
```
php artisan serve
```

#### Documentation

http://127.0.0.1:8000/api/documentation

#### Run Tests

 ```
 ./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests
 ```






