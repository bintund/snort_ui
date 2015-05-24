<?php
/*
	script ini akan menerima respon / dijalankan ketika tombol submit
	pada form update biodata ditekan. jangan lupa lakukan koneksi terlebih 
	dahulu setiap melakukan kontak dengan database
*/

include "../config/connection.php"; // menyertakan file connection.php

/* set variable */
$id =(int)$_POST['id'];
$ip = $_POST['ip'];
$nama = $_POST['nama'];

// buat query untuk mengupdate data
$sql = "update host set
		ip= '$ip',
		nama = '$nama'
		where id = $id";

// jalankan query
$query = mysql_query($sql);
if ($query){
	//echo "<script type='javascript'>alert('Update Data Berhasil..')</script>";
	header('location:../index.php?page=host');
}
else{
	//echo "<script type='javascript'>alert('Update Data Gagal..')</script>";
	header("location:../index.php?page=edithost&id=$id");
}

?>
