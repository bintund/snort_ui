<?php 
	/* 
		script untuk mengkoneksikan database yang telah kita buat
		yang namanya PRAKTIKUM
	*/
	
	mysql_connect('localhost','root','zero') or die ('Connection failed, please check your server!');
	mysql_select_db('laporan') or die ('Database not found!');
	
?>
