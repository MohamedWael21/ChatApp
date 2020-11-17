<?php
include_once "../include/connection.php";

try {
    if ( isset($_GET['friendId'])) {

        $query = "SELECT * FROM users where id=?";
        $stmt = $con->prepare($query);
        $stmt->execute([$_GET['friendId']]);

        $friend = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

        echo $friend;

    }
} catch (PDOException $e) {
    echo $e->getMessage();
}