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
$val1='UP'; //URL Value
if(isset($_GET["state"]))
	{
		$val1=$_GET["state"];//Get value from URL
	}

//Query for selecting sum of Present Year Production where State Id=URL value	
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Recordset1 = "SELECT SUM(estimated_production) FROM address_of_farmer JOIN estimated_production_details ON address_of_farmer.F_ID = estimated_production_details.F_ID WHERE C_ID=1 and State='".$val1."'";
$Recordset1 = mysql_query($query_Recordset1, $CropManagementSystem) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//Query for selecting sum of Present Year Production where State Id=URL value
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Recordset2 = "SELECT SUM(estimated_production) FROM address_of_farmer JOIN estimated_production_details ON address_of_farmer.F_ID = estimated_production_details.F_ID WHERE C_ID=2 and State='".$val1."'";
$Recordset2 = mysql_query($query_Recordset2, $CropManagementSystem) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

//Query for selecting sum of Present Year Production where State Id=URL value
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Recordset3 = "SELECT SUM(estimated_production) FROM address_of_farmer JOIN estimated_production_details ON address_of_farmer.F_ID = estimated_production_details.F_ID WHERE C_ID=3 and State='".$val1."'";
$Recordset3 = mysql_query($query_Recordset3, $CropManagementSystem) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

//Query for selecting sum of Present Year Production where State Id=URL value
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Recordset4 = "SELECT SUM(estimated_production) FROM address_of_farmer JOIN estimated_production_details ON address_of_farmer.F_ID = estimated_production_details.F_ID WHERE C_ID=4 and State='".$val1."'";
$Recordset4 = mysql_query($query_Recordset4, $CropManagementSystem) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

//Query for selecting sum of Present Year Production where State Id=URL value
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Recordset5 = "SELECT SUM(estimated_production) FROM address_of_farmer JOIN estimated_production_details ON address_of_farmer.F_ID = estimated_production_details.F_ID WHERE C_ID=5 and State='".$val1."'";
$Recordset5 = mysql_query($query_Recordset5, $CropManagementSystem) or die(mysql_error());
$row_Recordset5 = mysql_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysql_num_rows($Recordset5);

//Query for selecting sum of Previous Year Production where State Id=URL value
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Recordset6 = "SELECT SUM(pevious_production) FROM address_of_farmer JOIN previous_producion_deatil ON address_of_farmer.F_ID = previous_producion_deatil.F_ID WHERE C_ID=1 and State='".$val1."'";
$Recordset6 = mysql_query($query_Recordset6, $CropManagementSystem) or die(mysql_error());
$row_Recordset6 = mysql_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysql_num_rows($Recordset6);

//Query for selecting sum of Previous Year Production where State Id=URL value
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Recordset7 = "SELECT SUM(pevious_production) FROM address_of_farmer JOIN previous_producion_deatil ON address_of_farmer.F_ID = previous_producion_deatil.F_ID WHERE C_ID=2 and State='".$val1."'";
$Recordset7 = mysql_query($query_Recordset7, $CropManagementSystem) or die(mysql_error());
$row_Recordset7 = mysql_fetch_assoc($Recordset7);
$totalRows_Recordset7 = mysql_num_rows($Recordset7);

//Query for selecting sum of Previous Year Production where State Id=URL value
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Recordset8 = "SELECT SUM(pevious_production) FROM address_of_farmer JOIN previous_producion_deatil ON address_of_farmer.F_ID = previous_producion_deatil.F_ID WHERE C_ID=3 and State='".$val1."'";
$Recordset8 = mysql_query($query_Recordset8, $CropManagementSystem) or die(mysql_error());
$row_Recordset8 = mysql_fetch_assoc($Recordset8);
$totalRows_Recordset8 = mysql_num_rows($Recordset8);

//Query for selecting sum of Previous Year Production where State Id=URL value
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Recordset9 = "SELECT SUM(pevious_production) FROM address_of_farmer JOIN previous_producion_deatil ON address_of_farmer.F_ID = previous_producion_deatil.F_ID WHERE C_ID=4 and State='".$val1."'";
$Recordset9 = mysql_query($query_Recordset9, $CropManagementSystem) or die(mysql_error());
$row_Recordset9 = mysql_fetch_assoc($Recordset9);
$totalRows_Recordset9 = mysql_num_rows($Recordset9);

