<?php
$title = "change-password";
$reg = true;
include_once "include/header.php";
?>
<div class="pass">
    <div class="header">
        <h2 class="text-center"> change password</h2>
        <p class="text-center">myChat</p>
    </div>
    <div class="form">
        <form action="" method="post">
            <input type="hidden" name="userId" value="<?php echo $_GET['user_id'];?>">
            <div class="form-group">
                <label for="new_pass_field">New password</label>
                <input type="password" name="newPassword" class="form-control" id="new_pass_field" placeholder="new password" required>
            </div>
            <div class="form-group">
                <label for="confirm_pass_field">Confirm</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_pass_field" placeholder="confirm" required>
            </div>
            <input type="submit" value="change" class="btn btn-block btn-lg" style="margin-top: 20px;">
        </form>
    </div>
</div>







<?php
include_once "include/footer.php";
include_once "include/password_change.php";