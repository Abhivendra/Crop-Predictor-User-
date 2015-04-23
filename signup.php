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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "Signup")) {
  $insertSQL = sprintf("INSERT INTO farmers_login (First_Name, Last_Name, User_name, Emai_Id, Password) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['F_Name'], "text"),
                       GetSQLValueString($_POST['L_Name'], "text"),
                       GetSQLValueString($_POST['user_name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['Password'], "text"));

  mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
  $Result1 = mysql_query($insertSQL, $CropManagementSystem) or die(mysql_error());

  $insertGoTo = "login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_user_signup = "SELECT First_Name, Last_Name, User_name, Emai_Id, Password FROM farmers_login";
$user_signup = mysql_query($query_user_signup, $CropManagementSystem) or die(mysql_error());
$row_user_signup = mysql_fetch_assoc($user_signup);
$totalRows_user_signup = mysql_num_rows($user_signup);
?>
<!DOCTYPE html>
<html>
<head>
<title>Crop Management System || Home</title>
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
        <li><a href="login.php">Sign In</a></li>
        <li  class="active"><a href="signup.php">Sign Up</a></li>
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
      <li><a href="signup.php">Sign Up</a></li>
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
	<div class="sign_up">
			<!----------start form----------->
<form action="<?php echo $editFormAction; ?>" method="POST" name="Signup" class="sign">
				<div class="formtitle">Sign Up !</div>
				<!----------start top_section----------->
				<div class="top_section">
					<div class="section">
						<div class="input username">
							<input type="text"  name="user_name" placeholder="User Name"  required/> 
					  </div>
						<div class="input password">
							<input type="password" name="Password"  placeholder="Password" required/>
						</div>
						<div class="clear"></div>
					</div>
					<div class="section">
						<div class="input-sign email">
							<input type="email" name="email"  placeholder="Email"  required /> 
						</div>
						<div class="input-sign re-email">
							<input type="email" placeholder="Re-confirm email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Re-confirm email';}"required />
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<!----------end top_section----------->
				<!----------start bottom-section----------->
				<div class="bottom-section">
					<div class="title">Personal Details</div>
					<!----------start name section----------->
					<div class="section">
						<div class="input-sign details">
							<input type="text" name="F_Name" placeholder="First Name" required/>
						</div>
						<div class="input-sign details1">
							<input type="text" name="L_Name" placeholder="Last Name" required/>
						</div>
						<div class="clear"> </div>
					</div>
					<div class="submit">
						<input class="bluebutton submitbotton" type="submit" value="Sign up" />
					</div>
				</div>
				<!----------end bottom-section----------->
				<input type="hidden" name="MM_insert" value="Signup">
			</form>
			<!----------end form----------->
</div>
      <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->

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
mysql_free_result($user_signup);
?>
