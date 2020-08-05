<?php
ob_start();
session_start();
if(isset($_SESSION['username'])){
    include 'header.php';
    //CLASSES CREATED FOR UPLOADING IMAGE AND GETTING CATEGORY

    $getcatobj = new Contr();
    ?>
    <div class="col-md-12">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <div class="upload-btn-wrapper">
                    <h3>Upload your image</h3>
                    <hr>
                    <br>
                    <form action="includes/upload_image.php" id="upload-image-usr" class="upload-usr-img" method="POST" enctype="multipart/form-data">
                        <input type="file" name="image_upload" id="file" multiple="" /><br>
                        <?php
                        $getcatobj->getCategoryList();//GET CATEGORY LOOP FROM CONTR CLASS
                        ?>
                        <hr>

                        <label for="cat">Choose category</label><br>
                        <button name="submit" type="submit" value="submit" class="btn btn-success">Upload a file</button>
                    </form>
                    <p class="message"></p>
                </div>
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {

            $("form.upload-usr-img").submit(function(e){

                e.preventDefault();
                var url = $(this).attr("action");
                var type = $(this).attr("method");
                var data = new FormData($(this)[0]);
                data.append("id",$(this).attr('id'));
                $.ajax({
                    url:url,
                    type:type,
                    data:data,
                    processData:false,
                    contentType:false,
                    dataType: 'json',
                    success: function(data){
                        if(data.response == "success"){
                            $(".message").css("color","green");
                            $(".message").html(data.content);
                            setTimeout(function(){
                                location.reload();
                            },2000);
                        }else{
                            $(".message").css("color","red");
                            $(".message").html(data.content);
                        }

                    }

                })

            });

        });

    </script>

    <?php

    ?>

    <?php
    include 'footer.php';
}else{
    header("Location:login-v2.php");
}
?>