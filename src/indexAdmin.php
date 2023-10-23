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
                <title>HOME PAGE ADMIN</title>
                <link rel="stylesheet" type="text/css" href="indexAdmin.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
            </head>

            <body>
                <a href="logoutAdmin.php">
                    <div id="btnLogout">
                        <button type="submit" class="btn btn-danger" id="logout">Logout</button>
                    </div>
                </a>
                <div id="NamaRestoran">NIKU RAMEN</div>

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
                                    <div class="col-auto text-center">
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
