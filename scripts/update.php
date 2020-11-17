<?php
include_once "../include/connection.php";

try {
    if (isset($_POST['new_username'])) {

        $data = [$_POST['new_username'], $_POST['new_email'], $_POST['new_country'], $_POST['new_gender'], $_POST['user_id']];

        $query = "UPDATE users set name = ? , email = ?, country = ?, gender = ? where id = ?";
        $stmt  = $con->prepare($query);

        $stmt->execute($data);

        header("location:../setting.php");
    }
    if (isset($_FILES['new_picture'])) {

        if ($_FILES['new_picture']['error'] == UPLOAD_ERR_OK) {
            $new_picture_name = time() . "_" . $_FILES['new_picture']['name'];

            $checked = move_uploaded_file($_FILES['new_picture']['tmp_name'], "../images/" . $new_picture_name);
            if ($checked) {
                $data = [$new_picture_name, $_POST['user_id']];


                $query = "UPDATE users set picture = ? where id = ?";
                $stmt  = $con->prepare($query);

                $stmt->execute($data);
            }else{
                echo "failed";
            }

             header("location:../change-Picture.php");
        } else {
            echo "failed";
        }
    }

    if(isset($_POST['bestFriendName'])){
        $data = [$_POST['bestFriendName'], $_POST['user_id']];


        $query = "UPDATE users set  forgotten_answer = ? where id = ?";
        $stmt  = $con->prepare($query);

        $stmt->execute($data);

        header("location:../setting.php");
        
    }
    if(isset($_POST['new_password'])){
        $data = [$_POST['new_password'], $_POST['user_id']];


        $query = "UPDATE users set  password = ? where id = ?";
        $stmt  = $con->prepare($query);

        $stmt->execute($data);

        header("location:../setting.php");
        
    }
} catch (PDOException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
