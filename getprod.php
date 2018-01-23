<?php
session_start();
//connect to the database - either include a connection variable file or
//type the following lines:
$connect = mysql_connect("localhost", "root", "") or
     die ("Hey loser, check your server connection.");
mysql_select_db ("ecommerce");
$prodid=$_REQUEST['prodid'];
$query = "SELECT * FROM products WHERE prodnum='$prodid'";
$results = mysql_query($query)
     or die(mysql_error());
$row = mysql_fetch_array($results);
extract ($row);
?>
<HTML>
<HEAD>
<TITLE><?php echo $name ?></TITLE>
<style type="text/css">
<!--
.TEXT {	color: #FFF;
}
.menu {	font-family: "Courier New", Courier, monospace;
}
.menu {	color: #FFF;
}
.menu {	font-family: Georgia, "Times New Roman", Times, serif;
}
.menu {	font-weight: bold;
}
.menu {	font-size: 12px;
}
.menu {	font-family: "MS Serif", "New York", serif;
}
.menu {	font-family: "Courier New", Courier, monospace;
}
.menu {	font-family: Georgia, "Times New Roman", Times, serif;
}
.menu {	font-weight: normal;
}
.style3 {font-size: 11px; color: #000000; font-family: Geneva, Arial, Helvetica, sans-serif;}
.style6 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 11px; }
.style7 {font-size: 11px; color: #000000; font-family: Geneva, Arial, Helvetica, sans-serif; font-weight: bold; }
.style9 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 11px; color: #FF0000; }
.text {	color: #FFF;
	font: bold;
}
.text {	font-size: 12px;
}
.text {	font-family: "Comic Sans MS", cursive;
}
.text {	font-family: Verdana, Geneva, sans-serif;
}
.text {	color: #FFF;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FF0000;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
	color: #FF0000;
}
.style10 {
	font-family: Arial, Tahoma;
	font-size: 16px;
}
.style12 {color: #BCBCBC}
.style13 {color: #FFFFFF}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></HEAD>
<BODY>
<table width="900" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#F7F7F7">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" height="69" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="39%"><img src="images/logo.jpg" width="310" height="70" alt="Logo" /></td>
            <td width="61%"><table width="67%" height="70" border="0" align="right" cellpadding="3" cellspacing="2">
              <tr>
                <td height="27" class="style3">DEALS <span class="style12">NOW IN YOUR CART</span> 
                  <?php
$sessid = session_id();

//display number of products in cart
     $query = "SELECT * from carttemp WHERE sess = '$sessid'";
     $results = mysql_query($query)
          or die (mysql_query());
     $rows = mysql_num_rows($results);
     echo $rows;
?>
                  <span class="style13">J</span>ITEM</td>
              </tr>
              <tr>
                <td align="right"><table width="57%" border="0" align="right" cellpadding="0" cellspacing="3">
                  <tr>
                    <td width="25%" align="center"><span class="style6">LOG IN </span></td>
                    <td width="44%" align="center"><span class="style6">DEALS</span></td>
                    <td width="31%" align="center"><span class="style6">CHECK OUT</span></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="39" bgcolor="#1B1B1B"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bg.jpg" bgcolor="#FFFFFF">
          <tr>
            <td width="13%" align="center" class="menu"><span class="text"><span class="TEXT"><span class="style9">HOME PAGE</span></span></span></td>
            <td width="0%" align="center" class="menu"><span class="text"><span class="TEXT"><img src="images/line.gif" width="1" height="45" /></span></span></td>
            <td width="17%" align="center" class="style6"><a href="javascript:;"><strong>NEW HOUSES</strong></a></td>
            <td width="0%" align="center" class="style6"><img src="images/line.gif" width="1" height="45" /></td>
            <td width="11%" align="center" class="style6"><a href="javascript:;"><strong>SPECIALS</strong></a></td>
            <td width="0%" align="center" class="style6"><img src="images/line.gif" width="1" height="45" /></td>
            <td width="16%" align="center" class="style6"><a href="javascript:;"><strong>ALL HOUSES</strong></a></td>
            <td width="0%" align="center" class="style6"><img src="images/line.gif" width="1" height="45" /></td>
            <td width="10%" align="center" class="style6"><a href="javascript:;"><strong>REVIEWS</strong></a></td>
            <td width="0%" align="center" class="style6"><img src="images/line.gif" width="1" height="45" /></td>
            <td width="13%" align="center" class="style6"><a href="javascript:;" class="style7">CONTACT US</a></td>
            <td width="0%" align="center" class="style6"><img src="images/line.gif" width="1" height="45" /></td>
            <td width="16%" align="center" class="style6"><a href="javascript:;" class="style7">FAQS</a></td>
            <td width="4%">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><img src="images/sl.gif" alt="sline" width="960" height="2" align="baseline" /></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
          <tr>
            <td width="40%"><img src="images/banner1.jpg" width="310" height="267" alt="banner1" /></td>
            <td width="39%"><img src="images/banner2.jpg" width="310" height="267" alt="banner2" /></td>
            <td width="21%"><img src="images/banner3.jpg" width="310" height="267" alt="banner3" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><img src="images/sl.gif" width="960" height="2"></td>
      </tr>
      <tr>
        <td>&nbsp;
          <div align='center'>
            <table width='500' border="1" cellpadding = '5' cellspacing="3" bordercolor="#EEEEEE">
              <tr>
                <?php
     echo "<td>";
	echo "<img src=/shopping/images/product_images/";
	 echo $row['pix'];
	 echo " />";
	 echo "</td>";
     echo "<td>";
     echo "<strong>";
     echo $name;
     echo "</strong><br>";
	 echo "<br>";
     echo $proddesc;
     echo "<br>";
	 echo "<br>";
	 echo "<strong>";
     echo "Product Number: ";
	 echo "</strong>";
     echo $prodnum;
	 echo "<strong>";
     echo "<br>Price: ";
	 echo "</strong>";
     echo $price;
     echo "</td>";
?>
              </tr>
              <tr>
                <td></td>
                <td><form method="POST" action="add.php">
                  Quantity:
                  <input type="text" name="qty" size="2">
              <input type="hidden" name="prodnum" value="<?php echo $prodnum ?>">
              <input type="submit" name="Submit" value="Add to cart">
                  </form>
                    <form method = "POST" action="cart.php">
                      <input type="submit" name="Submit" value="View cart">
                  </form></td>
              </tr>
            </table>
          <a href="cbashop.php">Go back to the main page</a> </div></td>
      </tr>
      <tr>
        <td><h4 class="style10">&nbsp;</h4></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</BODY>
</HTML>