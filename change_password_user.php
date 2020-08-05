<?php ob_start();?>
<?php session_start();?>
<!--HEADER START-->
<?php include 'header.php'?>
<!--END HEADER NAV MENU-->
<!--EDIT PROFILE START-->
<?php if(!isset($_SESSION['username'])){
    header("Location:login.php");
    ob_end_flush();
}else{
?>


<div class="col-md-12">
    <div class="row no-gutters">
        <!--SETTINGS NAV START-->
        <div class="col-5 col-md-3">
            <section id="sub-menu">
                <div class="container">
                    <ul>
                        <li><a  href="settings.php">Profile Settings</a></li>
                        <li><a  href="bio.php">Detalied Information</a></li>
                        <li><a  class="active" href="change_password_user.php">Change Password</a></li>
                        <li><a  href="deleteprofile.php">Delete Profile</a></li>
                    </ul>
                </div>
            </section>
        </div>
        <!--SETTINGS NAV END-->
        <div class="col-12 col-sm-6 col-md-7">
            <section id="change_password">
                <div class="container">
                    <h3>Change password:</h3>
                    <form action="includes/change_password_user.php" id="change_password_user" class="change_password_user" method="POST">
                        <div class="form-group">
                            <label for="password">Old Password:</label>
                            <input name="password" type="text" class="form-control" placeholder="Password" autocomplete="no">
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password:</label>
                            <input name="new_password" type="text" class="form-control" placeholder="New password" autocomplete="no">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input name="confirm_password" type="text" class="form-control" placeholder="Confirm password" autocomplete="no">
                        </div>
                        <button name="submit" type="submit" value="submit" class="change btn btn-primary">Change</button>
                        <p class="message"></p>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".change").click(function(){
            if (!confirm("Are you sure?")){
                return false;
            }
        });
    });
    $(document).ready(function() {

        var form = $("#change_password_user");
        form.submit(function(e){
            $(".message").html();
            $(this).attr("disabled","disabled");
            e.preventDefault();
            $.ajax({
                type: "post",//POST METHOD
                url: "includes/change_password_user.php",//login.php
                data: form.serialize(),//values of all fields
                dataType: "json",//set response data type to json

                success: function(data){
                    $(".message").html(data.content);
                    if(data.response == 'success'){
                        $('.message').css("color","green");
                        $('.message').removeClass('alert alert-danger');
                        $('.message').addClass("alert alert-success");
                        setTimeout(function(){
                            $(location).attr('href',"change_password_user.php");

                        }, 2000);
                    }else{
                        $('.message').css("color","red");
                        $('.message').removeClass("alert alert-success");
                        $('.message').addClass("alert alert-danger");
                    }
                },
                error: function(data){
                    $('.message').html("Something went wrong!").css("color","red");
                }

            })
        });


    });
</script>
<!--EDIT PROFILE END-->
<!--FOOTER START-->
<?php include 'footer.php';?>
<?php }?>
<!--FOOTER END-->