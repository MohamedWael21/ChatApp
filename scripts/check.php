<?php
include_once "../include/connection.php";

if(isset($_POST['user_id']) && isset($_POST['pass'])){

    $data = [$_POST['pass'], $_POST['user_id']];


        $query = "select id from users where password =? and id = ? ";
        $stmt  = $con->prepare($query);

        $stmt->execute($data);

        echo  $stmt->rowCount() > 0 ?  "correct" : "wrong";

}