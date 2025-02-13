<?php

// Enable error reporting for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  // Report all errors (including warnings, notices, etc.)

require './dbConnect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!isset($_POST['name'], $_POST['email'], $_POST['phone_number'], $_POST['birth_date'],
        $_POST['gender'], $_POST['course_category'],
        $_POST['mode'], $_POST['imgName']))
        {   
            echo "All field required";
        }
        else
        {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone_number = trim($_POST['phone_number']);
            $birth_date = $_POST['birth_date'];
            $gender = $_POST['gender'];
            $address = trim($_POST['textarea']);
            $course_id = $_POST['course_category'];
            $courses = isset($_POST['courses']) ? implode(", ", $_POST['courses']) : '';
            $available_courses = isset($_POST['courses']) ? $_POST['courses'] : []; 
            $mode = $_POST['mode'];
            $imgName = $_POST['imgName'];
            $status = isset($_POST['status']) ? 1 : 0;
    
            $namePattern = "/^[a-zA-Z\s]+$/";  
            $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";  
            $phonePattern = "/^\d{10}$/";  


            // Validate Name
            if (!preg_match($namePattern, $name)) {
                echo "iInvalid name. Only letters and spaces are allowed.";
                exit;
            }

            // Validate Email
            if (!preg_match($emailPattern, $email)) {
                echo "Invalid email format.";
                exit;
            }

            // Validate Phone Number
            if (!preg_match($phonePattern, $phone_number)) {
                echo "Invalid phone number. It must contain exactly 10 digits.";
                exit;
            }

            // insert query
            $insert_data = "INSERT INTO Students (student_name, student_email, phone_number,
                            birth_date, gender, address, course_id, study_mode, img_profile, active_status, course_selected) 
                            VALUES ('$name', '$email', '$phone_number', '$birth_date', '$gender', '$address', '$course_id', '$mode', '$imgName', '$status', '$courses')";



            if (mysqli_query($connect, $insert_data))
            {
                // get student id
                $student_id = mysqli_insert_id($connect);

                // now insert into available_course
                if (count($available_courses) > 0)
                {
                    foreach ($available_courses as $course_name)
                    {
                        // echo "$course_name";
                        // $available_course = mysqli_real_escape_string($connect, $available_course);

                        $insert_available_course = "INSERT into `Available Courses`(available_course_name, course_id,student_id)
                        VALUES ('$course_name', '$course_id', '$student_id')";

                        if (!mysqli_query($connect, $insert_available_course)) {
                            echo "Error while inserting available_course: " . mysqli_error($connect);
                        }
                    }
                }
                else
                {
                    echo "no courses selected";
                }
                $to = $email;
                $subject = "First mail";
                include 'mail/message.php';
                include 'mail/mail.php';
            }
            else
            {
                echo "error while inserting data into student table";
            }
        }
    }
    else
    {
        echo "Invalid method";
    }
    
?>