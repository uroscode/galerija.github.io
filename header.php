<?php //include 'includes/conn.php';?>
<?php include 'classes/dbh.php'; ?>
<?php include 'includes/autoload.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
    <link rel="icon" href="img-site/favicon.png" type="image/x-icon"/>
  <!--CUSTOM STYLE-->
  <link rel="stylesheet" href="style/style.css">
  <!--FONT AWESOME-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<!--SMOOTH SCROLLING-->
    <script>
		$(document).ready(function(){
		  // Add smooth scrolling to all links
		  $("a").on('click', function(event) {
			// Make sure this.hash has a value before overriding default behavior
			if (this.hash !== "") {
			  // Prevent default anchor click behavior
			  event.preventDefault();
			  // Store hash
			  var hash = this.hash;
			  // Using jQuery's animate() method to add smooth page scroll
			  // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
			  $('html, body').animate({
				scrollTop: $(hash).offset().top
			  }, 800, function(){
				// Add hash (#) to URL when done scrolling (default click behavior)
				window.location.hash = hash;
			  });
			} // End if
		  });
		});
    </script>
    <!--SMOOTH SCROLLING END-->
  </head>
<body>
<?php
	if(isset($_SESSION['username'])){//IF LOGGED IN
	    $usr_id = $_SESSION['usr_id'];
	    ?>
			<!--HEADER NAV MENU-->
        <section id="nav-menu">
        <a href="index.php" class="logo">Gallery</a>
        <div class="menu-toggle"><i class=""></i></div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>

                <li class="drop-down"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a href="#"><span>Profile <i class="fa fa-arrow-down"></i></span></a>
                </li>

                <div class="dropdown-menu">
                    <li> <a class="dropdown-item" href="profile.php">My Pictures</a></li>
                    <li> <a class="dropdown-item" href="settings.php">Settings</a></li>
                </div>
                <li><a href="discover.php">Discover Photos</a></li>
                <li class="upload-li"><a href="upload.php"><i class="fa fa-upload"></i> Upload</a></li>
                <li><a href="includes/logout.php?logout">Logut</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
        </section>
        <header>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active" style="background-image: url('slider-img/moon.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="nav-main-text">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="box">
                                            <h1>Upload & Discover <span>Beautiful Photos</span></h1>
                                            <div class="container-2">
                                                <form id="search-form" action="index.php" method="POST">
                                                    <span class="icon"><i class="fa fa-search"></i></span>
                                                    <input type="search" id="search"  name="search" placeholder="<?php
                                                    if(isset($_POST['search'])){//CHECKS FOR PLACEHOLDER NAME IF USERS TYPES SOMETHING HE HOLDS THAT VALUE AFTER SEARCH
                                                        echo $_POST['search'];
                                                    }else{
                                                        echo "Search by category...";//IF NOT THEN RETURN THIS AS DEFAULT
                                                    }
                                                    ?>" />
                                                </form>
                                            </div><br><br><br>
                                            <p><span class='lead'>Suggested:</span> art,  daylight,  colors,  background,  paint,  texture,  summer,  more...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('slider-img/green.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="nav-main-text">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="box">
                                            <h1>Upload & Discover <span>Beautiful Photos</span></h1>
                                            <div class="container-2">
                                                <form id="search-form" action="index.php" method="POST">
                                                    <span class="icon"><i class="fa fa-search"></i></span>
                                                    <input type="search" id="search"  name="search" placeholder="<?php
                                                    if(isset($_POST['search'])){//CHECKS FOR PLACEHOLDER NAME IF USERS TYPES SOMETHING HE HOLDS THAT VALUE AFTER SEARCH
                                                        echo $_POST['search'];
                                                    }else{
                                                        echo "Search by category...";//IF NOT THEN RETURN THIS AS DEFAULT
                                                    }
                                                    ?>" />
                                                </form>
                                            </div><br><br><br>
                                            <p><span class='lead'>Suggested:</span> art,  daylight,  colors,  background,  paint,  texture,  summer,  more...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('slider-img/brick.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="nav-main-text">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="box">
                                            <h1>Upload & Discover <span>Beautiful Photos</span></h1>
                                            <div class="container-2">
                                                <form id="search-form" action="index.php" method="POST">
                                                    <span class="icon"><i class="fa fa-search"></i></span>
                                                    <input type="search" id="search"  name="search" placeholder="<?php
                                                    if(isset($_POST['search'])){//CHECKS FOR PLACEHOLDER NAME IF USERS TYPES SOMETHING HE HOLDS THAT VALUE AFTER SEARCH
                                                        echo $_POST['search'];
                                                    }else{
                                                        echo "Search by category...";//IF NOT THEN RETURN THIS AS DEFAULT
                                                    }
                                                    ?>" />
                                                </form>
                                            </div><br><br><br>
                                            <p><span class='lead'>Suggested:</span> art,  daylight,  colors,  background,  paint,  texture,  summer,  more...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>
<?php }else{ ?>
<!--NAV MENU-->
        <section id="nav-menu">
            <a href="index.php" class="logo">Gallery</a>
          <div class="menu-toggle"><i class=""></i></div>
            <nav>
              <ul>
                  <li><a href="index.php">Home</a></li>
                <li><a href="login-v2.php">Login</a></li>
                <li><a href="register_first-v2.php">Register</a></li>
                <li><a href="discover.php">Discover Photos</a></li>
                <li class="upload-li"><a href="upload.php"><i class="fa fa-upload"></i> Upload</a></li>
              </ul>
            </nav>
            <div class="clearfix"></div>
        </section>
        <header>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active" style="background-image: url('slider-img/moon.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="nav-main-text">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="box">
                                            <h1>Upload & Discover <span>Beautiful Photos</span></h1>
                                            <div class="container-2">
                                                <form id="search-form" action="index.php" method="POST">
                                                    <span class="icon"><i class="fa fa-search"></i></span>
                                                    <input type="search" id="search"  name="search" placeholder="<?php
                                                    if(isset($_POST['search'])){//CHECKS FOR PLACEHOLDER NAME IF USERS TYPES SOMETHING HE HOLDS THAT VALUE AFTER SEARCH
                                                        echo $_POST['search'];
                                                    }else{
                                                        echo "Search by category...";//IF NOT THEN RETURN THIS AS DEFAULT
                                                    }
                                                    ?>" />
                                                </form>
                                            </div><br><br><br>
                                            <p><span class='lead'>Suggested:</span> art,  daylight,  colors,  background,  paint,  texture,  summer,  more...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('slider-img/green.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="nav-main-text">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="box">
                                            <h1>Upload & Discover <span>Beautiful Photos</span></h1>
                                            <div class="container-2">
                                                <form id="search-form" action="index.php" method="POST">
                                                    <span class="icon"><i class="fa fa-search"></i></span>
                                                    <input type="search" id="search"  name="search" placeholder="<?php
                                                    if(isset($_POST['search'])){//CHECKS FOR PLACEHOLDER NAME IF USERS TYPES SOMETHING HE HOLDS THAT VALUE AFTER SEARCH
                                                        echo $_POST['search'];
                                                    }else{
                                                        echo "Search by category...";//IF NOT THEN RETURN THIS AS DEFAULT
                                                    }
                                                    ?>" />
                                                </form>
                                            </div><br><br><br>
                                            <p><span class='lead'>Suggested:</span> art,  daylight,  colors,  background,  paint,  texture,  summer,  more...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('slider-img/brick.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="nav-main-text">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="box">
                                            <h1>Upload & Discover <span>Beautiful Photos</span></h1>
                                            <div class="container-2">
                                                <form id="search-form" action="index.php" method="POST">
                                                    <span class="icon"><i class="fa fa-search"></i></span>
                                                    <input type="search" id="search"  name="search" placeholder="<?php
                                                    if(isset($_POST['search'])){//CHECKS FOR PLACEHOLDER NAME IF USERS TYPES SOMETHING HE HOLDS THAT VALUE AFTER SEARCH
                                                        echo $_POST['search'];
                                                    }else{
                                                        echo "Search by category...";//IF NOT THEN RETURN THIS AS DEFAULT
                                                    }
                                                    ?>" />
                                                </form>
                                            </div><br><br><br>
                                            <p><span class='lead'>Suggested:</span> art,  daylight,  colors,  background,  paint,  texture,  summer,  more...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
        </header>
<?php } ?>