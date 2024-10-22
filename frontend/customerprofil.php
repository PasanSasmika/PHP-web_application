<?php 
   session_start();

   include("config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: customerlog.php");
    exit;
   }

   $id = $_SESSION['id'];
   if (!$id) {
      die("User ID not set in session.");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customeri.css">
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="customerhome.php"> Back To Profile</a></p>
        </div>

    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($conn,"UPDATE customer_form SET Username='$username', Email='$email',
                 Age='$age' WHERE Id=$id") or die("Error occurred: " . mysqli_error($conn));

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
              echo "<a href='customerhome.php'><button class='btn'>Go Home</button></a>";
                }
               } else {
                $id = $_SESSION['id'];
                $query = mysqli_query($conn,"SELECT * FROM customer_form WHERE Id=$id") or die("Error occurred: " . mysqli_error($conn));

                $result = mysqli_fetch_assoc($query);
                if ($result) {
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                } else {
                    die("User not found.");
                }
            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($res_Uname); ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($res_Email); ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo htmlspecialchars($res_Age); ?>" autocomplete="off" required>
                </div>
                
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update">
                </div>
            </form>
        </div>
        <?php } ?>
      </div>

      
</body>
</html>
