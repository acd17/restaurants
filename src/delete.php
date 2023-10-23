<?php

//1
$dsn = "mysql:host=localhost;dbname=nikuramen";
try{
    $kunci = new PDO($dsn, "root", "");
} catch (PDOException $fail){
    echo "Connection failed: " . $fail->getMessage();
    die();
}

if(isset($_GET['menuID'])){
    $menuID = $_GET['menuID'];

    $tableName = "menu";
    $condition = "menuID = :menuID";
    $sql = "DELETE FROM $tableName WHERE $condition";

    try{
        $statement = $kunci->prepare($sql);
        $statement->bindParam(':menuID', $menuID, PDO::PARAM_INT);
        $statement->execute();
    } catch (PDOException $fail){
        $fail->getMessage();
    }
}

$kunci = null;

header("Location: indexAdmin.php");
exit; 