<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show data</title>


    <link rel="stylesheet" href="//cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>


    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();

            // course category dropdown change function
            $("select[name='course_category']").change(function(){
                var category_id = $(this).val();
                if (category_id)
                {
                    $.ajax({
                        type : 'POST',
                        url : 'dropdown.php',
                        data : {category_id : category_id},
                        success : function(res){
                            console.log(res);
                            $("select[name='course_name']").html(res);
                        },
                        error : function(){
                            // alert("Error while fetching course name")
                        }
                    });
                }
            });

              // ajax call for edit student

            $('#myTable').on('click', '.btn-dark', function () {
                            var button = $(this);
                            var student_id = button.data('id');
                            console.log(student_id);
                            if (student_id) {
                            $.ajax({
                                type: 'POST',
                                url: 'get_edit_data.php',
                                data: { student_id: student_id },
                                success: function (res) {
                            var studentData = JSON.parse(res); // Assuming the response is JSON

                            // Populate modal fields
                            $('#name').val(studentData.student_name);
                            $('#email').val(studentData.student_email);
                            $('#phone_number').val(studentData.phone_number);
                            $('#birth_date').val(studentData.birth_date);

                            // Set gender
                            if (studentData.gender === 'male') {
                                $('#male').prop('checked', true);
                            } else if (studentData.gender === 'female') {
                                $('#female').prop('checked', true);
                            }

                            // $('#address').val(studentData.address);  
                            $('#modalId').find('.btn-primary').data('id', student_id); 
                     
                            }
                            
                    });
                }
            });

            // Handle the Update button click
            $('.btn-primary').click(function () {
                var student_id = $(this).data('id');   // Get student ID from modal 
                // console.log("id ". student_id);               
                var student_name = $('#name').val();
                var student_email = $('#email').val();
                var phone_number = $('#phone_number').val();
                var birth_date = $('#birth_date').val();
                var gender = $("input[name='gender']:checked").val();
                // var address = $('#address').val();
               
                // Prepare data to send to the server
                var data = {
                        student_id: student_id,
                        student_name: student_name,
                        student_email: student_email,
                        phone_number: phone_number,
                        birth_date: birth_date,
                        gender: gender
                        // address: address,
                        
                };
                
                // console.log(data);
                // Send data to server to update
                $.ajax({
                    type: 'POST',
                    url: 'update_student.php',
                    data: data,
                    success: function (response) {
                        console.log(response);
                        if (response === 'success') {
                            alert('Student updated successfully!');
                            location.reload();  
                        } else {
                            alert('Error updating student.');
                            // console.log(response);
                        }
                    },
                    error: function () {
                        alert('Error while updating student.');
                    }
                });                
            });

               // ajax call for delete student

         // Delete student
         $('#myTable').on('click', '.btn-danger', function () {
                var button = $(this);
                var student_id = button.data('id');
                console.log(student_id);
                if (confirm("Delete student profile?")) {
                    $.ajax({
                        type: 'POST',
                        url: 'delete_student.php',
                        data: {student_id: student_id},
                        success: function (res) {
                            if (res) {
                                alert('Student deleted successfully');
                                button.closest('tr').remove();
                            } else {
                                alert('Error while deleting');
                            }
                        },
                        error: function () {
                            alert('Error while deleting student');
                        }
                    });
                }
            });
            

    
    });   

    
    </script>

</head>
<body>

        <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);            
        ?>

    <table id="myTable">
        <thead class="bg-dark text-white">
            <tr>
                <td>id</td>
                <td>name</td>
                <td>email</td>
                <td>phone number</td>
                <td>birth date</td>
                <td>gender</td>
                <td>address</td>
                <td>course category</td>
                <td>course name</td>
                <td>edit</td>
                <td>delete</td>
            </tr>
        </thead>
        <tbody>

        <?php

            include './dbConnect.php';
            $sql = 'SELECT s.student_id, s.student_name, s.student_email, s.phone_number, s.birth_date, 
                    s.gender, s.address, c.course_name, GROUP_CONCAT(a.available_course_name) as available_course_name
                    FROM `Students` AS s
                    INNER JOIN `Courses` AS c ON c.course_id = s.course_id
                    INNER JOIN `Available Courses` AS a ON a.student_id = s.student_id
                    WHERE a.student_id = s.student_id
                    GROUP BY s.student_id'; 

            $store_result = mysqli_query($connect, $sql);
        
            if (mysqli_num_rows($store_result) > 0)
            {
                while ($data = mysqli_fetch_array($store_result))
                {
                    echo "<tr>
                            <td> ". $data['student_id'] ." </td>
                            <td> ". $data['student_name'] ." </td>
                            <td> ". $data['student_email'] ." </td>
                            <td> ". $data['phone_number'] ." </td>
                            <td> ". $data['birth_date'] ." </td>
                            <td> ". $data['gender'] ." </td>
                            <td> ". $data['address'] ." </td>
                            <td> ". $data['course_name'] ." </td>
                            <td> ". $data['available_course_name'] ." </td>
                           <td> 
                                <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#modalId' data-id='". $data['student_id'] ."'>Edit</button> 
                            </td>
                            <td> 
                                <button class='btn btn-danger' data-id='". $data['student_id'] ."' >Delete</button>  
                            </td>
 
                        </tr>";
                }
            }
            else
            {
                echo "no data found";
            }

        ?>

        </tbody>
    </table>
    
   

        <!-- edit page -->
       
        <div class="modal" id="modalId">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- modal header -->
                    <div class="modal-header">
                        <h4>edit profile</h4>
                        <button class="btn btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <!-- modal body -->
                    <div class="modal-body">
                        <!-- name -->
                        <div>
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <!-- email -->
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <!-- phone number -->
                        <div>
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="number" name="phone_number" id="phone_number" class="form-control">
                        </div>
                        <!-- birth date -->
                        <div>
                            <label for="birth_date" class="form-label">Birth Date</label>
                            <input type="date" name="birth_date" id="birth_date" class="form-control">
                        </div>
                        <!-- gender -->
                        <div class="d-flex">
                            <label for="gender" class="form-label">Gender</label>
                            <div class="ms-4 d-flex gap-4">
                                <!-- male -->
                                <input type="radio" name="gender" id="male" class="form-check" value="male">
                                <label for="male" class="form-label">Male</label>
                                <!-- female -->
                                <input type="radio" name="gender" id="female" class="form-check" value="female">
                                <label for="female" class="form-label">Female</label>
                            </div>
                        </div>
                        <!-- address -->
                        <!-- <div>
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" rows="2" id="" class="form-control"></textarea>
                        </div> -->
                        <!-- Course category -->
                       
                    <!-- modal footer -->
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-light">Cancel</button>
                        <button type="button" class="btn btn-primary" data-id ="" >Update</button>
                    </div>
                </div>
            </div>
        </div>


 

</body>
</html>