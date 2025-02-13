<?php
require './dbConnect.php';

    if (isset($_POST['student_id']))
    {
        $student_id = $_POST['student_id'];

        // Query to get all courses
    $get_courses = "SELECT available_course_name FROM `Available Courses`
                    where student_id = $student_id";
    $result = mysqli_query($connect, $get_courses);

    if ($result) {
        $courses = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $courses[] = $row;
        }
        echo json_encode($courses); // Return all available courses as a JSON response
    } else {
        echo json_encode(["error" => "Courses not found"]);
    }
         
    }
?>
