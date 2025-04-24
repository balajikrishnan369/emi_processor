versions i used:
Laravel: 12.10.0
PHP: 8.2.12
db name: emi_processor -> change this in .env file.

run below commands after clone this project.

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
