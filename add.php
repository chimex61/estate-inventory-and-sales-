<?php
session_id();
session_start();
$connect = mysql_connect("localhost", "root", "") or
     die ("Hey loser, check your server connection.");
mysql_select_db ("ecommerce");
$qty =$_POST['qty'];
$prodnum = $_POST['prodnum'];
$sess =session_id();

$query = "INSERT INTO carttemp (sess, quan, prodnum)
          VALUES ('$sess','$qty','$prodnum')";
$results = mysql_query($query)
     or die(mysql_error());

include("cart.php");
?>