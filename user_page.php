<?php
@include 'config.php';
session_start();

if(!isset($_SESSION['user_name'])){
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleii.css">
    <title>User page</title>
</head>
<body>

<div class="container">
        <div class="content">
            <h3>hi, <span>user</span> </h3>
            <h1> Welcome <span><?php echo $_SESSION['user_name'] ?></span> </h1>

            <p>this is an user page </p>

            <a href="index.php" class="btn">Login</a>
            <a href="register_form.php" class="btn">register</a>
            <a href="logout.php" class="btn">Logout</a>
        </div>

    </div>

    
</body>
</html>