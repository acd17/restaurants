<?php
$dsn = "mysql:host=localhost;dbname=nikuramen";
$kunci = new PDO($dsn, "root", "");

$sql = "SELECT * FROM menu";

$hasil = $kunci->query($sql);

try{
    $kunci = new PDO($dsn, "root", "");
    $kunci->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tableName = "menu";
    if(isset($_GET['menuID'])){
        $menuID = $_GET['menuID'];
        $condition = "menuID = :menuID";
        $edit = "SELECT * FROM $tableName WHERE $condition";
    
        $statement = $kunci->prepare($edit);
        $statement->bindParam(':menuID', $menuID, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if($result){
            $namaMenu = $result['namaMenu'];
            $harga = $result['harga'];
            $deskripsiMenu = $result['deskripsiMenu'];
            $gambar = $result['gambar'];
        }
    }

} catch (PDOException $fail){
    $fail->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Data Mahaiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./formedit.css"></head>
<body>
    <div class="container d-flex justify-content-center">
        <div id="formEditMenu" style="width:30rem">
        <br>
            <h2 class="text-center">Menu Edit</h2>
            <div id="errorContainer"><div id="error"></div></div>
            <div class="card-body">
                <form  id="addMenu" action="form_editData.php?menuID=<?= $_GET['menuID'] ?>"  method="post" enctype="multipart/form-data" onsubmit="return form()">
                    <div class="form-group">
                        <div class="mb-1">
                            <label class="form-label">Menu Name</label>
                            <input value="<?php echo $namaMenu ?>" class="form-control" type="text" name="namaMenu" placeholder="Menu Name"/>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Price</label>
                            <input value="<?php echo $harga ?>" class="form-control" type="text" name="harga" placeholder="Price"/>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Menu Description</label>
                            <input value="<?php echo $deskripsiMenu ?>" class="form-control" type="text" name="deskripsiMenu" placeholder="Menu Description"/>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Image</label>
                            <input value="<img src='<?php echo $Foto ?>'" class="form-control" type="file" name="Foto" placeholder="Image"/>
                        </div>
                        <div id="btnAdd">
                            <button id="buttonAdd" type="submit">Submit</button>
                        </div>
                        
                    </div>
                </form>
            </div>
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
