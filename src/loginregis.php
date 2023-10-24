<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container" id="container">
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert" role="alert">
                <div>
                    <span class="font-medium">
                        <?= $_GET['error'] ?>
                    </span>
                </div>
            </div>
        <?php } ?>
        <div class="form-container sign-up-container">
            <form action="check-signup.php" method="post">
                <h1>Create Account</h1>
                <span>Use your username and email for registration</span>
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
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="check-login.php" method="post">
                <h1>Sign in</h1>
                <span>use your account</span>
                <input type="text" placeholder="Username / Email" name="username" />
                <input type="password" placeholder="Password" name="password" />
                <select id="user-type" required name="role">
                    <option selected>Select User Type</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <div>
                    <input type="text" name="captcha" id="captcha" placeholder="Enter Captcha">
                    <img src="captcha.php" alt="PHP Captcha">
                </div>
                <button type="submit">Sign In</button>
                <a href="forgot_password.php">Forgot your password?</a>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Nikumers!</h1>
                    <p>Enter your personal details and be part of Nikumers ramen</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="scriptlogin.js"></script>
</body>

</html>