<?php 

@include 'config.php';


function getFood($conn){
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $foods = [];
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $foods[]=$row;
        }
    }

    return $foods;
}

























?>