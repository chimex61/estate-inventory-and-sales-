<?php
session_id();
session_start();
//connect to the database - either include a connection variable file or
//type the following lines:
$connect = mysql_connect("localhost", "root", "") or
     die ("Hey loser, check your server connection.");
mysql_select_db ("ecommerce");
//Let's make the variables easy to access in our queries
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$add1 = $_POST['add1'];
$add2 = $_POST['add2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];
$email = $_POST['email'];
$shipfirst = $_POST['shipfirst'];
$shiplast = $_POST['shiplast'];
$shipadd1 = $_POST['shipadd1'];
$shipadd2 = $_POST['shipadd2'];
$shipcity = $_POST['shipcity'];
$shipstate = $_POST['shipstate'];
$shipzip = $_POST['shipzip'];
$shipstate = $_POST['shipstate'];
$shipphone = $_POST['shipphone'];
$shipemail = $_POST['shipemail'];
$total = $_POST['total'];
$sessid = session_id();
$today = date("Y-m-d");
//1) Assign Customer Number to new Customer, or find existing customer number
     $query = "SELECT * FROM customers WHERE
          (firstname = '$firstname' AND
          lastname = '$lastname' AND
          add1 = '$add1' AND
          add2 = '$add2' AND
          city = '$city')";
     $results = mysql_query($query)
          or (mysql_error());
     $rows = mysql_num_rows($results);

     if ($rows < 1) {
          //assign new custnum
          $query2 = "INSERT INTO customers (
          firstname, lastname, add1, add2, city, state, zip, phone, fax, email)
           VALUES (
          '$firstname',
          '$lastname',
          '$add1',
          '$add2',
          '$city',
          '$state',
          '$zip',
          '$phone',
          '$fax',
          '$email')";
          $insert = mysql_query($query2)
               or (mysql_error());
          $custid = mysql_insert_id();
     }
     //If custid exists, we want to make it equal to custnum
     if($custid) $custnum = $custid;
//2) Insert Info into ordermain
     //determine shipping costs based on order total (25% of total)
     $shipping = $total * 0.25;

     $query3 = "INSERT INTO ordermain (orderdate, custnum, subtotal,
                shipping, shipfirst, shiplast, shipadd1, shipadd2,
               shipcity, shipstate, shipzip, shipphone, shipemail)
          VALUES (
          '$today',
          '$custnum',
          '$total',
          '$shipping'
          '$shipfirst',
          '$shiplast',
          '$shipadd1',
          '$shipadd2',
          '$shipcity',
          '$shipstate',
          '$shipzip',
          '$shipphone',
          '$shipemail')";
     $insert2 = mysql_query($query3)
          or (mysql_error());
     $orderid = mysql_insert_id();

//3) Insert Info into orderdet
     //find the correct cart information being temporarily stored
     $query = "SELECT * from carttemp WHERE sess='$sessid'";
     $results = mysql_query($query)
          or (mysql_error());

     //put the data into the database one row at a time
     while ($row = mysql_fetch_array($results)) {
               extract ($row);
               $query4 = "INSERT INTO orderdet (ordernum, qty, prodnum)
                    VALUES (
                    '$orderid',
                    '$quan',
                    '$prodnum')";
               $insert4 = mysql_query($query4)
                    or (mysql_error());
     }

//4)delete from temporary table
     $query="DELETE FROM carttemp WHERE sess='$sessid'";
     $delete = mysql_query($query);


//5)email confirmations to us and to the customer
/* recipients */
$to = "<" . $email .">";

/* subject */
$subject = "Order Confirmation";

/* message */
     /* top of message */
     $message = "
       <html>
       <head>
       <title>Order Confirmation</title>
       </head>
       <body>
     Here is a recap of your order:<br><br>
     Order date:";
 $message .= $today;

 $message .= "
     <br>
      Order Number: ";
 $message .= $orderid;
 $message .= "
     <table width='50%' border='0'>
      <tr>
        <td>
         <p><font size='2'>Bill to:<br>";
 $message .= $firstname;
 $message .= " ";
 $message .= $lastname;
 $message .= "<br>";
 $message .= $add1;
 $message .= "<br>";
 if ($add2) $message .= $add2 . "<br>";
 $message .= $city . ", " . $state . "  " . $zip;
 $message .= "</p></td>
    <td>
      <p><font size='2'>Ship to:<br>";
 $message .= $shipfirst . " " . $shiplast;
 $message .= "<br>";
 $message .= $shipadd1 . "<br>";
 if ($shipadd2) $message .= $shipadd2 . "<br>";
 $message .= $shipcity . ", " . $shipstate . "  " . $shipzip;
 $message .= "</font></p>
      </td>
     </tr>
    </table>
    <hr noshade width='250px' align='left'>
  <table cellpadding='5'>
     <tr>";

