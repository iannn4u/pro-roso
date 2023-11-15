### pro-roso versi 1.0
___
```
git clone https://github.com/iannn4u/pro-roso.git
```
```
cd pro-roso_laravel
```
```
composer install
```
```
npm i
```
```
cp .env.example .env
```
```
php artisan key:generate
```
```
php artisan migrate --seed
```
```
php artisan db:seed --class=UserSeeder
```
```
php artisan storage:link
```
```
php artisan serve
```
```
npm run dev
```
[localhost](http://127.0.0.1:8000)
---

Catatan
- ```npm run dev``` dan ```npm i``` belum berfungsi

```
php artisan view:clear
```