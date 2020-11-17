<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "{$root}/myChat/include/connection.php";
$friends_id = [];

try {

        $query = "SELECT friend_id FROM friends where user_id = ? ";
        $stmt = $con->prepare($query);
        $stmt->execute([$user_id]);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($friends_id,$row['friend_id']);
        }

} catch (PDOException $e) {
    echo $e->getMessage();
}
