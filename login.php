<?php require_once('Connections/CropManagementSystem.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_user_login = "SELECT User_name, Password FROM farmers_login";
$user_login = mysql_query($query_user_login, $CropManagementSystem) or die(mysql_error());
$row_user_login = mysql_fetch_assoc($user_login);
$totalRows_user_login = mysql_num_rows($user_login);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['user_name'])) {
  $loginUsername=$_POST['user_name'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "user_level";
  $MM_redirectLoginSuccess = "index.html";
  $MM_redirectLoginFailed = "signup.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
  	
  $LoginRS__query=sprintf("SELECT User_name, Password, user_level FROM farmers_login WHERE User_name=%s AND Password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $CropManagementSystem) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'user_level');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Crop Management System || Sign In</title>
<meta charset="utf-8">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li class="active"><a href="login.php">Sign In</a></li>
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
      <li><a href="login.php">Sign In</a></li>
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
	<!----------start member-login----------->
		<div class="member-login">
			<!----------star form----------->
				<form name="Sign_In" class="login"  action="<?php echo $loginFormAction; ?>" method="POST" >
	
					<div class="formtitle">Member Login</div>
					<div class="input">
						<input name="user_name" type="text" placeholder="User Name"  required/> 
					</div>
					<div class="input">
						<input name="password" type="password"  placeholder="Password" required/>
					</div>
					<div class="buttons">
						<a href="#">Forgot password?</a>
						<input class="bluebutton" type="submit" value="Login" />
						<div class="clear"> </div>
					</div>
		
				</form>
				<!----------end form----------->
		</div>
		<!----------end member-login----------->
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
<?php
mysql_free_result($user_login);
?>
