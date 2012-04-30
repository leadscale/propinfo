<?php
session_start();
include("auth.php");
include("header.php");

if($_GET['action']=="delete" && $_GET['deltid']!='')
{
$sqldelete=mysql_query("DELETE FROM `galleryimages` WHERE `galleryimages`.`id` = ".$_GET['deltid']." LIMIT 1");
if($sqldelete)
{
?>
        <div class="message success">Gallery Products Image Deleted Sucessfully !!</div>
<?php	
}else
{
?>
        <div class="message error">Error. unable to delete <span class="message success">Product</span> !!</div>
<?php
}
}
?>
<div class="content">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td align="left" valign="top"><h2>Delete Gallery Products Images</h2></td>
  </tr>
  <tr>
    <td align="center" valign="top"><div><form method="post"><table width="600" border="0" align="center" cellpadding="3" cellspacing="3"  id="imagdelt">
      <tr>
        <td width="53" align="center" valign="middle" bgcolor="#333333"><h4 class="whitetexts">S.N</h4></td>
        <td width="399" align="center" valign="middle" bgcolor="#333333"><span class="whitetexts">Gallery Image</span></td>
        <td width="54" align="center" valign="middle" bgcolor="#333333"><h4 class="whitetexts">Delete</h4></td>
      </tr>
   <?php
		$products=mysql_query("select id,companyid,imageurl from galleryimages order by companyid");
		if(mysql_num_rows($products)>=1)
		{
			$i=1;
			while($fetchnam=mysql_fetch_array($products))
			{
				?>
      <tr>
        <td width="53" align="center" valign="middle"><strong><?php echo $i++; ?></strong></td>
        <td width="399" align="left" valign="middle"><a href="../classes/headerGallery/<?php echo $fetchnam['imageurl']; ?>" target="_blank" class="linkmenu"><img src="../classes/headerGallery/<?php echo $fetchnam['imageurl']; ?>" width="120" height="30" /></a></td>
        <td width="54" align="center" valign="middle"><a href="view-gallery-images.php?action=delete&deltid=<?php echo $fetchnam['id']; ?>"  onclick="return confirm('Are you sure you want to delete <?php echo $fetchnam['imageurl']; ?>?')" title="Delete <?php echo $fetchnam['imageurl']; ?>"><img src="images/delete.png" alt="delete" width="16" height="16" border="0"></a></td>
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
