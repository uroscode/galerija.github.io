<?php
session_start();
include "includes/autoload.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | Gallery</title>
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
    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous">
    </script>
    <style>
        .input-error{
            box-shadow: 0 0 5px red;
        }
        .message{
            color:dimgrey;
        }
    </style>
<!--===============================================================================================-->
</head>
<body>
<?php
if(!isset($_SESSION['username'])) {
?>

<script>
    $(document).ready(function() {

        var form = $("#login-form");
        form.submit(function(e){
            $(".message").html();
            $(this).attr("disabled","disabled");
            e.preventDefault();
            $.ajax({
                type: "post",//POST METHOD
                url: "includes/login.php",//login.php
                data: form.serialize(),//values of all fields
                dataType: "json",//set response data type to json

                success: function(data){
                    $(".message").html(data.content);
                    if(data.response == 'success'){
                        $('.message').css("color","green");
                        setTimeout(function(){
                            $(location).attr('href',"welcome.php");
                        }, 2000);
                    }else{
                            $('.message').css("color","red");
                    }
                },
                error: function(data){

                }

            })
        });


    });
</script>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form  id="login-form" class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-34">
						Account Login
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="username" class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" id="password-field" name="password" placeholder="Password">
						<span class="focus-input100"></span>

					</div>
					
					<div class="container-login100-form-btn">
						<button id="submit" name="submit" class="login100-form-btn">
							Sign in
						</button>
                        <p class='message'></p>
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
                        <div class="w-full text-center">
                            <a href="register-v2.php" class="txt3">
                                Sign Up
                            </a>/
                            <a href="forgot_password.php" class="txt3">Forgot password?</a>
                        </div>
					</div>


				</form>

				<div class="login100-more" style="background-image: url('img-site/bg-01.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
<script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
<?php }else{
    header("Location:welcome.php");
}?>
</html>