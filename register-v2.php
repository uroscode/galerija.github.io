<?php
session_start();
include "includes/autoload.inc.php";


if (!isset($_SESSION['username'])) {//UKOLIKO NIJE SETOVAN USERNAME SESSION VRATI GA NA WELCOME.PHP
if(!isset($_GET['firstname']) && !isset($_GET['lastname']) && !isset($_GET['unique_id'])) {

    header("Location:register_first-v2.php");
}else{
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $unique_id = $_GET['unique_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Finish Registration | Gallery</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="img-site/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!--===============================================================================================-->
    <script>


        $(document).ready(function(){

            var form = $("#register-form");
            form.submit(function(e){

                $(this).attr("disabled","disabled");
                e.preventDefault();

                $.ajax({
                    type: "post",//POST METHOD
                    url: "includes/register.php?<?php echo "firstname=".$firstname."&lastname=".$lastname."&unique_id=".$unique_id; ?>",//login.php
                    data: form.serialize(),//values of all fields
                    dataType: "json",//set response data type to json

                    success: function(data){
                        $(".message").html(data.content);
                        if(data.response == 'success'){
                            $('.message').css("color","green");
                            $(location).attr('href',"login-v2.php");//REDIRECT
                        }else{
                            $('.message').css("color","red");

                        }
                    },
                    error: function(data){
                        $(".message").html(data.content);
                    }

                })
            });

        });
    </script>
</head>
<body>

	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" id="register-form">
					<span class="login100-form-title p-b-34">
						Finish Registration
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Username">
						<input id="first-name" class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Password">
						<input id="register-password" class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Confirm password">
                        <input id="register-password-confirm" class="input100" type="password" name="password-confirm" placeholder="Confirm password">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="E-Mail">
                        <input id="register-email" class="input100" type="text" name="email" placeholder="E-Mail">
                        <span class="focus-input100"></span>
                    </div>
					<div class="container-login100-form-btn">
						<button id="register-submit" type="submit" name="submit" class="login100-form-btn">
							Finish registration
						</button>
                        <p class="message"></p>
					</div>

                    <div class="w-full text-center p-t-27 p-b-239">
                        <div class="w-full text-center">
                            <a href="login-v2.php">Already a member?</a>
                        </div>
                    </div>



				</form>
				<div class="login100-more" style="background-image: url('img-site/bg-01.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
    <?php
    }
} else {
    header("Location:welcome.php");
}
?>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>