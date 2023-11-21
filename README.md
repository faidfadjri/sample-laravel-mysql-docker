# Laravel-MySQL-Docker

Docker adalah sebuah tools yang memungkinkan kita membuat sebuah aplikasi yang terisolasi dari OS di atasnya. Artinya dalam satu kontainer ( sebutan wadah aplikasi dalam docker ) memungkinkan kita untuk menggunakan berbagai teknologi dengan beragam versi baik dari bahasa pemrograman, framework OS dan sebagainya secara lebih cepat dan fleksibel tanpa OS.

---

Dalam repository ini saya memberikan contoh penggunakan Docker Container menggunakan Docker Compose yang memungkinkan kita menjalankan aplikasi ini dengan PHP 8.1 - Apache dan Mysql:8.1 serta php my admin didalamnya tanpa harus install satu persatu dalam PC kita.

---

Saya menggunakan beberapa docker image seperti :

-   php:8.2-fpm-alpine
-   nginx:alpine

### NGINX

Nginx atau dalam pronouncation-nya dibaca "Engine X" adalah sebuah web server alternative dari apache. nginx sendiri mempunyai kemampuan lebih dalam mengelola sebuah website yang mempunyai traffic yang cukup tinggi selain itu nginx mampu memproses _Request_ yang masuk secara paralel.

### PHP FPM

PHP-FPM adalah singkatan dari PHP FastCGI Process Manager, yaitu sebuah proses manajer untuk menjalankan aplikasi PHP melalui protokol FastCGI. Saat kita menggunakan nginx sebagai web server pilihan kita. image PHP yang didukung adalah PHP-FPM

## Prerequisite

-   Install Docker & Docker Compose ( Yup, itu saja )

## Testing

Untuk menjalankan container cukup jalankan perintah :

```bash
  docker-compose up -d
```

Jika anda menemukan masalah folder _/var/www/app/storage : permission denied_
anda bisa mengatasinya dengan cara berikut

Masuk ke dalam terminal container dengan cara

```bash
  docker exec -it nginx /bin/sh
```

Lalu ketikan perintah berikut :

```bash
  chmod -R 777 /var/www/app/storage
```

untuk memberikan akses penuh terhadap directory tersebut.
Sekian terima kasih :smile:
