<?php
include_once "../include/connection.php";

try {
    if (isset($_GET['userId'])) {

        $query = "SELECT * FROM users where id in (select friend_id from friends where user_id = ?)";
        $stmt  = $con->prepare($query);
        $stmt->bindValue(1,$_GET['userId']);
        $stmt->execute();
        
        $friends = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

        echo $friends;
        exit();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
