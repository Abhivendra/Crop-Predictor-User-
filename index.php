<!DOCTYPE html>
<html>
<head>
<title>Crop Management System || Home</title>
<meta charset="utf-8">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<div class="wrapper row1">
  <header id="header" class="clear"> 
    <form name="form1" method="post" action="">
    </form>
    <div id="logo" class="fl_left">
      <h1> Crop Management System</h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="login.php">Sign In</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
 
  </header>
</div>
<div class="wrapper row1">
  <header id="header" class="clear"> 
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="country_production.php">Country Production</a></li>
        <li><a href="state_production.php">State Production</a></li>
        <li><a href="predictions.php">Predictions</a></li>
      </ul>
    </nav>
  </header>
</div>
<!-- ################################################################################################ -->
<div class="wrapper">
  <div id="slider"> 
    <!-- ############################################################################################################# -->
    <div id="slidewrap">
      <div><span id="slidecaption"></span></div>
    </div>
    <!-- ############################################################################################################# --> 
  </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - Crop Management System</p>
    <p class="fl_right">by Team MAD</p>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- JAVASCRIPTS --> 
<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> --> 
<script src="layout/scripts/jquery-latest.min.js"></script> 
<!-- Homepage Slider --> 
<script src="layout/scripts/supersized/supersized.min.js"></script> 
<script>
jQuery(function ($) {
    $.supersized({
		// Functionality
		slide_interval: 800, // Length between transitions
		transition: 1, // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
		transition_speed: 80, // Speed of transition
		// Components
        slides: [{
            image: 'images/1.png',
            title: '<span class="heading">Country Production</span>Compare Production of Different Crops, <a href="country_production.php">view here</a>'
        }, {
            image: 'images/2.png',
            title: '<span class="heading">State Production</span>Compare Production of Different States, <a href="state_production.php">view here</a>'
        }, {
            image: 'images/3.png',
            title: '<span class="heading">Predictions</span>Prediction for Next Year <a href="predictions.php">view here</a>'
        }]
    });
});
</script>
</body>
</html>