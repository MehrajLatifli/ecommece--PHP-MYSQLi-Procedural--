<?php 

$dbhost = "localhost";
$dbuser = "ecommerceuser";
$dbpass = "trCu[x*eV3DzK!VD";
$dbname = "ecommerce";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {

  die("Connection failed: " . mysqli_connect_error());
  
}

?>