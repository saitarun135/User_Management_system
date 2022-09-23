<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About UserManagement

It's a demo application for managing employees in an organization from this we can check from how many years employee has served in the particular organization.
## Technology Stack
Laravel:- 8.7s

php:- 7.4

Mysql:- 8.0

## Pattern & Architecture
Repository pattern

MVC

## Setup
1.git clone https://github.com/saitarun135/user_management_system.git

2.Do `composer install` or `composer update`.

3.Configure database credentails in .env and Run Migrations `php artisan migrate`.

4.Run Development server `php artisan serve`.

5.If you are using `Nginx server`,skip the 4th step and copy the following one in `sites-available`.

```
server {
listen 80;
server_name management_system;
root /pathto/user_management_system/public/index.php;

index index.html index.htm index.php;

charset utf-8;

location / {
try_files $uri $uri/ /index.php?$query_string;
}



location = /favicon.ico { access_log off; log_not_found off; }
location = /robots.txt { access_log off; log_not_found off; }

access_log off;
error_log /var/log/nginx/hrmc-error.log error;

sendfile off;

client_max_body_size 100m;

location ~ \.php$ {
fastcgi_split_path_info ^(.+\.php)(/.+)$;
fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
fastcgi_index index.php;
include fastcgi_params;
fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;


fastcgi_intercept_errors off;
fastcgi_buffer_size 16k;
fastcgi_buffers 4 16k;
fastcgi_connect_timeout 300;
fastcgi_send_timeout 300;
fastcgi_read_timeout 300;
}


}

```

6.Restart your nginx & fpm server `sudo service nginx restart` & `sudo service php7.4-fpm restart`.

7.Hit `management_system` in browser and access the Web Application.
