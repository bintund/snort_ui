<?php include "config/connection.php"; ?>

<h2>Data Manajemen Host</h2>
<form method="POST" action="index.php?page=hostbaru">
<input type="submit" name="submit" value="Tambahkan Host Baru">
</form>
<table border="0" class="list" cellspacing="0">
	<tr>
		<th>ID Host</th>
		<th>Nama</th>
		<th>IP Address</th>
		<th>Status</th>
		<th colspan="2" align="center">Action</th>
	</tr>
	<?php 
		$sql = "select * from host order by id asc limit 30";
		$query = mysql_query($sql);
		while ($data = mysql_fetch_array($query)){
	?>
	<tr>
		<td><?php echo $data['id'];?></td>
		<td><?php echo $data['nama'];?></td>
		<td><?php echo $data['ip'];?></td>
		<td><?php echo $data['status'];?></td>
		<td><a href="index.php?page=edithost&id=<?php echo $data['id'];?>">Edit</a></td>
		<td><a href="modules/hapus.php?page=host&id=<?php echo $data['id'];?>">Hapus</a></td>
	</tr>
	<?php } ?>
</table>
