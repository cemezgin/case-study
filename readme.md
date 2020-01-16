## Executing guide
######Run following commands
`If the postgresql not installed:`
https://gist.github.com/ibraheem4/ce5ccd3e4d7a65589ce84f2a3b7c23a3

`pg_ctl -D /usr/local/var/postgres start`

`createdb hotel_list`

######Update your .env

DB_CONNECTION=pgsql

DB_HOST=127.0.0.1

DB_PORT=5432

DB_DATABASE=hotel_list

DB_USERNAME=

DB_PASSWORD=

######Migrate Db
`php artisan migrate`

######Serve
`php artisan serve`

######Documentation

http://127.0.0.1:8000/api/documentation

######Run Tests

 `./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests`

