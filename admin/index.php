<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Store Admin</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="maindiv">
<div class="header"><div>
  <h1>Online Store  Admin</h1></div>
<div class="menu"></div>
</div>
<div class="content">
<?php
if($_GET['msg']=="error")
{
?>
<div class="message error">Wrong username or Password !!</div>
<?php	
}
if($_GET['action']=="logout")
{
?>
<div class="message success">You have logged out Successfully !!</div>
<?php	
}
?>
<div>
<form method="post" action="classes/login.php"><table width="600" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
    <td colspan="2" align="left" valign="middle"><h2>Admin Login</h2></td>
    </tr>
  <tr>
    <td width="95" align="left" valign="middle"><strong>Username</strong></td>
    <td width="484" align="left" valign="middle"><label>
      <input type="text" name="login" id="login" />
    </label></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><strong>Password</strong></td>
    <td align="left" valign="middle"><label>
      <input type="password" name="password" id="password" />
    </label></td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle"><label>
      <input name="button" type="submit" class="grdnt pointer" id="button" value="Login" />
    </label></td>
  </tr>
</table></form>
</div>
</div>
<div class="footer"> Copyrights &copy;  All Rights Reserved. </div>
</div>
</body>
</html>
