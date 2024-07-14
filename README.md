Инструкция:

Склонируйте репозиторий - git clone https://github.com/KirillTarasenk0/rental-app-backend.git

Переименуйте .env.example в .env 

Создайте у себя базу данных, которая называется rental_app - CREATE DATABASE rental_app;

Пропишите в .env файле параметры подключения к бд(пример) - DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rental_app
DB_USERNAME=root
DB_PASSWORD=root

php artisan key:generate

php artisan serve
