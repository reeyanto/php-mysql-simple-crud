<?php
include "mahasiswa.php";

$mhs = new Mahasiswa();

switch($_SERVER['REQUEST_METHOD']) {
    // ambil semua atau ambil satu
    case 'GET':
        if(isset($_GET['nim'])) {
            $mhs->fetch($_GET['nim']);
        } else {
            $mhs->fetch();
        }
        break;

    // tambah data atau ubah data
    case 'POST':
        $data = [
            'nim'   => $_POST['nim'],
            'nama'  => $_POST['nama'],
            'jk'    => $_POST['jk'],
            'alamat'=> $_POST['alamat']
        ];

        if(isset($_POST['id'])) {
            $mhs->update($data, $_POST['id']);
        } else {
            $mhs->insert($data);
        }
        break;

    // hapus data
    case 'DELETE':
        $mhs->delete($_GET['nim']);
        break;

    default:
        header('HTTP/1.0 405 Method not allowed!');
        break;
}