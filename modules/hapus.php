<?php 
	include "../config/connection.php";
$page=$_GET['page'];
if ($page='host')
{
	$sql = "delete from host where id = '$_GET[id]'";
	$query = mysql_query($sql);
	if ($query){
		header('location:../index.php?page=host');
	}
	else{
		header('location:../index.php?page=host');
	}	
}
?>
