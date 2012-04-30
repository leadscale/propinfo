<?php
session_start();
include("auth.php"); 
include("header.php");
if($_GET['clientid']=='')
{
header("Location:view-products.php");	
}
$producDtls=mysql_query("select * from storeproducts where id=".$_GET['clientid']."");
$prdctdetails=mysql_fetch_array($producDtls);
?>
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<div class="content">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td align="left" valign="top"><h2>Edit Products</h2></td>
  </tr>
  <tr>
    <td align="center" valign="top">
    <?php 
	if(isset($_REQUEST['updateproduct']))
	{
		
	$sqlprdct=mysql_query("UPDATE `storeproducts` SET `productName` = '".$_POST['title']."',
`location` = '".$_POST['location']."',
`description` = '".$_POST['description']."',
`dateofpost` = '".date('d-m-Y')."' WHERE `storeproducts`.`id` =".$_GET['clientid']." LIMIT 1 ;
");
	if($_FILES['image']['name']!='')
	{	
	$uploadDir="../classes/products/";
	$filename=basename($_FILES['image']['name']);
	$filepath=$uploadDir.$_FILES["image"]["name"];

	if(move_uploaded_file($_FILES['image']['tmp_name'],$filepath))
	{
	$sqlprdctinsrt=mysql_query("UPDATE `storeproducts` SET `image` = '".$filename."' WHERE `storeproducts`.`id` =".$_GET['clientid']." LIMIT 1;");	
	}
	}
	
	if($sqlprdctinsrt || $sqlprdct)
	{
	?>
        <div class="message success">Product Updated Sucessfully !!</div>
    <?php	
	}else
	{
	?>
        <div class="message error">Error unable to Update Product !!</div>
    <?php	
	}

	
	}
	?>
    <div><form method="post" enctype="multipart/form-data"><table width="840" border="0" align="center" cellpadding="3" cellspacing="3">
        <tr>
            <td width="126" align="right" valign="middle"><strong>Company  Name :</strong></td>
            <td width="693" align="left" valign="middle"><select name="companyName" class="textfield" id="companyName">
              <option value="">Select Company</option>
              <?php
			  $sqlgetcmpnnam=mysql_query("select id,clientName from clients where id=".$prdctdetails['companyid']."");
			  $sqlfetchthnam=mysql_fetch_array($sqlgetcmpnnam);
			  ?>
              <option value="<?php echo $prdctdetails['companyid']; ?>" selected="selected"><?php echo $sqlfetchthnam['clientName']; ?></option>
              <?php
			  $company=mysql_query("select id,clientName from clients order by id");
			  if(mysql_num_rows($company)>=1)
			  {
				  while($fetchnam=mysql_fetch_array($company))
				  {
				?>
                <option value="<?php echo $fetchnam['id']; ?>"><?php echo $fetchnam['clientName']; ?></option>
                <?php  
				  }
			  }
			  ?>          
            </select></td>
          </tr>
            <tr>
        <td width="176" align="right" valign="middle"><strong>Title</strong> (Product name)<strong> :</strong></td>
        <td width="643" align="left" valign="middle"><label>
          <input name="title" type="text" class="textfield" id="title" value="<?php echo $prdctdetails['productName']; ?>" />
        </label></td>
      </tr>
      <tr>
        <td width="176" align="right" valign="middle"><strong>Location :</strong></td>
        <td width="643" align="left" valign="middle"><label>
          <input name="location" type="text" class="textfield" id="location" value="<?php echo $prdctdetails['location']; ?>" />
        </label></td>
      </tr>
      <tr>
        <td width="176" align="right" valign="middle"><strong>Image :</strong></td>
        <td width="643" align="left" valign="middle"><div><label for="image"></label>
          <input type="file" name="image" id="image" /></div>
          <div class="mesg">Avoid space, Special Character and Duplicate name for Product Images</div>
          </td>
      </tr>
      <tr>
        <td width="176" align="right" valign="middle"><strong>Description :</strong></td>
        <td width="643" align="left" valign="middle"><label>
          <textarea name="description" cols="45" rows="5" class="textfield textares" id="description"><?php echo $prdctdetails['description']; ?></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle"><label>
          <input name="updateproduct" type="submit" class="grdnt pointer" id="updateproduct" value="Update Now" />
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
