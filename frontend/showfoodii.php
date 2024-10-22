<?php  

@include 'config.php';
@include 'showfoodfun.php';


$foods = getFood($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="showfod.css">
    <title>Document</title>
</head>
<body>
<body>

    <section class="product"> 
        <h2 class="product-category">Our Menu</h2>
        <button class="pre-btn"><img src="images/pngtrei.png" alt=""></button>
        <button class="nxt-btn"><img src="images/pngtre.png" alt=""></button>
        <div class="product-container">
        <?php foreach($foods as $food): ?>
            <div class="product-card">
                <div class="product-image">
                   
                    <img src="<?php echo htmlspecialchars('/login/uploded_img/' . basename($food['image'])); ?>" alt="logo">
                   
                </div>
                <div class="product-info">
                <h2><?php echo htmlspecialchars($food['name']); ?></h2>
                    <span class="price">Price: $<?php echo htmlspecialchars($food['price']); ?></span><br>
                    <span class="cuisine">Cuisine:<?php echo htmlspecialchars($food['cuisine']); ?></span><br>
                    <span class="category">Category:<?php echo htmlspecialchars($food['category']); ?></span><br>
                    <p class="product-short-description">Description: <?php echo htmlspecialchars($food['description']); ?></p>
                </div>
            </div>
            
            <?php endforeach; ?>
        </div>
    </section>
    
    <script>
        
        const productContainers = [...document.querySelectorAll('.product-container')];
        const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
        const preBtn = [...document.querySelectorAll('.pre-btn')];

        productContainers.forEach((item, i) => {
            let containerDimensions = item.getBoundingClientRect();
            let containerWidth = containerDimensions.width;

            nxtBtn[i].addEventListener('click', () => {
                item.scrollLeft += containerWidth;
            });

            preBtn[i].addEventListener('click', () => {
                item.scrollLeft -= containerWidth;
            });

            // Add mouse wheel scroll functionality
        item.addEventListener('wheel', (e) => {
            e.preventDefault();
            item.scrollLeft += e.deltaY;
        });

            // Auto-scroll every two seconds with smooth effect
            // 2000 milliseconds = 2 seconds
        });
    </script>

    

    <script src="script.js"></script>
</body>
</body>
</html>