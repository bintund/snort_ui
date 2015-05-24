<?php 
SESSION_START();
include "config/connection.php";
// ambil nilai dari database
$sql = "select * from admin where user = '".$_SESSION['admin']."'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
?>

<h2>Profil Anda</h2>
<form method = "POST" action = "index.php?page=edit">
<table border="0" cellspacing="0" cellpadding="5" class="form">
	<tr>
		<td colspan="3"><hr></td>	
	</tr>	
	<tr>
		<td width="200px"><b>Username</b></td><td width="30px">:</td>
		<td><?php echo $data['user'];?></td>
	</tr>	
	<tr></tr>
	<tr>
		<td><b>Nama Lengkap</b></td><td width="30px">:</td>
		<td><?php echo $data['nama'];?></td>
	</tr>
	<tr>
		<td><b>Alamat</b></td><td width="30px">:</td>
		<td><?php echo $data['alamat'];?></td>
	</tr>
	<tr>
		<td><b>Tempat Lahir</b></td><td width="30px">:</td>
		<td><?php echo $data['tempat_lahir'];?></td>
	</tr>
	<tr>
		<td><b>Tanggal Lahir</b></td> <td width="30px">:</td>
		<td><?php echo $data['tanggal_lahir'];?></td>
	</tr>
	<tr>
		<td><b>Jenis Kelamin</b></td><td width="30px">:</td>
		<td>
			<?php if ($data['gender'] == 1){ ?>
				Laki-laki 
			<?php } else{ ?>
				Perempuan
			<?php } ?>
		</td>
	</tr>
	<tr>
		<td><b>Phone</b></td><td width="30px">:</td>
		<td><?php echo $data['phone'];?></td>
	</tr>
	<tr>
		<td><b>Akun Twitter</b></td><td width="30px">:</td>
		<td><?php echo $data['akun'];?></td>
	</tr>
	<tr>
		<td colspan="3"><hr></td>	
	</tr>
	<tr>
		<td></td><td></td>
		<td><input type="submit" name="submit" value="Update Data Anda">
	</tr>
</table>
</form>
