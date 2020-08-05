<?php
	session_start();
	ob_start();//Buffering started
	include 'header.php';
?>

<?php
		if(isset($_SESSION['username']) && isset($_SESSION['usr_id']) && isset($_GET['id']) && isset($_GET['imgName'])){
		    $editImageObj = new Contr();
				$img_id = $_GET['id'];
				$img_name = $_GET['imgName'];
				$usr_id = $_SESSION['usr_id'];
				$usr_name = $_SESSION['username'];
			//FORM FOR IF ISSET

?>
            <script>
                $(document).ready(function(){

                    var form = $("#change-category-image");
                    form.submit(function(e){

                        $(this).attr("disabled","disabled");
                        e.preventDefault();

                        $.ajax({
                            type: "post",//POST METHOD
                            url: "includes/change_image_settings.php?<?php echo "id=".$img_id; ?>",//login.php
                            data: form.serialize(),//values of all fields
                            dataType: "json",//set response data type to json

                            success: function(data){
                                $(".message").html(data.content);
                                if(data.response == 'success'){
                                    $('.message').css("color","green");
                                    $(location).attr('href',"edit.php?<?php echo "id=".$img_id."&imgName=".$img_name."&usr_id=".$usr_id."&usr_name=".$usr_name;?>");//REDIRECT
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
<section id="edit-images">
    <div class="container">
        <div class="col-12">
         <div class="row">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Current Category</th>
                    <th scope="col">:Change To:</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <form id="change-category-image" method="POST">
                    <tr>
                        <td><img style="width:200px;height:auto;"src="img/<?php $editImageObj->getCurrentImg($img_id); ?>"></td><!--DISPLAY IMG with FUNCTION-->
                        <td><?php $editImageObj->getCurrentCat($img_id);?></td><!--DISPLAY CURRENT CATEGORY with FUNCTION-->
                        <td><b>:CHANGE TO:</b></td>
                        <td><?php $editImageObj->getCategoryList();?></td><!--DISPLAY LOOP CATEGORY with FUNCTION-->
                        <td><button id="change-image-submit" name="submit" value="submit" type="submit" class="change btn btn-primary">Save Changes</button></td>
                    </tr>
                </form>
                </tbody>
            </table>
            <p id="change-image-message" class="message align-middle"></p>
        </div>
            <div class="row">
                <div class="col-6">
                    <a href="profile.php"><button class="btn btn-success">Go Back</button></a>
                </div>
            </div>
      </div>
    </div>
</section>
            <script>
                //ARE YOU SURE BOX
                $(document).ready(function(){
                    $(".change").click(function(){
                        if (!confirm("Are you sure?")){
                            return false;
                        }
                    });
                });
            </script>
<?php } ?>
<?php include 'footer.php';?>