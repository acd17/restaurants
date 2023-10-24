<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require './config.php';

if (isset($_POST["email"])) {
    $emailTo = $_POST["email"];

    $code = uniqid(true);
    $query = mysqli_query($con, "INSERT INTO resetPassword(code, email) VALUES('$code', '$emailTo')");
    if (!$query) {
        exit("Error");
    }

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings                     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = "nikuramenorg@gmail.com";                     //SMTP username
        $mail->Password   = 'mbyg urvx znei xxjg';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('NikuRamenORG@gmail.com', 'Niku Ramen!');
        $mail->addAddress($emailTo);     //Add a recipient             //Name is optional
        $mail->addReplyTo('no-reply@gmail.com', 'No reply');

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Your password reset link';
        $mail->Body    = "<h1>You requested a password reset</h1>
                            Click <a href='$url'>THIS LINK</a> to reset your password!";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        // // Debugging
        // $mail->SMTPDebug = 2; // 2 for debugging output
        // $mail->Debugoutput = 'html'; // Output format



        $mail->send();
        echo '<p class="wdawda">Reset password link has been sent to your email!</p>';
    } catch (Exception $e) {
        echo "<p>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
    }
    exit();
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
            <h1>Enter your email to reset password</h1>
            <form method="POST">
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="">
                <br>
                <button id="btn" type="submit" name="submit" value="Reset Email">
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
            btnText.innerHTML = "Sent";
            btn.classList.add("active");

            // Menunda pengalihan halaman selama 2 detik (misalnya)
            setTimeout(function() {
                // Di sini Anda dapat melakukan pengalihan ke fungsi PHP atau URL yang diinginkan
                // Menggunakan JavaScript window.location atau AJAX, atau apa pun yang sesuai
            }, 2000); // 2000 milidetik = 2 detik
        };
    </script>
</body>

</html>