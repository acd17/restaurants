<?php

// DB Credentials
define('DSN', 'mysql:host=localhost;dbname=nikuramen');
define('DBUSER', 'root');
define('DBPASS', '');

try {
    $db = new PDO(DSN, DBUSER, DBPASS);
} catch (PDOException $fail) {
    die("Connection failed: " . $fail->getMessage());
}