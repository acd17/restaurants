<?php
$dsn = "mysql:host=localhost;dbname=nikuramen";
$kunci = new PDO($dsn, "root", "");

session_start();

$cartData = urldecode($_GET['cartData']);
$items = json_decode($cartData, true);

if(!isset($_SESSION['username']) &&
    !isset($_SESSION['password'])){
        echo "You don't have access to this page";
        ?>
        <a href="loginUser.php">Login</a>
        <?php
    }else{
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Bill</title>
            <link rel="stylesheet" href="./bill.css">
        </head>
        <body>
            <div id="wrapper">
            <div id="container">
            <?php 
            $hargaTotalValue = 0;
            echo "<div id='rowKeterangan'>";
            echo "<div id='gambarMenuRow'><b>"; echo "Gambar Menu"; echo "</b></div>";
            echo "<div id='namaMenu'><b>"; echo "Nama Menu"; echo "</b></div>";
            echo "<div id='hargaMenu'><b>"; echo "Harga Menu"; echo "</b></div>";
            echo "</div>";
            echo "<hr>";
            foreach($items as $key => $value){
                echo "<div id='containerBillPesan'>";
                echo "<div id='gambarMenu'>";
                echo '<img id="gambar" src="../src/' . $value['gambar'] . '">';
                echo "</div>";
                echo "<div id='namaItemPesan'><b>" . $value['nama'] . "</b></div>";
                echo "<div id='hargaItemPesan'><b> Rp " . $value['harga'] . "</b></div>";
                $hargaTotalValue += $value['harga'];
                echo "<br />";
                echo "</div>";
                }
            echo "<hr>";
            echo "<div id='wrapperTotalHarga'>";
            echo "<div id='totalHarga'>";
            echo "<b>Total Harga</b>";
            echo "</div>";
            echo "<div id='valueHarga'>";
            echo "<b> Rp " . $hargaTotalValue . "</b>";
            echo "</div>";
            echo "</div>";
            echo "<div id='wrapButtonPesan'>";
            echo "<button id='buttonPesan'>Order</button>" ;
            echo "</div>";
            ?>
            </div>
            </div>
        </body>
        </html>
    <?php
    }
?>

