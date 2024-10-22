<?php 

@include 'config.php';


function getBook($conn){
    $sql = "SELECT * FROM reservation";
    $result = $conn->query($sql);
    $book = [];
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $book[]=$row;
        }
    }

    return $book;
}


?>



