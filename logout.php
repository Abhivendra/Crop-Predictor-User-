<?php
// *** Logout the current user.
$logoutGoTo = "index.php";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['MM_Username'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;
unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Crop Management System ||Logout</title>
<meta charset="utf-8">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<div class="wrapper row1">
  <header id="header" class="clear"> 
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
<div class="wrapper row2">
  <div id="breadcrumb"> 
    <!-- ########################################################################################## -->
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
    <!-- ########################################################################################## --> 
  </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main id="container" class="clear"> 
  	<div class="sidebar one_quarter first"> 
    	 <h6>Menu</h6>
      <nav class="sdb_holder">
        <ul>
          <li><a href="index.php">Home</a>
			<ul>
			  <li><a href="about.php">About Us</a></li>
				</ul>
		</li>
		<li><a href="login.php">Sign In</a></li>
		<li><a href="signup.php">Sign UP </a></li>
        <li><a href="country_production.php">Country Production</a></li>
        <li><a href="state_production.php">State Production</a></li>
        <li><a href="predictions.php">Predictions</a></li>
		<li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
	
      <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved -Crop Management System</p>
    <p class="fl_right">Template by Team MAD</p>
    <!-- ################################################################################################ --> 
  </div>
</div>
</body>
</html>