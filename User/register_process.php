<?php
require_once('db.php');

//Data from Form
$email = $_POST['email'];
$passUser = $_POST['passUser'];
$namaDepanUser = $_POST['namaDepanUser'];
$namaBelakangUser = $_POST['namaBelakangUser'];
$tanggalLahir = $_POST['tanggalLahir'];
$gender = $_POST['gender'];

//Encrypt the Password
$en_pass = password_hash($passUser, PASSWORD_BCRYPT);

$condition = "email = :email";

$sql_check = "SELECT * FROM user WHERE $condition";
$result_check = $db->prepare($sql_check);
$result_check->execute([':email' => $email]);

$data = [$email, $en_pass, $namaDepanUser, $namaBelakangUser, $tanggalLahir, $gender];

if($result_check->fetch()){
        echo "Username already exixts";
        ?>
        <a href="login_form.php">Try again</a>
        <?php
}else{
        //SQL Query
        $sql = "INSERT INTO user (email, passUser, namaDepanUser, namaBelakangUser, tanggalLahir, jenisKelamin)
        VALUES(?, ?, ?, ?, ?, ?)";
        //3. Execute Query
        $result = $db->prepare($sql);
        $result->execute($data);
        header('location: login_form.php');
}

