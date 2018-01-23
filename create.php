<title>Create Database and Tables</title>
<?php
//connect to the database - either include a connection variable file or
//type the following lines:
$connect = mysql_connect("localhost", "root", "") or
     die ("Hey loser, check your server connection.");

//Create the ecommerce database
if (mysql_create_db("ecommerce")) {
     echo "Woo hoo! Database created!";
}
else echo "Sorry, try creating the database again.";
mysql_select_db ("ecommerce");

//Define the product table
$query = "CREATE TABLE products (
     prodnum CHAR(5) NOT NULL,
     name VARCHAR(20) NOT NULL,
     proddesc TEXT NOT NULL,
     price DEC (6,2) NOT NULL,
     dateadded DATE NOT NULL,
     PRIMARY KEY(prodnum))";

$product = mysql_query($query)
     or die(mysql_error());

//Define the customer table
$query2 = "CREATE TABLE customers (
     custnum INT(6) NOT NULL AUTO_INCREMENT,
     firstname VARCHAR (15) NOT NULL,
     lastname VARCHAR (50) NOT NULL,
     add1 VARCHAR (50) NOT NULL,
     add2 VARCHAR (50),
     city VARCHAR (50) NOT NULL,
     state CHAR (2) NOT NULL,
     zip CHAR (5) NOT NULL,
     phone CHAR (12) NOT NULL,
     fax CHAR (12),
     email VARCHAR (50) NOT NULL,
     PRIMARY KEY (custnum))";

$customers = mysql_query($query2)
     or die(mysql_error());

//Define the general order table
$query3 = "CREATE TABLE ordermain (
     ordernum INT(6) NOT NULL AUTO_INCREMENT,
     orderdate DATE NOT NULL,
     custnum INT(6) NOT NULL,
     subtotal DEC (7,2) NOT NULL,
     shipping DEC (6,2),
     tax DEC(6,2),
     total DEC(7,2) NOT NULL,
     shipfirst VARCHAR(15) NOT NULL,
     shiplast VARCHAR(50) NOT NULL,
     shipcompany VARCHAR (50),
     shipadd1 VARCHAR (50) NOT NULL,
     shipadd2 VARCHAR(50),
     shipcity VARCHAR(50) NOT NULL,
     shipstate CHAR(2) NOT NULL,
     shipzip CHAR(5) NOT NULL,
     shipphone CHAR(12) NOT NULL,
     shipemail VARCHAR(50),
     PRIMARY KEY(ordernum)) ";

$ordermain = mysql_query($query3)
     or die(mysql_error());

//Define the order details table
$query4 = "CREATE TABLE orderdet (
     ordernum INT (6) NOT NULL,
     qty INT(3) NOT NULL,
     prodnum CHAR(5) NOT NULL,
     KEY(ordernum))";

$orderdet = mysql_query($query4)
     or die(mysql_error());

?>