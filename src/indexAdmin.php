<?php
$dsn = "mysql:host=localhost;dbname=nikuramen";
$kunci = new PDO($dsn, "root", "");

$sql = "SELECT * FROM menu";
$katgorisql = "SELECT kategoriID FROM kategori";

$hasil = $kunci->query($sql);
$kategorihasil = $kunci->query($katgorisql);

session_start();
// require_once('db.php');

if(!isset($_SESSION['username']) &&
    !isset($_SESSION['password'])){
        echo "You don't have access to this page";
        ?>
        <a href="check-login.php">Login</a>
        <?php
    }else{
        ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>ADMIN</title>
                <link rel="stylesheet" type="text/css" href="indexAdmin.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
                <link rel="website icon" type="png" href="../aset/logo.png" >
                <script src="https://cdn.tailwindcss.com"></script>
                <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
                <link rel="stylesheet" href="./indexuser.css">
                <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
            </head>

            <body>
                <!-- <a href="logoutAdmin.php">
                    <div id="btnLogout">
                        <button type="submit" class="btn btn-danger" id="logout">Logout</button>
                    </div>
                </a> -->
                

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
                                        echo '<a href="logoutAdmin.php" class="block px-4 py-2 text-sm text-stone-300" role="menuitem" tabindex="-1">Logout</a>';
                                    }
                                ?>
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




                        <div class="container justify-content-center">
                        
                        <div id="formContainer" class="card-body">
                            <form id="addMenu" action="form_InsertData.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="mb-1">
                                        <label class="form-label">Menu Name</label>
                                        <input class="form-control" type="text" name="namaMenu" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Price</label>
                                        <input class="form-control" type="text" name="harga" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Menu Description</label>
                                        <input class="form-control" type="text" name="deskripsiMenu" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input class="form-control" type="file" name="gambar" />
                                    </div>
                                    <div id="kategoriContainer">
                                    <select id="kategori" name="dropdown">
                                        <option value="$row['kategoriID']">RAMEN</option>
                                        <option value="$row['kategoriID']">RICE BOWL</option>
                                        <option value="$row['kategoriID']">SIDES MENU</option>
                                        <option value="$row['kategoriID']">DESSERT</option>
                                        <option value="$row['kategoriID']">DRINKS</option>
                                    </select>
                                    </div>
                                    <br />
                                    <div id="btnAdd">
                                        <button type="submit" class="btn btn-primary mb-3" style="padding-inline: 5%">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <br />
                        <h2 class="text-center"><b>DAFTAR MENU</b></h2>
                        <table class="table table-striped table-bordered">
                        <thead class="thead-light">
                            <tr>
                            <th class="text-center" scope="col">Number</th>
                            <th class="text-center" scope="col">Menu Name</th>
                            <th class="text-center" scope="col">Price</th>
                            <th class="text-center" scope="col">Menu Description</th>
                            <th class="text-center" scope="col">Image</th>
                            <th class="text-center" scope="col">Edit</th>
                            <th class="text-center" scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                                $key = 1;
                            while($row = $hasil->fetch(PDO::FETCH_ASSOC)){
                        ?>

                            <tr>
                            <th class="align-middle text-center" scope="row"><?= $key++ ?></th>
                            <td class="align-middle text-center"><?= $row['namaMenu'] ?></td>
                            <td class="align-middle text-center">Rp <?= $row['harga'] ?></td>
                            <td class="align-middle text-center"><?= $row['deskripsiMenu'] ?></td>
                            <td class="align-middle text-center"><img id="gambar" src="<?= $row['gambar'] ?>" class="rounded" width="360px"></td>
                            <td class="align-middle text-center">
                                <a id="underline" href="form_edit.php?menuID=<?= $row['menuID'] ?>"><button id="btnPlusMinus">+</button></a>
                            </td>
                            <td class="align-middle text-center">
                                <a id="underline" href="delete.php?menuID=<?= $row['menuID'] ?>"><button id="btnPlusMinus">-</button></a>
                            </td>
                            </tr>

                        <?php
                            }
                        ?>

                        </tbody>

                        </table>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

                    <script>
                        function form(){
                            var form = document.getElementById('addMenu');
                            var requiredfields = form.querySelectorAll('input[type="text"], input[type="file"]');
                            var errorMessage = document.getElementById('error');

                            console.log(requiredfields.length)
                            for (var i = 0; i < requiredfields.length; i++) {
                                console.log((requiredfields[i].value))
                                if (!requiredfields[i].value) {
                                    console.log('masuk')
                                    message = '<p class="text-center p-2">All fields are required. Please fill all required fields and submit again.</p>';
                                    errorMessage.innerHTML = message;
                                    return false;
                                }
                            }
                            errorMessage.innerHTML = "";
                            return true;
                        }

                    </script>

            </body>
            </html>
        <?php
    }
?>
