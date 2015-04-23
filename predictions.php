<?php require_once('Connections/CropManagementSystem.php'); ?>
<?php require_once('Connections/CropManagementSystem.php'); ?>
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
$val1='UP';
if(isset($_GET["state"]))
{
$val1=$_GET["state"]; //get state value from URL
}
$i=0;
$arr[5][2]=[[0,0,0,0,0],[0,0,0,0,0]]; // stores total production of present and previous year of given crop in given state
while($i<5)
{
//find total total production of present year of given crop in given state
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Present_Sum_where_cid = "SELECT sum(estimated_production) FROM address_of_farmer JOIN estimated_production_details ON address_of_farmer.F_ID = estimated_production_details.F_ID WHERE state='".$val1."' and C_ID=$i+1";
$Present_Sum_where_cid = mysql_query($query_Present_Sum_where_cid, $CropManagementSystem) or die(mysql_error());
$row_Present_Sum_where_cid = mysql_fetch_assoc($Present_Sum_where_cid);
$totalRows_Present_Sum_where_cid = mysql_num_rows($Present_Sum_where_cid);
$arr[$i][1]=$row_Present_Sum_where_cid['sum(estimated_production)']+0;

//find total total production of previous year of given crop in given state
$query_sum_prev = "SELECT sum(pevious_production) FROM address_of_farmer JOIN previous_producion_deatil ON address_of_farmer.F_ID = previous_producion_deatil.F_ID WHERE state='".$val1."' and C_ID=$i+1";
$sum_prev = mysql_query($query_sum_prev, $CropManagementSystem) or die(mysql_error());
$row_sum_prev = mysql_fetch_assoc($sum_prev);
$totalRows_sum_prev = mysql_num_rows($sum_prev);
$arr[$i][2]=$row_sum_prev['sum(pevious_production)']+0;


$i=$i+1;
}
$k=0;
$diff=0.0; //stores difference between total production of two crops
$percentage_inc[5]=[0.0,0.0,0.0,0.0,0.0]; //stores percent increase in production
while($k<5)
			{
			$diff=$arr[$k][1]-$arr[$k][2];
			if($arr[$k][2] !=0)
				{
					$percentage_inc[$k]=$diff/$arr[$k][2];
				}
			else
				{
					$percentage_inc[$k]=0;
				}
			$k=$k+1;
			}
$max_p=$percentage_inc[0] ; //stores maximum increase percent of predicted crop 
$crop_id=0; // stores crop ID of crop having maximum increase percent
$j=0;
while($j<5)
			{
			if($percentage_inc[$j] > $max_p)
				{
				$max_p=$percentage_inc[$j];
				$crop_id=$j+1;
				}
			$j=$j+1;
			}
mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_get_crop = "SELECT Crop_Name FROM crop_detail WHERE C_ID=$crop_id";
$get_crop = mysql_query($query_get_crop, $CropManagementSystem) or die(mysql_error());
$row_get_crop = mysql_fetch_assoc($get_crop);
$totalRows_get_crop = mysql_num_rows($get_crop);

mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_crop1 = "SELECT Crop_Name FROM crop_detail where C_ID=1";
$crop1 = mysql_query($query_crop1, $CropManagementSystem) or die(mysql_error());
$row_crop1 = mysql_fetch_assoc($crop1);
$totalRows_crop1 = mysql_num_rows($crop1);

mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_crp2 = "SELECT Crop_Name FROM crop_detail where C_ID=2";
$crp2 = mysql_query($query_crp2, $CropManagementSystem) or die(mysql_error());
$row_crp2 = mysql_fetch_assoc($crp2);
$totalRows_crp2 = mysql_num_rows($crp2);

mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_Crop3 = "SELECT Crop_Name FROM crop_detail where C_ID=3";
$Crop3 = mysql_query($query_Crop3, $CropManagementSystem) or die(mysql_error());
$row_Crop3 = mysql_fetch_assoc($Crop3);
$totalRows_Crop3 = mysql_num_rows($Crop3);

mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_crop4 = "SELECT Crop_Name FROM crop_detail where C_ID=4";
$crop4 = mysql_query($query_crop4, $CropManagementSystem) or die(mysql_error());
$row_crop4 = mysql_fetch_assoc($crop4);
$totalRows_crop4 = mysql_num_rows($crop4);

mysql_select_db($database_CropManagementSystem, $CropManagementSystem);
$query_crop5 = "SELECT Crop_Name FROM crop_detail where C_ID=5";
$crop5 = mysql_query($query_crop5, $CropManagementSystem) or die(mysql_error());
$row_crop5 = mysql_fetch_assoc($crop5);
$totalRows_crop5 = mysql_num_rows($crop5);
?>
<!DOCTYPE html>
<html>
<head>
<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Crop');
        data.addColumn('number', 'Production');
        data.addRows([
          ['Wheat', <?php echo $arr[0][2]; ?>],
          ['Rice', <?php echo $arr[1][2]; ?>],
          ['Pea', <?php echo $arr[2][2]; ?>],
          ['Gram', <?php echo $arr[3][2]; ?>],
          ['Sugar Cane', <?php echo $arr[4][2]; ?>]
        ]);

        // Set chart options
        var options = {'title':'Total Previous Production',
                       'width':273,
                       'height':200};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      }
	  
    </script>
