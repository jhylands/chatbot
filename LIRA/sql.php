<?php
// Create connection to database
$mysql_host = "localhost";
$mysql_database = "a9206732_dat";
$mysql_user = "root";
$mysql_password = "space(55)";
$con=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
