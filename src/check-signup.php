<?php
session_start();
include "db_con.php";

if (isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['re-password']) && isset($_POST['tanggal-lahir']) && isset($_POST['jenis-kelamin'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $first_name = validate($_POST['first-name']);
    $last_name = validate($_POST['last-name']);
    $username = validate($_POST['username']);

    $password = validate($_POST['password']);
    $re_password = validate($_POST['password']);

    $tanggal_lahir = validate($_POST['tanggal-lahir']);
    $jenis_kelamin = validate($_POST['jenis-kelamin']);

    $user_data = 'first-name=' . $first_name . '&last-name=' . $last_name . '&username=' . $username . '&tanggal-lahir=' . $tanggal_lahir . '&jenis-kelamin=' . $jenis_kelamin;

    if (empty($username)) {
        header("location: signupUser.php?error=Username is Required&$user_data");
    } else if (empty($password)) {
        header("location: signupUser.php?error=Password is Required&$user_data");
    } else if (empty($re_password)) {
        header("location: signupUser.php?error=Password Confirmation is Required&$user_data");
    } else if ($password !== $re_password) {
        header("Location: signup.php?error=Password and Confirmation Password do not match&$user_data");
    } else if (empty($first_name)) {
        header("location: signupUser.php?error=First Name is Required&$user_data");
    } else if (empty($last_name)) {
        header("location: signupUser.php?error=Last Name is Required&$user_data");
    } else if (empty($tanggal_lahir)) {
        header("location: signupUser.php?error=Date of Birth is Required&$user_data");
    } else if (empty($jenis_kelamin)) {
        header("location: signupUser.php?error=Gender is Required&$user_data");
    } else {

        //hashing
        $password = md5($password);
        // Menggunakan prepared statement
        $sql = "SELECT * FROM users WHERE username='$username' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=The username is taken, please choose another&$user_data");
            exit();
        } else {
            // hashing the password
            $password = md5($password);
        
            $sql2 = "INSERT INTO users(username, password, name, jenis_kelamin, first_name, last_name, tanggal_lahir) VALUES('$username', '$password', '$first_name $last_name','$jenis_kelamin','$first_name','$last_name','$tanggal_lahir')";
            $result2 = mysqli_query($conn, $sql2);
        
            if ($result2) {
                header("Location: signup.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: signup.php?error=An unknown error occurred&$user_data");
                exit();
            }
        }
    }
} else {
    header("location: signupUser.php");
}
?>