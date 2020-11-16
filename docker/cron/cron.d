PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin
* * * * * docker exec ${PHP_HOST} php artisan schedule:run 2>> error.txt

