<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "{$root}/myChat/include/connection.php";
try{

    $query = "SELECT * FROM users WHERE id = ?";
    
    $stmt = $con->prepare($query);
    $stmt->bindValue(1,$_SESSION['user_id']);
    $stmt->execute();

    $row = $stmt->fetch();

    $user_id = $row['id'];
    $user_name = $row['name'];
    $user_picture = $row['picture'];
    $user_email = $row['email'];
    $user_country= $row['country'];
    $user_gender = $row['gender']; 
    $user_status = $row['log_in'];
    $user_forgotten_pass = $row['forgotten_answer'];



}catch(PDOException $e){
    echo $e->getMessage();
}