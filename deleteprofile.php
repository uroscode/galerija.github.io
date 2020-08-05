<?php ob_start();?>
<?php session_start();?>
<!--HEADER START-->
<?php include 'header.php'?>
<!--END HEADER NAV MENU-->
<!--EDIT PROFILE START-->
<?php if(isset($_SESSION['username'])){
    if(isset($_GET['profiledelete'])){
        $usr_id = $_SESSION['usr_id'];//USR ID FROM SESSION LOGGED IN
        $deleteProfileObj = new User();
        $deleteProfileObj->deleteProfile($usr_id);
    }
    ?>
    <div class="col-md-12">
        <div class="row no-gutters">
            <div class="col-5 col-md-3">
                <section id="sub-menu">
                    <div class="container">
                        <ul>
                            <li><a href="settings.php">Profile Settings</a></li>
                            <li><a href="bio.php">Detalied Information</a></li>
                            <li><a class="active" href="deleteprofile.php">Delete profile</a></li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="col-12 col-sm-6 col-md-6">
                <section id="change-info">
                    <div class="container">
                        <h3>Delete Profile:</h3>
                        <div class="del-profile">
                             <a href="deleteprofile.php?profiledelete=true"<button class="delete btn btn-danger">Delete Profile?</button></a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".delete").click(function(){
                if (!confirm("Are you sure you want to delete your profile?All of your pictures will be deleted!")){
                    return false;
                }
            });
        });
    </script>
<?php }else{
    header("Location:login.php");
    ob_end_flush();
}
?>
<!--EDIT PROFILE END-->
<!--FOOTER START-->
<?php include 'footer.php';?>
<!--FOOTER END-->