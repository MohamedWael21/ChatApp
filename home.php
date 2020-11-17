<?php
session_start();
$home = true;
$title = "Home";
if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
} else {
    include "include/user.php";
}
include "include/header.php";
if (isset($_GET['friend_id'])) {
} else {
?>
    <div class="chatApp">
        <div class="row bar">
            <div class="left-side  col-md-3">
                <i class="fa fa-search"></i>
                <a href="./add-user.php" class="btn btn-secondary">Add new user</a>
            </div>
            <div class="right-side  col-md-9">
                <img src="images/<?php echo $user_picture; ?>" alt="image">
                <span><?php echo $user_name; ?></span>
                <input type="hidden" name="user-id" value="<?php echo $user_id; ?>" id="user-id-field">
                <a href="logout.php" class="btn btn-danger">logout</a>
            </div>
        </div>
        <div class="row main-section">
            <div class="left-side col-md-3" id="friends_con">
            </div>
            <div class="right-side col-md-9">
                <div class="mesg-cont" id="mes_con">
                </div>
                <div class="foot">
                    <input type="text" id="message_field" class="form-control" placeholder="write your message" autocomplete="off">
                    <button class="btn btn-primary" id="send_message"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>

<?php
}
include "include/footer.php";
