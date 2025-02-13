<?php

require './dbConnect.php';

    if (isset($_POST['category_id']))
    {
        $category_id = $_POST['category_id'];

        // find course based on category id
        $courses = "SELECT DISTINCT available_course_name from `Available Courses` 
                    WHERE course_id = $category_id";

        $get_available_course = mysqli_query($connect, $courses);

        if (mysqli_num_rows($get_available_course) > 0)
        {
            while ($res = mysqli_fetch_assoc($get_available_course))
            {
                echo "<label for='courses' class='form-label'>Courses</label> <br>";
                echo "<input type='checkbox' class='ms-3' name='courses[]' value='" . $res['available_course_name'] . "'> " . $res['available_course_name'];
            }
        }
        else
        {
            echo "no course available";
        }
    }

?>