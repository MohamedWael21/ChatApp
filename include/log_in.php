<?php
session_start();
include "include/connection.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);

    try{

        $query = "SELECT * FROM users where email = ? and password = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$email,$password]);

        if($stmt->rowCount() == 1 ){

            while($row = $stmt->fetch()){
                $id = $row['id'];
                $name = $row['name'];
            }

            $_SESSION['user_id'] = $id;

            $query = "UPDATE users set log_in = ? WHERE id = ?";
            $stm = $con->prepare($query);
            $stm->bindValue(1,"online");
            $stm->bindValue(2,$id);
            $stm->execute();

            echo "<script>swal({
                title:'success',
                text: 'you succesfully login',
                icon:'success'
            }).then( value =>{
              if(value)
                window.location = 'home.php';
            });
            </script>";

        }else{
            echo "<script>swal({
                title:'warning',
                text: 'check email and password',
                icon:'warning'
            }).then( value =>{
              if(value)
                window.location = 'login.php';
            });
            </script>";

        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }







}    