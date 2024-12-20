<?php
session_start();
$user_id = $_SESSION['user_id'];
if(($_SESSION["role"] != 'Student' && $_SESSION["role"] != 'manager') || $_SESSION["loggedin"] != true){
    header("Location: ../Login.php");
    exit();
}

