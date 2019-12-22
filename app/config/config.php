<?php 
    // This is our config file name for our database parameters will go

    // DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', '_YOUR_USER_NAME_');
    define('DB_PASS', '_YOU_PASSWORD_');
    define('DB_NAME', '_YOUR_DB_NAME_');

    // App Root - This it not our URL Root, but app root
    // To define a constant, you use define method, and constant should always be capslock
    define('APPROOT', dirname(dirname(__FILE__)));

    // URL Root
    define('URLROOT', '_YOUR_URL_');

    // Site Name
    define('SITENAME', '_YOUR_SITE_NAME_');
?>