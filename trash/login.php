<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="#" method="post">
                <h1>Create Account</h1>
                <span>Your username for registeration</span>
                <input type="text" placeholder="First name">
                <input type="text" placeholder="Last name">
                <input type="text" placeholder="Username">
                <input type="password" placeholder="Password">
                <input type="date" placeholder="Tanggal lahir">
                <select name="jenis-kelamin" id="">
                    <option value="" selected>Jenis Kelamin</option>
                    <option value="M">Laki-laki</option>
                    <option value="F">Perempuan</option>
                </select>
                <button type="submit">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form action="check-login.php" method="post">
                <h1>Sign in to your account</h1>
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
                <span>Use your username and password to sign in</span>
                <input type="text" placeholder="Username">
                <input type="password" placeholder="Password">
                <select id="user-type" required name="role">
                    <option selected>Select User Type</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <div class="flex items-center justify-between">
                    <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Enter Captcha">
                    <img src="captcha.php" alt="PHP Captcha" class="ml-2 h-8">
                </div>
                <a href="#">Forget Your Password?</a>
                <button type="submit">Sign in</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign in</button>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>