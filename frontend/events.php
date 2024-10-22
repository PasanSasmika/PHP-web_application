<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .gallery-content{
  width: 90%;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 50px 8%;
  position: relative;
  top: 25px;
}

.gallery-wrap{
  display: grid;
  grid-template-columns: repeat(auto-fit,minmax(250px, 1fr));
  grid-gap: 30px;
}

.gallery-wrap img{
  width: 100%;
  position: relative;
  right: 60px;
}
.family{
    height: 600px;
}

.music{
    height: 540px;
}
    </style>
<div class="gallery-content">
                <div class="gallery-wrap">
                    <img src="images/family.jpg" alt="" class="family">
                    <img src="images/music.jpg" alt="" class="music">
                    <img src="images/indianspecial.jpg" alt="" class="indian">

                    
                </div>
            </div>
            
</body>
</html>