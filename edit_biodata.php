<?php include "config/connection.php";?>
<?php 
	// ambil nilai dari database
	$sql = "select * from admin where user = '".$_SESSION['admin']."'";
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
?>

<h2>Update Biodata, Administrator : <?php echo $_SESSION['admin']; ?></h2>

<form method = "POST" action = "modules/update_biodata.php">
<input type="hidden" name="user" value="<?php echo $data['user'];?>">
<table border="0" cellspacing="0" class="form">
	<tr>
		<td>Password</td>
		<td><input type="password" name="pass" size="40" value="<?php echo $data['pass'];?>" required></td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td><input type="text" name="nama" size="40" value="<?php echo $data['nama'];?>" required></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><textarea name="alamat" cols="40" rows="2" required><?php echo $data['alamat'];?></textarea></td>
	</tr>
	<tr>
		<td>Tempat Lahir</td>
		<td><input type="text" name="tempat_lahir" size="40" value="<?php echo $data['tempat_lahir'];?>" required></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td> 
		<td><input type="date" name="tanggal_lahir" placeholder="yyyy/mm/dd" value="<?php echo $data['tanggal_lahir'];?>" required></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>
			<?php if ($data['gender'] == 1){ ?>
				<input type="radio" name="gender" value="1" checked>Laki-laki 
				<input type="radio" name="gender" value="0">Perempuan
			<?php } else{ ?>
				<input type="radio" name="gender" value="1">Laki-laki 
				<input type="radio" name="gender" value="0" checked>Perempuan
			<?php } ?>
		</td>
	</tr>
	<tr>
		<td>Phone</td>
		<td><input type="text" name="phone" size="40" value="<?php echo $data['phone'];?>" ></td>
	</tr>
	<tr>
		<td>Akun Twitter</td>
		<td><input type="text" name="akun" size="40" value="<?php echo $data['akun'];?>" ></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Update">
		<input type="reset" name="reset" value="Set Ulang"></td>
	</tr>
</table>

</form>
