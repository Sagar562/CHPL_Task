<?php 

ini_set('display_errors', 1); // Enable displaying errors
error_reporting(E_ALL); // Report all types of errors

    $serverName = 'localhost';
    $userName = 'sagar';
    $password = '123456';
    $dbName = 'UserTask';

    //create connection to mySql
    $connect = mysqli_connect($serverName, $userName, $password);

    // check connection
    if (!$connect)
    {
        echo "mySql connection failed" . mysqli_connect_error();
    }

    // mySql is connected & now create database
    $createDB = "create database if not exists $dbName";

    if (!mysqli_query($connect, $createDB))
    {   
        die ("error while creating database" . mysqli_error($connect));
    }

    mysqli_select_db($connect, $dbName);

    //create table into the database
    $createTable = "create table if not exists registrationTable(
                        id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(30) NOT NULL,
                        email VARCHAR(30) NOT NULL,
                        password VARCHAR(50) NOT NULL,
                        age INT(3)
                    )";

    if (mysqli_query($connect,$createTable))
    {
        echo "Table is created successfully";
    }
    else
    {
        echo "error while creating table" . mysqli_error($connect);
    }

    //prepared statement
    $insertData = "insert into registrationTable(name, email, password, age)
                    values (?,?,?,?)";

    //prepared start
    $prepared = mysqli_prepare($connect, $insertData);

    // check for prapare statement
    if ($prepared === false)
    {
        echo "prepared statement error" . mysqli_error($connect);
    }

    //add data
    $name = "Sagar";
    $email = "abc1@gmail.com";
    $user_password = '123456789';
    $age = 22;

    mysqli_stmt_bind_param($prepared, "sssi", $name, $email, $user_password, $age);

    // execute new row
    if (mysqli_stmt_execute($prepared))
    {
        echo "new data inserted <br>";
    } 
    else
    {
        echo "error in prepared statement" . mysqli_stmt_error($prepared);
    }

    //   //add data
    //   $name = "manav";
    //   $email = "wdc1@gmail.com";
    //   $user_password = '1234567\]';
    //   $age = 22;
  
    //   mysqli_stmt_bind_param($prepared, "sssi", $name, $email, $user_password, $age);
  
    //   // execute new row
    //   if (mysqli_stmt_execute($prepared))
    //   {
    //       echo "new data inserted";
    //   } 
    //   else
    //   {
    //       echo "error in prepared statement" . mysqli_stmt_error($prepared);
    //   }
    // mysqli_stmt_close($prepared);

    $data = "insert into registrationTable(name, email, password)
             values ('bharat','hello1@gmail.com','123123')";

    mysqli_query($connect, $data);
  



?>