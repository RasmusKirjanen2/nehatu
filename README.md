Requirements

PHP version >= 7.3
Nodejs v14.15.4
Composer 1.10.13

Installation

cd nehatu

composer install

npm install

touch database/database.sqlite

touch .env

php artisan key:generate

php artisan migrate --seed

php artisan storage:link

php artisan serve