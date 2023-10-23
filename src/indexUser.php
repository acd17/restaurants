<?php
$dsn = "mysql:host=localhost;dbname=nikuramen";
$kunci = new PDO($dsn, "root", "");

$sql = "SELECT * FROM menu 
INNER JOIN kategori ON menu.kategoriID = kategori.kategoriID 
ORDER BY menu.kategoriID, menuID asc;";


$hasil = $kunci->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME PAGE ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    session_start();
    if(!isset($_SESSION['username']) &&
        !isset($_SESSION['password'])) {
            echo '<a href="check-login.php">
                <button type="submit" class="btn btn-danger" id="logout">Login</button>
                </a>';
    } else {
        echo '<a href="logoutUser.php">
            <button type="submit" class="btn btn-danger" id="logout">Logout</button>
        </a>';
    }
    ?>
    <div id="NamaRestoran">NIKU RAMEN</div>
    
    <?php
        $flag = 0;
        $cId = 1;
        while($row = $hasil->fetch(PDO::FETCH_ASSOC)) {
            if($cId != $row['kategoriID'] && $flag == 1){
                echo "</tbody></table>";
                $cId = $row['kategoriID'];
                $flag = 0;
            }

            if($flag == 0){
                $cId = $row['kategoriID'];
                $flag = 1;
                echo "<table id='daftarMenu' class='table table-striped'>
                        <thead>
                            <h1>Kategori " . $row['namaKategori'] . "</h1>
                        </thead>
                        <tbody>";
            }
            echo "<tr>
                    <td class='align-middle text-center'><img class='gambar' src='../Admin/" . $row['gambar'] . "' class='rounded' width='360px'></td>
                    <td class='align-middle text-center'>" . $row['namaMenu'] . "</td>
                    <td class='align-middle text-center'>" . $row['harga'] . "</td>
                    <td class='align-middle text-center'>" . $row['deskripsiMenu'] . "</td>
                    <button onclick='tambahItem(\"" . $row['namaMenu'] . "\", " . $row['harga'] . ")'>+</button>
                </tr>";
        }
    ?>
    </tbody></table>
    <div id="Invoice"></div>
        <div id="Bill">
        <div id="HargaTotal"></div>
        <div>
            <button onclick="checkout()">
                Pesan
            </button>
        </div>
    </div>

    <script>
        let hargaTotalValue = 0;
        var items = [];

        const invoice = document.getElementById("Invoice");
        const hargaTotal = document.getElementById("HargaTotal"); 

        function tambahItem(nama, harga) {
            items.push({ nama: nama, harga: harga });
            console.log(items);
            hargaTotalValue += harga;
            updateInvoice();
        }

        function updateInvoice(){
            hargaTotal.textContent = `Rp ${hargaTotalValue}`;
        }

        function checkout() {
            var cartData = JSON.stringify(items);
            window.open('bill.php?cartData=' + encodeURIComponent(cartData));
        }
    </script>
</body>
</html>