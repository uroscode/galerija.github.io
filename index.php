<?php session_start();?>
<!--HEADER START-->
<?php include 'header.php'?>
<!--END HEADER NAV MENU-->
<!--GALERIJA START-->
    <?php if(isset($_POST['search'])){ ?>
    <div class="main" id="main-search">
        <div class="gallery" id="search-images">
            <?php
            $SearchObj = new PicturesView();
            $SearchObj->searchImagesQuery();//DISPLAY PICTURES IF SEARCH IS SET
            ?>
        </div>
    </div>
<?php }else{ ?>
           <div class="main" id="main-image">
               <div class="gallery" id="image-data">
               </div>
           </div>'
<?php }?>
<!--GALERIJA END-->
<!--JSON RETURN IMAGES-->
<script>
    $(document).ready(function(){
               fetch_data();
               function fetch_data(){
                   var action = "fetch";
                   $.ajax({
                       url:"includes/display_images.php",
                       method:"POST",
                       data:{action:action},
                       success:function(data){
                           $("#main-image").css("display","block");
                           $("#image-data").css("display","grid");
                           $("#image-data").html(data);
                       }
                   })
               }
    });


</script>
<!--JSON RETURN IMAGES END-->
<!--FOOTER START-->
<?php include 'footer.php';?>
<!--FOOTER END-->