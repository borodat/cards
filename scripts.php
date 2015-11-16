<?php
    error_reporting(0);
    define('DB_HOST', 'localhost');
    define('DB_LOGIN', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'budcentr_cards');
    
    $cnn = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
    if(!$cnn){
        echo 'EROOR: cannot connect to the database.';
    }