`<?php
if(!isset($_SESSION))session_start();
include("Libraries/Admin.php");
if(!isset($_SESSION['admin']))
{
	Admin::TransitTo("index.php");
}
$admin = new Admin();
$admin = unserialize($_SESSION['admin']);
if(!isset($_REQUEST['goodsId']))
{
	header("location:adminPage.php");
}


include "Libraries/Goods.php";
include"Libraries/Goodscategory.php";
$product = new Goods();
$product = $product->SelectSingle($_REQUEST['goodsId']);
if(isset($_POST['sub']) and !is_null($product))
{
	
	$product = $product->SelectSingle($_REQUEST['goodsId']);
	$imgName = "";
	if($_FILES['pics']['type']== "image/jpeg" and $_FILES['pics']['name'] != "")
	{
		$imgName = substr(sha1(time()*rand()),0,15);
		move_uploaded_file($_FILES['pics']['tmp_name'],"images/product_images/".$imgName.".jpg");
	}
	else
	{
		$imgName = $product->getGoodsPicture();
	}
	if(!is_null($product))
	{
		$product->setGoods_cost($_POST['costPrice']);
		$product->setGoods_cat_id($_POST['category']);
		$product->setGoods_description($_POST['desciption']);
		$product->setGoods_name($_POST['name']);
		$product->setNumberInStock($_POST['quantity']);
		$product->setGoods_selling_price($_POST['sellingPrice']);
		$product->setGoodsPicture($imgName);
		$product->setDateTimeEntered(date("d-m-Y")."  ".date("g:i:s A"));
		$product->Update();
		$msg = "Product Updated Successfully.";
		
	}
	else
	{
		header("location:cpanel.php");
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
                <td height="27" class="style3">WELCOME ADMINISTRATOR</td>
              </tr>
              <tr>
                <td align="right"><table width="57%" border="0" align="right" cellpadding="0" cellspacing="3">
                  <tr>
                    <td width="25%" align="center"><a href="login.php"><span  style="color:#CCC; font-size:9px; font-family:Verdana, Geneva, sans-serif;">LOG OUT </span></a></td>
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
        <td height="39" bgcolor="#1B1B1B"><span style="color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:10px;">WELCOME ADMINISTRATOR</span></td>
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
            <td align="center" valign="middle" class="td_border"><table width="60%" border="0" cellspacing="4" cellpadding="3">
              <tr>
                <td align="center" id="tdb"><a href="cpanel.php">Back To Control Panel</a> | <a href="logOut.php">Logout</a></td>
              </tr>
              <tr>
                <td align="center"><form action="editGoods.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                  <table width="80%" border="0" align="center" cellpadding="3" cellspacing="4">
                    <tr>
                      <td colspan="2" align="center" bgcolor="#3E4095" class="td_border"><span style="color:#FFF; font-size:18px; font-family:'Adobe Caslon Pro Bold', 'Adobe Caslon Pro', 'Adobe Garamond Pro', 'Adobe Garamond Pro Bold';"> <?php echo ($msg == "")? "Supply The Details Of The Product You Want To Register.": "Message : ".$msg; ?></span></td>
                    </tr>
                    <tr>
                      <td align="right" class="td_border">Name</td>
                      <td class="td_border"><input name="name" type="text" id="name" size="40" value="<?php echo $product->getGoods_name(); ?>" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="td_border">Category</td>
                      <td class="td_border"><label for="category"></label>
                        <select name="category" size="1" id="category">
                          <option value="0">None</option>
                          <?php
				  $category = new Goodscategory();
				  $allCategory = $category->SelectAll();
				  if(!is_null($allCategory))
				  {
					  foreach($allCategory as $category)
					  {
						  ?>
                          <option value="<?php echo $category->getGoods_cat_id(); ?>" <?php echo ($product->getGoods_cat_id()== $category->getGoods_cat_id())? "Selected": ""; ?> ><?php echo $category->getCat_name()  ?></option>
                          <?php
					  }
				  }
				  ?>
                        </select></td>
                    </tr>
                    <tr>
                      <td align="right" class="td_border">Quantity</td>
                      <td class="td_border"><label for="quantity"></label>
                        <input name="quantity" type="text" id="quantity" size="40" value="<?php echo $product->getNumberInStock(); ?>" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="td_border">Cost Price</td>
                      <td class="td_border"><input name="costPrice" type="text" id="costPrice" size="40" value="<?php echo $product->getGoods_cost(); ?>" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="td_border">Selling Price</td>
                      <td class="td_border"><input name="sellingPrice" type="text" id="sellingPrice" size="40" value="<?php echo $product->getGoods_selling_price(); ?>" /></td>
                    </tr>
                   
                    <!-- Remove Comments To Add Description<tr>
                <td align="right" class="td_border">Product Description</td>
                <td class="td_border"><label for="desciption"></label>
                  <textarea name="desciption" id="desciption" cols="35" rows="5"><?php //echo $product->getProduct_description(); ?></textarea></td>
              </tr>-->
                    <tr>
                      <td align="right" class="td_border">Description</td>
                      <td class="td_border"><label for="desciption"></label>
                        <label for="desciption"></label>
                        <input name="desciption" type="text" id="desciption" size="40" value="<?php echo $product->getGoods_description(); ?>" /></td>
                    </tr>
                     <tr>
                      <td align="right" class="td_border">Picture</td>
                      <td class="td_border"><label for="pics"></label>
                        <input type="file" name="pics" id="pics" /></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" class="td_border"><input name="sub" type="submit" id="sub" onclick="MM_validateForm('name','','R','quantity','','RisNum','costPrice','','RisNum','sellingPrice','','RisNum','desciption','','R');return document.MM_returnValue" value="Create User" />
                        <input type="hidden" name="goodsId" id="goodsId" value="<?php echo $_REQUEST['goodsId']; ?>" /></td>
                    </tr>
                  </table>
                  <table width="80%" border="0" align="center" cellpadding="3" cellspacing="4">
                    <tr> </tr>
                  </table>
                </form></td>
              </tr>
            </table></td>
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
