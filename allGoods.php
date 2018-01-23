<?php
if(!isset($_SESSION))session_start();
include("Libraries/Admin.php");
if(!isset($_SESSION['admin']))
{
	Admin::TransitTo("index.php");
}
include("Libraries/Goods.php");
include("Libraries/Goodscategory.php");
include "Libraries/Sales.php";
$admin = new Admin();
$admin = unserialize($_SESSION['admin']);
$product = new Goods();
$category = new Goodscategory();
$sales = new Sales();
if(isset($_REQUEST['goodsId']) and isset($_REQUEST['actions']))
{
	$check = $sales->SelectByGoodsId($_REQUEST['goodsId']);
	if(is_null($check))
	{
		$product = $product->SelectSingle($_REQUEST['goodsId']);
		if(!is_null($product))
		{
			$product->Delete();
			$product = new Goods();
			Admin::TransitTo("allGoods.php");
		}
	}
	else
	{
		?>
        <script type="text/javascript">
		alert("You Can Not Delete This Product, Because Sales Had Been Made On It.Please Edit If You Want To Make Changes To IT.");
		</script>
        <?php
	}
}
?>
<script type="text/javascript" src="myJs.js"></script>

<style type="text/css">
.TEXT {
	color: #FFF;
}
.text {
	color: #FFF;
	font: bold;
}
#tdb a{
	color:#333;
	text-decoration:none;
}
.text {
	font-size: 12px;
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
.td_border
{
border:1px solid #cccccc;
}
.style3 {font-size: 11px; color: #000000; font-family: Geneva, Arial, Helvetica, sans-serif;}
.style6 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 11px; }
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
            <td width="39%"><img src="images/logo.jpg" width="310" height="70" alt="Logo" /></td>
            <td width="61%"><table width="62%" height="70" border="0" align="right" cellpadding="3" cellspacing="2">
              <tr>
                <td height="27" class="style3">HOWDY ADMIN</td>
              </tr>
              <tr>
                <td align="right"><table width="57%" border="0" align="right" cellpadding="0" cellspacing="3">
                  <tr>
                    <td width="25%" align="center"><a href="login.php"><span  style="color:#CCC; font-size:9px; font-family:Verdana, Geneva, sans-serif;">LOG OUT </span></a></td>
                    <td width="44%" align="center"><span class="style6">DEALST</span></td>
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
        <td height="39" bgcolor="#1B1B1B"><span style="color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:10px;">HOWDY ADMIN!</span></td>
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
        <td height="2"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="#FFFFFF">
          <tr>
            <td align="center" valign="middle" class="td_border"><table width="100%" border="0" cellspacing="4" cellpadding="3">
              <tr>
                <td align="center" id="tdb"><a href="cpanel.php">Back To Control Panel</a> | <a href="logOut.php">Logout</a></td>
              </tr>
              <tr>
                <td align="left">List Of All Available Condominiums</td>
              </tr>
              <tr>
                <td align="center"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="4">
                  <?php
		   $allGoods = $product->SelectAll();
		   if(!is_null($allGoods))
		   {
		   ?>
                  <tr>
                    <td align="center" class="td_border">S/N</td>
                    <td align="center" class="td_border"> Name</td>
                    <td align="center" class="td_border">Category</td>
                    <td align="center" class="td_border">Description</td>
                    
                    <td align="center" class="td_border">Price</td>
                    <td align="center" class="td_border">Selling Price</td>
                    <td align="center" class="td_border"> Availability</td>
                    <td align="center" class="td_border">Shot</td>
                    <td align="center" class="td_border">Edit</td>
                    <td align="center" class="td_border">Delete</td>
                  </tr>
                  <?php
			$num = 1;
			
			foreach($allGoods as $product)
			{
				$category = $category->SelectSingle($product->getGoods_cat_id());
				
			?>
                  <tr>
                    <td align="center" class="td_border"><?php echo $num; ?></td>
                    <td align="center" class="td_border"><?php echo $product->getGoods_name(); ?></td>
                    <td align="center" class="td_border"><?php echo (is_null($category))? "No Category": $category->getCat_name(); ?></td>
                    <td align="center" class="td_border"><?php echo $product->getGoods_description(); ?></td>
                    
                    <td align="center" class="td_border"><?php echo $product->getGoods_cost(); ?></td>
                    <td align="center" class="td_border"><?php echo $product->getGoods_selling_price(); ?></td>
                    <td align="center" class="td_border"><?php echo $product->getNumberInStock(); ?></td>
                    <td align="center" class="td_border"><img src="images/product_images/<?php echo $product->getGoodsPicture().".jpg"; ?>" width="120" height="120" /></td>
                    <td align="center" class="td_border" id="tdb"><a href="editGoods.php?goodsId=<?php echo $product->getGoods_id(); ?>&amp;action=Edit">Edit</a></td>
                    <td align="center" class="td_border" id="tdb"><a href="?goodsId=<?php echo $product->getGoods_id(); ?>&amp;actions=Delete" onclick="return ConfirmDelete('Product');">Delete</a></td>
                  </tr>
                  <?php
			++$num;
			}
		   }
		   else
		   {
			   ?>
                  <tr>
                    <td colspan="11" align="center" class="td_border"><span style="color:#F00; font-family:'Adobe Caslon Pro Bold', 'Adobe Caslon Pro', 'Adobe Garamond Pro', 'Adobe Garamond Pro Bold'; font-size:24px;">There Are No Data In The Database.</span></td>
                  </tr>
                  <?php
		   }
		   ?>
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
        <td background="images/mm_bg_red.gif" bgcolor="#1B1B1B"><?php include 'cbashop.php' ?>&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
