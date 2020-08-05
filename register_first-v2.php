<?php
session_start();
include "includes/autoload.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration | Gallery</title>
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
<!--===============================================================================================-->
</head>
<body>
<?php
if(!isset($_SESSION['username'])) {
$registerObj = new User();
if (isset($_GET['submit'])) {
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $unique_id = uniqid();
    $registerObj->RegisterFirst($firstname,$lastname,$unique_id);
}
?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="GET" action="register_first-v2.php">
					<span class="login100-form-title p-b-34">
						Welcome to registration
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="First name">
						<input id="first-name" class="input100" type="text" name="firstname" placeholder="First name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Last name">
						<input id="last-name" class="input100" type="text" name="lastname" placeholder="Last name">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="submit" class="login100-form-btn">
							Continue
						</button>
                        <?php echo $registerObj->err_message; ?>
					</div>

                    <div class="w-full text-center p-t-27 p-b-239">
                        <div class="w-full text-center">
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