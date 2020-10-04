## GrandMaster

Aplikasi GrandMaster ini lengkap dengan template admin, route, pengaturan akses grup, user, menu:

Cara Install
----

Via Terminal:
```
composer create-project --prefer-dist ojisatriani/grandmaster ojimaster
cd ojimaster
```
```
composer install
chmod -R guo+w storage
cp .env.example .env
```
Atur pengaturan database pada file .env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=grandmaster
DB_USERNAME=root
DB_PASSWORD=
```
Migrate database dan seeder

```
php artisan migrate --seed #username dan password akan muncul setelah migrate
```

## Owner

[Oji Satriani](https://github.com/ojisatriani).

## Lisensi

GrandMaster ini menggunakan lisensi open source, yaitu: [MIT license](https://opensource.org/licenses/MIT).