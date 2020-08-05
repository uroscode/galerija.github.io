<?php session_start();?>
<!--HEADER START-->
<?php include 'header.php'?>
<!--END HEADER NAV MENU-->
<!--GALERIJA START-->

<?php if(isset($_POST['search'])){ ?>
<div class="main" id="main-search">
    <div class="gallery" id="search-images">

    </div>
</div>

<script>

</script>
<?php }else{
    header("Location:index.php");
}?>

<!--FOOTER START-->
<?php include 'footer.php';?>
<!--FOOTER END-->