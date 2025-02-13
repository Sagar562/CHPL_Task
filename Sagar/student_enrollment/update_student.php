<?php
include './dbConnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Debugging: print out the POST data
    // var_dump($_POST);

    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $phone_number = $_POST['phone_number'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];


    $sql = "UPDATE Students SET 
            student_name = '$student_name',
            student_email = '$student_email',
            phone_number = '$phone_number',
            birth_date = '$birth_date',
            gender = '$gender'
            WHERE student_id = $student_id";

    if (mysqli_query($connect, $sql)) {
        echo 'success';  // Respond to the AJAX call
    } else {
        echo 'error: ' . mysqli_error($connect);
    }
}


?>
