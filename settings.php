<?php ob_start();?>
<?php session_start();?>
<!--HEADER START-->
<?php include 'header.php'?>


<!--END HEADER NAV MENU-->
<!--EDIT PROFILE START-->

<style>
    .input-error{
        box-shadow:0 0 0 2px red;
    }
</style>

<?php
if(isset($_SESSION['usr_id'])){
    $usr_id = $_SESSION['usr_id'];
    $usrInfo = new Usrinfo();
    $default_info = $usrInfo->getUsrSettings($usr_id);

    $usr_username = $default_info['prijave_ime'];
    $usr_email = $default_info['prijave_email'];


?>
    <script>
        $(document).ready(function () {

            $("form.settings-form").submit(function(e){

                e.preventDefault();
                var url = $(this).attr("action");
                var type = $(this).attr("method");
                var data = new FormData($(this)[0]);
                data.append("id",$(this).attr('id'));
                $.ajax({
                    url:url,
                    type:type,
                    data:data,
                    processData:false,
                    contentType:false,
                    success: function(data){
                       $(".message").html(data.content);
                       if(data.response == 'success'){
                           $(".message").css("color","green");
                           setTimeout(function(){
                               location.reload();
                           }, 2000);
                       }else{
                           $(".message").css("color","red");
                       }
                    },
                    error:function(response){
                        $(".message").text("Failed:"+JSON.stringify(response));
                    }

                })

            });

        });
    </script>
    <div class="col-md-12">
        <div class="row no-gutters">
            <div class="col-5 col-md-3">
                <section id="sub-menu">
                    <div class="container">
                        <ul>
                            <li><a class="active" href="settings.php">Profile Settings</a></li>
                            <li><a href="bio.php">Detalied Information</a></li>
                            <li><a href="change_password_user.php">Change Password</a></li>
                            <li><a href="deleteprofile.php">Delete profile</a></li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="col-12 col-sm-6 col-md-7">
                <section id="change-info">
                    <div class="container">
                        <h3>Change your informations:</h3>
                        <form  action="includes/change_settings_profile.php" id="change_settings_profile" method="post" class="settings-form">
                                <label>Username: <b>Optional.</b></label>
                                <input name="username" type="text" class="form-control" id="change-username"  placeholder="Current:<?php echo $usr_username; ?>">

                                <label for="exampleInputEmail1">E-mail address : <b>Optional.</b></label>
                                <input name="email" type="email" class="form-control" id="change-email" aria-describedby="emailHelp" placeholder="Current:<?php echo $usr_email;?>">
                                <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small>

                                <label>Password</label>
                                <input name="password" type="password" class="form-control" id="change-newpassword" placeholder="Enter your current password" autocomplete="off">

                            <button type="submit" value="submit" class="btn btn-primary" name="submit">Submit</button>
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
    </script>
<?php }else{
    header("Location:index.php");
} ?>
<!--EDIT PROFILE END-->
<!--FOOTER START-->
<?php include 'footer.php';?>
<!--FOOTER END-->