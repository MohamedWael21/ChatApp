<?php
session_start();
$title = "change-picture";
if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
} else {
    include "include/user.php";
}
include "include/header.php";
?>

<div class="update-picture">

    <div class="bar">
        <a href="./home.php">MyChat</a>
        <a href="./setting.php">Setting</a>
    </div>

    <div class="cont">
        <div class="picture"><img src="images/<?php echo $user_picture ?>" alt="image"></div>
        <div class="name"><?php echo $user_name; ?></div>
        <div class="form-con">
            <form action="scripts/update.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <label for="picture_filed">select picture</label>
                <input type="file" name="new_picture" id="picture_filed">
                <input type="submit" value="update picture">
            </form>
        </div>
    </div>

</div>



<?php
include "include/footer.php";
