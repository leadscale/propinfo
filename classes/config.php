<?php
//$conn=mysql_connect('localhost', 'ftpusername', 'ftppassword');
$conn=mysql_connect('localhost', 'root', '');
if(mysql_ping($conn)>=1)
{
//Database Selection (Change 'mystore' with your current Database name)
$db=mysql_select_db('mystore',$conn);
}
?>