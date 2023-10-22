<?php 
session_start();
include "db_con.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);

    if (empty($username)) {
        header("location: loginUser.php?error=Username is Required");
    } else if (empty($password)) {
        header("location: loginUser.php?error=Password is Required");
    } else {
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1) {
            //the username must be unique
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] === $password) {
                if ($row['role'] == 'admin') {
                    // Pengguna adalah admin, arahkan ke halaman admin
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    header("location: admin_dashboard.php");
                } else {
                    // Pengguna adalah pengguna biasa, arahkan ke halaman pengguna
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    header("location: user_dashboard.php");
                }
            }else {
                header("location: loginUser.php?error=Incorrect Username and Password");
            }
        } else {
            header("location: loginUser.php?error=Incorrect Username and Password");
        }
    }
 
} else {
    header("location: loginUser.php");
}

?>