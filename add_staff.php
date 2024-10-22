<?php
@include 'config.php';

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role= $_POST['role'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `addstf`(`id`, `first_name`, `last_name`, `email`,`password`,`role`, `gender`) 
    VALUES (NULL,'$first_name','$last_name','$email', '$password','$role','$gender')";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: add_staffii.php?msg=New record created successfully");
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Add Staff</title>
</head>
<body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
    font-family: Poppins;
}

.container {
    max-width: 800px;
    margin: auto;
    padding: 20px;
    background-color: #f7f9fc;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.text_center {
    text-align: center;
    margin-bottom: 20px;
}

.text_center h3 {
    color: #333;
}

.text-muted {
    color: #6c757d;
}

.form-lable {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
}

.form_control {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    transition: border-color 0.3s;
}

.form_control:focus {
    border-color: #80bdff;
    outline: none;
}

select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    transition: border-color 0.3s;
}

.form_group {
    margin-bottom: 20px;
}

.form_check_input {
    margin-right: 10px;
}

.form_input_lable {
    margin-right: 20px;
}

.sbmitcncelbtn {
    text-align: center;
}

.sbmitcncelbtn .btn {
    padding: 10px 20px;
    margin: 5px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.sbmitcncelbtn .btn_success {
    color: #fff;
    background-color: #28a745;
}

.sbmitcncelbtn .btn_success:hover {
    background-color: #218838;
}

.sbmitcncelbtn .btn_danger {
    color: #fff;
    background-color: #dc3545;
}

.sbmitcncelbtn .btn_danger:hover {
    background-color: #c82333;
}

.btn a {
    background-color: rgb(52, 122, 122);
    color: wheat;
}


</style>
    
  <div class="container">
        <div class="text_center mb-4">
            <h3>Add New Staff Member</h3>
            <p class="text-muted">Complete the form below to add a staff member</p>
        </div>
        <div class="container">
            <form action="" method="post">
                <div class="row bm-3">
                    <div class="col">
                        <lable class="form-lable">First Name:</lable>
                        <input type="text" class="form_control" name="first_name"
                        placeholder="">
                    </div>
                    <div class="col">
                        <lable class="form-lable">Last Name:</lable>
                        <input type="text" class="form_control" name="last_name"
                        placeholder="">
                    </div>
                </div>

                <div class="mb-3">
                <lable class="form-lable">Email:</lable>
                        <input type="email" class="form_control" name="email"
                        placeholder="">
                </div>
                <div class="mb-3">
                <lable class="form-lable">Password:</lable>
                        <input type="password" class="form_control" name="password"
                        placeholder="">
                </div>
                <div class="form-lable">
                    <select id="role" name="role" required>
                        <option value="">Select Job Role</option>
                        <option value="Manager">Manager</option>
                        <option value="Chef">Chef</option>
                        <option value="Waiter">Waiter</option>
                        <!-- Add more roles as needed -->
                    </select>
                <div class="form_group mb-3">
                    <label>Gender:</label> &nbsp;
                    <input type="radio" class="form_check_input" name="gender"
                    id="male" value="male">
                    <label form="male" class="form_input_lable">Male</label>
                    &nbsp;
                    <input type="radio" class="form_check_input" name="gender"
                    id="female" value="female">
                    <label form="male" class="form_input_lable">female</label>
                </div>

                <div class="sbmitcncelbtn">
                    <button type="submit" class="btn btn_success" name="submit">Save</button>
                    <a href="add_staffii.php" class="btn btn_danger">Back</a>
                </div>
            </form>
        </div>
     </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>