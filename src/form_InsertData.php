<?php

//Form Data:
$filename = $_FILES['gambar']['name'];
$namaMenu = $_POST['namaMenu'];
$harga = $_POST['harga'];
$deskripsiMenu = $_POST['deskripsiMenu'];
$gambar = "gambar/" . $filename;

//1
$dsn = "mysql:host=localhost;dbname=nikuramen";
$kunci = new PDO($dsn, "root", "");

//2
$sql = "INSERT INTO menu(namaMenu, harga, deskripsiMenu, gambar)
        VALUES (?, ?, ?, ?)";

//3
$statement = $kunci->prepare($sql);
$data = [$namaMenu, $harga, $deskripsiMenu, $gambar];
$statement->execute($data);

$temp_file = $_FILES['gambar']['tmp_name'];

$file_ext = explode(".", $filename);
$file_ext = end($file_ext);
$file_ext = strtolower($file_ext);

switch($file_ext){
        case 'jpg':
        case 'png':
        case 'svg':
        case 'webp':
        case 'bmp':
        case 'gif':
            move_uploaded_file($temp_file, "gambar/{$filename}");
            echo "File berhasil di upload.";
            break;
        default: echo "Anda hanya bisa upload file gambar.";
    }

header("Location: indexAdmin.php");
exit; 
