<?php
$title = "SignUp";
$reg = true;
include_once "include/header.php";
?>

<div class="sign">
    <div class="header">
        <h2 class="text-center">Sign up</h2>
        <p class="text-center">Fill out this form and start chating with your friends</p>
    </div>
    <div class="form">
        <form action="" method="post">
            <div class="form-group">
                <label for="user_field">Username</label>
                <input type="text" name="userName" class="form-control" id="user_field" placeholder="Username" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="pass_field">Password</label>
                <input type="password" name="password" class="form-control" id="pass_field" placeholder="Password" >
            </div>
            <div class="form-group">
                <label for="email_field">Email</label>
                <input type="email" name="email" class="form-control" id="email_field" placeholder="somename@gmail.com" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="country_field">Country</label>
                <select name="country" id="country_field" required class="form-control">
                    <option disabled> select a country</option>
                    <option value="egypt">Egypt</option>
                    <option value="argentin">Argentin</option>
                    <option value="brazil">Brazil</option>
                    <option value="germany">Germany</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gender_field">Gender</label>
                <select name="gender" id="gender_field" required class="form-control">
                    <option disabled> select a Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-check check">
                <input type="checkbox" class="form-check-input" id="check_field">
                <label class="form-check-label" for="check_field">I accept <a href=""> Terms of use </a> &amp;  <a href="">Privacy Policy</a></label>
            </div>
            <input type="submit" value="signup" name="sign" class="btn btn-block btn-lg">
        </form>
    </div>
    <div class="foot">
        <p class="text-center">Alerady have account ? <a href="login.php">Click Here</a></p>
    </div>
</div>







<?php
include_once "include/footer.php";
include_once "include/sign_up.php";
?>
