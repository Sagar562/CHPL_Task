<!DOCTYPE html>
<html lang="en">
<head>

    <?php
        // Enable error reporting for development
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);  // Report all errors (including warnings, notices, etc.)
        
        include './dbConnect.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>

    <!-- container -->
    <div class="container mt-5 pb-5">
        <h3 class="text-center">Form</h3>   

        <div class="card pb-3 p-3">
            <form action="signUp.php" method="post">

                <!-- name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label><span class="text-danger">*</span>
                    <input type="text" name="name" id="name" class="form-control" required>  
                </div>
                <!-- email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label><span class="text-danger">*</span>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <!-- phone number -->
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label><span class="text-danger">*</span>
                    <input type="text" name="phone_number" minlength="10" maxlength="10" id="phone_number" class="form-control" required>
                </div>
                <!-- birth date -->
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Birth Date</label><span class="text-danger">*</span>
                    <input type="date" name="birth_date" id="birth_date" class="form-control" required>
                </div>
                <!-- gender -->
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label><span class="text-danger">*</span><br>
                    <input type="radio" name="gender" id="male" value="male" required> Male  
                    <input type="radio" name="gender" id="female" value="female"> Female  
                </div>
                <!-- adsress -->
                <div class="mb-3">
                    <label for="textarea" class="form-label">Address</label>
                    <textarea name="textarea" id="address" rows="2" class="form-control"></textarea>
                </div>
                <!-- course category -->
                <div class="mb-3">
                    <label for="course_category" class="form-label">Course Category</label><span class="text-danger">*</span>
                    <select name="course_category" id="course_category" class="form-control" required>
                        <option value="">--Select--</option>
                        <?php
                            $get_course = 'SELECT * from Courses';
                            $res = mysqli_query($connect, $get_course);
                            while ($course = mysqli_fetch_assoc($res)) {   
                                echo "<option value=".$course['course_id'].">". $course['course_name'] ."</option>";
                            }
                        ?>
                    </select>
                </div>
                <!-- courses -->
                <div class="mb-3" id="courses_div">
                    <!-- The checkboxes for courses will appear here dynamically -->
                </div>
                <!-- study mode -->
                <div class="mb-3">
                    <label for="mode" class="form-label">Study Mode</label><span class="text-danger">*</span><br>
                    <input type="radio" name="mode" id="online" value="online" required> Online   
                    <input type="radio" name="mode" id="offline" value="offline"> Offline 
                </div>
                <!-- img -->
                <div class="mb-3">
                    <label for="imgName" class="form-label">Image Name</label>
                    <input type="text" name="imgName" id="imgName" class="form-control">
                </div>
                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label><span class="text-danger">*</span><br>
                    <input type="checkbox" name="status" id="status" data-toggle="toggle" data-on="Active" data-off="Inactive">
                </div>
    
                <!-- button -->
                <div class="d-flex justify-content-center">
                    <button type="submit" name="submit" onclick="emailSend()" class="btn btn-primary">Submit</button>
                </div>
            
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#courses_div').hide();

            $('#course_category').change(function() {
            // get the course_id
                $('#courses_div').show();
                var category_id = $(this).val(); 
                if (category_id != "") {

                    $.ajax({
                        url: 'fetch_courses.php', 
                        method: 'POST',
                        data: { category_id: category_id },
                        success: function(response) {
                            $('#courses_div').html(response);
                        }
                    });
                } else {
                    $('#courses_div').html('');
                }
            });

            // function emailSend() {
            //     var email = $('#email').val();
            //     $.ajax({
            //         url: 'mail/sendMail.php',
            //         method: 'POST',
            //         data: { email: email },
            //         success: function(response) {
            //             alert('Email sent successfully!');
            //         },
            //         error: function(xhr, status, error) {
            //             alert('Error sending email: ' + error);
            //         }
            //     });
            // }

        });

        
    </script>

</body>
</html>