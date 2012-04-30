<?php
if($_SESSION['SESS_MEMBER_ID']=='')
{
	header("Location:../index.php?action=logout");
}
?>