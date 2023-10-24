<?php
include("config.php");
echo '<link rel="stylesheet" type="text/css" href="./style.css">';

if (!isset($_GET["code"])) {
    exit("Can't find page!");
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($con, "SELECT email FROM resetPassword WHERE code='$code'");
if (mysqli_num_rows($getEmailQuery) == 0) {
    exit("Can't find page!");
}

if (isset($_POST["password"])) {
    $pw = $_POST["password"];
    $pw = md5($pw);
    $row = mysqli_fetch_array($getEmailQuery);

    $email = $row["email"];

    $query = mysqli_query($con, "UPDATE users SET password='$pw' WHERE email='$email'");

    if ($query) {
        $query = mysqli_query($con, "DELETE FROM resetpassword WHERE code='$code'");
        exit("<a href='./loginregis.php'>Password updated</a>");
        // echo "<a href='./loginregis.php'>Back to Login</a>";
    } else {
        exit("Something went wrong");
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forgotpassword.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="password-container">
            <img src="../main/aset/logo.png" alt="test">
            <h1>Set a new password</h1>
            <form method="POST">
                <input type="password" name="password" placeholder="New password">
                <br>
                <input type="submit" name="submit" value="Update password">
            </form>
        </div>
    </div>

    <script type="text/javascript">
        const btn = document.querySelector("#btn");
        const btnText = document.querySelector("#btnText");

        btn.onclick = () => {
            btnText.innerHTML = "Check email";
            btn.classList.add("active");

            // Menunda pengalihan halaman selama 2 detik (misalnya)
            setTimeout(function() {
                // Di sini Anda dapat melakukan pengalihan ke fungsi PHP atau URL yang diinginkan
                // Menggunakan JavaScript window.location atau AJAX, atau apa pun yang sesuai
                window.location.href = "resetPassword.php";
            }, 2000); // 2000 milidetik = 2 detik
        };
    </script>
</body>

</html>