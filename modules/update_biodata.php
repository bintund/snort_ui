<?php
/*
	script ini akan menerima respon / dijalankan ketika tombol submit
	pada form update biodata ditekan. jangan lupa lakukan koneksi terlebih 
	dahulu setiap melakukan kontak dengan database
*/

include "../config/connection.php"; // menyertakan file connection.php

/* set variable */
$user = $_POST['user'];
$pass = $_POST['pass'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$gender =(int)$_POST['gender'];
$phone = $_POST['phone'];
$akun = $_POST['akun'];

// buat query untuk mengupdate data
$sql = "update admin set
		pass= '$pass',
		nama = '$nama',
		alamat = '$alamat',
		tempat_lahir = '$tempat_lahir',
		tanggal_lahir = '$tanggal_lahir',
		gender = $gender,
		phone = '$phone',
		akun = '$akun'
		where user = '$user'";

// jalankan query
$query = mysql_query($sql);
if ($query){
	//echo "<script type='javascript'>alert('Update Data Berhasil..')</script>";
	header('location:../index.php?page=profil');
}
else{
	//echo "<script type='javascript'>alert('Update Data Gagal..')</script>";
	header('location:../index.php?page=edit');
}

?>
