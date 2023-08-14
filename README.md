# Laravel-MySQL-Docker

Docker adalah sebuah tools yang memungkinkan kita membuat sebuah aplikasi yang terisolasi dari OS di atasnya. Artinya dalam satu kontainer ( sebutan wadah aplikasi dalam docker ) memungkinkan kita untuk menggunakan berbagai teknologi dengan beragam versi baik dari bahasa pemrograman, framework OS dan sebagainya secara lebih cepat dan fleksibel tanpa OS.

---

Dalam repository ini saya memberikan contoh penggunakan Docker Container menggunakan Docker Compose yang memungkinkan kita menjalankan aplikasi ini dengan PHP 8.1 - Apache dan Mysql:8.1 serta php my admin didalamnya tanpa harus install satu persatu dalam PC kita.

---

Saya menggunakan
Makefile untuk memudahkan pengetikan command
dan beberapa docker image seperti :

- php:8.1-apache
- phpmyadmin:latest
- mysql:8.1

## Prerequisite

- Install Docker & Docker Compose ( That's it )

## Testing

To deploy this project run

```bash
  make dev
```
