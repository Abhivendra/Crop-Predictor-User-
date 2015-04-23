<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_CropManagementSystem = "localhost";
$database_CropManagementSystem = "crop management system";
$username_CropManagementSystem = "root";
$password_CropManagementSystem = "";
$CropManagementSystem = mysql_pconnect($hostname_CropManagementSystem, $username_CropManagementSystem, $password_CropManagementSystem) or trigger_error(mysql_error(),E_USER_ERROR); 
?>