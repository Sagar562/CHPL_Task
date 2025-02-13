<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

    $severName = 'localHost';
    $userName = 'sagar';
    $password = '123456';
    $dbName = 'LEC_13_DB';

    // database creation function
    function connectDb($connect)
    {
         // create database
         $create = 'create database IF NOT EXISTS LEC_13_DB';
        
         // check for the connection and db name in $create 
         if (mysqli_query($connect, $create))
         {
             echo "Database created successfully <br>";
         }
         else
         {
             echo "Database not connected to mySql" . mysqli_error($connect);
         }
    }

        //create connection to the mySql
        $connect = mysqli_connect($severName, $userName, $password);
        
        //check connection
        if (!$connect)
        {
            echo "connection failed : " . mysqli_connect_error();
        }
        else
        {
            echo "Connection successfully <br>";
        }


        //db function calling
        connectDb($connect);

?>