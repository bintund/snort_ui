<?php 
session_start();

include "../config/connection.php";
$user=$_POST['user'];
$pass=$_POST['pass'];

$sql="select * from admin where user='$user' AND pass='$pass'";

$query=mysql_query($sql);
$cek_user=mysql_num_rows($query);

if ($cek_user>0)
{
	$data=mysql_fetch_array($query);	
	$_SESSION['nama']=$data['nama'];
	$_SESSION['admin']=$data['user'];
	$_SESSION['gender']=$data['gender'];
	header('location:../index.php');
	
}
else
{
	header('location:../index.php?page=login&status=failed');
}

?>
