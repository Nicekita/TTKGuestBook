# TTKGuestBook

Простое SPA

## Установка

1) Клонируйте репозиторий
2) Откройте терминал и пройдите в папку проекта
3) Установите зависимости:
```
npm install
composer install
```
4) Создайте файл .env и скопируйте туда значения .env.example
5) В файле .env укажите абсолютный путь к файлу SQLite (%app%/resources/db.SQLite)
5.1) При использовании другой БД или создании нового файла SQLite введите свои переменные конфигурации и введите команду
```
php artisan migrate
```
6) Запустите приложение:
```
php artisan serve
npm run dev
php artisan websockets:serve
```
7) Стандартный аккаунт админа
Nicekita100@gmail.com
12345678