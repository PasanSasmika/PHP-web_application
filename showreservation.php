<?php  

@include 'config.php';
@include 'showreservationfun.php';


$book = getBook($conn);
?>

<?php         
include("config.php");
if(isset($_POST['submit'])){
    $ddown = $_POST['dropdown'];
    $book_id = $_POST['id'];

    $sql = "UPDATE reservation SET reply='$ddown' WHERE id='$book_id'";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Booking Reply Sent";
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
      font-family: 'Poppins', sans-serif; /* You can change the font family to something more elegant if desired */
      background-color: #f0f0f0;
      margin: 0;
      padding: 20px;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: flex-start; /* Align items to the start of the container */
    }

    .card {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 300px;
      margin: 10px;
      transition: transform 0.2s;
    }

    .card:hover {
      transform: translateY(-10px);
    }

    .card__content {
      padding: 20px;
    }

    .card__content span {
      display: block;
      margin-bottom: 10px;
      color: #333;
    }

    .card__content span.name {
      font-weight: bold;
      font-size: 1.2em;
    }

    .card__content span.email,
    .card__content span.mobile,
    .card__content span.date,
    .card__content span.time,
    .card__content span.guest,
    .card__content span.message {
      font-size: 0.9em;
      color: #555;
    }

    .dropdown {
      display: block;
      margin-bottom: 10px;
      padding: 10px;
      width: 100%;
      font-size: 1em;
      color: #333;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #fff;
    }

    .submit {
      display: block;
      width: 100%;
      padding: 10px;
      font-size: 1em;
      color: #fff;
      background-color: #007BFF;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .submit:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div class="container">
    <?php foreach($book as $book): ?>
      <div class="card">
        <div class="card__content">
          <span class="name">Name: <?php echo htmlspecialchars($book['name']); ?></span><br>
          <span class="email">Email: <?php echo htmlspecialchars($book['email']); ?></span><br>
          <span class="mobile">Mobile: <?php echo htmlspecialchars($book['mobile']); ?></span><br>
          <span class="date">Date: <?php echo htmlspecialchars($book['date']); ?></span><br>
          <span class="time">Time: <?php echo htmlspecialchars($book['time']); ?></span><br>
          <span class="guest">Number Of Guest: <?php echo htmlspecialchars($book['guest']); ?></span><br>
          <span class="message">Message: <?php echo htmlspecialchars($book['message']); ?></span><br>
          <form class="form" method="post">
            <select class="dropdown" name="dropdown">
              <option value="confirm">Confirm</option>
              <option value="delete">Delete</option>
            </select>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($book['id']); ?>">
            <button class="submit" name="submit">Send</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div> 
</body>
</html>