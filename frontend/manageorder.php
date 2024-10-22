<?php  

@include 'config.php';
@include 'manageorderfun.php';


$mybook =  getBookdetails($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
  font-family: 'Poppins', sans-serif;
  background-color: #f0f0f0;
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  margin: 0;
  padding: 20px;
}

    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: flex-start;
      position: relative;
      top: 60px;
      left: 60px;
    }

    .card {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 400px; /* Increased width */
      margin: 10px;
      transition: transform 0.2s;
    }

    .card:hover {
      transform: translateY(-10px);
    }

    .card__content {
      padding: 10px; /* Decreased padding to reduce height */
    }

    .card__content span {
      display: block;
      margin-bottom: 4px; /* Adjusted margin */
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
      color: #38598b;
      font-weight: 500;
    }

    .dropdown {
      display: block;
      margin-bottom: 10px;
      padding: 10px;
      width: 60%;
      font-size: 1em;
      color: #333;
      border: 1px solid #ccc;
      border-radius: 44px;
      background-color: #fff;
    }
    .card__content span.dropdown{
      font-size: 0.9em;
      color: #c50d66;
      font-weight: 500;
    }
    .card-title span{
      color: #ffa400;
      font-weight: 800;
      font-family: "Poppins";
      font-size: 28px;
      position: relative;
      left: 44%;
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
<div class="card-title">
          <span>My Order</span>
        </div>
  <div class="container">
    <?php foreach($mybook as $mybook): ?>
      <div class="card">
        <div class="card__content">
          <span class="name">Name: <?php echo htmlspecialchars($mybook['name']); ?></span><br>
          <span class="email">Email: <?php echo htmlspecialchars($mybook['email']); ?></span><br>
          <span class="mobile">Mobile: <?php echo htmlspecialchars($mybook['mobile']); ?></span><br>
          <span class="date">Date: <?php echo htmlspecialchars($mybook['date']); ?></span><br>
          <span class="time">Time: <?php echo htmlspecialchars($mybook['time']); ?></span><br>
          <span class="guest">Number Of Guest: <?php echo htmlspecialchars($mybook['guest']); ?></span><br>
          <span class="message">Message: <?php echo htmlspecialchars($mybook['message']); ?></span><br>
          <span class="dropdown">Your Booking is <?php echo htmlspecialchars($mybook['reply']); ?></span><br>
        </div>
      </div>
    <?php endforeach; ?>
  </div> 
</body>
</body>
</html>