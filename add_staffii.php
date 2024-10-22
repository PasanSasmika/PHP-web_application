
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="staff.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Add Staff</title>
</head>
<body>
   <nav class="navbar navbar-light justify-content-center fs-3 bm-5 "style="background-color: #00ff5573">
    STAFF MANAGEMENT DASHBORD
     </nav> 

     <div class="container">

     <?php
     if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$msg.';
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
     }
     
     ?>
        <a href="add_staff.php" class="btn btn_dark mb-3">Add New Staff Member</a>
        <a href="admin_page.php" class="btn">Back to Admin Panel</a>
        <table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Job Role</th>
      <th scope="col">Gender</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        include 'config.php';
        $sql = "SELECT * FROM `addstf`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['first_name']?></td>
      <td><?php echo $row['last_name']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['password']?></td>
      <td><?php echo $row['role']?></td>
      <td><?php echo $row['gender']?></td>
     
      <td>
        <a href="staffedit.php?id=<?php echo $row['id'] ?>" class="link_dark"><i class='bx bxs-edit'></i></a>
        <a href="staffdelete.php?id=<?php echo $row['id'] ?>" class="link_dark"><i class='bx bxs-trash' ></i></a>
      </td>
    </tr>
            <?php

        }
    
    ?>
    
  </tbody>
</table>
     </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>