<?php 

    $n = 5;

    for ($i=1; $i<=$n; $i++)
    {
        for ($k=1; $k <= $n-$i; $k++)
        {
            echo " ";
        }

        for ($j=1; $j<=$i; $j++)
        {
            echo "*";
        }
        for ($l=2; $l<=$i; $l++)
        {
            echo "*";
        }
        echo "\n";
    }

?>