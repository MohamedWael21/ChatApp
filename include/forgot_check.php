<?php
session_start();
include "include/connection.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = htmlentities($_POST['email']);
    $best_friend = htmlentities($_POST['best_friend']);

    try{

        $query = "SELECT id FROM users where email = ? and forgotten_answer = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$email,$best_friend]);

        if($stmt->rowCount() == 1 ){

            $userId = $stmt->fetchAll();
            $userId = $userId[0]['id'];


            

            echo "<script>swal({
                title:'success',
                text: 'you can change your password now',
                icon:'success'
            }).then( value =>{
              if(value)
                window.location = 'change.php?user_id={$userId}';
            });
            </script>";

        }else{
            echo "<script>swal({
                title:'warning',
                text: 'check your data',
                icon:'warning'
            }).then( value =>{
              if(value)
                window.location = 'forgot_password.php';
            });
            </script>";

        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }







}    