<?php
	session_start();
	include 'header.php';
?>
	<?php
    if(isset($_SESSION['username']) && isset($_SESSION['usr_id'])) {
        $usr_id = $_SESSION['usr_id'];
        echo "
					<div class='col-md-12'>
						<div class='row'>
							<div id='welcome' class='col welcome'>
							<a href='bio.php'><buttton class='btn btn-primary'>Edit your's detail info</buttton></a><br>
								<h3>Welcome back <b>" . $_SESSION['username'].

            "</b>.You can manage your pictures in profile page.<br><br>Here is yours pictures display as a gallery:</h3>
						    </div>
					    </div>
					</div>";
        $imagesbyuser = new PicturesView();
        $imagesbyuser->showPicturesByUserId($usr_id);
    }
	?>
	

	
	
	
<?php include 'footer.php';?>