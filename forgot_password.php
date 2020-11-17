<?php
$title = "forget-password";
$reg = true;
include_once "include/header.php";
?>

<div class="pass">
    <div class="header">
        <h2 class="text-center">forgot password</h2>
        <p class="text-center">myChat</p>
    </div>
    <div class="form">
        <form action="" method="post">
            <div class="form-group">
                <label for="email_field">Email</label>
                <input type="email" name="email" class="form-control" id="email_field" placeholder="somename@gmail.com" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="bf_field">BestFriend name</label>
                <input type="text" name="best_friend" class="form-control" id="bf_field" placeholder="Best friend name"   autocomplete="off"required>
            </div>
            <input type="submit" value="Submit" class="btn btn-block btn-lg" style="margin-top: 20px;">
        </form>
    </div>
</div>







<?php
include_once "include/footer.php";
include_once "include/forgot_check.php";