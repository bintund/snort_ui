<h2>Input Biodata</h2>

<!-- form untuk input biodata -->
<form method = "POST" action = "modules/simpan_admin.php">

<table border="0" cellspacing="0" class="form">
	<tr>
		<td>Username</td>
		<td><input type="text" name="user" size="40" required></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" name="pass" size="40" required></td>
	</tr>	
	<tr>
		<td>Nama Lengkap</td>
		<td><input type="text" name="nama" size="40" required></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><textarea name="alamat" cols="40" rows="2" required></textarea></td>
	</tr>
	<tr>
		<td>Tempat Lahir</td>
		<td><input type="text" name="tempat_lahir" size="40" required></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td><input type="date" name="tanggal_lahir" placeholder="yyyy/mm/dd" required></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td><input type="radio" name="gender" value="1" checked>Laki-laki 
		<input type="radio" name="gender" value="0">Perempuan</td>
	</tr>
	<tr>
		<td>Phone</td>
		<td><input type="text" name="phone" size="40"></td>
	</tr>
	<tr>
		<td>Akun twitter</td>
		<td><input type="text" name="akun" size="40" placeholder="@username"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Simpan">
		<input type="reset" name="reset" value="Set Ulang"></td>
	</tr>
</table>

</form>
