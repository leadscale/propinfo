<?php
session_start();
include("auth.php"); 
include("header.php");
?>
<div class="content">
<table width="600" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
    <td colspan="2" align="left" valign="middle"><h2>Clients and Products</h2></td>
    </tr>
   <?php
		include("../classes/config.php");
		$company=mysql_query("select id,clientName from clients order by id");
		if(mysql_num_rows($company)>=1)
		{
			$i=1;
			while($fetchnam=mysql_fetch_array($company))
			{
				?>
  <tr>
    <td width="26" align="center" valign="middle"><strong><?php echo $i++; ?></strong></td>
    <td width="553" align="left" valign="middle"><a href="../products.php?clientid=<?php echo $fetchnam['id']; ?>" class="linkmenu" target="_blank"><?php echo $fetchnam['clientName']; ?></a></td>
  </tr>
                <?php  
			  }
		  }
   ?> 
  
</table>
</div>
<div class="footer"> Copyrights &copy;  All Rights Reserved. </div>
</div>
</body>
</html>
