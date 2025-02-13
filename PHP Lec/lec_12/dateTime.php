<?php

    echo "Date : " . date("d/m/Y") . "<br>";
    echo "Date at last : " . date("Y/m/d") . "<br>";
    echo "change : " . date("d/m/y") . "<br>";
    echo "Time : " . date("h:i:s") . "<br>";
    date_default_timezone_set("America/New_York");
    echo "USA time : " . date("h:i:s") . "<br>";
    $get=strtotime("tomorrow");
    echo date("Y-m-d h:i:sa", $d) . "<br>";

?>