<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Crop');
        data.addColumn('number', 'Production');
        data.addRows([
          ['Wheat', <?php echo $arr[0][1]; ?>],
          ['Rice', <?php echo $arr[1][1]; ?>],
          ['Pea', <?php echo $arr[2][1]; ?>],
          ['Gram', <?php echo $arr[3][1]; ?>],
          ['Sugar Cane', <?php echo $arr[4][1]; ?>]
        ]);

        // Set chart options
        var options = {'title':'Total Present Production',
                       'width':273,
                       'height':200};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
	  
    </script>
	<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
         data.addColumn('string', 'Crop');
        data.addColumn('number', 'Production');
        data.addRows([
          ['Wheat', <?php echo abs($percentage_inc[0]*100); ?>],
          ['Rice', <?php echo abs($percentage_inc[1]*100); ?>],
          ['Pea', <?php echo abs($percentage_inc[2]*100); ?>],
          ['Gram', <?php echo abs($percentage_inc[3]*100); ?>],
          ['Sugar Cane', <?php echo abs($percentage_inc[4]*100); ?>]
        ]);

        // Set chart options
        var options = {'title':'Increase/Decrease in Percentage of Production',
                       'width':274,
                       'height':200};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
      }
	  
    </script>



<title>Crop Management System || Predictions</title>
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
        <li><a href="index.php">Home</a></li>
        <li><a href="about.html">About Us</a></li>
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
        <li class="active"><a href="predictions.php">Predictions</a></li>
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
      <li><a href="predictions.php">Predictions</a></li>
    </ul>
    <!-- ########################################################################################## --> 
  </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main id="container" class="clear"> 
  
  <form name="form2" method="GET" action="predictions.php">
  <table>
     <th width="52%">Select State From Dropdown to view Prediction :</th>
     <th width="29%">
    <select name="state" id="state">
    <option value="UP" >Uttar Pradesh</option>
    <option value="MP">Madhya Pradesh </option>
    </select></th>
	<th width="19%"><input type='submit' value="submit"/></th>
	
	</table>
  </form>
  
  <div class="clear"></div>
  
  
  <h2>Prediction</h2>
  <table width="500" border="0">
    <tr>
      <th scope="col">Selected State</th>
      <th scope="col">Predicted Crop</th>
      <th scope="col">% Gain in Production</th>
    </tr>
    <tr>
      <td><?php echo $val1 ?></td>
      <td><?php echo $row_get_crop['Crop_Name']; ?></td>
      <td><?php echo $max_p * 100 ?></td>
    </tr>
  </table>
  <div class="clear"></div>
  
  
  
        <h2>Comparison</h2>
        <table width="500" border="0">
          <tr>
            <th width="10%" scope="col">Crop</th>
            <th width="30%" scope="col">Total Previous Production</th>
            <th width="30%" scope="col">Total Present Production</th>
            <th width="30%" scope="col">Increase In Percentage</th>
          </tr>
          <tr>
            <th scope="row"><?php echo $row_crop1['Crop_Name']; ?></th>
			<td><?php echo $arr[0][2]; ?></td>
            <td><?php echo $arr[0][1]; ?></td>
            
            <td><?php echo $percentage_inc[0]*100; ?> %</td>
          </tr>
          <tr>
            <th scope="row"><?php echo $row_crp2['Crop_Name']; ?></th>
			<td><?php echo $arr[1][2]; ?></td>
            <td><?php echo $arr[1][1]; ?></td>
            
            <td><?php echo $percentage_inc[1]*100; ?> %</td>
          </tr>
          <tr>
            <th scope="row"><?php echo $row_Crop3['Crop_Name']; ?></th>
			<td><?php echo $arr[2][2]; ?></td>
            <td><?php echo $arr[2][1]; ?></td>
            
            <td><?php echo $percentage_inc[2]*100; ?> %</td>
          </tr>
          <tr>
            <th scope="row"><?php echo $row_crop4['Crop_Name']; ?></th>
			<td><?php echo $arr[3][2]; ?></td>
            <td><?php  echo $arr[3][1]; ?></td>
            
            <td><?php echo $percentage_inc[3]*100; ?> %</td>
          </tr>
          <tr>
            <th scope="row"><?php echo $row_crop5['Crop_Name']; ?></th>
			<td><?php echo $arr[4][2]; ?></td>
            <td><?php echo $arr[4][1]; ?></td>
            
            <td><?php echo $percentage_inc[4]*100; ?> %</td>
          </tr>
          <tr>
            <th scope="row">Pie Charts</th>
            <td><!--Div that will hold the pie chart-->
				<div id="chart_div1"></div>
			</td>
            <td><!--Div that will hold the pie chart-->
				<div id="chart_div2"></div>
			</td>
            <td><!--Div that will hold the pie chart-->
				<div id="chart_div3"></div>
			</td>
          </tr>
        </table>
      <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved -Crop Management System</p>
    <p class="fl_right">- by Team MAD</p>
    <!-- ################################################################################################ --> 
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($Present_Sum_where_cid);

mysql_free_result($sum_prev);

mysql_free_result($get_crop);

mysql_free_result($crop1);

mysql_free_result($crp2);

mysql_free_result($Crop3);

mysql_free_result($crop4);

mysql_free_result($crop5);
?>
