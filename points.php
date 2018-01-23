<?php
if(!isset($_SESSION))session_start();
include("Libraries/Admin.php");
if(!isset($_SESSION['admin']))
{
	Admin::TransitTo("index.php");
}
$admin = new Admin();
$admin = unserialize($_SESSION['admin']);
include"Libraries/Pointsvalue.php";
$points = new Pointsvalue();
if(isset($_POST['sub']))
{
	$check = $points->SelectByPointStart($_POST['point']);
	if(is_null($check))
	{
		$points->setDiscount($_POST['discount']);
		$points->setPointStart($_POST['point']);
		$points->setGift($_POST['gift']);
		$points->Insert();
		$msg = "Point And Its Value Set Successfully.";
	}
	else
	{
		$msg = "The Ponit ".$_POST['point']."Already Exist.";
	}
}

if(isset($_REQUEST['delete']) and isset($_REQUEST['cat_id']))
{
	$points = $points->SelectSingle($_REQUEST['cat_id']);
	if(!is_null($points))
	{
		$points->Delete();
		Pointsvalue::TransitTo("points.php");
	}
	
}
if(isset($_REQUEST['edit']) and isset($_REQUEST['cat_id']))
{
	$points = $points->SelectSingle($_REQUEST['cat_id']);
	if(!is_null($points))
	{
		$_SESSION['catId'] = $points->getValueId();
	 	$_SESSION['catName'] = $points->getPointStart();
		$_SESSION['discount'] = $points->getDiscount();
		$_SESSION['gift'] = $points->getGift();
	}
	else
	{
		Pointsvalue::TransitTo("points.php");
	}
}
if(isset($_POST['update']) and isset($_SESSION['catId']))
{
	$points = $points->SelectSingle($_SESSION['catId']);
	if(!is_null($points))
	{
		$points->setPointStart($_POST['Editpoint']);
		$points->setDiscount($_POST['Editdiscount']);
		$points->setGift($_POST['Editgift']);
		$points->Update();
	}
	Pointsvalue::TransitTo("points.php");
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
            <td align="center" valign="middle" class="td_border"><form id="form1" name="form1" method="post" action="points.php">
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
                <td colspan="2" align="center" bgcolor="#1B1B1B" class="td_border"><span style="color:#FFF; font-size:16px; font-family:'Adobe Caslon Pro Bold', 'Adobe Caslon Pro', 'Adobe Garamond Pro', 'Adobe Garamond Pro Bold'; ">Enter The New Points And Its Discount</span></td>
              </tr>
              <tr>
                <td align="right" class="td_border">Start Points</td>
                <td class="td_border"><label for="point"></label>
                  <input type="text" name="point" id="point" /></td>
              </tr>
              <tr>
                <td align="right" class="td_border">Discount (%)</td>
                <td class="td_border"><label for="point"></label>
                  <input type="text" name="discount" id="discount" /></td>
              </tr>
              <tr>
                <td align="right" class="td_border">Gift</td>
                <td class="td_border"><label for="point"></label>
                  <input type="text" name="gift" id="gift" /></td>
              </tr>
              <tr>
                <td colspan="2" align="center" class="td_border"><input name="sub" type="submit" id="sub" onclick="MM_validateForm('point','','RisNum','discount','','RisNum','gift','','R');return document.MM_returnValue" value="Register Point Value" /></td>
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
                <td colspan="2" align="center" bgcolor="#1B1B1B" class="td_border"><span style="color:#FFF; font-size:16px; font-family:'Adobe Caslon Pro Bold', 'Adobe Caslon Pro', 'Adobe Garamond Pro', 'Adobe Garamond Pro Bold'; ">Edit The Start Point And The Discount Value.</span></td>
              </tr>
              <tr>
                <td align="right" class="td_border">Start Points</td>
                <td class="td_border"><label for="Editgift"></label>
                  <input type="text" name="Editpoint" id="Editpoint" /></td>
              </tr>
              <tr>
                <td align="right" class="td_border">Discount (%)</td>
                <td class="td_border"><label for="Editgift"></label>
                  <input type="text"s name="Editdiscount" id="Editdiscount" /></td>
              </tr>
              <tr>
                <td align="right" class="td_border">Gift</td>
                <td class="td_border"><label for="Editgift"></label>
                  <input type="text" name="Editgift" id="Editgift" /></td>
              </tr>
              <tr>
                <td colspan="2" align="center" class="td_border"><input name="update" type="submit" id="update" onclick="MM_validateForm('Editpoint','','R','Editdiscount','','R');return document.MM_returnValue" value="Update Category" /></td>
              </tr>
            </table></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <td align="center" valign="top" class="td_border"><table width="50%" border="0" cellspacing="4" cellpadding="3">
              <tr>
                <td colspan="6" align="left" class="td_border">List Of All Points And Their Discount Value</td>
                </tr>
                <?php
				$allPoints = $points->SelectAll();
				
				if(!is_null($allPoints))
				{
					
				?>
              <tr>
                <td align="center" class="td_border">S/N</td>
                <td align="center" class="td_border">Points</td>
                <td align="center" class="td_border">Discount Value (%)</td>
                <td align="center" class="td_border">Gift</td>
                <td align="center" class="td_border">Edit</td>
                <td align="center" class="td_border">Delete</td>
              </tr>
              <?php
			  $num=1;
			  foreach($allPoints as $points)
			  {
			  ?>
              <tr>
                <td align="center" class="td_border"><?php echo $num; ?></td>
                <td align="center" class="td_border"><?php echo $points->getPointStart(); ?></td>
                <td align="center" class="td_border"><?php echo $points->getDiscount(); ?></td>
                <td align="center" class="td_border"><?php echo $points->getGift(); ?></td>
                <td align="center" class="td_border" id="tdb"><a href="?edit=Edit&cat_id=<?php echo $points->getValueId(); ?>">Edit</a></td>
                <td align="center" class="td_border" id="tdb"><a href="?delete=Delete&cat_id=<?php echo $points->getValueId(); ?>" onclick="return ConfirmDelete('Point And Its Value');">Delete</a></td>
              </tr>
              <?php
			  ++$num;
			  }
				}
				else
				{
              ?>
              <tr>
                <td colspan="6" align="center" class="td_border"><span style="color:#F00; font-size:18px; font-family:'Adobe Caslon Pro Bold', 'Adobe Caslon Pro', 'Adobe Garamond Pro', 'Adobe Garamond Pro Bold';">There Are No Points In The Database.</span></td>
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
