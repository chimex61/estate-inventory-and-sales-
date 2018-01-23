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
$good = new Goods();
$tempTable = new Temptable();
if(isset($_POST['sub']))
{
	$points = 0;
	$allTemp = $tempTable->SelectByCustId($customer->getCust_id());
	if(!is_null($allTemp))
	{
		$allSales = array();
		foreach($allTemp as $tempTable)
		{
			$good = $good->SelectSingle($tempTable->getGoodsId());
			$sales = new Sales();
			$sales->setCust_id($customer->getCust_id());
			$sales->setDateTime(date("d-m-Y")."  ".date("g:i:s A"));
			$sales->setGoodsId($tempTable->getGoodsId());
			$num = "num".$tempTable->getGoodsId();
			$sales->setNumber($_POST[$num]);
			$points += $_POST[$num];
			$sales->setTotalAmount($sales->getNumber()*$good->getGoods_selling_price());
			$sales->Insert();
			$tempTable->Delete();
			$allSales[] = $sales;
		}
		$_SESSION['allSales'] = serialize($allSales);
		$_SESSION['allPoints'] = $points;
		Customer::TransitTo("print.php");
	}
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
</style>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
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
              <table width="60%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                  <td colspan="2" align="center" id="tdb" class="td_border"><span style="color:#00CC66; font-family:Arial, Helvetica, sans-serif; font-size:13px;"><strong>Thank You <?php echo $customer->getTitle()." ".$customer->getName(); ?> These Are Your Selected HOUSES For Purchase, Click Generate Invoice To Confirm Them</strong></span></td>
                  </tr>
              <?php
			  $allTemp = $tempTable->SelectByCustId($customer->getCust_id());
			  if(!is_null($allTemp))
			  {
				  foreach($allTemp as $tempTable)
				  {
					  $good = $good->SelectSingle($tempTable->getGoodsId());
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
                              <td valign="middle" class="td_border">Number To Buy</td>
                              <td align="center" valign="middle" class="td_border"><label for="num"></label>
                              <input name="num<?php echo $good->getGoods_id(); ?>" type="text" id="num" value="1" size="5" /></td>
                            </tr>
                          </table></td>
                  </tr>
                  
                  <?php
				  }
				  ?>
                  <tr>
                  <td colspan="2" align="center" class="td_border"><input name="sub" type="submit" id="sub" onclick="MM_validateForm('num','','RisNum');return document.MM_returnValue" value="Generate My Invoice" /></td>
                  </tr>
				  <?php
			  }
			  else
			  {
				  ?>
                <tr>
                  <td colspan="2" align="center" id="tdb" class="td_border"><span style="color:#F00; font-family:'Adobe Caslon Pro Bold', 'Adobe Caslon Pro', 'Adobe Garamond Pro', 'Adobe Garamond Pro Bold'; font-size:24px;">You Have Not Made Any Selection. Click <a href="shop.php">Here</a> To Go To Shop</span></td>
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
        <td background="images/mm_bg_red.gif" bgcolor="#FFFFCC"><?php include 'cbashop.php'; ?>&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
