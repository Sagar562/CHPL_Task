<?php

    $n = 10;

    $num1 = 0;
    $num2 = 1;

    echo "$num1 $num2 ";

    for ($i=1; $i<=$n; $i++)
    {
        $temp = $num1 + $num2;

        echo "$temp ";

        $num1 = $num2;
        $num2 = $temp;
    }

?>