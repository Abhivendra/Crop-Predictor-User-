<?php require_once('Connections/CropManagementSystem.php'); //Set Connection ?> 
<?php
//Check Connection
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
//Check Connection
}
}
$val1=1; //URL Value
if(isset($_GET["crop"]))
	{
		$val1=$_GET["crop"]; //Get value from URL
	}

//Query for selecting sum of Previous Year Production where Crop Id=URL value
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Recordset1 = "SELECT SUM(`PEVIOUS_PRODUCTION`) FROM `previous_producion_deatil` WHERE `C_ID`=$val1";
$Recordset1 = mysql_query($query_Recordset1, $CropManagementSystem) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//Query for selecting sum of Present Year Production where Crop Id=URL value
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Recordset2 = "SELECT sum(`ESTIMATED_PRODUCTION`) FROM `estimated_production_details` WHERE `C_ID`=$val1";
$Recordset2 = mysql_query($query_Recordset2, $CropManagementSystem) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

//Query for selecting Crop Name where Crop Id=URL value
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Recordset3 = "SELECT Crop_Name FROM crop_detail WHERE C_ID=$val1";
$Recordset3 = mysql_query($query_Recordset3, $CropManagementSystem) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
// Google's API(Application Programming Interface) drawing Graphs
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Year", "Production", { role: "style" } ],
        ["2013", <?php echo $row_Recordset1['SUM(`PEVIOUS_PRODUCTION`)']; ?>, "red"],
        ["2014", <?php echo $row_Recordset2['sum(`ESTIMATED_PRODUCTION`)']; ?>, "green"],
        ["2015", 0, "yellow"],
        ["2016", 0, "yellow"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Total Production of Different years (in metric tones)",
        width: 980,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
// Google's API(Application Programming Interface) drawing Graphs
</script>
<title>Crop Management System || Country Production</title>
<meta charset="utf-8">
<!-- ################################### Link to CSS ############################## -->
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all"> 
</head>
<!-- ########################################################################################## -->
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
				<li><a href="signup.php">Sign Up</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</header>
</div>
<!-- ########################################################################################## -->
<div class="wrapper row1">
	<header id="header" class="clear"> 
		<nav id="mainav" class="fl_right">
			<ul class="clear">
				<li class="active"><a href="country_production.php">Country Production</a></li>
				<li><a href="state_production.php">State Production</a></li>
				<li><a href="predictions.php">Predictions</a></li>
			</ul>
		</nav>
	</header>
</div>
<!-- ################################################################################################ --> 
<div class="wrapper row2">
	<div id="breadcrumb"> 
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="country_production.php">Country Production</a></li>
		</ul>
	</div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row3">
	<main id="container" class="clear">
		<form name="form2" method="GET" action="country_production.php">
			 <table>
				<th width="45%">Select Crop From Dropdown to view Production :</th>
				<th width="36%">
					<select name="crop" id="crop">
					<option value=1 selected="selected">Wheat</option>
					<option value=2 >Rice </option>
					<option value=3 >Pea</option>
					<option value=4 >Gram</option>
					<option value=5 >Sugar Cane</option>
					</select>
				</th>
				<th width="19%"><input type='submit' value="submit"/></th>
			</table>
		</form>
		<h1>Selected Crop : <?php echo $row_Recordset3['Crop_Name']; ?></h1>
		<div id="columnchart_values"></div>
			<h1>&nbsp;</h1>
				 <table width="980">
					<thead>
						<tr>
							<th>Year</th>
							<th>Total Production</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>2013</td>
							<td><?php echo $row_Recordset1['SUM(`PEVIOUS_PRODUCTION`)']; ?></td>
						</tr>
						<tr>
							<td>2014</td>
							<td><?php echo $row_Recordset2['sum(`ESTIMATED_PRODUCTION`)']; ?></td>
						</tr>
					</tbody>
				 </table>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<div class="clear"></div>
	</main>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row5">
	<div id="copyright" class="clear"> 
		<p class="fl_left">Copyright &copy; 2014 - All Rights Reserved -Crop Management System</p>
		<p class="fl_right">-by Team MAD</p>
	</div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);
?>
