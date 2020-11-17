<?php
session_start();
$title = "change-password";
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
            <input type="hidden" name="user_id" id="us_id" value="<?php echo $user_id; ?>">
            <table>
                <tr>
                    <td colspan="2">
                        <h1>change password</h1>
                    </td>
                </tr>
                <tr>
                    <td> <label for="current">current password<label></td>
                    <td><input type="password"  id="current" class="form-control">
                        <p class="alert alert-danger" id="confirm_current_error" style="margin:20px 0 0;display:none;">wrong password</p>
                </td>

                </tr>
                <tr>
                    <td> <label for="new_password">New password<label></td>
                    <td> <input type="password" name="new_password" id="new_password" class="form-control"> </td>
                </tr>
                <tr>
                    <td> <label for="confirm">confirm_password<label></td>
                    <td><input type="password" id="confirm" class="form-control">
                        <small id="confirm_pass_error" class="alert alert-danger">not matched</small>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="change" class="btn btn-primary btn-lg btn-block" id="submit-btn"></td>
                </tr>
            </table>
        </form>
    </div>

</div>



<script>
    var confirm_field = document.getElementById("confirm");
    var new_password = document.getElementById("new_password");
    var small = document.getElementById("confirm_pass_error");
    var wrong_pass = document.getElementById("confirm_current_error");
    var current_password = document.getElementById("current");
    var us_id  = document.getElementById("us_id");
    var submit_btn = document.getElementById("submit-btn");

    setInterval(()=>{

        if(!(confirm_field.value == new_password.value)){
            small.style.display = "block";
        }else{
            small.style.display = "none";
        }

        if(current_password.value){

            let xmlObject = new XMLHttpRequest();
            
            xmlObject.onreadystatechange = () =>{
                
                if(xmlObject.readyState == 4 && xmlObject.status == 200){
                    
                    if(xmlObject.responseText == "wrong"){
                        wrong_pass.style="block";
                        submit_btn.disabled = true;
                    }else{
                        wrong_pass.style.display = "none";
                        submit_btn.disabled = false;
                    }
                }
            }

            xmlObject.open("post",`scripts/check.php`);
            xmlObject.setRequestHeader("content-type","application/x-www-form-urlencoded");
            xmlObject.send(`user_id=${us_id.value}&pass=${current_password.value}`);
        }else{
            wrong_pass.style.display="none";
        }

    },1000);

</script>
<?php
include "include/footer.php";
