<?php

    require './dbConnect.php';

    if (isset($_POST['student_id']))
    {
        $student_id = $_POST['student_id'];

        $delete_from_available_course = "DELETE FROM `Available Courses` 
                                         WHERE student_id = $student_id";
        
        $res = mysqli_query($connect, $delete_from_available_course);

        if ($res)
        {
            $delete_from_student = "DELETE FROM `Students`
                                    WHERE student_id = $student_id";

            if (mysqli_query($connect, $delete_from_student))
            {
                echo "Delete successfully";
                return 1;
            }
            else
            {
                echo "error while deleting in student table";
            }
        }
        else
        {
            echo "error while deleting in available course table"; 
        }
    }
    else
    {
        echo "no student id found";
    }
   

?>