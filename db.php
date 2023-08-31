<?php
// Site URL
define('SITEURL', 'http://localhost/php-project/php-crud/');

// Database Information
define('LOCALHOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'crud');

// Connecting with DB
$dbc = new mysqli(LOCALHOST, USERNAME, PASSWORD, DBNAME);
// $dbc = mysqli_connect(LOCALHOST, USERNAME, PASSWORD, DBNAME);

// Cheking DB Connection
if (!$dbc) {
    // Error message
    die(mysqli_error($dbc));
}
