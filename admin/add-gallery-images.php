<?php
session_start();
include("auth.php"); 
include("header.php");
?>
<div class="content">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td align="left" valign="top"><h2>Add Gallery Products Images</h2></td>
  </tr>
  <tr>
    <td align="center" valign="top">
    <?php 
	if(isset($_REQUEST['addProducts']))
	{
	$uploadDir="../classes/headerGallery/";
	$filename=basename($_FILES['imageFile']['name']);
	$filepath=$uploadDir.$_FILES["imageFile"]["name"];

	if(move_uploaded_file($_FILES['imageFile']['tmp_name'],$filepath))
	{
	$sqlprdctinsrt=mysql_query("INSERT INTO `galleryimages` (`id`, `companyid`, `imageurl`, `date`) VALUES ('', '".$_POST['companyName']."', '".$filename."', '".date('d-m-Y')."');");	
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
            <td width="176" align="right" valign="middle"><strong>Company  Name :</strong></td>
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
        <td width="176" align="right" valign="middle"><strong>Image :</strong></td>
        <td width="693" align="left" valign="middle"><div><label for="imageFile"></label>
          <input type="file" name="imageFile" id="imageFile" /></div>
          <div class="mesg">Image Dimension(800px X 208px) Avoid space, Special Character and Duplicate name for Product Images</div>
          </td>
      </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle"><label>
          <input name="addProducts" type="submit" class="grdnt pointer" id="addProducts" value="Upload Now" />
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
