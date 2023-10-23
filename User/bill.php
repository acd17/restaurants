<?php
$dsn = "mysql:host=localhost;dbname=nikuramen";
$kunci = new PDO($dsn, "root", "");

session_start();

$cartData = urldecode($_GET['cartData']);
$items = json_decode($cartData, true);

if(!isset($_SESSION['email']) &&
    !isset($_SESSION['passUser'])){
        echo "You don't have access to this page";
        ?>
        <a href="login_form.php">Login</a>
        <?php
    }else{
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Bill</title>
        </head>
        <body>
            <div id="container">
            <?php 
            $hargaTotalValue = 0;
            foreach($items as $key => $value){
                echo "<tr>";
                echo "<td>" . $value['nama'] . "</td>";
                echo "<td>" . $value['harga'] . "</td>";
                $hargaTotalValue += $value['harga'];
                echo "<br />";
                echo "</tr>";
                }
            echo "Total Harga" . $hargaTotalValue;
            ?>
            </div>
        </body>
        </html>
    <?php
    }
?>

