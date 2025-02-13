<?php
    // if else
    // $age = 18;

    // if ($age > 18)
    //     echo "Your age is more then 18";
    // else
    //     echo "Yor age is 18 or below 18";


    // contional rendering
    // $age = 50;

    // $ans = $age > 50 ? "50+" : "below 50 or 50";

    // echo $ans;

    // switch case
    $marks = 20;

    switch ($marks)
    {
        case $marks < 24 :
            echo "You are fail";
            break;
    
        case $marks >= 24 && $marks < 40 :
            echo "CC";
            break;
    
        case $marks >= 40 && $marks < 52 :
            echo "BB";
            break;

        case $marks >= 56 && $marks < 62 :
            echo "AB";
            break;
        
        case $marks >= 62 && $marks <= 70 :
            echo "AB";
            break;

    }
?>