//grab the contents of the order and insert them
//into the message field

      $query = "SELECT * from orderdet WHERE ordernum = '$orderid'";
     $results = mysql_query($query)
          or die (mysql_query());
          while ($row = mysql_fetch_array($results)) {
               extract ($row);
               $prod = "SELECT * FROM products
                        WHERE prodnum = '$prodnum'";
               $prod2 = mysql_query($prod);
               $prod3 = mysql_fetch_array($prod2);
               extract ($prod3);
               $message .= "<td><font size='2'>";
               $message .= $quan;
               $message .= "</font></td>";
               $message .="<td><font size='2'>";
               $message .= $name;
               $message .= "</font></td>";
               $message .= "<td align='right'><font size='2'>";
               $message .= $price;
               $message .= "</font></td>";
               $message .= "<td align='right'><font size='2'>";
          //get extended price
               $extprice = number_format($price * $quan, 2);
               $message .= $extprice;
               $message .= "</font></td>";
               $message .= "</tr>";
               }

 $message .= "<tr>
     <td colspan='3' align='right'><font size='2'>
        Your total before shipping is:</font>
     </td>
     <td align='right'><font size='2'>";
 $message .= number_format($total, 2);
 $message .= "</font>
     </td>
    </tr>
    <tr>
     <td colspan='3' align='right'><font size='2'>
       Shipping Costs:</font>
     </td>
     <td align='right'><font size='2'>";
  $message .= number_format($shipping, 2);
  $message .= "</font>
     </td>
    </tr>
   <tr>
     <td colspan='3' align='right'><font size='2'>
      Your final total is:</font>
     </td>
     <td align='right'><font size='2'> ";
  $message .= number_format(($total + $shipping), 2);
  $message .= "</font>
     </td>
    </tr>
   </table>
</body>
</html>";

/* headers */
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: <storeemail@email.com>\r\n";
$headers .= "Cc: <storeemail@email.com>\r\n";
$headers .= "X-Mailer: PHP / ".phpversion()."\r\n";

/* mail it */
mail ($to, $subject, $message, $headers);


//6)show them their order & give them an order number
?>
<HTML>
<HEAD>
<TITLE>Thank you for your order!</TITLE>
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
.style10 {	font-family: Arial, Tahoma;
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
.style14 {
	font-family: Arial, Tahoma;
	font-size: 12px;
	color: #000000;
}
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
                <td height="27" class="style3">SHOPPING CART <span class="style12">NOW IN YOUR CART</span><span class="style13">J</span>ITEM</td>
              </tr>
              <tr>
                <td align="right"><table width="57%" border="0" align="right" cellpadding="0" cellspacing="3">
                  <tr>
                    <td width="25%" align="center"><span class="style6">LOG IN </span></td>
                    <td width="44%" align="center"><span class="style6">SHOPPING CART</span></td>
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
        <td>&nbsp;
          <p class="style14">Step 1 - Please Enter Billing and BuyersInformation<br>
            Step 2 - Please Verify Accuracy and Make Any Necessary Changes<br>
  <strong>Step 3 - View Confirmation and Receipt</strong><br>
  <br>
            Thank you for your order!<br>
  <br>
            Your order number is <?php echo $orderid ?>. Please print this page or retain
            this number for your records.<br>
    <br>
            Here is a recap of your order:<br>
  <br>
            Order date: <?php echo $today ?><br>
          </p>
          <table width="50%" border="0">
            <tr>
              <td class="style14"><p>your bill is:<br>
                    <?php echo $firstname . " " . $lastname ?><br>
                    <?php echo $add1 ?><br>
                    <?php if ($add2) echo $add2 . "<br>"?>
                    <?php echo $city . ", " . $state . "  " . $zip ?> </p></td>
              <td class="style14"><p>order:<br>
                    <?php echo $shipfirst . " " . $shiplast ?><br>
                    <?php echo $shipadd1 ?><br>
                    <?php if ($shipadd2) echo $shipadd2 . "<br>"?>
                    <?php echo $shipcity . ", " . $shipstate . "  " . $shipzip ?> </p></td>
            </tr>
          </table>
          <hr noshade width='250px' align='left'>
          <table cellpadding="5">
            <tr>
              <?php
      $query = "SELECT * from orderdet WHERE ordernum = '$orderid'";
     $results = mysql_query($query)
          or die (mysql_query());
          while ($row = mysql_fetch_array($results)) {
               extract ($row);
               $prod = "SELECT * FROM products WHERE prodnum = '$prodnum'";
               $prod2 = mysql_query($prod);
               $prod3 = mysql_fetch_array($prod2);
               extract ($prod3);
               echo "<td><font size='2'>";
               echo $quan;
               echo "</font></td>";
               echo "<td><font size='2'>";
               echo $name;
               echo "</font></td>";
               echo "<td align='right'><font size='2'>";
               echo $price;
               echo "</font></td>";
               echo "<td align='right'><font size='2'>";
          //get extended price
               $extprice = number_format($price * $quan, 2);
               echo $extprice;
               echo "</font></td>";
               echo "</tr>";
               }
?>
            <tr>
              <td colspan='3' align='right' class="style14"> Your total is: </td>
              <td align='right' class="style14"> <?php echo number_format($total, 2) ?> </td>
            </tr>
            <tr>
              <td colspan='3' align='right' class="style14"> order Costs: </td>
              <td align='right' class="style14"> <?php echo number_format($shipping, 2) ?> </td>
            </tr>
            <tr>
              <td colspan='3' align='right' class="style14"> Your final total is: </td>
              <td align='right' class="style14"> <?php echo number_format(($total + $shipping), 2) ?> </td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td><h4 class="style10">&nbsp;</h4></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</BODY>
</HTML>