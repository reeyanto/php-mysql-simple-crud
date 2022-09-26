# PHP-MYSQL-SIMPLE-CRUD
Merupakan sebuah REST API sederhana menggunakan PHP Native dan MySQL

## Database
Buat sebuah database dengan nama `db_php_mysql_simple_crud` lalu di dalamnya terdapat sebuah tabel bernama `mahasiswa` dengan perintah DDL sebagai berikut:

CREATE TABLE IF NOT EXISTS `mahasiswa` (
    id INT NOT NULL AUTO_INCREMENT,
    nim VARCHAR(10) NOT NULL UNIQUE,
    nama VARCHAR(20) NOT NULL,
    jk ENUM('L', 'P') DEFAULT 'L',
    alamat TEXT
);