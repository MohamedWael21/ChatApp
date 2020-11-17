<?php
session_start();
include "include/connection.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $Newpassword = htmlentities($_POST['newPassword']);
    $confirm = htmlentities($_POST['confirm_password']);
    $userId = $_POST['userId'];
    if(!($confirm == $Newpassword)){
        echo "<script>swal({
            title:'warning',
            text: 'your passwords not match ',
            icon:'warning'
        }).then( value =>{
          if(value)
            window.location = 'change.php?user_id={$userId}';
        });
        </script>";
    }
    
    try{

        $query = "UPDATE users SET password = ? where id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$Newpassword,$userId]);

    


            echo "<script>swal({
                title:'success',
                text: 'your password change ',
                icon:'success'
            }).then( value =>{
              if(value)
                window.location = 'login.php';
            });
            </script>";

        
           



    }catch(PDOException $e){
        echo $e->getMessage();
    }







}    