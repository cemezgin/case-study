# Trivago Case Study

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

What things you need to install the software and how to install them

```
https://gist.github.com/ibraheem4/ce5ccd3e4d7a65589ce84f2a3b7c23a3
```

### Installing

After installed postgresql successfully, you have to start postgres:

```pg_ctl -D /usr/local/var/postgres start```

And create database

```createdb hotel_list```

### Update your .env

```DB_CONNECTION=pgsql```

```DB_HOST=127.0.0.1```

```DB_PORT=5432```

```DB_DATABASE=hotel_list```

```DB_USERNAME=```

```DB_PASSWORD=```

### Install Composer
```brew install composer```
```composer install```

### Migrate Db
```php artisan migrate```

### Serve
```php artisan serve```

#### Documentation

http://127.0.0.1:8000/api/documentation

#### Run Tests

 ```./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests```






