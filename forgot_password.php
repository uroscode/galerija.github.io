<?php
include "includes/autoload.inc.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Frogot Password | Gallery</title>
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
if(isset($_SESSION['username'])) {
    header("Location:index.php");
}else{

?>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form  id="recover-password" class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-34">
						Forgoten password
					</span>

                <div style="width:100%;" class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type email">
                    <input id="email" class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn">
                    <button value="submit" name="restart_pass" class="login100-form-btn">
                        Recover Password
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



<div id="dropDownSelect1"></div>

    <script>
        $(document).ready(function() {

            var form = $("#recover-password");
            form.submit(function(e){
                $(".message").html();
                $(this).attr("disabled","disabled");
                e.preventDefault();

                $.ajax({
                    type: "post",//POST METHOD
                    url: "includes/recover_pass.php",//login.php
                    data: form.serialize(),//values of all fields
                    dataType: "json",//set response data type to json

                    success: function(data){
                        $(".message").html(data.content);
                        if(data.response == 'success'){
                            $(".message").html(data.content);
                            $('.message').css("color","green");
                            $(window).attr('location',data.url);
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

<!--===============================================================================================-->
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>

</html>
<?php }?>