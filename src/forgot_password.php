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

if(isset($_POST["email"])){
    $emailTo = $_POST["email"];

    $code = uniqid(true);
    $query = mysqli_query($con, "INSERT INTO resetPassword(code, email) VALUES('$code', '$emailTo')");
    if(!$query){
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
        echo '<p>Reset password link has been sent to your email!</p>';
    } catch (Exception $e) {
        echo "<p>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
    }
    exit();
    }
?>

<form method="POST">
    <input type="text" name="email" placeholder="Email" autocomplete="off">
    <br>
    <input type="submit" name="submit" value="Reset Email">
</form>