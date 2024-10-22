<?php 

@include 'config.php';


function getBookdetails($conn){
    $sql = "SELECT * FROM reservation";
    $result = $conn->query($sql);
    $mybook = [];
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $mybook[]=$row;
        }
    }

    return $mybook;
}


?>
