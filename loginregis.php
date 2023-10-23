<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <h1>Sign in to your account</h1>
    </div>
    <?php if (isset($_GET['error'])) { ?>
        <div>
            <div>
                <span>
                    <?= $_GET['error'] ?>
                </span>
            </div>
        </div>
    <?php } ?>
    <div>
        <form action="check-login.php" method="post">
            <div>
                <label for="email">Username / Email address</label>
                <div>
                    <input id="text" name="username" type="text" autocomplete="email">
                </div>
            </div>

            <div>
                <div>
                    <label for="password">Password</label>
                    <div>
                        <a href="#">Forgot password?</a>
                    </div>
                </div>
                <div>
                    <input id="password" name="password" type="password" autocomplete="current-password">
                </div>
            </div>

            <select id="user-type" required name="role">
                <option selected>Select User Type</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <div>
                <div class="flex items-center justify-between">
                    <input type="text" name="captcha" id="captcha" placeholder="Enter Captcha">
                    <img src="captcha.php" alt="PHP Captcha">
                </div>
            </div>

            <div>
                <button type="submit">Sign in</button>
            </div>
        </form>

        <p>
            Not a member? <a href="signupUser.php">Register here...</a>
        </p>
    </div>
    <div>
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
    </div>
</body>

</html>