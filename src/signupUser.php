<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <form action="check-signup.php" method="post">
        <h1>Create Account</h1>
        <?php if (isset($_GET['error'])) { ?>
            <div class="flex mt-10 items-center p-4 mb-4 text-center text-md 64 text-red-800 rounded-lg bg-red-50  dark:text-red-400 sm:mx-auto sm:w-full sm:max-w-sm"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">
                        <?= $_GET['error'] ?>
                    </span>
                </div>
            </div>
        <?php } ?>
        <span>Your username for registeration</span>
        <input type="text" placeholder="First name" name="first-name">
        <input type="text" placeholder="Last name" name="last-name">
        <input type="text" placeholder="Username" name="username">
        <input type="email" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="password">
        <input type="password" placeholder="Re Password" name="re-password">
        <input type="date" placeholder="Tanggal lahir" name="tanggal-lahir">
        <select name="jenis-kelamin" id="" name="jenis-kelamin">
            <option value="" selected>Jenis Kelamin</option>
            <option value="male">Laki-laki</option>
            <option value="female">Perempuan</option>
        </select>
        <button type="submit">Sign Up</button>
    </form>
</body>

</html>