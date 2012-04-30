   <?php
   include("classes/config.php");
   if($_GET['clientid']=='')
   {
	   header("Location:index.php");
   }
	include("classes/config.php");
	$company=mysql_query("select id,clientName,clientWebsite,aboutCompany from clients where id=".$_GET['clientid']."");
	$clintdetails=mysql_fetch_array($company);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Store- Client Products</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<link href="css/gallery.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/simple.css" rel="stylesheet" />
<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.js"></script>
<script type="text/javascript" src="js/jquery.pikachoose.full.js"></script>
<script language="javascript">
	$(document).ready(function (){
    $(".button").click(function () {
      var divname=$(this).attr("id");
      $("#"+divname).slideToggle("slow");
      $("#jquerycls"+divname).slideToggle();
    });	
    });
</script>

		<script language="javascript">
			$(document).ready(
				function (){
					var a = [
					<?php
					$headerimg=mysql_query("select * from galleryimages where companyid=".$_GET['clientid']."");
					if(mysql_num_rows($headerimg)>=1)
					{
						while($fetchhdimg=mysql_fetch_array($headerimg))
						{
					?>
						{"image":"classes/headerGallery/<?php echo $fetchhdimg['imageurl']; ?>","link":"#","title":"Products of <?php echo $clintdetails['clientName']; ?>"},
					<?php
						}
					}
					?>
						];
					$(".pikachoose").PikaChoose({data:a});
				});
		</script>



</head>
<body>
<div class="maindiv">
<div class="content">
<div class="border">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
    <td align="left" valign="middle"><div class="pikachoose"></div></td>
    </tr>
  <tr>
  <tr>
    <td align="left" valign="middle"><h2>Products of <?php echo $clintdetails['clientName']; ?></h2></td>
    </tr>
  <tr>
    <td align="left" valign="top"><h3>About Us</h3>
    <p><?php echo $clintdetails['aboutCompany']; ?></p></td>
    </tr>
  <tr>
    <td align="right" valign="top"><a 
   <?php
   if($clintdetails['clientName']!='')
   {
   ?>
    href="http://<?php echo $clintdetails['clientWebsite']; ?>"
    <?php
   }else
   {
    echo 'href="#"';
   }
	?>
     class="button">&nbsp;Visit Website &nbsp;</a></td>
    </tr>
  <tr>
    <td align="left" valign="top">
    <?php
	$sqlclntprdct=mysql_query("select * from storeproducts where companyid=".$_GET['clientid']."");
	if(mysql_num_rows($sqlclntprdct)>=1)
	{
		$i=1;
	while($fetchprdct=mysql_fetch_array($sqlclntprdct))
	{
		$varnum=$i++;
	?>    
    <div class="productbg">
    <table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="31%" align="center" valign="middle"><img src="classes/products/<?php echo $fetchprdct['image']; ?>" width="232" height="143" /></td>
        <td width="69%" align="left" valign="top"><h2><?php echo $fetchprdct['productName']; ?></h2>
        <p>
        <div class="redmoredivtop" id="jqueryclsdescription<?php echo $varnum; ?>"><?php echo substr($fetchprdct['description'], 0,200); ?></div>
        <div class="redmorediv" id="description<?php echo $varnum; ?>" style="display:none;"><?php echo $fetchprdct['description']; ?></div>
        </p>
        <p><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="22%"><a href="javascript:void(0);" class="description<?php echo $varnum; ?> button" id="description<?php echo $varnum; ?>">&nbsp;More Details&nbsp;</a></td>
    <td width="78%"><a href="<?php echo $fetchprdct['location']; ?>" target="_blank" class="button">&nbsp;Location&nbsp;</a></td>
  </tr>
</table></p>
        </td>
      </tr>
    </table>
    </div>
    <?php
	}
	}else
	{
	?>
    <div class="message error">No Products found !!!</div>
    <?php	
	}
	?>   
    </td>
    </tr>
  
</table>
</div>
</div>
<div class="footer"> Copyrights &copy;  All Rights Reserved. </div>
</div>
</body>
</html>
