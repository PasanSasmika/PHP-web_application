<?php  

@include 'config.php';
@include 'showfoodfun.php';


$foods = getFood($conn);
?>

<!-- Cart Function Start -->

<?php
@include 'config.php';

if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_image = $_POST['image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

    if(mysqli_num_rows($select_cart) > 0){
        echo '<script>alert("Product already added to cart")</script>'; 

    }else{
        $insert_product = mysqli_query($conn, "INSERT INTO `cart` (name, price, image, quantity) 
        VALUES (' $product_name',' $product_price', '  $product_image', ' $product_quantity')");
        $message[] = 'Product added successfuly';
    }

}

// SEARCH FUNCTION START//
$foods = [];

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT * FROM `products` WHERE `category` LIKE '%$search%' OR `cuisine` LIKE '%$search%'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $foods[] = $row;
        }
    }
} else {
    $foods = getFood($conn);
}
 // SEARCH FUNCTION ENDS//
?>








 <!-- Cart Function Ends -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Preorder</title>
</head>
<body>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Lilita+One&family=Satisfy&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Playwrite+NG+Modern:wght@100..400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Lilita+One&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Lilita+One&family=Satisfy&display=swap');


.card {
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 50%;
    margin: 20px;
}

.card-data {
    padding: 20px;
}

.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    position: relative;
    top: 20px;
}

.product-card {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 10px;
    overflow: hidden;
    width: calc(20% - 10px); 
    height: 360px; 
    transition: transform 0.3s;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
}

.product-card:hover {
    transform: translateY(-10px);
}

.product-image {
    width: 100%; 
    height: 60%; 
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover; 
}

.product-info {
    padding: 10px;
    text-align: center;
    width: 100%;
}

.product-info h2 {
    font-family: "Playwrite NG Modern", cursive;
    font-size: 1.2em; 
    margin: 10px 0;
}

.product-info .price{
    font-family: "Playwrite NG Modern", cursive;
    font-size: 0.9em; 
    margin: 5px 0;
}
.product-info .category,.cuisine,
.product-info .product-short-description {
    font-family: "Poppins";
    font-size: 0.9em; 
    margin: 5px 0;
}
.product-category{
    font-family: "Playwrite NG Modern", cursive;
    font-size: 30px;
    font-weight: 1000;
    text-align: center;
}

.product-info .price {
    color: #28a745;
    font-weight: bold;
}

.product-info .category {
    color: #6c757d;
}

.product-info .product-short-description {
    color: #495057;
}
.btn{
    color: black;
    font-family: "Poppins";
    background: #f8f9fa;
    border-radius: 12px;
    border: 1px solid #f8f9fa;
}

.cart{
    text-decoration: none;
    position: relative;
    left: 1200px;
    bottom: 80px;
    font-family: "Playwrite NG Modern", cursive;
    font-size: 20px;
    font-weight: 700;
    color: black;
   
}
.cart span{
    position: relative;
    left: 17px;
    color: #cbb02a;
}
.group {
 display: flex;
 line-height: 28px;
 align-items: center;
 position: relative;
 max-width: 190px;
 left: 40%;

}

.input {
 width: 400px;
 height: 40px;
 line-height: 28px;
 padding: 0 1rem;
 padding-left: 2.5rem;
 border: 2px solid transparent;
 border-radius: 8px;
 outline: none;
 background-color:#feffdf;
 color: black;
 transition: .3s ease;
 font-family: 'Poppins';
}

.input::placeholder {
 color:black;
}

.input:focus, input:hover {
 outline: none;
 border-color: rgba(234,76,137,0.4);
 background-color: #feffdf;
 box-shadow: 0 0 0 4px rgb(234 76 137 / 10%);
}

.icon {
 position: absolute;
 left: 1rem;
 fill: #9e9ea7;
 width: 1rem;
 height: 1rem;
}
.group button{
    background-color:#feffdf;
    border: none;
    font-size: 25px;
    border-radius: 12px;
    padding: 4px 7px;
}






</style>


<section class="product"> 
        <h2 class="product-category">Order Your Favour....</h2>

        <!-- search bar start -->
        <form action="" method="GET">
        
        <div class="group">
            <input placeholder="Search" type="text"name="search" class="input"></i>
            <button><i class='bx bx-search'></i></button>
        </div>

    </form>
    <!-- search bar Ends -->

            <!-- Show cart quantity -->
        <?php  
        
        $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
        $row_count = mysqli_num_rows($select_rows);
        
        ?>


           <!-- Show cart quantity Ends -->


        <a href="preorderCart.php" class="cart"><i class='bx bxs-cart'></i> Cart <span> <?php echo $row_count ?></span></a>
        <div class="product-container">
        <?php foreach($foods as $food): ?>
            <div class="product-card">
                <div class="product-image">
                   
                    <img src="<?php echo htmlspecialchars('/login/uploded_img/' . basename($food['image'])); ?>" alt="logo">
                   
                </div>
                <div class="product-info">
                <h2><?php echo htmlspecialchars($food['name']); ?></h2>
                    <span class="price">Price: $<?php echo htmlspecialchars($food['price']); ?></span><br>
                    <span class="cuisine">Cuisine: <?php echo htmlspecialchars($food['cuisine']); ?></span><br>
                    <span class="category">Category: <?php echo htmlspecialchars($food['category']); ?></span><br>
                    <p class="product-short-description"> <?php echo htmlspecialchars($food['description']); ?></p>
                    <form action="" method="post">
                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($food['name']); ?>">
                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($food['price']); ?>">
                        <input type="hidden" name="image" value="<?php echo htmlspecialchars($food['image']); ?>">
                        <input type="submit" class="btn" value="Add to cart" name="add_to_cart">
                    </form>
                </div>
            </div>
            
            <?php endforeach; ?>
        </div>
    </section>
    
</body>
</html>