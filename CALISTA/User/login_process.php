<?php
session_start();
require_once('db.php');

//Data from Form
$email = $_POST['email'];
$passUser = $_POST['passUser'];

//Check if user exists
$sql = "SELECT * FROM user
        WHERE email = :email";
$statement = $db->prepare($sql);
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);

if(!$row){
    echo "User not found";
    ?>
    <a href="register.php">Register</a>
    <?php
}else{
    //Check if password correct
    if(!password_verify($passUser, $row['passUser'])){
        echo "Wrong password";
        ?>
        <a href="login_form.php">Login</a>
        <?php
    } else{
        //Login success, set SESSION DATA
        $_SESSION['passUser'] = $row['passUser'];
        $_SESSION['email'] = $row['email'];
        header('location: index.php');
    }
}