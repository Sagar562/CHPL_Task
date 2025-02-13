<?php

$localhost = 'localhost';
$username = 'sagar';
$password = '123456';
$dbName = 'StudentEnrollment';
    
// connect to database
    $connect = mysqli_connect($localhost, $username, $password, $dbName);

    if (!$connect)
    {
        echo "DataBase not connected";
    }
    else
    {
        // echo "Database connected successfully";
    }
?>