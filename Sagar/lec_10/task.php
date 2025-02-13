<?php 
    // array multiplication

    echo "<h2>array multiplication</h2>";
    function getElements()
    {
        $array = [1,2,3,4];
        echo "Array : ";
        $size = count($array);

        for ($i=0; $i<$size; $i++)
        {
            echo "$array[$i] ";
        }
        echo "<br>";
        return $array;
    }

    function multiplication($callback)
    {
        $array = $callback();
        $ans = 1;
        foreach ($array as $element)
        {
            $ans *= $element;
        }
        return $ans;
    }

    $total_multiplication = multiplication("getElements");

    echo "toal multiplication of array: $total_multiplication <br>";


    // odd even

    echo "<h2>Odd or Even</h2>";

    function checkNumber($number)
    {
        if ($number & 1)
            echo "$number is odd";
        else    
            echo "$number is even";
    }

    $number = 25;
    checkNumber($number);

  
    // cube
    echo "<h2>Cube of number</h2>";

    function power($cubeNumber)
    {
        $cube = $cubeNumber * $cubeNumber * $cubeNumber;
        return $cube;
    }   
    
    $cubeNumber = 5;

    echo "$cubeNumber = ".power($cubeNumber);
?>