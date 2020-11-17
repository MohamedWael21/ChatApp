<?php
try {
    $user = "root";
    $pass = "";

    $con = new PDO("mysql:host=localhost;dbname=MyChat;charset=utf8;", $user, $pass);

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    die($e->getMessage());
}
