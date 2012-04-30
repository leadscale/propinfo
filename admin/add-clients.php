<?php
session_start();
include("auth.php");
include("header.php");
?>
<div class="content">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td align="left" valign="top"><h2>Add Company</h2></td>
  </tr>
  <tr>
    <td align="center" valign="top">
    <div>
    <?php 
	if(isset($_REQUEST['addclient']))
	{
	$sqlinsert=mysql_query("INSERT INTO `clients` (`id`, `clientName`, `aboutCompany`, `clientWebsite`, `date`) VALUES ('', '".$_POST['companyName']."', '".$_POST['aboutCompany']."', '".$_POST['companyWebsite']."', '".date('d-m-y')."');");
	if($sqlinsert)
	{
		?>
        <div class="message success">Client Added Sucessfully !!</div>
        <?php
	}else
	{
	?>
        <div class="message error">Error unable to add Client !!</div>
    <?php	
	}
	}
	?>
    </div>
    <div><form method="post"><table width="600" border="0" align="center" cellpadding="3" cellspacing="3">
      <tr>
        <td width="134" align="right" valign="middle"><strong>Company Name :</strong></td>
        <td width="245" align="left" valign="middle"><label>
          <input name="companyName" type="text" class="textfield" id="companyName" />
        </label></td>
      </tr>
      <tr>
        <td width="134" align="right" valign="middle"><strong>Company Website:</strong></td>
        <td width="245" align="left" valign="middle"><div><label>
          <input name="companyWebsite" type="text" class="textfield" id="companyWebsite" />
        </label></div>
        <div class="mesg">Eg., www.website.com/</div>
        </td>
      </tr>
      <tr>
        <td width="134" align="right" valign="middle"><strong>About Client:</strong></td>
        <td width="245" align="left" valign="middle"><label>
          <textarea name="aboutCompany" rows="4" class="textfield " id="aboutCompany"></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle"><label>
          <input name="addclient" type="submit" class="grdnt pointer" id="addclient" value="Add Now" />
        </label></td>
      </tr>
    </table></form></div></td>
  </tr>
</table>
</div>
<div class="footer"> Copyrights &copy;  All Rights Reserved. </div>
</div>
</body>
</html>
