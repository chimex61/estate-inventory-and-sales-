<?php
if(!isset($_SESSION))session_start();
include("Libraries/Admin.php");
if(!isset($_SESSION['admin']))
{
	Admin::TransitTo("index.php");
}
$admin = new Admin();
$admin = unserialize($_SESSION['admin']);
if(isset($_POST['sub']))
{
	if($_POST['npass'] == $_POST['cnpass'])
	{
		if($_POST['cpass'] == $admin->getAdmin_password())
		{
			$admin->setAdmin_password($_POST['npass']);
			$admin->Update();
			$_SESSION['admin'] = serialize($admin);
			$_SESSION['msg'] == "Password Changed Successfully.";
			Admin::TransitTo("cpanel.php");
		}
		else
		{
			?>
        <script type="text/javascript">alert("Your Current Password Is Invalid.");</script>
        <?php
		}
	}
	else
	{
		?>
        <script type="text/javascript">alert("New Password And Its Confirmation Must Be Equal.");</script>
        <?php
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
.style7 {border: 1px solid #cccccc; color: #000000; }
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
                <td colspan="3" align="center" class="td_border" id="tdb"><form id="form1" name="form1" method="post" action="chgPass.php">
                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                    <tr>
                      <td class="td_border">Current Password</td>
                      <td  class="td_border">&nbsp;</td>
                      <td class="td_border"><label for="cpass"></label>
                        <input type="password" name="cpass" id="cpass" style="padding:5px;" /></td>
                    </tr>
                    <tr>
                      <td  class="style7">New Password</td>
                      <td class="style7">&nbsp;</td>
                      <td class="td_border"><input name="npass" type="password" id="npass" style="padding:5px;" /></td>
                    </tr>
                    <tr>
                      <td  class="style7">Confirm Password</td>
                      <td class="style7">&nbsp;</td>
                      <td class="td_border"><input name="cnpass" type="password" id="cnpass" style="padding:5px;" /></td>
                    </tr>
                    <tr>
                      <td colspan="3" align="center" class="td_border"><input name="sub" type="submit" id="sub" onclick="MM_validateForm('cpass','','R','npass','','R','cnpass','','R');return document.MM_returnValue" value="Change Password" /></td>
                      </tr>
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
