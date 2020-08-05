<?php
	session_start();
	ob_start();//Buffering started
	include 'header.php';
    $delObj = new Contr();
    $picturesObj = new PicturesView();
?>
<?php
	if(isset($_SESSION['username']) && isset($_SESSION['usr_id'])){
		$usr_id = $_SESSION['usr_id'];
		$usr_name = $_SESSION['username'];
		echo "
				<div class='col-md-12'>
					<div class='row'>
						<div id='welcome' style='margin-top: 40px; margin-bottom: 40px; text-align:center;' class='col welcome'>
								<h3><b>" . $_SESSION['username']."</b> you can edit your photo's here.</h3>
								<p class='message'></p>
						</div>
					</div>
				</div>";
?>
	<?php	//Select all images within users ownership
            $picturesObj->showMyImages($usr_id);
			//If pressed delete button delete the image with that id

			//If edit redirect to edit page with that image atributes
			if(isset($_GET['edit']) && isset($_GET['id']) && isset($_GET['imgName'])){
				$img_id = $_GET['id'];
				$img_name = $_GET['imgName'];
				$usr_id = $_SESSION['usr_id'];
				$usr_name = $_SESSION['username'];
				header("Location:edit.php?id=".$img_id."&imgName=".$img_name."&usr_id=".$usr_id."&usr_name=".$usr_name);
			}
	}else{
	    header("Location:login-v2.php");
	    ob_end_flush();
    }
?>
    <!--AJAX DELETE IMAGE-->
    <script>
        $(document).ready(function(){

            // Delete
            $('.del').click(function(){
                var el = this;

                // Delete id
                var deleteid = $(this).data('id');//delete data-id=img_id
                var deleteimgname = $(this).data('name');//delete data-name=img_name

                var confirmalert = confirm("Are you sure?");
                if (confirmalert == true) {
                    // AJAX Request
                    $.ajax({
                        url: 'includes/delete_image_usr.php',
                        type: 'POST',
                        data: { img_id:deleteid,img_name:deleteimgname },//pass POST DATA
                        dataType:"json",//JSON TYPE
                        success: function(data){

                            $(".message").html(data.content);//PULL CONTENT
                            if(data.response == "success"){
                                $(".message").css("color","green");
                                setTimeout(function(){
                                    location.reload();//RELOAD PAGE AFTER 2,5s
                                },2500);
                            }else{
                                $(".message").css("color","red");
                            }
                        },
                        error:function(response){
                            $(".message").text("Failed:"+JSON.stringify(response));
                        }

                    });
                }
            });
        });

    </script>

<?php include 'footer.php';?>