<?php
/*
	script ini akan menerima respon / dijalankan ketika tombol submit
	pada form input biodata ditekan. jangan lupa lakukan koneksi terlebih 
	dahulu setiap melakukan kontak dengan database
*/

include "../config/connection.php"; // menyertakan file connection.php

/* set variable */
$user=$_POST['user'];
$pass=$_POST['pass'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$akun = $_POST['akun'];

// buat query untuk menyimpan data (insert data)
$sql = "insert into admin values ('$user','$pass','$nama','$alamat','$tempat_lahir','$tanggal_lahir','$gender','$phone','$akun')";

// jalankan query
$query = mysql_query($sql);
if ($query){
	header('location:../index.php?page=login&status=sukses');
}
else{
	header('location:../index.php?page=daftar&status=failed');
}

?>
