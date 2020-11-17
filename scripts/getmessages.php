<?php
include_once "../include/connection.php";

try {
    if (isset($_GET['userId']) && isset($_GET['firendId'])) {

        $data = [$_GET['userId'],$_GET['firendId'],$_GET['firendId'],$_GET['userId']];

        $query = "SELECT * from messages inner join users on sender_id = users.id WHERE (sender_id=? and reciever_id=?) or (sender_id=? and reciever_id=?)";
        $stmt = $con->prepare($query);
        $stmt->execute($data);

        $messages = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

        echo $messages;

    }
} catch (PDOException $e) {
    echo $e->getMessage();
}