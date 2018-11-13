## Week 1:
## Create database
DATABASE 名： fresh
CREATE DATABASE fresh default charset utf8;

## アプリ起動
- freshフォルダをC:/xampp/htdocsの中にコピー
- freshフォルダからCommandPromtを起動
    1. php artisan serveを打ち
    2. freshフォルダから他のCommandPromtを起動, この下のコマンドを順番に打ってください。
        php artisan migrate
        php artisan db:seed --class=ShopsTableSeeder　を打ち
-アプリを起動出来る

## Week 2:
