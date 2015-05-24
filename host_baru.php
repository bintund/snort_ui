<h2>Input Host</h2>

<!-- form untuk input -->
<form method = "POST" action = "modules/simpan_host.php">

<table border="0" cellspacing="0" class="form">
	<tr>
		<td>ID Host</td>
		<td><input type="text" name="id" size="40" required></td>
	</tr>
	<tr>
		<td>Nama Host</td>
		<td><input type="text" name="nama" size="40" required></td>
	</tr>	
	<tr>
		<td>IP Address</td>
		<td><input type="text" name="ip" size="40" required></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Simpan">
		<input type="reset" name="reset" value="Set Ulang"></td>
	</tr>
</table>

</form>
