<h2>Pengaturan Notifikasi</h2>
<?php
$host="localhost";
$user="root";
$pass="zero";
$db_name="snort";$db_name2="laporan";
$conn=mysql_connect($host,$user,$pass) or die ('not connected:' .mysql_error());
?>

<form method = "POST" action = "modules/set.php">

<table border="0" cellspacing="0" class="form">
<?php

mysql_select_db($db_name,$conn);
$query=mysql_query("select * from signature");
$n=1;
while ($data=mysql_fetch_array($query))
{
$nama=$data['sig_name'];
?>
	<tr>
		<td>
			<input 
				type="checkbox" 
				name="signature<?php echo $n; ?>" 
				id="sign<?php echo $n; ?>" 
				value="<?php echo $n; ?>"
				<?php
				mysql_select_db($db_name2,$conn);
				$sign=mysql_query("select value from sign where id=$n");
				$cek_sign=mysql_num_rows($sign);
				if ($cek_sign>0)
				{
					$data_sign=mysql_fetch_array($sign);
					if ($data_sign['value']==1)
					echo "checked='checked'";				
				}
				?>
			>
				<?php echo $nama; ?>
		</td>
	</tr>
<?php

mysql_select_db($db_name2,$conn);
$cari=mysql_query("select * from sign where id=$n");
$cekcari=mysql_num_rows($cari);
if ($cekcari==0)
{
	mysql_query("insert into sign values($n,'$nama',1)");
}
$n=$n+1;
}

?>	
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Jalankan">
		<input type="reset" name="reset" value="Set Ulang"></td>
	</tr>
</table>

</form>
