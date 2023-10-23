<?php
session_start();
require_once('db.php');

//Data from Form
$namaAdmin = $_POST['namaAdmin'];
$password = $_POST['password'];

//Check if user exists
$sql = "SELECT * FROM admin
        WHERE namaAdmin = :namaAdmin";
$statement = $db->prepare($sql);
$statement->bindParam(':namaAdmin', $namaAdmin, PDO::PARAM_STR);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);

if(!$row){
    echo "User not found";
    ?>
    <a href="login_form.php">Login</a>
    <?php
}else{
    //Check if password correct
    if(!password_verify($password, $row['passAdmin'])){
        echo "Wrong password";
        ?>
        <a href="login_form.php">Login</a>
        <?php
    } else{
        //Login success, set SESSION DATA
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['namaAdmin'] = $row['namaAdmin'];
        header('location: index.php');
    }
}