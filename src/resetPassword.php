<?php
    include("config.php");

    if(!isset($_GET["code"])) {
        exit("Can't find page!");
    }

    $code = $_GET["code"];

    $getEmailQuery = mysqli_query($con, "SELECT email FROM resetPassword WHERE code='$code'");
    if(mysqli_num_rows($getEmailQuery) == 0){
        exit("Can't find page!");
    }

    if(isset($_POST["password"])) {
        $pw = $_POST["password"];
        $pw = md5($pw);
        $row = mysqli_fetch_array($getEmailQuery);

        $email = $row["email"];

        $query = mysqli_query($con, "UPDATE users SET password='$pw' WHERE email='$email'");

        if($query) {
            $query = mysqli_query($con, "DELETE FROM resetpassword WHERE code='$code'");
            exit("Password updated");
            echo "<a href='./loginregis.php'>Back to Login</a>";
        }
        else {
            exit("Something went wrong");
        }
    }
?>

<form method="POST">
    <input type="password" name="password" placeholder="New password">
    <br>
    <input type="submit" name="submit" value="Update password">
</form>

