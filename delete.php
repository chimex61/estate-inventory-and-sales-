<?php
session_id();
$connect = mysql_connect("localhost", "root", "") or
     die ("Hey loser, check your server connection.");
mysql_select_db ("ecommerce");
$qty =$_POST['qty'];
$hidden = $_POST['hidden'];
$sess = $_POST['sessid'];

$query = "DELETE FROM carttemp WHERE hidden = '$hidden'";
$results = mysql_query($query)
     or die(mysql_error());

echo "<div align='center'>
     Item Deleted.<br>
     <br></div>     ";
include("cart.php");
?>