<?php
	include "config/connection.php";
		$sql = "SELECT * FROM BIODATA ORDER BY NAMA ASC";
		$query = mysql_query ($sql);
		echo $query;
?>