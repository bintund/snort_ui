<?php
/*
	script ini akan menerima respon / dijalankan ketika tombol submit
	pada form input biodata ditekan. jangan lupa lakukan koneksi terlebih 
	dahulu setiap melakukan kontak dengan database
*/

include "../config/connection.php"; // menyertakan file connection.php

/* set variable */
$id=$_POST['id'];
$ip=$_POST['ip'];
$nama = $_POST['nama'];

// buat query untuk menyimpan data (insert data)
$sql = "insert into host values ('$id','$nama','$ip','down')";

// jalankan query
$query = mysql_query($sql);
if ($query){
	header('location:../index.php?page=host&status=sukses');
}
else{
	header('location:../index.php?page=hostbaru&status=failed');
}

?>
