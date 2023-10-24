<?php
$dsn = "mysql:host=localhost;dbname=nikuramen";
$kunci = new PDO($dsn, "root", "");

session_start();

$cartData = urldecode($_GET['cartData']);
$items = json_decode($cartData, true);

if(!isset($_SESSION['username']) &&
    !isset($_SESSION['password'])){
        echo "<div 
        style ='display: flex;
        justify-content: center;
        align-items: center;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        '>";
        echo "<div 
        style='
        background-color: #897766;
        border-radius: 20px;
        width: 450px;
        '>";
        echo "<div id='accessLogin' 
        style ='display: flex;
        justify-content: center;
        align-items: center;'>";
        echo "<div 
        style =' 
        color: white;
        font-size: 22px;
        text-align: center;
        margin-top: 10px;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        '> 
        You don't have access to this page </div></div>";
        ?>
        <div 
        style ='display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
        '>
        <a href="loginUser.php">
            <button 
                style='width: 100px;
                background-color: #4F483F;
                border-radius: 20px;
                color: white;
                font-size: 18px;
                margin-bottom: 10px;
                cursor: pointer'
                >Login</button>
            </a>
            </div>
            </div>
            </div>
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

