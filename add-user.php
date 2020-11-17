<?php
session_start();
$title = "add-user";
$users_id = [];
if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
} else {
    include "include/user.php";
}
include "include/header.php";
include "include/getUsers.php";
include "include/getfriends.php";
?>

<div class="add-user">
    <div class="bar">
        <a href="./home.php">MyChat</a>
        <a href="./setting.php">Setting</a>
    </div>
    <div class="cont">


        <form action="" method="post">
            <input type="search" name="userNameHint" placeholder="Enter user name" class="form-control" autocomplete="off">
            <input type="submit" value="Search" class="btn btn-primary">
            <input type="hidden" name="userId" value="<?php echo $user_id; ?>">
        </form>
        <div class="users">

            <?php  foreach($users as $user) :  ?>
                <?php 
                if( in_array($user['id'],$users_id) ){ continue; }else{array_push($users_id, $user['id']);}
                ?>
                    <div class="user">
                        <div class="img-con">
                            <img src="images/<?php echo $user['picture'];?>" class="img-fluid" alt="image">
                        </div>
                        <div class="info">
                            <div class="name"> <?php  echo $user['name']; ?></div>
                            <span class="country"><?php  echo $user['country']; ?></span>
                            <sapn class="gender"><?php  echo $user['gender']; ?></sapn>
                            <div class="add-user">
                                <?php

                                    if(in_array($user['id'],$friends_id)){?>

                                        <a href="./home.php?friendId=<?php echo $user['id'] ?>">chat with <?php  echo $user['name']; ?> </a>

                                    <?php
                                    }else{?>
                                        <a href="scripts/addUser.php?friend_id=<?php echo $user['id'];?>&user_id=<?php echo $user_id;?>"> Add <?php echo $user['name'];?> </a>

                                     <?php   
                                    }


                                ?>

                            </div>
                        </div>
                    </div>
            <?php  endforeach;  ?>

        </div>
    </div>
</div>





<?php
include "include/footer.php";
