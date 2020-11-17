<?php
$title = "logIn";
$reg = true;
include_once "include/header.php";
?>

<div class="login">
    <div class="header">
        <h2 class="text-center">Log In</h2>
        <p class="text-center">login to myChat</p>
    </div>
    <div class="form">
        <form action="" method="post">
            <div class="form-group">
                <label for="email_field">Email</label>
                <input type="email" name="email" class="form-control" id="email_field" placeholder="somename@gmail.com" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="pass_field">Password</label>
                <input type="password" name="password" class="form-control" id="pass_field" placeholder="Password" required>
            </div>
            <div class="forgot">
                <p>Forgot password ? <a href="forgot_password.php">Click Here</a></p>
            </div>
            <input type="submit" value="Login" class="btn btn-block btn-lg">
        </form>
    </div>
    <div class="foot">
         <p class="text-center">Don't have an account ? <a href="signup.php">Click Here</a></p>
    </div>
</div>







<?php
include_once "include/footer.php";
include_once "include/log_in.php";
?>