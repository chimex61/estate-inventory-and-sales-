<?php
session_id();
//ession_start();
//connect to the database
$connect = mysql_connect("localhost", "root", "") or
     die ("Hey loser, check your server connection.");
mysql_select_db ("ecommerce");
?>
<HTML>
<HEAD>
<TITLE>Here is Your Cart!</TITLE>
</HEAD>
<BODY>
<div align="center">
You currently have

<?php
$sessid = session_id();

//display number of products in cart
     $query = "SELECT * from carttemp WHERE sess = '$sessid'";
     $results = mysql_query($query)
          or die (mysql_query());
     $rows = mysql_num_rows($results);
     echo $rows;
?>

product(s) in your cart.<br>

 <table border="1" align="center" cellpadding="5">
      <tr>
           <td>Quantity</td>
           <td>Image</td>
           <td>Name</td>
           <td>Price Each</td>
           <td>Extended Price</td>
           <td></td>
           <td></td>
      <tr>
      <?php
           while ($row = mysql_fetch_array($results)) {
               extract ($row);
               $prod = "SELECT * FROM products WHERE prodnum =
               '$prodnum'";
               $prod2 = mysql_query($prod);
               $prod3 = mysql_fetch_array($prod2);
               extract ($prod3);
               echo "<td><form method = 'POST' action='change.php'>
                    <input type='hidden' name='prodnum'
                        value='$prodnum'>
                    <input type='hidden' name='sessid'
                        value='$sessid'>
                    <input type='hidden' name='hidden'
                        value='$hidden'>
                    <input type='text' name='qty' size='2'
                        value='$quan'>";
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
               echo "<input type='submit' name='Submit'
                         value='Change Qty'>
                      </form></td>";
               echo "<td>";
               echo "<form method = 'POST' action='delete.php'>
                    <input type='hidden' name='prodnum'
                           value='$prodnum'>
                    <input type='hidden' name='qty' value='$quan'>
                    <input type='hidden' name='hidden'
                           value='$hidden'>
                    <input type='hidden' name='sessid'
                           value='$sessid'>";
               echo "<input type='submit' name='Submit'
                           value='Delete Item'>
                      </form></td>";
               echo "</tr>";
          //add extended price to total
               $total = $extprice + $total;

               }
?>
<tr>
<td colspan='4' align='right'>Your total  is:</td>
<td align='right'> <?php echo number_format($total, 2) ?></td>
<td></td>
<td></td>
</tr>
</table>
<form method="POST" action="checkout.php">
<input type='submit' name='Submit' value='Proceed to Checkout'>
</form>
<a href="cbashop.php">Go back to the main page</a>
</div>
</BODY>
</HTML>