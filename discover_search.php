<?php session_start();?>
<!--HEADER START-->
<?php include 'header.php'?>

<!--END HEADER NAV MENU-->
<!--GALERIJA START-->

<?php $imagesByCat = new PicturesView();?>
                <?php
                if(isset($_GET['category'])){
                    $imagesByCat->showImagesByCat();
                }?>

<!--GALERIJA END-->

<!--FOOTER START-->
<?php include 'footer.php';?>
<!--FOOTER END-->