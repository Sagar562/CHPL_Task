<?php

   require './databaseConnect.php';

    $login_email = 'abc1@gmail.com';
    $login_userPassword = '12345678';

    // prepare query
    $check = "select * from registrationTable 
              where email = ?";

    // prepare statement
    $prepare = mysqli_prepare($connect, $check);

    // check prepare 
    if ($prepare === FALSE)
    {
        die("error in creating prepare statement in login query" . mysqli_error($connect));
    }

    // bind prepare
    mysqli_stmt_bind_param($prepare, 's', $login_email);

    // execute prepare
    mysqli_stmt_execute($prepare);

    // get result
    mysqli_stmt_bind_result($prepare, $user_id, $user_name, $user_email, $user_password, $user_age);

    // check for user email in DB
    if (mysqli_stmt_fetch($prepare))
    {
        // check for password
        if ($login_userPassword === $user_password)
        {
            echo "login successfull " . $user_name;
        }
        else 
        {
            echo "Password not matched for this email : " . $user_email;
        }
    }
    else 
    {
        echo "user not found with this email : " .$login_email;
    }

    mysqli_stmt_close($prepared);
    mysqli_close($connect);


?>