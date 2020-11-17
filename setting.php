<?php
session_start();
$title = "setting";
$settings = true;
if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
} else {
    include "include/user.php";
}
include "include/header.php";
?>

<div class="setting">
    <div class="bar">
        <a href="./home.php">MyChat</a>
    </div>
    <div class="update-user">
        <form action="scripts/update.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
            <table>
                <tr>
                    <td colspan="2">
                        <h1>change account settings</h1>
                    </td>
                </tr>
                <tr>
                    <td> <label for="username">change your username<label></td>
                    <td><input type="text" name="new_username" id="username" class="form-control" value="<?php echo $user_name; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td> <a href="./change-Picture.php"> <i class="fa fa-user"></i> change picture </a></td>
                </tr>
                <tr>
                    <td> <label for="email">Email<label></td>
                    <td><input type="email" name="new_email" id="email" class="form-control" value="<?php echo $user_email; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="country">Country<label></td>
                    <td><select name="new_country" id="country" class="form-control">
                            <option disabled>country</option>
                            <option value="egypt" <?php echo  $user_country == "egypt" ? "selected" :"";?> >Egypt</option>
                            <option value="argentin"  <?php echo  $user_country == "argentin" ? "selected" :"";?> >Argentin</option>
                            <option value="brazil"  <?php echo  $user_country == "brazil" ? "selected" :"";?> >Brazil</option>
                            <option value="germany" <?php echo  $user_country == "germany" ? "selected" :"";?>  >Germany</option>
                        </select> </td>
                </tr>
                <tr>
                    <td> <label for="gender">Gender</label></td>
                    <td> <select name="new_gender" id="gender" class="form-control">
                            <option disabled> select a Gender</option>
                            <option value="male" <?php echo  $user_gender == "male" ? "selected" :"";?> >Male</option>
                            <option value="female" <?php echo  $user_gender == "female" ? "selected" :"";?>>Female</option>
                        </select></td>
                </tr>
                <tr>

                    <td> <label for="">forgotten password </label> </td>
                    <td><span id="forgotten-passeord">fogotten password</span></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="./change-pass.php"><i class="fa fa-key"></i>change password</a></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Update" class="btn btn-primary btn-lg btn-block"></td>
                </tr>
            </table>
        </form>
    </div>

</div>


<div class="dialog" id="popup">
    <span class="close-icon" id="close-x"><i class="fa fa-close"></i></span>
    <hr>
    <form action="scripts/update.php" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
        <h2>what is your best friend name ?</h2>
        <textarea name="bestFriendName" value="<?php echo $user_forgotten_pass;?>"></textarea>
        <input type="submit" value="submit" class="btn btn-primary mt-3">
    </form>
    <div class="disc">
        <p> Answer the quetions above to be able to change your password when you forget it</p>
    </div>
    <hr>
    <span class="btn btn-secondary" id="close">Close</span>
</div>

<div class="overlay"></div>

<?php
include "include/footer.php";
