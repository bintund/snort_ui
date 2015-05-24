<!-- 
	tampilkan semua data (detail biodata),
-->
<?php include "config/connection.php";?>
<?php 
	// ambil nilai dari database
	$sql = "select * from biodata where id = '$_GET[id]'";
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
?>
<table border="0" cellspacing="0" cellpadding="5" class="form">
	<tr>
		<th colspan="2">Detail Biodata</th>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td>: <?php echo $data['nama'];?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>: <?php echo $data['alamat'];?></td>
	</tr>
	<tr>
		<td>Tempat Lahir</td>
		<td>: <?php echo $data['tempat_lahir'];?></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td> 
		<td>: <?php echo $data['tanggal_lahir'];?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>: 
			<?php if ($data['gender'] == 1){ ?>
				Laki-laki 
			<?php } else{ ?>
				Perempuan
			<?php } ?>
		</td>
	</tr>
	<tr>
		<td>Agama</td>
		<td>: <?php echo $data['agama'];?></td>
	</tr>
	<tr>
		<td>Pekerjaan</td>
		<td>: <?php echo $data['pekerjaan'];?></td>
	</tr>
	<tr>
		<td>Phone</td>
		<td>: <?php echo $data['phone'];?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>: <?php echo $data['email'];?></td>
	</tr>
	<tr>
		<td>Motto</td>
		<td>: <?php echo $data['motto'];?></td>
	</tr>
</table>
