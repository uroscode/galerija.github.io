<?php
	session_start();

?>
<?php
	if(isset($_GET['image_name']) && isset($_GET['rand_id']) && isset($_GET['category']) && isset($_GET['img_id'])){
		include 'header.php';
?>
<!--END HEADER NAV MENU-->
<section class="single-image-section" id="single-image">
<div class="col-md-12">
  <div class="row">
      <div class="col-md-12">
          <div class="content">
              <?php include 'includes/req_name_pic.php'?>

          </div>
          <a href="<?php if(isset($_GET['image_name'])){echo "img/".$_GET['image_name'];}?>" download>
              <button class="btn btn-success" type="button" name="button"><i class="fa fa-download"></i> Free Download</button>
          </a>
      </div>
  <div class="col-12">
    <div class="single-img">
		<div id="myModal" class="modal">
		  <span class="close">&times;</span>
		  <img class="modal-content" id="img01">
		  <div id="caption"></div>
		</div>
	 <!--SINGLE IMAGE-->
		<div class="img">
		  <img id="myImg" src="<?php if(isset($_GET['image_name'])){echo "img/".$_GET['image_name'];}?>" alt="">
		  </div>
		  <!--SINGLE IMAGE END-->
    </div>
  </div>
</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>
</section>
<!--GALERIJA START-->
<div class="main">
<h1>|Related Images|</h1><br>
  <div class="gallery">
		<?php
            $related_pictures = new PicturesView();
            $related_pictures->showRelatedPictures();
		?>
  </div>
</div>
<!--GALERIJA END-->
<!--FOOTER START-->
<?php include 'footer.php';?>
<!--FOOTER END-->
	<?php }else{ 
	header("Location:404.php");
	}
	?>