<?php
if(!isset($_SESSION))session_start();
include "Libraries/Customer.php";
if(!isset($_SESSION['customer']))
{
	$_SESSION['noAccess'] = "<span style=\"color:#F00; font-family:'Adobe Caslon Pro Bold', 'Adobe Caslon Pro', 'Adobe Garamond Pro', 'Adobe Garamond Pro Bold'; font-size:13px;\">You Need To Login To Access This Page.</span>";
	Customer::TransitTo("login.php");
}
else if(!isset($_SESSION['allSales']))
{
	Customer::TransitTo("shop.php");
}
$customer = new Customer();
$customer = unserialize($_SESSION['customer']);
include("Libraries/Goods.php");
include("Libraries/Goodscategory.php");
include("Libraries/Temptable.php");
include("Libraries/Sales.php");
include("Libraries/Points.php");
$point = new Points();
$point = unserialize($_SESSION['points']);
$good = new Goods();
$allSales = unserialize($_SESSION['allSales']);
$sales = new Sales();
if(!isset($_SESSION['set']))
{
	$point->setPoints($point->getPoints()+$_SESSION['allPoints']);
	$point->Update();
	$_SESSION['points'] = serialize($point);
	$_SESSION['set'] = true;
}
?>
<style type="text/css">
.TEXT {
	color: #FFF;
}
.text {
	color: #FFF;
	font: bold;
}
.text {
	font-size: 12px;
}
#tdb a{
	color:#333;
	text-decoration:none;
}
.td_border
{
border:1px solid #cccccc;
}
.text {
	font-family: "Comic Sans MS", cursive;
}
.text {
	font-family: Verdana, Geneva, sans-serif;
}
.text {
	color: #FFF;
}
.menu {
	font-family: "Courier New", Courier, monospace;
}
.menu {
	color: #FFF;
}
.menu {
	font-family: Georgia, "Times New Roman", Times, serif;
}
.menu {
	font-weight: bold;
}
.menu {
	font-size: 12px;
}
.menu {
	font-family: "MS Serif", "New York", serif;
}
.menu {
	font-family: "Courier New", Courier, monospace;
}
.menu {
	font-family: Georgia, "Times New Roman", Times, serif;
}
.menu {
	font-weight: normal;
}
.text .TEXT .menu .text .menu .menu .menu .menu .menu .menu .menu .menu {
	color: #F00;
}
.tt {
	color: #FFF;
}
.menu .text .TEXT .menu .text .menu .menu .menu .menu .menu .menu .menu .menu .text .menu {
	font-family: Verdana, Geneva, sans-serif;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFF;
}
a:hover {
	text-decoration: none;
	color: #F00;
}
a:active {
	text-decoration: none;
	color: #FFF;
}
.style3 {font-size: 11px; color: #000000; font-family: Geneva, Arial, Helvetica, sans-serif;}
.style6 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 11px; }
.style12 {color: #BCBCBC}
.style13 {color: #FFFFFF}
body {
	background-image: url();
	background-color: #000000;
}
.text1 {	color: #FFF;
	font: bold;
}
.text1 {	font-size: 12px;
}
.text1 {	font-family: "Comic Sans MS", cursive;
}
.text1 {	font-family: Verdana, Geneva, sans-serif;
}
.text1 {	color: #FFF;
}
</style>
<table width="900" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#F7F7F7">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999">
      <tr>
        <td><table width="100%" height="69" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td width="39%"><img src="images/logo.jpg" width="310" height="70" alt="Logo" /></td>
            <td width="61%"><table width="62%" height="70" border="0" align="right" cellpadding="3" cellspacing="2">
              <tr>
                <td height="27" class="style3">SHOPPING CART <span class="style12">NOW IN YOUR CART</span
><span class="style13">J</span>ITEM</td>
              </tr>
              <tr>
                <td align="right"><table width="57%" border="0" align="right" cellpadding="0" cellspacing="3">
                  <tr>
                    <td width="25%" align="center" id="tdb"><a href="logout.php">Logout </a></td>
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
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td height="39" bgcolor="#1B1B1B"><?php include "menu.php"; ?></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td><img src="images/sl.gif" alt="sline" width="960" height="2" align="baseline" /></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="#FFFFFF">
          <tr>
            <td align="center" valign="top"><form id="form1" name="form1" method="post" action="confirmShop.php">
              <table width="80%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                  <td align="center" id="tdb" class="td_border"><span style="color:#00FF00; font-family:Arial, Helvetica, sans-serif; font-size:14px;"><strong>Thank You <?php echo $customer->getTitle()." ".$customer->getName(); ?> This Is Your Generated Invoice<br />
                    Note That You Must Present This Invoice To Claim Your House.
                          <br />
                  You Now Have <?php echo $point->getPoints(); ?> Point(s)</strong></span></td>
                  </tr>
              
                <tr>
                  <td align="center" class="td_border"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                    <tr>
                      <td align="center"><strong>S/N</strong></td>
                      <td align="center"><strong>Product</strong></td>
                      <td align="center"><strong>Qty</strong></td>
                      <td align="center"><strong>Unit Price (Naira)</strong></td>
                      <td align="center"><strong>Discounted Unit Price (Naira)</strong></td>
                      <td align="center"><strong>Price (Naira)</strong></td>
                      <td align="center"><strong>Discounted Price (Naira)</strong></td>
                    </tr>
                    <?php
					$num = 1;$totalSum = 0;
					$totalSumDiscounted = 0;
					foreach($allSales as $sales)
				  {
					  $good = new Goods();
					  $good = $good->SelectSingle($sales->getGoodsId());
					?>
                    <tr>
                      <td align="center"><strong><?php echo $num;++$num; ?></strong></td>
                      <td align="center"><strong><?php echo $good->getGoods_name(); ?></strong></td>
                      <td align="center"><strong><?php echo  $sales->getNumber(); ?></strong></td>
                      <td align="center"><strong><?php echo $good->getGoods_selling_price(); ?></strong></td>
                      <td align="center"><strong><?php echo $good->getGoods_selling_price() - round((5/100)*$good->getGoods_selling_price()); ?></strong></td>
                      <td align="center"><strong><?php echo $sales->getTotalAmount(); $totalSum += $sales->getTotalAmount(); ?></strong></td>
                      <td align="center"><strong><?php echo ($good->getGoods_selling_price() - round((5/100)*$good->getGoods_selling_price())) * $sales->getNumber(); $totalSumDiscounted += (($good->getGoods_selling_price() - round((5/100)*$good->getGoods_selling_price())) * $sales->getNumber()); ?></strong></td>
                    </tr> 
                    <?php
				  }
				 
			  
				  ?>
                  <tr>
                      <td align="center" colspan="7"><hr style="width:100%; background-color:#000;" /></td>
                      </tr>
                       <tr>
                      <td align="right" colspan="7"><strong>Number Of Points Awarded For This Purchase = <?php echo $_SESSION['allPoints']." Points"; ?></strong></td>
                      </tr>
                      <tr>
                      <td align="right" colspan="7"><strong>Total Price = <?php echo $totalSum." Naira"; ?></strong></td>
                      </tr>
                      <tr>
                      <td align="right" colspan="7"><strong>Total Discounted Price = <?php echo $totalSumDiscounted." Naira"; ?></strong></td>
                      </tr>
                     
                  </table></td>
                  </tr>
                </table>
            </form></td>
            </tr>
            <tr>
            <td align="center" id="tdb"><a href="print.php" onclick="window.print() ;">Click Here To Print</a>| <a href="logout.php">Logout Here</a>| <a href="shop.php">Go Back To Shop</a></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td background="images/mm_bg_red.gif" bgcolor="#FFFFCC"><?php include 'cbashop.php' ?>&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
