<?php

$db['DBHost'] = "localhost";
$db['DBUser'] = "root";
$db['DBPassword'] = "";
$db['DB'] = "cms";

foreach ( $db as $key => $value ) {
    
    define($key, $value);
}

$connection = mysqli_connect(DBHost, DBUser, DBPassword, DB);
    
?>