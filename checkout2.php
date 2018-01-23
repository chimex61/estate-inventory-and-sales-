<?php
session_id();
session_start();
//connect to the database
$connect = mysql_connect("localhost", "root", "") or
     die ("Hey loser, check your server connection.");
mysql_select_db ("ecommerce");
if ($_POST['same'] == 'on') {
     $_POST['shipfirst'] = $_POST['firstname'];
     $_POST['shiplast'] = $_POST['lastname'];
     $_POST['shipadd1'] = $_POST['add1'];
     $_POST['shipadd2'] = $_POST['add2'];
     $_POST['shipcity'] = $_POST['city'];
     $_POST['shipstate'] = $_POST['state'];
     $_POST['shipzip'] = $_POST['zip'];
     $_POST['shipphone'] = $_POST['phone'];
     $_POST['shipemail'] = $_POST['email'];
     }
?>
<HTML>
<HEAD>
<TITLE>Step 2 of 3 - Verify Order Accuracy</TITLE>
<style type="text/css">
<!--
.TEXT {color: #FFF;
}
.menu {font-family: "Courier New", Courier, monospace;
}
.menu {color: #FFF;
}
.menu {font-family: Georgia, "Times New Roman", Times, serif;
}
.menu {font-weight: bold;
}
.menu {font-size: 12px;
}
.menu {font-family: "MS Serif", "New York", serif;
}
.menu {font-family: "Courier New", Courier, monospace;
}
.menu {font-family: Georgia, "Times New Roman", Times, serif;
}
.menu {font-weight: normal;
}
.style10 {font-family: Arial, Tahoma;
	font-size: 16px;
}
.style12 {color: #BCBCBC}
.style13 {color: #FFFFFF}
.style3 {font-size: 11px; color: #000000; font-family: Geneva, Arial, Helvetica, sans-serif;}
.style6 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 11px; }
.style7 {font-size: 11px; color: #000000; font-family: Geneva, Arial, Helvetica, sans-serif; font-weight: bold; }
.style9 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 11px; color: #FF0000; }
.text {color: #FFF;
	font: bold;
}
.text {font-size: 12px;
}
.text {font-family: "Comic Sans MS", cursive;
}
.text {font-family: Verdana, Geneva, sans-serif;
}
.text {color: #FFF;
}
.style19 {
	font-family: Arial, Tahoma;
	font-size: 12px;
}
.style20 {
	font-family: Arial, Tahoma;
	font-size: 14px;
	color: #FFFFFF;
}
.style21 {font-family: Arial, Tahoma; font-size: 12; }
.style23 {font-family: "Comic Sans MS", cursive; font: bold; color: #FFF;}
.style24 {
	font-family: Arial, Tahoma;
	font-weight: bold;
	font-size: 14px;
	color: #FFFFFF;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFFFFF;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
	color: #FFFFFF;
}
.style25 {
	color: #000000;
	font: bold;
	font-family: "Comic Sans MS", cursive;
}
.style26 {font-family: "Comic Sans MS", cursive; font: bold;}
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
                <td height="27" class="style3">DEALS <span class="style12">NOW IN YOUR CART</span><span class="style13">J</span>ITEM</td>
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
            <td width="17%" align="center" class="style6"><a href="javascript:;"><strong>NEW PRODUCTS</strong></a></td>
            <td width="0%" align="center" class="style6"><img src="images/line.gif" width="1" height="45" /></td>
            <td width="11%" align="center" class="style6"><a href="javascript:;"><strong>SPECIALS</strong></a></td>
            <td width="0%" align="center" class="style6"><img src="images/line.gif" width="1" height="45" /></td>
            <td width="16%" align="center" class="style6"><a href="javascript:;"><strong>ALL PRODUCTS</strong></a></td>
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
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td><p class="style19">Step 1 - Please Enter Billing and Shipping Information<br>
              <strong>Step 2 - Please Verify Accuracy and Make Any Necessary
                Changes</strong><br>
              Step 3 - View Confirmation and Receipt</p>
              <form method="post" action="checkout3.php">
                <table width="300" border="1" align="left" cellpadding="2" cellspacing="2" bordercolor="#0000FF">
                  <tr align="center" bgcolor="lightgrey">
                    <td colspan="2" bgcolor="#0000FF"><div align="center" class="style20"><b>Billing
                      Information </b></div></td>
                  </tr>
                  <tr bgcolor="white">
                    <td width="50%" align="left"><div align="right" class="style21">
                        <div align="left">First Name</div>
                    </div></td>
                    <td width="50%" align="left"><input name="firstname" type="text" class="style25"
          value="<?php echo $_POST['firstname']?> " maxlength="15">                    </td>
                  </tr>
                  <tr bgcolor="lightgrey">
                    <td width="50%" align="left"><div align="right" class="style21">
                        <div align="left">Last Name</div>
                    </div></td>
                    <td width="50%" align="left"><input name="lastname" type="text" class="style26"
          value="<?php echo $_POST['lastname']?>" maxlength="50">                    </td>
                  </tr>
                  <tr bgcolor="white">
                    <td width="50%" align="left"><div align="right" class="style21">
                        <div align="left">Billing Address</div>
                    </div></td>
                    <td width="50%" align="left"><input name="add1" type="text" class="style26"
           value="<?php echo $_POST['add1']?>" maxlength="50">                    </td>
                  </tr>
                  <tr bgcolor="lightgrey">
                    <td width="50%" align="left"><div align="right" class="style21">
                        <div align="left">Billing Address 2</div>
                    </div></td>
                    <td width="50%" align="left"><input name="add2" type="text" class="style26"
           value="<?php echo $_POST['add2']?>" maxlength="50">                    </td>
                  </tr>
                  <tr bgcolor="white">
                    <td width="50%" align="left"><div align="right" class="style21">
                        <div align="left">City</div>
                    </div></td>
                    <td width="50%" align="left"><input name="city" type="text" class="style26"
           value="<?php echo $_POST['city']?> " maxlength="50">                    </td>
                  </tr>
                  <tr bgcolor="lightgrey">
                    <td width="50%" align="left"><div align="right" class="style21">
                        <div align="left">State</div>
                    </div></td>
                    <td width="50%" align="left"><input name="state" type="text" class="style26"
               value="<?php echo $_POST['state']?>" size="2" maxlength="2">                    </td>
                  </tr>
                  <tr bgcolor="white">
                    <td width="50%" align="left"><div align="right" class="style21">
                        <div align="left">Zip</div>
                    </div></td>
                    <td width="50%" align="left"><input name="zip" type="text" class="style26"
               value="<?php echo $_POST['zip']?>" size="5" maxlength="5">                    </td>
                  </tr>
                  <tr bgcolor="lightgrey">
                    <td width="50%" align="left"><div align="right" class="style21">
                        <div align="left">Phone Number</div>
                    </div></td>
                    <td width="50%" align="left"><input name="phone" type="text" class="style26"
          value="<?php echo $_POST['phone']?>" size="12" maxlength="12">                    </td>
                  </tr>
                  <tr bgcolor="white">
                    <td width="50%" align="left"><div align="right" class="style21">
                        <div align="left">Fax Number</div>
                    </div></td>
                    <td width="50%" align="left"><input name="fax" type="text" class="style26"
          value="<?php echo $_POST['fax']?>" size="12" maxlength="12">                    </td>
                  </tr>
                  <tr bgcolor="lightgrey">
                    <td width="50%" align="left"><div align="right" class="style21">
                        <div align="left">E-Mail Address</div>
                    </div></td>
                    <td width="50%" align="left"><input name="email" type="text" class="style26"
          value="<?php echo $_POST['email']?>" maxlength="50">                    </td>
                  </tr>
                </table>
                <table width="300" border="1" cellpadding="2" cellspacing="2" bordercolor="#0000FF">
                  <tr align="center" bgcolor="lightgrey">
                    <td colspan="2" bgcolor="#990000"><div align="center" class="style24">Buyers
                      Information </div></td>
                  </tr>
                  <tr bgcolor="white">
                    <td width="50%"><div align="right" class="style21">
                        <div align="left">Buyers Info same as Billing</div>
                    </div></td>
                    <td width="50%"><input name="same" type="checkbox" class="style23"></td>
                  </tr>
                  <tr bgcolor="lightgrey">
                    <td width="50%"><div align="right" class="style21">
                        <div align="left">First Name</div>
                    </div></td>
                    <td width="50%"><input name="shipfirst" type="text" class="style26"
          value="<?php echo $_POST['shipfirst']?>" maxlength="15">                    </td>
                  </tr>
                  <tr bgcolor="white">
                    <td width="50%"><div align="right" class="style21">
                        <div align="left">Last Name</div>
                    </div></td>
                    <td width="50%"><input name="shiplast" type="text" class="style26"
           value="<?php echo $_POST['shiplast']?>" maxlength="50">                    </td>
                  </tr>
                  <tr bgcolor="lightgrey">
                    <td width="50%"><div align="right" class="style21">
                        <div align="left">Billing Address</div>
                    </div></td>
                    <td width="50%"><input name="shipadd1" type="text" class="style26"
          value="<?php echo $_POST['shipadd1']?>" maxlength="50">                    </td>
                  </tr>
                  <tr bgcolor="white">
                    <td width="50%"><div align="right" class="style21">
                        <div align="left">Billing Address 2</div>
                    </div></td>
                    <td width="50%"><input name="shipadd2" type="text" class="style26"
           value="<?php echo $_POST['shipadd2']?>" maxlength="50">                    </td>
                  </tr>
                  <tr bgcolor="lightgrey">
                    <td width="50%"><div align="right" class="style21">
                        <div align="left">City</div>
                    </div></td>
                    <td width="50%"><input name="shipcity" type="text" class="style26"
           value="<?php echo $_POST['shipcity']?>" maxlength="50">                    </td>
                  </tr>
                  <tr bgcolor="white">
                    <td width="50%"><div align="right" class="style21">
                        <div align="left">State</div>
                    </div></td>
                    <td width="50%"><input name="shipstate" type="text" class="style26"
          value="<?php echo $_POST['shipstate']?>" size="2" maxlength="2">                    </td>
                  </tr>
                  <tr bgcolor="lightgrey">
                    <td width="50%"><div align="right" class="style21">
                        <div align="left">Zip</div>
                    </div></td>
                    <td width="50%"><input name="shipzip" type="text" class="style26"
          value="<?php echo $_POST['shipzip']?>" size="5" maxlength="5">                    </td>
                  </tr>
                  <tr bgcolor="white">
                    <td width="50%"><div align="right" class="style21">
                        <div align="left">Phone Number</div>
                    </div></td>
                    <td width="50%"><input name="shipphone" type="text" class="style26"
          value="<?php echo $_POST['shipphone']?>" size="12" maxlength="12">                    </td>
                  </tr>
                  <tr bgcolor="lightgrey">
                    <td width="50%"><div align="right" class="style21">
                        <div align="left">E-Mail Address</div>
                    </div></td>
                    <td width="50%"><input name="shipemail" type="text" class="style26"
           value="<?php echo $_POST['shipemail']?>" maxlength="50">                    </td>
                  </tr>
                </table>
                <table border="1" align="left" cellpadding="5" bordercolor="#0000FF">
                  <tr>
                    <td align="center" bordercolor="#0000FF" bgcolor="#D3D3D3"><span class="style19">Quantity</span></td>
                    <td align="center" bordercolor="#0000FF" bgcolor="#D3D3D3"><span class="style19">Item Image</span></td>
                    <td align="center" bordercolor="#0000FF" bgcolor="#D3D3D3"><span class="style19">Item Name</span></td>
                    <td align="center" bordercolor="#0000FF" bgcolor="#D3D3D3"><span class="style19">Price Each</span></td>
                    <td align="center" bordercolor="#0000FF" bgcolor="#D3D3D3"><span class="style19">Extended Price</span></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <?php
       $sessid = session_id();
       $query = "SELECT * FROM carttemp WHERE sess = '$sessid'";
      $results = mysql_query($query)
          or die (mysql_query());
           while ($row = mysql_fetch_array($results)) {
               extract ($row);
               $prod = "SELECT * FROM products WHERE
                    prodnum = '$prodnum'";
               $prod2 = mysql_query($prod);
               $prod3 = mysql_fetch_array($prod2);
               extract ($prod3);
               echo "<td>";
               echo $quan;
               echo "</td>";
               echo "<td>";
               echo "<a href = 'getprod.php?prodid=" .
                    $prodnum ."'>";
               echo "<img src=/shopping/images/product_images/";
	 echo $prod3['pix'];
	 echo " />";
               echo "<td>";
               echo "<a href = 'getprod.php?prodid=" .
                    $prodnum ."'>";
               echo $name;
               echo "</td></a>";
               echo "<td align='right'>";
               echo $price;
               echo "</td>";
               echo "<td align='right'>";
          //get extended price
               $extprice = number_format($price * $quan, 2);
               echo $extprice;
               echo "</td>";
               echo "<td>";
               echo "<a href='cart.php'>Make Changes to Cart</a>";
               echo "</td>";
               echo "</tr>";
          //add extended price to total
               $total = $extprice + $price;

               }
?>
                  <tr>
                    <td colspan='4' align='right'><span class="style19">Your total before shipping is:</span></td>
                    <td align='right'><?php echo number_format($total, 2) ?></td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>
                <input type="hidden" name="total" value="<?php echo $total?>">
                <p>
                  <input type="submit" name="Submit" value="Send Order --&gt;">
                </p>
              </form>              <p class="style19">&nbsp;</p></td>
          </tr>
        </table>        
        <h4 class="style10">&nbsp;</h4></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br>

</p>
</BODY>
</HTML>