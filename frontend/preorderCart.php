<?php  

@include 'config.php';


if (isset($_POST['update_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity ='$update_value' WHERE id= '$update_id'");
    if($update_quantity_query){
        header('location:preorderCart.php');
    };
};

if (isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id= '$remove_id'");
    header('location:preorderCart.php');
};

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart`");
    header('location:preorderCart.php');

};


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>



</head>
<body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        font-family: 'Poppins';
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        width: 80%;
        margin: 2rem auto;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .order_cart {
        padding: 2rem;
    }

    .order_cart .heading {
        font-size: 2.5rem;
        color: #333333;
        text-align: center;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
    }

    .order_cart table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1.5rem;
    }

    .order_cart table thead th {
        padding: 1rem;
        font-size: 1.5rem;
        color: #ffffff;
        background-color: #007bff;
    }

    .order_cart table tbody tr td {
        padding: 1rem;
        font-size: 1.2rem;
        color: #333333;
        border-bottom: 1px solid #dddddd;
    }

    .order_cart table tbody tr:last-child td {
        border-bottom: none;
    }

    .order_cart table input[type="number"] {
        width: 5rem;
        padding: 0.5rem;
        font-size: 1.2rem;
        color: #333333;
        border: 1px solid #dddddd;
        border-radius: 5px;
    }

    .order_cart table input[type="submit"] {
        padding: 0.5rem 1rem;
        font-size: 1.2rem;
        color: #ffffff;
        background-color: #28a745;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .order_cart table input[type="submit"]:hover {
        background-color: #218838;
    }

    .order_cart table .table-bottom {
        background-color: #007bff;
    }

    .order_cart .checkout-btn {
        text-align: center;
        margin-top: 2rem;
    }

    .order_cart .checkout-btn a {
        display: inline-block;
        padding: 1rem 2rem;
        font-size: 1.5rem;
        color: #ffffff;
        background-color: #17a2b8;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .order_cart .checkout-btn a.disable {
        pointer-events: none;
        opacity: 0.5;
        background-color: #6c757d;
    }

    .order_cart .checkout-btn a:hover:not(.disable) {
        background-color: #138496;
    }

    .delete-btn, .option-btn {
        text-decoration: none;
        color: #ffffff;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        position: relative;
    }
    .total{
        position: relative;
        right: 270px;
    }
    .total-price{
        position: relative;
        right: 174px;
    }

    .delete-btn {
        background-color: #dc3545;
    }

    .delete-btn:hover {
        background-color: #c82333;
    }

    .option-btn {
        background-color: #ffc107;
        color: #333333;
        position: relative;
        top: 90px;
    }

    .option-btn:hover {
        background-color: #e0a800;
    }
</style>






    
    <div class="container">

    <section class="order_cart">
        <h1 class="heading"> Cart </h1>

        <table>
            <thead>
                <!-- <th>image</th> -->
                <th>Name</th>
                <th>Price</th>
                <th>quantity</th>
                <th>total price</th>
                <th>Action</th>
            </thead>

            <tbody>
                <?php 
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                $grand_total = 0;

                if(mysqli_num_rows($select_cart)> 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){

                ?>
                    <tr>
                    <!-- <td><img src="/login/frontend/uplodedimages<?php echo htmlspecialchars($fetch_cart['image']); ?>" alt="Product Image"></td> -->
                    <td><?php echo htmlspecialchars($fetch_cart['name']); ?></td>
                    <td>$<?php echo number_format($fetch_cart['price']); ?>/-</td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                            <input type="number" name="update_quantity" min="1" value="<?php echo htmlspecialchars($fetch_cart['quantity']); ?>">
                            <input type="submit" value="update" name="update_btn">
                        </form>
                    </td>
                    <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
                    <td><a href="preorderCart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"></i>remove</a></td>
                    </tr>


                <?php 

                $grand_total += $sub_total;
                    };
                };
                ?>

                <tr>
                    <td><a href="preorder.php" class="option-btn" style="margin-top: 0;">Continue Ordering</a></td>
                    <td colspan="3" class="total">Total</td>
                    <td class="total-price" name="total_price">$<?php echo $grand_total; ?></td>
                    <td><a href="preorderCart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"><i class='bx bxs-trash'></i>Delete All</a></td>
                </tr>
            </tbody>
        </table>

        <div class="checkout-btn">
            <a href="#" id="checkoutButton" class="btn <?= ($grand_total > 1)?'': 'disable';?>">Procced to Checkout</a>
        </div>


    </section>


    </div>
    


    <script>
    document.getElementById("checkoutButton").addEventListener("click", function(event) {
        alert("Your Order is Confirmed :)");
    });
</script>

</body>
</html>