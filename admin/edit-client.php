<?php
session_start();
include("auth.php");
include("header.php");
if($_GET['clientid']=='')
{
header("Location:view-clients.php");	
}
$company=mysql_query("select id,clientName,clientWebsite,aboutCompany from clients where id=".$_GET['clientid']."");
$clintdetails=mysql_fetch_array($company);
?>
<div class="content">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td align="left" valign="top"><h2>Edit Clients</h2></td>
  </tr>
  <tr>
    <td align="center" valign="top">
    <div>
    <?php 
	if(isset($_REQUEST['updateclient']))
	{
	$sqlupdate=mysql_query("UPDATE `clients` SET `clientName` = '".$_POST['companyName']."',
`aboutCompany` = '".$_POST['aboutCompany']."',
`clientWebsite` = '".$_POST['companyWebsite']."',
`date` = '".date('d-m-y')."' WHERE `clients`.`id` =".$_GET['clientid']." LIMIT 1 ;
");
/*	$sqlupdate=mysql_query("UPDATE `storeproducts` SET `productName` = 'Ttitle Onesdf',
`location` = 'sasfasfasfasfsdf',
`image` = 'productImages.jpgsdf',
`description` = 'Avoid space, Special Character and Duplicate name for Prdouct Imagesdf',
`dateofpost` = '27-04-20122' WHERE `storeproducts`.`id` =1 LIMIT 1 ;
");*/
	if($sqlupdate)
	{
		?>
        <div class="message success">Client Updated Sucessfully !!</div>
        <?php
	}else
	{
	?>
        <div class="message error">Error unable to Update Client !!</div>
    <?php	
	}
	}
	?>
    </div>
    <div><form method="post"><table width="600" border="0" align="center" cellpadding="3" cellspacing="3">
      <tr>
        <td width="134" align="right" valign="middle"><strong>Company Name :</strong></td>
        <td width="245" align="left" valign="middle"><label>
          <input name="companyName" type="text" class="textfield" id="companyName" value="<?php echo $clintdetails['clientName']; ?>" />
        </label></td>
      </tr>
      <tr>
        <td width="134" align="right" valign="middle"><strong>Company Website:</strong></td>
        <td width="245" align="left" valign="middle"><div><label>
          <input name="companyWebsite" type="text" class="textfield" id="companyWebsite" value="<?php echo $clintdetails['clientWebsite']; ?>" />
        </label></div>
        <div class="mesg">Eg., http://www.website.com/</div>
        </td>
      </tr>
      <tr>
        <td width="134" align="right" valign="middle"><strong>Company Website:</strong></td>
        <td width="245" align="left" valign="middle"><label>
          <textarea name="aboutCompany" rows="4" class="textfield " id="aboutCompany"><?php echo $clintdetails['aboutCompany']; ?></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle"><label>
          <input name="updateclient" type="submit" class="grdnt pointer" id="updateclient" value="Update Now" />
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
