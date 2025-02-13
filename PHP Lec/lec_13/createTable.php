<?php


    require './connectDB.php';

    //  get database value
    mysqli_select_db($connect, $dbName);
    
    $createTable = 'create table if not exists User 
                    (
                     UserId int(5) unsigned auto_increment primary key,
                     firstName text(20),
                     lastName text(20),
                     email varchar(30)
                    )';

    //check for table created
    if (mysqli_query($connect, $createTable))
    {
        echo "Table created successfully";
    }
    else
    {
        echo "Error while creating Table" . mysqli_error($connect);
    }

    // insert data into table
    $insertData = "insert into User (firstName, lastName, email)
                   values ('Sagar', 'Vyas', 'abc1@gmail.com')";
                   
    // check for data is inserted or not
    if (mysqli_query($connect, $insertData))
    {
        echo "Data is inserted into database";
    }
    else
    {
        echo "Data cannot inserted into database" . mysqli_error($connect);
    }

    

?>