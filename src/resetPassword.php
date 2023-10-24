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
        exit("Password updated");
        echo "<a href='./loginregis.php'>Back to Login</a>";
    } else {
        exit("Something went wrong");
    }
}
?>

<form method="POST">
    <input type="password" name="password" placeholder="New password">
    <br>
    <input type="submit" name="submit" value="Update password">
</form>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resetassword.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="password-container">
            <img src="../main/aset/logo.png" alt="test">
            <h1>Enter your email to reset password</h1>
            <form method="POST">
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="">
                <br>
                <button id="btn" type="submit" name="submit" value="Update password">
                    <p id="btnText">Send</p>
                    <div class="check-box">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                            <path fill="transparent" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                    </div>
                </button>
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