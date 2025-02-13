
<?php

    // first solution


    $str = "Sagar Vyas";
   
    // echo $cnt;
    function countStr($str)
    {
        $cnt = 0;
        $i = 0;
        while (isset($str[$i]))
        {
            $cnt++;
            $i++;
        }
        return $cnt;
    }
    $length = countStr($str);
    for ($i=$length-1; $i>=0; $i--)
    {
        echo "$str[$i] ";
    }



    // second solution

    // $str = "Sagar Vyas";
    // $s = 0;
    // $e = strlen($str)-1;
    
    //     while ($s <= $e)
    //     {
    //         $temp = $str[$s];
    //         $str[$s] = $str[$e];
    //         $str[$e] = $temp;

    //         $s++;
    //         $e--;
    //     }

    //     for ($i=0; $i<=strlen($str)-1; $i++)
    //     {
    //         echo "$str[$i] ";
    //     }

        // reverse number
        // $num = 123;
        // $rev = 0;
        // while ($num != 0)
        // {
        //     $mod = $num % 10;
        //     $rev = ($rev * 10) + $mod;
        //     $num = (int)($num / 10);
        // }

        // echo $rev;

?>