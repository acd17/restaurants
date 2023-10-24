<?php 
session_start();
include "db_con.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role']) 
// && isset($_POST['captcha'])
) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);
    // $captcha = test_input($_POST['captcha']);
    
    if (empty($username)) {
        header("location: loginUser.php?error=Username is Required");
    } else if (empty($password)) {
        header("location: loginUser.php?error=Password is Required");
    }
    // } else if (empty($captcha)) {
    //     header("location: loginUser.php?error=Captcha is Required");
    // } else if ($_SESSION['CAPTCHA_CODE'] != $captcha) {
    //     header("location: loginUser.php?error=Incorrect Captcha");
    // } 
    else {
        // Menggunakan prepared statement
        $sql = "SELECT * FROM users WHERE username=? AND password=?";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            // Mengikat parameter dan eksekusi statement
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            mysqli_stmt_execute($stmt);

            // Mengambil hasil
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['role'] == $role) {
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    if ($row['role'] == 'admin') {
                        header("location: indexAdmin.php");
                    } else {
                        header("location: indexUser.php");
                    }
                } else {
                    header("location: loginUser.php?error=Incorrect Role");
                }
            } else {
                header("location: loginUser.php?error=Incorrect Username and Password");
            }
        } else {
            header("location: loginUser.php?error=Database Error");
        }
    }
} else {
    header("location: loginUser.php");
}
?>
