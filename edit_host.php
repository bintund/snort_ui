<?php include "config/connection.php";?>
<?php 
	$id=(int)$_GET['id'];
	$sql = "select * from host where id = $id";
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
?>

<h2>Edit Data Host</h2>

<form method = "POST" action = "modules/update_host.php">
<input type="hidden" name="id" value="<?php echo $data['id'];?>">
<table border="0" cellspacing="0" class="form">
	<tr>
		<td>Nama Host</td>
		<td><input type="text" name="nama" size="40" value="<?php echo $data['nama'];?>" required></td>
	</tr>
	<tr>
		<td>IP Address</td>
		<td><input type="text" name="ip" size="40" value="<?php echo $data['ip'];?>" required></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Update">
		<input type="reset" name="reset" value="Set Ulang"></td>
	</tr>
</table>

</form>
