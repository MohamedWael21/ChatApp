<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "{$root}/myChat/include/connection.php";

try {
    if ( isset($_GET['friend_id']) && isset($_GET['user_id']) ) {

        $data = [$_GET['user_id'],$_GET['friend_id'],$_GET['friend_id'],$_GET['user_id']];

        $query = "Insert Into friends (user_id,friend_id) values (?,?),(?,?)";
        $stmt = $con->prepare($query);
        $stmt->execute($data);

        header("location:/myChat/home.php");
       
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}