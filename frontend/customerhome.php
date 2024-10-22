<?php 
session_start();

include("config.php");
if(!isset($_SESSION['valid'])){
    header("Location: customerlog.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="customeri.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="right-links">
            <?php 
            $id = $_SESSION['id'];

            // Debugging output
            // echo "Session ID: " . $id;
            
            // Initialize variables
            $res_Uname = $res_Email = $res_Age = $res_id = "";

            // Prepare the SQL query to avoid SQL injection
            $stmt = $conn->prepare("SELECT * FROM customer_form WHERE Id = ?");
            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            $stmt->bind_param("i", $id);
            if (!$stmt->execute()) {
                die('Execute failed: ' . htmlspecialchars($stmt->error));
            }

            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $res_Uname = htmlspecialchars($row['Username']);
                    $res_Email = htmlspecialchars($row['Email']);
                    $res_Age = htmlspecialchars($row['Age']);
                    $res_id = htmlspecialchars($row['Id']);
                }
            } else {
                // Handle case where no user is found
                echo "User not found.";
            }
            
            $stmt->close();
            ?>
                <div class="logo">
            <a href='customerprofil.php?Id=<?php echo $res_id; ?>'><i class='bx bxs-user-circle'></i>My Profile</a>
            <a href="manageorder.php"><i class='bx bxs-book-bookmark'></i> My Bookings</a>
            </div>
        </div>
    </div>
    <main>
       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $res_Uname; ?></b>, Welcome</p>
            </div>
          </div> 
       </div>
    </main>


    

    <!-- Reservation Form -->

    <?php         
    include("config.php");
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $guest = $_POST['guest'];
        $message = $_POST['message'];

        $sql = "INSERT INTO reservation(name, email, mobile, date, time, guest, message)
        VALUES('$name', '$email', '$mobile', '$date', '$time', '$guest', '$message')";

        $result = mysqli_query($conn, $sql);

        if($result){
            echo "Booking successfully";
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    }
?>
<form class="form" method="post">
    <p class="message">Reservation Form</p>
    <label>
        <input class="input" name="name" type="text" placeholder="" required="">
        <span>Name</span>
    </label>            
    <label>
        <input class="input" name="email" type="email" placeholder="" required="">
        <span>Email</span>
    </label> 
    <label>
        <input class="input" name="mobile" type="text" placeholder="" required="">
        <span>Mobile Number</span>
    </label>
    <label>
        <input class="input" name="date" type="date" placeholder="" required="">
        <span>Date</span>
    </label>
    <label>
        <input class="input" name="time" type="time" placeholder="" required="">
        <span>Time</span>
    </label>
    <label>
        <input class="input" name="guest" type="number" placeholder="" required="">
        <span>Number of Guests</span>
    </label>
    <label>
        <textarea class="input" name="message" placeholder="" required=""></textarea>
        <span>Message</span>
    </label>
    <button class="submit" name="submit">Submit</button>
</form>
</body>
</html>
