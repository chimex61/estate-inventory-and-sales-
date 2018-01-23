<?php
if(!isset($_SESSION))session_start();
include("Libraries/Admin.php");
if(isset($_POST['sub']))
{
	$admin = new Admin();
	$msg = "<span style='color:F00;'>";
	$check = $admin->SelectByAdmin_username($_POST['username']);
	if(!is_null($check) and count($check) == 1)
	{
		$admin = $check[0];
		if($admin->getAdmin_password() == $_POST['password'])
		{
			$_SESSION['admin'] = serialize($admin);
			Admin::TransitTo("cpanel.php");
		}
		else
		{
			$msg .= "Invalid Admin Username Or Password";
		}
	}
	else
	{
		$msg .= "Invalid Admin Username Or Password";
	}
	$msg .= "</span>";
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
.style12 {color: #BCBCBC}
.style13 {color: #FFFFFF}
body {
	background-image: url();
	background-color: #000000;
}
.style15 {border: 1px solid #cccccc; color: #000000; font-family: Arial, Helvetica, sans-serif; }
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
                <td height="27" class="style3"> CART <span class="style12">NOW IN YOUR CART</span
><span class="style13">J</span>ITEM</td>
              </tr>
              <tr>
                <td align="right"><table width="57%" border="0" align="right" cellpadding="0" cellspacing="3">
                  <tr>
                    <td width="25%" align="center"><a href="login.php"><span  style="color:#CCC; font-size:9px; font-family:Verdana, Geneva, sans-serif;">LOG IN </span></a></td>
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
        <td height="39" bgcolor="#1B1B1B"><?php include"menu.php"; ?></td>
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
            <td width="40%"><img src="images/banner1.jpg" width="310" height="267" alt="banner1" /></td>
            <td width="39%" valign="top"><form action="adminLogin.php" method="post"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    
    <td colspan="3" class="td_border"></td>
  </tr>
  <tr>
    <td class="style15"> Username</td>
    <td class="style15">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="td_border"><input name="username" type="text" style="padding:5px;" onfocus="this.value = '';" value="Username" size="40" /></td>
  </tr>
  <tr>
    <td class="style15"> Password</td>
    <td class="style15">&nbsp;</td>
    <td class="td_border"><input name="password" type="password" id="password" style="padding:5px;" onfocus="this.value = '';" value="password" size="40" /></td>
  </tr>
  <tr>
    <td colspan="3" class="td_border" align="center"><input name="sub" type="submit" value="Login" /></td>
  </tr>
</table>
</form></td>
            <td width="21%"><img src="images/banner3.jpg" width="310" height="267" alt="banner3" /></td>
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
