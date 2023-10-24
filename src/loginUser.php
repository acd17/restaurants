<!doctype html>
<html class="h-full">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
</head>

<body class="h-full">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-4xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                account</h2>
        </div>
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
        <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="check-login.php" method="post">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Username / Email
                        address</label>
                    <div class="mt-2">
                        <input id="text" name="username" type="text" autocomplete="email"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="forgot_password.php" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <select id="user-type" required name="role"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Select User Type</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>

                <div class="flex items-center justify-between">
                    <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Enter Captcha">
                    <img src="captcha.php" alt="PHP Captcha" class="ml-2 h-8">
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="signupUser.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register here...</a>
            </p>
        </div>
    </div>
</body>

</html>