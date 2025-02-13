<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

    <?php

        // check input function
        function checkInput($data) 
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $firstName = $lastName = $email = $gender = $role = $phoneNumber = $address = $zipCode ="";

        $firstName_Error = $lastName_Error = $email_Error = $gender_Error = $role_Error = $phoneNumber_Error = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (empty($_POST['fname']))
            {
                $firstName_Error = "First Name required";
            }
            else if (!preg_match("/^[a-zA-Z]{3,}$/", $_POST['fname']))
            {
                $firstName_Error = "Only letters";
            }
            else
            {
                $firstName = checkInput($_POST['fname']);

            }
            // last name check
            if (empty($_POST['lname']))
            {
                $lastName_Error = "Last Name Required";
            }
            else if (!preg_match("/^[a-zA-Z]{3,}$/", $_POST['lname']))
            {
                $lastName_Error = "Only letters";
            }
            else
            {
                $lastName = checkInput($_POST['lname']);
            }
            // email check
            if (empty($_POST['email']))
            {
                $email_Error = "email Required";
            }
            else if (!preg_match("/^[a-zA-Z]$/", $_POST['email']))
            {   
                $email_Error = "not proper email";
            }
            else
            {
                $email = checkInput($_POST['email']);
            }
            // role check
            if (empty($_POST['role']))
            {
                $role_Error = "role Required";
            }
            else
            {
                $role = checkInput($_POST['role']);
            }
            // gender check
            if (empty($_POST['gender']))
            {
                $gender_Error = "Gender Required";
            }
            else
            {
                $gender = checkInput($_POST['gender']);
            }
            // phone number check
            if (empty($_POST['phone_number']))
            {
                $phoneNumber_Error = "Phone Number Required";
            }
            else if (!preg_match("/^[0-9]{10}$/", $_POST['phone_number']))
            {
                $phoneNumber_Error = "Only 10 digits";
            }
            else
            {
                $phoneNumber = checkInput($_POST['phone_number']);
            }
            // Address
                $address = checkInput($_POST['address']);

            // Zip Code
                $zipCode = checkInput($_POST['zip_code']);

        }
    ?>

    
    <div class="card p-4">   
        <div class=" d-flex justify-content-center">
            <h2 class="bg-dark text-white px-5 rounded-2">Form</h2>
            
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="mt-3">
           
            <div class="row">
                
                <!-- first name -->    
                <label for="fname" class="col-lg-1 col-sm-12 form-label">First Name</label>
                <input type="text" class="col-lg-4 col-sm-12" name="fname" id="fname" value=""> <span class="col-lg-1 text-danger">* <?php echo isset($firstName_Error) ? $firstName_Error : ''; ?></span>
            
                 <!-- last name -->
                <label for="last name" class="col-lg-1 form-label">Last Name</label>
                <input type="text" class="col-lg-4" name="lname" id="lname"> <span class="col-lg-1 text-danger">* <?php echo $lastName_Error ?></span>
            
            </div>
           
            <div class="row mt-3">

                <!-- email -->
                
                <label for="email" class="col-lg-1 form-label">Email</label>
                <input type="email" name="email" class="col-lg-4" id="email"> <span class="col-lg-1 text-danger">* <?php echo $email_Error ?></span>
                
                <!-- role -->
                
                <label for="role" class="col-lg-1 form-label">Role</label>
                <select name="role" id="role" class="col-lg-4">
                    <option value="select" selected disabled>--select--</option>
                    <option value="student">Student</option>
                    <option value="admin">Admin</option>
                    <option value="instructor">Instructor</option>
                </select><span class="col-lg-1 text-danger">* <?php echo $role_Error ?></span>
            </div>
          
            <div class="row mt-3">
                <!-- phone number -->
                <label for="phone number" class="col-lg-1 form-label">Phone</label>
                <input type="text" class="col-lg-4" maxlength="10" name="phone_number" id="phone_number"> <span class="col-lg-1 text-danger">* <?php echo $phoneNumber_Error ?></span>


                <!-- zip code -->
                <label for="zip_code" class="col-lg-1 form-label">Zip Code</label>
                <input type="text" name="zip_code" maxlength="6" class="col-lg-4" id="zipcode">
              
            </div>

            <div class="row mt-3">
                <!-- address -->
                <label for="textarea" class="col-lg-1 form-label">Address</label>
                <textarea class="col-lg-4" name="address" id=""></textarea>
                <div class="col-lg-1"></div>

                <!-- gender -->
                <label for="gender" class="col-lg-1 align-content-center ">Gender</label>
                <div class="col-lg-5 d-flex align-items-center gap-4">

                    <input type="radio" name="gender" class="form-check" value="male">
                    <label for="male" class="form-label">Male</label>
      
                    <input type="radio" name="gender" class="form-check" value="female">
                    <label for="female" class="form-label">Female</label> 
                </div>

               
            </div>
          

            <!-- submit -->
            <div class="d-flex justify-content-center mt-4">
                <input type="submit" class="col-lg-3 btn btn-dark" name="submit" id="submit">
            </div>  
        </form>

        <hr>
        <!-- output -->
        <table class="table mt-5">
                <!-- table head -->
                <thead>
                    <tr>    
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Zip Code</th>
                    </tr>
                   
                </thead>
                <!-- table body -->
                <tbody>
                    <tr>
                        <td><?php echo $firstName; ?></td>
                        <td><?php echo $lastName; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $role; ?></td>
                        <td><?php echo $phoneNumber; ?></td>
                        <td><?php echo $gender; ?></td>
                        <td style="max-width: 50px;"><?php echo $address; ?></td>
                        <td><?php echo $zipCode; ?></td>
                    </tr>
                </tbody>
        </table>
       
        
        <!-- <?php
            echo $firstName;
            echo "<br>";
            echo $lastName;
            echo "<br>";
            echo $email;
            echo "<br>";
            echo $role;
            echo "<br>";
            echo $phoneNumber;
            echo "<br>";
            echo $gender;
            echo "<br>";
        ?> -->

    </div>

</body>
</html>