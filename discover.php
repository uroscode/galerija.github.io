<?php session_start();?>
<!--HEADER START-->
<?php include 'header.php'?>
<!--END HEADER NAV MENU-->
<!--GALERIJA START-->
 <section id="discover">
  <h2 class="discover-h2">Discover Photos</h2>
  <hr>

  <div class="col-md-12">
  <div class="row">
  <?php
      $category = new PicturesView();
      $category->showCategory();//Display Category
?>
  </div>
  </div>
</section>
<!--GALERIJA END-->
<!--FOOTER START-->
<?php include 'footer.php';?>
<!--FOOTER END-->