<?php
session_start();
if(!isset($_SESSION['namaAdmin']) &&
    !isset($_SESSION['adminID'])) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Login</title>
        </head>
        <body>
            <h1>Login</h1>
            <form action="login_process.php" method="post">
                <input type="text" name="namaAdmin" placeholder="Username" /><br />
                <input type="password" name="password" placeholder="Password" /><br />
                <button type="submit">Login</button>
            </form>
            
        </body>
        </html>
    <?php
    }else{
        header('location: index.php');
    }
?>
