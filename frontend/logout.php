<?php 

@include 'config.php';


session_start();
session_unset();
session_destroy();


header('location:index.php');

session_start();
session_destroy();
header("Location: ../customerlog.php");







?>