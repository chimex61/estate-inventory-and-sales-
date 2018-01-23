<?php
if(!isset($_SESSION))session_start();
include("Libraries/Admin.php");
if(!isset($_SESSION['admin']))
{
	Admin::TransitTo("index.php");
}
$admin = new Admin();
$admin = unserialize($_SESSION['admin']);
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
            <td align="center" valign="middle" class="td_border"><table width="50%" border="0">
              <tr>
                <td colspan="3" align="center" class="td_border">Admin Control Panel</td>
                </tr>
              <tr>
                <td align="center" class="td_border" id="tdb"><a href="logout.php"><img src="images/adminpass_32.png" width="32" height="32" /><br />
                  Logout</a></td>
                <td align="center" class="td_border" id="tdb"><a href="manUsers.php"><img src="images/fileinspector_32.png" width="32" height="32" /><br />
                  View And Manage Customers</a></td>
                <td align="center" class="td_border" id="tdb"><a href="goods.php"><img src="images/custom_32.png" width="32" height="32" /><br />
                  Register Housess</a></td>
              </tr>
              <tr>
                <td align="center" class="td_border" id="tdb"><a href="category.php"><img src="images/custom_32.png" alt="" width="32" height="32" /><br />
Register Houses Category</a></td>
                <td align="center" class="td_border" id="tdb"><a href="allGoods.php"><img src="images/comments_32.png" alt="" width="32" height="32" /><br />
View And Manage Housess</a></td>
                <td align="center" class="td_border" id="tdb"><a href="allSales.php"><img src="images/fileinspector_32.png" width="32" height="32" /><br />
View All Sales</a></td>
              </tr>
              <tr>
                <td align="center" class="td_border" id="tdb"><a href="points.php"><img src="images/comments_32.png" width="32" height="32" /><br />
                  Create Discount</a></td>
                <td align="center" class="td_border" id="tdb">&nbsp;</td>
                <td align="center" class="td_border" id="tdb"><a href="chgPass.php"><img src="images/adminpass_32.png" width="32" height="32" /><br />
Change Admin Password</a></td>
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
