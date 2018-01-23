<?php
if(!isset($_SESSION))session_start();
include("Libraries/Admin.php");
if(!isset($_SESSION['admin']))
{
	Admin::TransitTo("index.php");
}
$admin = new Admin();
$admin = unserialize($_SESSION['admin']);
include("Libraries/Goodscategory.php");
$category = new Goodscategory();
if(isset($_POST['sub']))
{
	$check = $category->SelectByCat_name($_POST['category']);
	if(is_null($check))
	{
		$category->setCat_name($_POST['category']);
		$category->Insert();
		$msg = $category->getCat_name()." Set Successfully.";
	}
	else
	{
		$msg = "The Category Name ".$_POST['category']."Already Exist.";
	}
}

if(isset($_REQUEST['delete']) and isset($_REQUEST['cat_id']))
{
	$category = $category->SelectSingle($_REQUEST['cat_id']);
	if(!is_null($category))
	{
		$category->Delete();
		header("location:category.php");
	}
	
}
if(isset($_REQUEST['edit']) and isset($_REQUEST['cat_id']))
{
	$category = $category->SelectSingle($_REQUEST['cat_id']);
	if(!is_null($category))
	{
		$_SESSION['catId'] = $category->getGoods_cat_id();
	 	$_SESSION['catName'] = $category->getCat_name();
	}
	else
	{
		header("location:category.php");
	}
}
if(isset($_POST['update']) and isset($_SESSION['catId']))
{
	$category = $category->SelectSingle($_SESSION['catId']);
	if(!is_null($category))
	{
		$category->setCat_name($_POST['Editcategory']);
		$category->Update();
	}
	header("location:category.php");
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
                <td height="27" class="style3">WELCOME ADMINISTRATOR</td>
              </tr>
              <tr>
                <td align="right"><table width="57%" border="0" align="right" cellpadding="0" cellspacing="3">
                  <tr>
                    <td width="25%" align="center"><a href="login.php"><span  style="color:#CCC; font-size:9px; font-family:Verdana, Geneva, sans-serif;">LOG OUT </span></a></td>
                    <td width="44%" align="center">DEALS</td>
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
        <td height="39" bgcolor="#1B1B1B"><span style="color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:10px;">WELCOME ADMIN</span></td>
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
            <td align="center" valign="middle" class="td_border"><form id="form1" name="form1" method="post" action="category.php">
        <table width="100%" border="0" cellspacing="4" cellpadding="3">
          <tr>
          <td align="center" id="tdb"><a href="cpanel.php">Back To Control Panel</a> | <a href="logOut.php">Logout</a></td>
        </tr>
        <?php
		if(!isset($_REQUEST['edit']))
		{
			?>
          <tr>
            <td align="center" valign="top" class="td_border"><table width="50%" border="0" cellspacing="4" cellpadding="3">
              <tr>
                <td colspan="2" align="center" bgcolor="#1B1B1B" class="td_border"><span style="color:#FFF; font-size:16px; font-family:'Adobe Caslon Pro Bold', 'Adobe Caslon Pro', 'Adobe Garamond Pro', 'Adobe Garamond Pro Bold'; ">Type The Category Name To Set New Category.</span></td>
              </tr>
              <tr>
                <td align="right" class="td_border">Category</td>
                <td class="td_border"><label for="category"></label>
                  <input type="text" name="category" id="category" /></td>
              </tr>
              <tr>
                <td colspan="2" align="center" class="td_border"><input name="sub" type="submit" id="sub" onclick="MM_validateForm('category','','R');return document.MM_returnValue" value="Register Category" /></td>
              </tr>
            </table></td>
          </tr>
          <?php 
		}
		  else
		  {
		  
		  ?>
          <tr>
            <td align="center" valign="top" class="td_border"><table width="50%" border="0" cellspacing="4" cellpadding="3">
              <tr>
                <td colspan="2" align="center" bgcolor="#1B1B1B" class="td_border"><span style="color:#FFF; font-size:16px; font-family:'Adobe Caslon Pro Bold', 'Adobe Caslon Pro', 'Adobe Garamond Pro', 'Adobe Garamond Pro Bold'; ">Edit The Category Name To Update The Category.</span></td>
              </tr>
              <tr>
                <td align="right" class="td_border">Category</td>
                <td class="td_border"><label for="Editcategory"></label>
                  <input type="text" name="Editcategory" id="Editcategory" /></td>
              </tr>
              <tr>
                <td colspan="2" align="center" class="td_border"><input name="update" type="submit" id="update" onclick="MM_validateForm('Editcategory','','R');return document.MM_returnValue" value="Update Category" /></td>
              </tr>
            </table></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <td align="center" valign="top" class="td_border"><table width="50%" border="0" cellspacing="4" cellpadding="3">
              <tr>
                <td colspan="4" align="left" class="td_border">List Of All Categories</td>
                </tr>
                <?php
				$allCategory = $category->SelectAll();
				
				if(!is_null($allCategory))
				{
					
				?>
              <tr>
                <td align="center" class="td_border">S/N</td>
                <td align="center" class="td_border">Category</td>
                <td align="center" class="td_border">Edit</td>
                <td align="center" class="td_border">Delete</td>
              </tr>
              <?php
			  $num=1;
			  foreach($allCategory as $category)
			  {
			  ?>
              <tr>
                <td align="center" class="td_border"><?php echo $num; ?></td>
                <td align="center" class="td_border"><?php echo $category->getCat_name(); ?></td>
                <td align="center" class="td_border" id="tdb"><a href="?edit=Edit&cat_id=<?php echo $category->getGoods_cat_id(); ?>">Edit</a></td>
                <td align="center" class="td_border" id="tdb"><a href="?delete=Delete&cat_id=<?php echo $category->getGoods_cat_id(); ?>" onclick="return ConfirmDelete('Category');">Delete</a></td>
              </tr>
              <?php
			  ++$num;
			  }
				}
				else
				{
              ?>
              <tr>
                <td colspan="4" align="center" class="td_border"><span style="color:#F00; font-size:18px; font-family:'Adobe Caslon Pro Bold', 'Adobe Caslon Pro', 'Adobe Garamond Pro', 'Adobe Garamond Pro Bold';">There Are No Categories In The Database.</span></td>
                </tr>
                <?php
				}
				?>
            </table></td>
          </tr>
        </table>
      </form></td>
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
