<?php
include "include/connection.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = htmlentities($_POST['userName']);
    $email =  htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $country =  htmlentities($_POST['country']);
    $gender =  htmlentities($_POST['gender']);
    $rand = rand(1, 6);

    $stmt = $con->prepare("SELECT * FROM users where email = ?");
    $stmt->bindValue(1, $email);
    $stmt->execute();

    $check_email = $stmt->rowCount();

    if ($check_email == 1) {
        echo "<script>swal({
            title:'warning',
            text: 'email alerady in use',
            icon:'error'
        }).then(value =>{
            if(value)
                window.location = signup.php;
        });
        </script>";
        exit();
    }

    $picture = "image{$rand}.jpeg";
    try {
        $query = "INSERT INTO users (name,password,email,country,gender,picture) value(?,?,?,?,?,?)";
        $stmt = $con->prepare($query);
        $stmt->execute([$name,$password,$email,$country,$gender,$picture]);
        echo "<script>swal({
            title:'success',
            text: 'you succesfully signed',
            icon:'success'
        }).then( value =>{
          if(value)
            window.location = 'login.php';
        });
        </script>";
        echo $picture;
    } catch (PDOException $e) {
        echo "<script>swal({
            title:'warning',
            text: '{failed}',
            icon:'error'
        });</script>";
    }
}
