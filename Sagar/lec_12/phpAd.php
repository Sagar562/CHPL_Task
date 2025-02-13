<?php

    try {
        $url = "https://dummyjson.com/users";

        $res = file_get_contents($url);

        if ($res == false)
            throw new Exception("Data is not present");

        $data = json_decode($res,true);
        echo "<pre?>";
        print_r($data);
        echo "</pre>";

    }catch(Exception $e) {
        echo $e->getMessage();
    }


?>