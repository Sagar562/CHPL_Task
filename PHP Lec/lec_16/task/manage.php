<?php

// Manually define your data in an array (this simulates data you would fetch from a database)
$data = array(
    array("id" => 1, "name" => "sagar vyas", "email" => "sagavyas321@gmail.com"),
    array("id" => 2, "name" => "Jane Smith", "email" => "jane@gmail.com"),
    array("id" => 3, "name" => "ram patel", "email" => "ram11@gmail.com"),
    array("id" => 4, "name" => "Kash", "email" => "kashh212@example.com"),
    array("id" => 5, "name" => "Riya panchal", "email" => "riyapanchal443@gmail.com"),
    array("id" => 6, "name" => "Naddem khwaja", "email" => "nadeemk788@gmail.com"),
    array("id" => 7, "name" => "josef smith", "email" => "joss77@gmail.com"),
    array("id" => 8, "name" => "rayan dio", "email" => "dioraayan85@example.com"),
);

// Return the data as a JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>