//Query for selecting sum of Previous Year Production where State Id=URL value
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Recordset10 = "SELECT SUM(pevious_production) FROM address_of_farmer JOIN previous_producion_deatil ON address_of_farmer.F_ID = previous_producion_deatil.F_ID WHERE C_ID=5 and State='".$val1."'";
$Recordset10 = mysql_query($query_Recordset10, $CropManagementSystem) or die(mysql_error());
$row_Recordset10 = mysql_fetch_assoc($Recordset10);
$totalRows_Recordset10 = mysql_num_rows($Recordset10);

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
        ['Crop', 'Wheat', 'Rice', 'Pea', 'Gram',
         'Sugar Cane', { role: 'annotation' } ],
        ['2013', <?php echo $row_Recordset6['SUM(pevious_production)']; ?>,
		<?php echo $row_Recordset7['SUM(pevious_production)']; ?>,
		<?php echo $row_Recordset8['SUM(pevious_production)']; ?>,
		<?php echo $row_Recordset9['SUM(pevious_production)']; ?>,
		<?php echo $row_Recordset10['SUM(pevious_production)']; ?>, ''],
        ['2014', <?php echo $row_Recordset1['SUM(estimated_production)']; ?>,
		<?php echo $row_Recordset2['SUM(estimated_production)']; ?>,
		<?php echo $row_Recordset3['SUM(estimated_production)']; ?>,
		<?php echo $row_Recordset4['SUM(estimated_production)']; ?>,
		<?php echo $row_Recordset5['SUM(estimated_production)']; ?>, ''],
        ['2015', 0, 0, 0, 0, 0, ''],
		['2016', 0, 0, 0, 0, 0, '']
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1, 2,3,4,5]);

     var options = {
        width: 980,
        height: 400,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true,
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
// Google's API(Application Programming Interface) drawing Graphs
</script>
<title>Crop Management System || State Production</title>
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
				<li><a href="country_production.php">Country Production</a></li>
				<li class="active"><a href="state_production.php">State Production</a></li>
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
			<li><a href="state_production.php">State Production</a></li>
		</ul>
	</div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row3">
	<main id="container" class="clear"> 
		<form name="form2" method="GET" action="state_production.php">
			  <table>
				 <th width="45%">Select State From Dropdown to view Production :</th>
				 <th width="36%">
				<select name="state" id="state">
				<option value="UP" >Uttar Pradesh</option>
				<option value="MP">Madhya Pradesh </option>
				</select></th>
				<th width="19%"><input type='submit' value="submit"/></th>
				
				</table>
		</form>
	<h1>Selected State : <?php echo $val1 ?></h1>
	<div id="columnchart_values"></div>
	<br>
	<h1>Data Table</h1>
    <table width="980">
        <thead>
			  <tr>
					<th width="20%">Year</th>
					<th width="16%">Wheat</th>
					<th width="16%">Rice</th>
					<th width="16%">Pea</th>
					<th width="16%">Gram</th>
					<th width="16%">Sugar Cane</th>
			  </tr>
        </thead>
        <tbody>
			  <tr>
					<td height="38">2013</td>
					<td><?php echo $row_Recordset6['SUM(pevious_production)']; ?></td>
					<td><?php echo $row_Recordset7['SUM(pevious_production)']; ?></td>
					<td><?php echo $row_Recordset8['SUM(pevious_production)']; ?></td>
					<td><?php echo $row_Recordset9['SUM(pevious_production)']; ?></td>
					<td><?php echo $row_Recordset10['SUM(pevious_production)']; ?></td>
			  </tr>
			  <tr>
					<td height="41">2014</td>
					<td><?php echo $row_Recordset1['SUM(estimated_production)']; ?></td>
					<td><?php echo $row_Recordset2['SUM(estimated_production)']; ?></td>
					<td><?php echo $row_Recordset3['SUM(estimated_production)']; ?></td>
					<td><?php echo $row_Recordset4['SUM(estimated_production)']; ?></td>
					<td><?php echo $row_Recordset5['SUM(estimated_production)']; ?></td>
			  </tr>
        </tbody>
    </table>
    <div class="clear"></div>
	</main>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row5">
	<div id="copyright" class="clear"> 
		<p class="fl_left">Copyright &copy; 2014 - All Rights Reserved -Crop Management System</p>
		<p class="fl_right"> - by Team MAD</p>
	</div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($Recordset4);

mysql_free_result($Recordset5);

mysql_free_result($Recordset6);

mysql_free_result($Recordset7);

mysql_free_result($Recordset8);

mysql_free_result($Recordset9);

mysql_free_result($Recordset10);

mysql_free_result($Recordset1);
?>
