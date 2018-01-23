<?php
if(!isset($_SESSION))session_start();
include "Libraries/Customer.php";
if(!isset($_SESSION['customer']))
{
	$_SESSION['noAccess'] = "<span style=\"color:#F00; font-family:'Adobe Caslon Pro Bold', 'Adobe Caslon Pro', 'Adobe Garamond Pro', 'Adobe Garamond Pro Bold'; font-size:13px;\">You Need To Login To Access This Page.</span>";
	Customer::TransitTo("login.php");
}
$customer = new Customer();
$customer = unserialize($_SESSION['customer']);
include("Libraries/Goods.php");
include("Libraries/Goodscategory.php");
include("Libraries/Temptable.php");
include("Libraries/Sales.php");
include"Libraries/Points.php";
$good = new Goods();
$tempTable = new Temptable();

if(isset($_REQUEST['action']) and isset($_REQUEST['Product_id']))
{
	$tempTable = new Temptable();
	$good  = $good->SelectSingle($_REQUEST['Product_id']);
	if(!is_null($good))
	{
		$tempTable->setCustId($customer->getCust_id());
		$tempTable->setGoodsId($_REQUEST['Product_id']);
		$num = "num".$_REQUEST['Product_id'];
		$tempTable->setNumber($_POST[$num]);
		$tempTable->setTotalAmount($good->getGoods_selling_price() * $tempTable->getNumber());
		$tempTable->Insert();
		Temptable::TransitTo("shop.php");
	}
	else
	{
		$good = new Goods();
	}
}
else if(isset($_REQUEST['actions']) and isset($_REQUEST['Product_id']))
{
	$tempTable = new Temptable();
	$good = $good->SelectSingle($_REQUEST['Product_id']);
	if(!is_null($good))
	{
		$temps = $tempTable->SelectWithCondition("Select * from temptable where goodsId = '".$_REQUEST['Product_id']."' and custId = '".$customer->getCust_id()."'");
		if(!is_null($temps))
		{
			$tempTable = $temps[0];
			$tempTable->Delete();
			Temptable::TransitTo("shop.php");
		}
	}
	else
	{
		$good = new Goods();
	}
}
$point = new Points();
$points = $point->SelectByCust_id($customer->getCust_id());
if(is_null($points))
{
	$point->setCust_id($customer->getCust_id());
	$point->setPoints(0);
	$point->Insert();
	$points = $point->SelectByCust_id($customer->getCust_id());
}
$point = $points[0];
$_SESSION['points'] = serialize($point);
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
</style>
<table width="900" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#F7F7F7">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999">
      <tr>
        <td><table width="100%" height="69" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td width="39%"><img src="images/logo.jpg" width="410" height="70" alt="Logo" /></td>
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
            <td align="center" valign="top"><form id="form1" name="form1" method="post" action="shop.php">
              <table width="60%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                  <td colspan="2" align="center" id="tdb" class="td_border"><span style="color:#00FF00; font-family:'Adobe Caslon Pro Bold', 'Adobe Caslon Pro', 'Adobe Garamond Pro', 'Adobe Garamond Pro Bold'; font-size:14px;">Welcome <br />
<br />
                  </span></td>
                  </tr>
              <?php
			  $allGoods = $good->SelectAll();
			  if(!is_null($allGoods))
			  {
				  foreach($allGoods as $good)
				  {
			  ?>
                <tr>
                  <td width="29%" align="center" class="td_border"><img src="images/product_images/<?php echo $good->getGoodsPicture().".jpg"; ?>" width="148" height="148" /></td>
                  <td width="71%" align="center" class="td_border"><table width="100%" border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td width="36%" align="left" valign="middle" class="td_border"><span style="font-size:14px; font:Georgia, 'Times New Roman', Times, serif; color:#1B1B1B;">Name</span></td>
                              <td width="64%" align="center" valign="middle" class="td_border"><span style="font-size:14px; font:Georgia, 'Times New Roman', Times, serif; color:#1B1B1B;"><?php echo $good->getGoods_name(); ?></span></td>
                            </tr>
                            <tr>
                              <td align="left" valign="middle" class="td_border"><span style="font-size:14px; font:Georgia, 'Times New Roman', Times, serif; color:#1B1B1B;">Description</span></td>
                              <td align="center" valign="middle" class="td_border"><span style="font-size:14px; font:Georgia, 'Times New Roman', Times, serif; color:#1B1B1B;"><?php echo $good->getGoods_description();?></span></td>
                            </tr>
                            <tr>
                              <td align="left" valign="middle" class="td_border"><span style="font-size:14px; font:Georgia, 'Times New Roman', Times, serif; color:#1B1B1B;">Number Available</span></td>
                              <td align="center" valign="middle" class="td_border"><span style="font-size:14px; font:Georgia, 'Times New Roman', Times, serif; color:#1B1B1B;"><?php echo $good->getNumberInStock(); ?></span></td>
                            </tr>
                            
                            <tr>
                              <td align="left" valign="middle" class="td_border"><span style="font-size:14px; font:Georgia, 'Times New Roman', Times, serif; color:#1B1B1B;">Price (Naira)</span></td>
                              <td align="center" valign="middle" class="td_border"><span style="font-size:14px; font:Georgia, 'Times New Roman', Times, serif; color:#1B1B1B;"><?php echo $good->getGoods_selling_price(); ?></span></td>
                            </tr>
                            <tr>
                              <td colspan="2" align="center" valign="middle" class="td_border"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="35%" align="center" class="td_border">
								  <a href="shop.php?actions=<?php echo "Remove From Cart"; ?> & Product_id=<?php echo $good->getGoods_id(); ?>"><abbr title="This Product has been Added To The Cart Click To Remove It."><img src="images/update_34x34.gif" alt="" width="34" height="34"  /></abbr></a><a href="shop.php?action=<?php echo "Add To Cart"; ?> & Product_id=<?php echo $good->getGoods_id(); ?> " ><abbr title="Add This Product To The Cart"><img src="images/shopping.gif" alt="" width="36" height="40"  /></abbr></a></td>
                                  <td align="center" class="td_border"><a href="confirmShop.php?action=<?php echo 'Selected Payment'; ?>"><abbr title="Pay For The Selected Product In The Cart"><img src="images/ylinksr_l.gif" width="35" height="38"  /></abbr></a></td>
                                  </tr>
                              </table></td>
                            </tr>
                          </table></td>
                  </tr>
                  <?php
				  }
			  }
			  else
			  {
				  ?>
                <tr>
                  <td colspan="2" align="center" class="td_border"><span style="color:#F00; font-family:'Adobe Caslon Pro Bold', 'Adobe Caslon Pro', 'Adobe Garamond Pro', 'Adobe Garamond Pro Bold'; font-size:24px;">No Available House For Sale.</span></td>
                  </tr>
                  <?php
			  }
			  ?>
                </table>
            </form></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td background="images/mm_bg_red.gif" bgcolor="#FFFFCC">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
