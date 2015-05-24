<?php
include "../config/connection.php";

$sql=mysql_query("select * from sign");
while($data=mysql_fetch_array($sql))
{
if(isset($_POST["signature".$data['id']])) 
{
	$id=(int)$data['id'];
	mysql_query("update sign set value=1 where id=$id");
}
if(empty($_POST["signature".$data['id']]))
{
	$id=(int)$data['id'];
	mysql_query("update sign set value=0 where id=$id");
}
}
header('location:../index.php?page=read');
?>
