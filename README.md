# PHP-MYSQL-SIMPLE-CRUD
Merupakan sebuah REST API sederhana menggunakan PHP Native dan MySQL

## Database
Buat sebuah database dengan nama `db_php_mysql_simple_crud` lalu di dalamnya terdapat sebuah tabel bernama `mahasiswa` dengan perintah DDL sebagai berikut:

CREATE TABLE IF NOT EXISTS `mahasiswa` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nim` VARCHAR(10) NOT NULL UNIQUE,
    `nama` VARCHAR(20) NOT NULL,
    `jk` ENUM('L', 'P') DEFAULT 'L',
    `alamat` TEXT
);

## Screenshots
### Tampil Semua Data
<img width="1440" alt="Screen Shot 2022-09-26 at 20 49 15" src="https://user-images.githubusercontent.com/17137623/192293533-d903a8b2-5621-432a-951b-ea30d05c8f58.png">


### Tampil Satu Data
<img width="1440" alt="Screen Shot 2022-09-26 at 20 50 08" src="https://user-images.githubusercontent.com/17137623/192293726-5d59c11b-882b-4d1f-9e28-2f1310675434.png">

### Ubah Data
<img width="1440" alt="Screen Shot 2022-09-26 at 20 52 29" src="https://user-images.githubusercontent.com/17137623/192294214-ac87df7d-c0b7-4433-a5ad-766eab1b2f16.png">

### Hapus Data
<img width="1440" alt="Screen Shot 2022-09-26 at 20 55 04" src="https://user-images.githubusercontent.com/17137623/192294817-a89a41ab-ad7e-4979-88ec-da4ab6ae46b6.png">
