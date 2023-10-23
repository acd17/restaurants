<?php
$dsn = "mysql:host=localhost;dbname=nikuramen";
$kunci = new PDO($dsn, "root", "");

$sql = "SELECT * FROM menu";

$hasil = $kunci->query($sql);

try{
    $kunci = new PDO($dsn, "root", "");
    $kunci->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tableName = "menu";
    $menuID = $_GET['menuID'];
    $condition = "menuID = :menuID";
var_dump($_FILES);
    $new_value1 = $_POST['namaMenu'];
    $new_value2 = $_POST['harga'];
    $new_value3 = $_POST['deskripsiMenu'];
    $filename = $_FILES['Foto']['name'];
    $new_value4 = "gambar/" . $filename;
    $temp_file = $_FILES['Foto']['tmp_name'];
    $condition = "menuID = :menuID";

    move_uploaded_file($temp_file, $new_value4);

    $update = "UPDATE $tableName 
            SET namaMenu = :value1, harga = :value2, deskripsiMenu = :value3, gambar = :value4
            WHERE $condition";
    
    $statement = $kunci->prepare($update);
    $statement->bindParam(':value1', $new_value1);
    $statement->bindParam(':value2', $new_value2);
    $statement->bindParam(':value3', $new_value3);
    $statement->bindParam(':value4', $new_value4);
    $statement->bindParam(':menuID', $menuID, PDO::PARAM_INT);
    $statement->execute();

} catch (PDOException $fail){
    $fail->getMessage();
}

header("Location: index.php");
exit; 