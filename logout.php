<?php
include_once "include/connection.php";
session_start();
$query = "UPDATE users set log_in = ? WHERE id = ?";
$stm = $con->prepare($query);
$stm->bindValue(1,"offline");
$stm->bindValue(2,$_SESSION['user_id']);
$stm->execute();
session_destroy();
session_unset();
header('location:login.php');