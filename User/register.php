<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="register_process.php" method="post">
        <input type="text" name="namaDepanUser" placeholder="First Name" /><br />
        <input type="text" name="namaBelakangUser" placeholder="Last Name" /><br />
        <input type="date" name="tanggalLahir" placeholder="Birth Date" /><br />
        <label>Sex</label>
            <input type="radio" name="gender" value="male" /> Laki-laki
            <input type="radio" name="gender" value="female" /> Perempuan
        <br>
        <input type="text" name="email" placeholder="Email" /><br />
        <input type="password" name="passUser" placeholder="Password" /><br />
        <button type="submit">Register</button>
    </form>
</body>
</html>