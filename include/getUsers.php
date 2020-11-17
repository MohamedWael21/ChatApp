<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "{$root}/myChat/include/connection.php";
try{

    if(isset($_POST['userNameHint'])){

        $query = "SELECT * FROM users INNER JOIN friends on users.id = friends.user_id WHERE name like ? and users.id !=?";

        $name = "%{$_POST['userNameHint']}%";
    
        $stmt = $con->prepare($query);
        $stmt->bindValue(1,$name);
        $stmt->bindValue(2,$_POST['userId']);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

    }else{
        
        $query = "SELECT * FROM users INNER JOIN friends on users.id = friends.user_id WHERE users.id != ?";
        $stmt = $con->prepare($query);
        $stmt->bindValue(1,$user_id);
        $stmt->execute();
        
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    

}catch(PDOException $e){
    echo $e->getMessage();
}