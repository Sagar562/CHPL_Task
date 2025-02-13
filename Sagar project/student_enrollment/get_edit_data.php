<?php
require './dbConnect.php';


if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];

    $get_student_data = "SELECT s.student_id, s.student_name, s.student_email, s.phone_number, s.birth_date, 
                    s.gender, s.address, c.course_id, GROUP_CONCAT(a.available_course_name) as available_course_name
                    FROM `Students` AS s
                    INNER JOIN `Courses` AS c ON c.course_id = s.course_id
                    INNER JOIN `Available Courses` AS a ON a.student_id = s.student_id
                    WHERE a.student_id = $student_id
                    GROUP BY s.student_id";
    $result = mysqli_query($connect, $get_student_data);

    if ($result)
    {
        $data = mysqli_fetch_assoc($result);
        echo json_encode($data);
    }
    else 
    {
        echo json_encode(["error" => "Student data not found"]);
    }
} 
else 
{
    echo json_encode(["error" => "Student ID is missing"]);
}



?>