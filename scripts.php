<?php
    error_reporting(0);
    define('DB_HOST', 'mysql.hostinger.com.ua');
    define('DB_LOGIN', 'u904267372_vasil');
    define('DB_PASSWORD', 'r37379r');
    define('DB_NAME', 'u904267372_cards');
    
    $cnn = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
    if(!$cnn){
        echo 'EROOR: cannot connect to the database.';
    }