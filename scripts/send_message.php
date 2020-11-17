<?php
include_once "../include/connection.php";

try {
    if (isset($_POST['senderId']) && isset($_POST['recieverId']) && isset($_POST['message'])) {

        $data = [$_POST['senderId'],$_POST['recieverId'],$_POST['message']];

        $query = "INSERT INTO messages (sender_id,reciever_id,content) value (?,?,?)";
        $stmt = $con->prepare($query);
        $stmt->execute($data);

        echo "sucess";

    }
} catch (PDOException $e) {
    echo $e->getMessage();
}