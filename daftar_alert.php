<?php include "config/connection.php"; ?>

<h2>Daftar Peringatan</h2>

<table border="0" class="list" cellspacing="0">
	<tr>
		<th>No</th>
		<th>Pesan</th>
		<th>Waktu</th>
		<th>IP Source</th>
		<th>IP Destination</th>
	</tr>
	<?php 
		$sql = "select pesan,time,ip_src as sources, ip_dest as dest from alert order by id desc limit 20";
		$query = mysql_query($sql);
		$no = 0;
		while ($data = mysql_fetch_array($query)){
			$no++;
	?>
	<tr>
		<td><?php echo $no;?></td>
		<td><?php echo $data['pesan'];?></td>
		<td><?php echo $data['time'];?></td>
		<td><?php echo $data['sources'];?></td>
		<td><?php echo $data['dest'];?></td>
	</tr>
	<?php } ?>
</table>
