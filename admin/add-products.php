<?php
session_start();
include("auth.php"); 
include("header.php");
?>
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<div class="content">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td align="left" valign="top"><h2>Add Products</h2></td>
  </tr>
  <tr>
    <td align="center" valign="top">
    <?php 
	if(isset($_REQUEST['addProducts']))
	{
	$uploadDir="../classes/products/";
	$filename=basename($_FILES['image']['name']);
	$filepath=$uploadDir.$_FILES["image"]["name"];

	if(move_uploaded_file($_FILES['image']['tmp_name'],$filepath))
	{
	$sqlprdctinsrt=mysql_query("INSERT INTO `storeproducts` (`id`,`companyid`, `productName`, `location`, `image`, `description`, `dateofpost`) VALUES ('', '".$_POST['companyName']."', '".$_POST['title']."', '".$_POST['location']."', '".$filename."', '".$_POST['description']."', '".date('d-m-Y')."');");	
	if($sqlprdctinsrt)
	{
	?>
        <div class="message success">Product Added Sucessfully !!</div>
    <?php	
	}else
	{
	?>
        <div class="message error">Error unable to add Product !!</div>
    <?php	
	}
	}
	}
	?>
    <div><form method="post" enctype="multipart/form-data"><table width="840" border="0" align="center" cellpadding="3" cellspacing="3">
        <tr>
            <td width="126" align="right" valign="middle"><strong>Company  Name :</strong></td>
            <td width="693" align="left" valign="middle"><select name="companyName" class="textfield" id="companyName">
              <option value="" selected>Select Company</option>
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
          <input name="title" type="text" class="textfield" id="title" />
        </label></td>
      </tr>
      <tr>
        <td width="176" align="right" valign="middle"><strong>Location :</strong></td>
        <td width="643" align="left" valign="middle"><label>
          <input name="location" type="text" class="textfield" id="location" />
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
          <textarea name="description" cols="45" rows="5" class="textfield textares" id="description"></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle"><label>
          <input name="addProducts" type="submit" class="grdnt pointer" id="addProducts" value="Save Now" />
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
