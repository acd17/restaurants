<?php
session_start();
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
    <title>HOME PAGE USER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>NIKU-RAMEN</title>
    <link rel="website icon" type="png" href="../aset/logo.png" >
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./indexuser.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
<nav class="bg-stone-500 sticky top-0 z-50">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div x-data="{ sidebarOpen: false }">
              <!-- Tombol untuk membuka/menutup sidebar -->
              <!-- <button @click="sidebarOpen = !sidebarOpen" class="p-2">
                  <img class="h-8 w-auto" src="../main/aset/menu-svgrepo-com.svg" alt="Your Company">
              </button> -->
          
              <!-- Sidebar -->
              <!-- <div :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}" class="fixed left-0 top-0 h-full w-64 bg-stone-600 opacity-95 transition-transform duration-300 ease-in-out transform z-10">
                  
                  <ul class="p-4">
                      <li><a href="#" class="block px-4 py-2 text-sm text-stone-300 hover:bg-stone-700 rounded-lg">Best Offers</a></li>
                      <li><a href="#" class="block px-4 py-2 text-sm text-stone-300 hover:bg-stone-700 rounded-lg">Recommendation</a></li>
                      <li><a href="#" class="block px-4 py-2 text-sm text-stone-300 hover:bg-stone-700 rounded-lg">About Us</a></li>
                      <li><a href="menu.html" class="block px-4 py-2 text-sm text-stone-300 hover:bg-stone-700 rounded-lg">Menu</a></li>
                  </ul>
              </div> -->
          </div>          
           <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>
            <div class="logoNiku sm:block items-center mt-0">
               <div class="logos flex flex-col items-center">
                  <img class="h-8 w-auto" src="../main/aset/logo.png" alt="logo">
                  <a class="font-bold text-stone-700">NIKURAMEN</a>
              </div>
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

    
            <!-- Profile dropdown -->
            <div class="relative ml-3 group" x-data="{ open: false }">
               <button @click="open = !open" class="relative flex rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                   <span class="absolute -inset-1.5"></span>
                   <span class="sr-only">Open user menu</span>
                   <img class="h-8 w-8 rounded-full" src="../main/aset/profile.png" alt="">
               </button>
               <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-stone-600 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <?php
                        if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
                            echo '<a href="check-login.php" class="block px-4 py-2 text-sm text-stone-300" role="menuitem" tabindex="-1">Login</a>';
                        } else {
                            echo '<a href="logoutUser.php" class="block px-4 py-2 text-sm text-stone-300" role="menuitem" tabindex="-1">Logout</a>';
                        }
                    ?>
                   <!-- <a href="#" class="block px-4 py-2 text-sm text-stone-300" role="menuitem" tabindex="-1" id="user-menu-item-1">Sign Out</a> -->
                   <!-- <a href="#" class="block px-4 py-2 text-sm text-stone-300" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a> -->
               </div>
           </div>
           
           <!-- Sertakan script Tailwind CSS dan Alpine.js jika diperlukan -->
           <script src="path/to/your/tailwind.js"></script>
           <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>
          </div>
        </div>
      </div>
    </nav>


    <?php
    
    // if(!isset($_SESSION['username']) &&
    //     !isset($_SESSION['password'])) {
    //         echo '<a href="check-login.php">
    //             <button type="submit" class="btn btn-danger" id="logout">Login</button>
    //             </a>';
    // } else {
    //     echo '<a href="logoutUser.php">
    //         <button type="submit" class="btn btn-danger" id="logout">Logout</button>
    //     </a>';
    // }
    ?>
    <!-- <div id="NamaRestoran">NIKU RAMEN</div> -->
    
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
            echo '<div class="menu-item">';
            echo '<img class="gambar" src="../Admin/' . $row['gambar'] . '" class="rounded" width="360px">';
            echo '<div class="item-details">';
            echo '<div class="item-name">' . $row['namaMenu'] . '</div>';
            echo '<div class="item-price">' . $row['harga'] . '</div>';
            echo '<div class="item-description">' . $row['deskripsiMenu'] . '</div>';
            echo '<button onclick="tambahItem(\'' . $row['namaMenu'] . '\', ' . $row['harga'] . ')">+</button>';
            echo '</div>';
            echo '</div>';
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