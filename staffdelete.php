<?php

include 'config.php';
$id = $_GET['id'];
$sql = "DELETE FROM `addstf` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if($result){
    header("Location: add_staffii.php?msg=Record deleted Successfully");
}
else{
    echo "Failed: " .mysqli_error($conn);
}

?>