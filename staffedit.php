<?php
@include 'config.php';
$id = $_GET['id'];

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `addstf` SET `first_name`='$first_name',`last_name`='$last_name',
    `email`='$email',`role`=' $role',`gender`='$gender' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: add_staffii.php?msg=Data Update Successfully");
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

body {
    background-color: #f7f9fc;
}

.navbar {
    background-color: #00ff5573 !important;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.container {
    max-width: 800px;
    margin: auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.text_center {
    text-align: center;
    margin-bottom: 20px;
}

.text_center h3 {
    color: #333;
    margin-bottom: 10px;
}

.text-muted {
    color: #6c757d;
    margin-bottom: 20px;
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

select:focus {
    border-color: #80bdff;
    outline: none;
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

.btn {
    padding: 10px 20px;
    margin: 5px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.btn_success {
    color: #fff;
    background-color: #28a745;
}

.btn_success:hover {
    background-color: #218838;
}

.btn_danger {
    color: #fff;
    background-color: #dc3545;
}

.btn_danger:hover {
    background-color: #c82333;
}

.btn a {
    background-color: rgb(52, 122, 122);
    color: wheat;
}
</style>
   <nav class="navbar navbar-light justify-content-center fs-3 bm-5 "style="background-color: #00ff5573">
    
     </nav> 

     <div class="container">
        <div class="text_center mb-4">
            <h3>Edit Staff Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <?php
        $sql = "SELECT * FROM `addstf` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width: 300px;">
                <div class="row bm-3">
                    <div class="col">
                        <lable class="form-lable">First Name:</lable>
                        <input type="text" class="form_control" name="first_name"
                        value="<?php echo $row['first_name']?>">
                    </div>
                    <div class="col">
                        <lable class="form-lable">Last Name:</lable>
                        <input type="text" class="form_control" name="last_name"
                        value="<?php echo $row['last_name']?>">
                    </div>
                </div>

                <div class="mb-3">
                <lable class="form-lable">Email:</lable>
                        <input type="email" class="form_control" name="email"
                        value="<?php echo $row['email']?>">
                </div>

                <div class="mb-3">
                <lable class="form-lable">Password:</lable>
                        <input type="password" class="form_control" name="password"
                        value="<?php echo $row['password']?>">
                </div>
                <div class="mb-3">
                <select id="role" name="role" required>
                        <option value="">Select Job Role</option>
                        <option value="Manager">Manager</option>
                        <option value="Chef">Chef</option>
                        <option value="Waiter">Waiter</option>
                </div>


                <div class="form_group mb-3">
                    <label>Gender:</label> &nbsp;
                    <input type="radio" class="form_check_input" name="gender"
                    id="male" value="male" <?php echo ($row['gender']=='male')?"checked":"";?> >
                    <label form="male" class="form_input_lable">Male</label>
                    &nbsp; 
                    <input type="radio" class="form_check_input" name="gender"
                    id="female" value="female" <?php echo ($row['gender']=='female')?"checked":"";?> >>
                    <label form="male" class="form_input_lable">female</label>
                </div>

                <div>
                    <button type="submit" class="btn btn_success" name="submit">Update</button>
                    <a href="add_staffii.php" class="btn btn_danger">Back</a>
                </div>
            </form>
        </div>
     </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>