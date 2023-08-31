<?php
// Site URL
define('SITEURL', 'http://localhost/php-project/php-crud/');

// Database Information
define('LOCALHOST', 'localhost'); // Database host name
define('USERNAME', 'root'); // Database user name
define('PASSWORD', ''); // Database password
define('DBNAME', 'crud'); // Database name

// Connecting Database
$dbc = new mysqli(LOCALHOST, USERNAME, PASSWORD, DBNAME);
// $dbc = mysqli_connect(LOCALHOST, USERNAME, PASSWORD, DBNAME);

// Cheking Database Connection
if (!$dbc) {
    // Error message
    die(mysqli_error($dbc));
}
