<?php
if(!isset($_SESSION))session_start();
include("Libraries/Customer.php");
if(isset($_POST['sub']))
{
	$customer = new Customer();
	$customer->setAddress($_POST['address']);
	$customer->setEmail($_POST['email']);
	$customer->setName($_POST['name']);
	$customer->setPassword($_POST['password']);
	$customer->setPhone($_POST['phone']);
	$customer->setSex($_POST['sex']);
	$customer->setTitle($_POST['title']);
	$customer->setUsername($_POST['username']);
	$check = $customer->SelectByUsername($_POST['username']);
	$msg = "<span style='color:F00;'>";
	if(!is_null($check))
	{
		$msg .= "The Username '".$_POST['username']."' Already Exist In Our Database Please Choose Another One.";
	}
	else if($_POST['password'] != $_POST['confirmPassword'])
	{
		$msg .= "Your Password And Its Confirmation Must Be Equal.";
	}
	else
	{
		
		$customer->Insert();
		$msg.='<font color="green">'.$customer->getTitle()." ".$customer->getName()." Your Details Has Been Registered. ".'</font>';
	}
	$msg .=  "</span>";
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
.style16 {border: 1px solid #cccccc; color: #000000; }
.style19 {color: #00FF00}
</style>
<script type="text/javascript" language="javascript" src="new1.js">
<!--
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

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
//-->
</script>
<table width="900" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#F7F7F7">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999">
      <tr>
        <td><table width="100%" height="69" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td width="39%"><img src="images/logo.jpg" width="320" height="70" alt="Logo" /></td>
            <td width="61%"><table width="62%" height="70" border="0" align="right" cellpadding="3" cellspacing="2">
              <tr>
                <td height="27" class="style3">SHOPPING CART <span class="style12">NOW IN YOUR CART</span
><span class="style13">J</span>ITEM</td>
              </tr>
              <tr>
                <td align="right"><table width="57%" border="0" align="right" cellpadding="0" cellspacing="3">
                  <tr>
                    <td width="25%" align="center"><a href="login.php"><span  style="color:#CCC; font-size:9px; font-family:Verdana, Geneva, sans-serif;">LOG IN </span></a></td>
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
            <td width="40%" valign="top"><img src="images/banner1.jpg" width="310" height="267" alt="banner1" /></td>
            <td width="39%" valign="top"><form onsubmit= "return validateForm()" action="register.php" method="post" name="form1" class="style13" onsubmit="MM_validateForm('email','','RisEmail');return document.MM_returnValue">
              <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    
    <td colspan="3" class="td_border">Registration Form</td>
  </tr>
  <tr>
    <td class="td_border">Title</td>
    <td class="td_border">&nbsp;</td>
    <td class="td_border"><select name="title">
      <option value="Mr" selected="selected" >Mr</option>
      <option value="Mrs" >Mrs</option>
      <option value="Miss" >Miss</option>
      <option value="Engr" >Engr</option>
      <option value="Barr" >Barr</option>
      <option value="Dr" >Dr</option>
      <option value="Prof" >Prof</option>
      <option value="Hon" >Hon</option>
      <option value="Sen" >Sen</option>
    </select></td>
  </tr>
  <tr>
    <td class="style16">Name</td>
    <td class="td_border">&nbsp;</td>
    <td class="td_border"><input name="name" type="text" id="name" style=" padding:5px;" onfocus="this.value = '';"  size="40" /></td>
  </tr>
  <tr>
    <td class="td_border">Address</td>
    <td class="td_border">&nbsp;</td>
    <td class="td_border"><input name="address" type="text" id="address" style=" padding:5px;" onfocus="this.value = '';"  size="40" /></td>
  </tr>
  <tr>
    <td class="td_border">Username</td>
    <td class="td_border">&nbsp;</td>
    <td class="td_border"><input name="username" type="text" id="username" style=" padding:5px;" onfocus="this.value = '';" size="40" /></td>
  </tr>
  <tr>
    <td class="td_border">Password</td>
    <td class="td_border">&nbsp;</td>
    <td class="td_border"><input name="password" value="" type="password" id="password" style=" padding:5px;" onfocus="this.value = '';" size="40" /></td>
  </tr>
  <tr>
    <td class="td_border">Confirm Password</td>
    <td class="td_border">&nbsp;</td>
    <td class="td_border"><input name="confirmPassword" type="password" id="password" style=" padding:5px;" onfocus="this.value = '';" size="40" /></td>
  </tr>
  <tr>
    <td class="td_border">Phone</td>
    <td class="td_border">&nbsp;</td>
    <td class="td_border"><input name="phone" type="text" id="phone" style=" padding:5px;" onfocus="this.value = '';"  size="40" maxlength="11" /></td>
  </tr>
  <tr>
    <td class="td_border">E-Mail</td>
    <td class="td_border">&nbsp;</td>
    <td class="td_border"><input name="email" type="text" id="email" style=" padding:5px;" onfocus="this.value = '';"  size="40" /></td>
  </tr>
  <tr>
    <td class="td_border">Sex</td>
    <td class="td_border">&nbsp;</td>
    <td class="td_border"><select name="sex" size="1">
      <option value="Male" >Male</option>
      <option value="Female" >Female</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="3" class="td_border" align="center"><input name="sub" type="submit" onclick="MM_validateForm('name','','R','address','','R','username','','R','password','','R','password','','R','phone','','RisNum','email','','R');return document.MM_returnValue" value="Register" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" value="Clear Form" /></td>
  </tr>
</table>
</form></td>
            <td width="21%" valign="top"><img src="images/banner3.jpg" width="310" height="267" alt="banner3" /></td>
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
