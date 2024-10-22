 <?php
@include 'config.php';

if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_cuisine = $_POST['cuisine'];
    $product_catg = $_POST['catg'];
    $product_des = $_POST['des'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'C:/Xamp/htdocs/login/uploded_img/' . $product_image;

    if (!is_dir('C:/Xamp/htdocs/login/uploded_img/')) {
        mkdir('C:/Xamp/htdocs/login/uploded_img/', 0777, true);
    }

    $imagefiletype = strtolower(pathinfo($product_image_folder, PATHINFO_EXTENSION));
    $check = getimagesize($product_image_tmp_name);
    $uploadOk = 1;

    if (empty($product_name) || empty($product_price) || empty($product_image) || empty($product_catg) || empty($product_cuisine) || empty($product_des)) {
        $message[] = 'Please fill all fields';
    } elseif (!in_array($imagefiletype, ['jpg', 'jpeg', 'png', 'gif'])) {
        $message[] = 'File types allowed are jpg, jpeg, png, gif';
    } else {
        $insert = "INSERT INTO products(name, price, image, cuisine, category, description)
         VALUES('$product_name', '$product_price', '$product_image','$product_cuisine','$product_catg',' $product_des')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'New product added successfully';
        } else {
            $message[] = 'Could not add the product';
        }
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header('location:addfoods.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Foods</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="admin_page.php" class="btn">Back to Admin Panel</a>

<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<span class="message">' . $msg . '</span>';
    }
}
?>

<div class="addfood_container">
    <div class="add_product_form_container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <h3>Add a new product</h3>
            <input type="text" placeholder="Enter product name" name="product_name" class="box">
            <input type="number" placeholder="Enter product price" name="product_price" class="box">
            <select class="cuisine" name="cuisine">
            <option value="srilankan ">srilankan </option>
              <option value="indian">Indian</option>
              <option value="italian ">italian </option>
              <option value="american">american </option>
              <option value="mexican ">mexican </option>
              <option value="japanese ">japanes </option>
              <option value="thai ">thai </option>
              <option value="british ">british </option>
              <option value="french ">french </option>
            </select>
            <input type="text" placeholder="Enter product category" name="catg" class="box">
            <input type="text" placeholder="Description" name="des" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
            <input type="submit" class="btn" name="add_product" value="Add Product">
        </form>
    </div>

    <?php
    $select = mysqli_query($conn, "SELECT * FROM products");
    ?>

    <div class="product_display">
        <?php while ($row = mysqli_fetch_assoc($select)) { ?>
        <div class="product_card">
            <img src="uploded_img/<?php echo $row['image']; ?>" alt="Product Image" class="product_image">
            <div class="product_info">
                <h4><?php echo $row['name']; ?></h4>
                <p>Price: <?php echo $row['price']; ?>/-</p>
                <p>cuisine: <?php echo $row['cuisine']; ?></p>
                <p>Category: <?php echo $row['category']; ?></p>
                <p>Description: <?php echo $row['description']; ?></p>
                <div class="product_actions">
                    <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn edit_btn"><i class='bx bxs-edit'></i> Edit</a>
                    <a href="addfoods.php?delete=<?php echo $row['id']; ?>" class="btn delete_btn"><i class='bx bxs-trash'></i> Delete</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
