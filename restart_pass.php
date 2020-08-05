<?php
session_start();

include_once "includes/autoload.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Restart Password | Gallery</title>
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
if(isset($_GET['email'])) {

$email = $_GET['email'];
?>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form  id="get_new_pass" class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-34">
						Forgoten password
					</span>

                    <input id="email"  type="hidden" name="email" value="<?php echo $email;?>">
                <div style="width:100%;" class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Enter your code here">
                    <input id="unique_index"  class="input100" type="text" name="unique_index"  placeholder="Enter Your Code Here">
                    <span class="focus-input100"></span>
                </div>

                <div style="width:100%;" class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type new password">
                    <input id="password" class="input100" type="password" name="password" placeholder="New Password">
                    <span class="focus-input100"></span>
                </div>
                <div style="width:100%;" class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Confirm new password">
                    <input id="pass_confirm" class="input100" type="password" name="pass_confirm" placeholder="Confrim New Password">
                    <span class="focus-input100"></span>
                </div>


                <div class="container-login100-form-btn">
                    <button id="submit" name="submit" class="login100-form-btn">
                        Set New Pass
                    </button>
                    <p class='message'></p>
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
<script>
    $(document).ready(function() {

        var form = $("#get_new_pass");
        form.submit(function(e){
            $(".message").html();
            $(this).attr("disabled","disabled");
            e.preventDefault();
            if(password == '' || pass_confirm == ''){
                $(".message").html("Fields are required!");
            }

            $.ajax({
                type: "post",//POST METHOD
                url: "includes/recover_pass_fin.php",//login.php
                data: form.serialize(),//values of all fields
                dataType: "json",//set response data type to json

                success: function(data){
                    $(".message").html(data.content);
                    if(data.response == 'success'){
                        $(".message").html(data.content);
                        $('.message').css("color","green");
                         setTimeout(function(){
                             $(location).attr('href',"login-v2.php");
                         }, 3000);
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
    header("Location:forgot_password.php");
}?>
</html>