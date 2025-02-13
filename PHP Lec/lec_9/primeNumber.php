<?php
  
    $n = 20;
    // echo "2 ";
    for ($i = 2; $i <= $n; $i++)
    {   
        $bool = 0;
        for ($j = 2; $j < $i; $j++)
        {
            if ($i % $j == 0)
            {
                $bool = 1;
                break;
            }
              
        }
        if ($bool == 0)
            echo "$i ";
    }


?>