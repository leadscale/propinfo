<?php
session_start();
include("auth.php");
include("header.php");

if($_GET['action']=="delete" && $_GET['deltid']!='')
{
$sqldelete=mysql_query("DELETE FROM `mystore`.`clients` WHERE `clients`.`id` = ".$_GET['deltid']." LIMIT 1");
if($sqldelete)
{
?>
        <div class="message success">Client Deleted Sucessfully !!</div>
<?php	
}else
{
?>
        <div class="message error">Error. unable to delete Client !!</div>
<?php
}
}
?>
<div class="content">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td align="left" valign="top"><h2>Edit/Delete Clients</h2></td>
  </tr>
  <tr>
    <td align="center" valign="top"><div><form method="post"><table width="600" border="0" align="center" cellpadding="3" cellspacing="3">
      <tr>
        <td width="53" align="center" valign="middle" bgcolor="#333333"><h4 class="whitetexts">S.N</h4></td>
        <td width="399" align="center" valign="middle" bgcolor="#333333"><span class="whitetexts">Client Name</span></td>
        <td width="55" align="center" valign="middle" bgcolor="#333333"><h4 class="whitetexts">Edit</h4></td>
        <td width="54" align="center" valign="middle" bgcolor="#333333"><h4 class="whitetexts">Delete</h4></td>
      </tr>
   <?php
		$company=mysql_query("select id,clientName from clients order by id");
		if(mysql_num_rows($company)>=1)
		{
			$i=1;
			while($fetchnam=mysql_fetch_array($company))
			{
				?>
      <tr>
        <td width="53" align="center" valign="middle"><strong><?php echo $i++; ?></strong></td>
        <td width="399" align="left" valign="middle"><a href="edit-client.php?clientid=<?php echo $fetchnam['id']; ?>" class="linkmenu"><?php echo $fetchnam['clientName']; ?></a></td>
        <td width="55" align="center" valign="middle"><a href="edit-client.php?clientid=<?php echo $fetchnam['id']; ?>"><img src="images/edit_icon.png" alt="Edit" width="16" height="16" border="0" /></a></td>
        <td width="54" align="center" valign="middle"><a href="view-clients.php?action=delete&deltid=<?php echo $fetchnam['id']; ?>"  onclick="return confirm('Are you sure you want to delete <?php echo $fetchnam['clientName']; ?>?')" title="Delete <?php echo $fetchSecNw['clientName']; ?>"><img src="images/delete.png" alt="delete" width="16" height="16" border="0"></a></td>
      </tr>
                <?php  
			  }
		  }
   ?> 
      
      
      
  </table>
    </form></div></td>
  </tr>
</table>
</div>
<div class="footer"> Copyrights &copy;  All Rights Reserved. </div>
</div>
</body>
</html>
