
<!--FOOTER START-->
<?php
if(isset($_SESSION['username'])){
    echo '<footer>
<div class="col-md-12">
  <div class="row">
    <div class="col-md-6 left">
     <ul>
         <li><a href="index.php">Home</a></li>
         
         <li><a href="#"><span>Profile </a></li>
    
             <li> <a href="profile.php">My Pictures</a></li>
             <li> <a href="settings.php">Settings</a></li>
             
         <li><a href="discover.php">Discover Photos</a></li>
         <li><a href="upload.php"><i class="fa fa-upload"></i> Upload</a></li>
         <li><a href="includes/logout.php?logout">Logut</a></li>
      </ul>
    </div>
    <div class="col-md-6 right">
        <p>© By Uros Popovic - 2020</p>
    </div>
  </div>
</div>
</footer>';
}else{
    echo '<footer>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6 left">
                     <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="login-v2.php">Login</a></li>
                        <li><a href="register_first-v2.php">Register</a></li>
                        <li><a href="discover.php">Discover Photos</a></li>
                        <li><a href="upload.php"><i class="fa fa-upload"></i> Upload</a></li>
                     </ul>
                </div>
                <div class="col-md-6 right">
                    <p>© By Uros Popovic - 2020</p>
                </div>
              </div>
            </div>
        </footer>';
}

?>

<!--FOOTER END-->

<!--ALL SCRIPTS-->
<!--NAVBAR START-->

<script>
  $(document).ready(function(){
    $('.menu-toggle').click(function(){
    $('.menu-toggle').toggleClass('active')
    $('nav').toggleClass('active')
    $('ul').toggleClass('active')
    })
  });
</script>
<!--NAVBAR ENDS-->

<!--LAZY LOAD CND-->
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@15.1.1/dist/lazyload.min.js"></script>
<script>
  const myLazyLoad = new LazyLoad({
    elements_selector: ".load-me"
  });

</script>

<!--BOOSTRAP CDN CSS-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!--BOOSTRAP JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>