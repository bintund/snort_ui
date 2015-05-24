<?php session_start(); ?>
<html>
<head>
	<title>IDS SNORT Monitoring UI</title>
	<link rel="stylesheet" href="style/style.css" media="all" type="text/css">
	<script type="text/javascript">
	/* function javascript untuk konfirmasi penghapusan data */
		function hapus(msg){
			var del = confirm(msg);
			if (del == true)
				return true
			else
				return false;
		}
	</script>
</head>
<body>
<!-- content start here -->
<div id="top">
</div>
<div id="wrapper">

	<div id="header">
		<div class="big">IDS Snort</div>
		<div class="little">UI Monitoring Application
			<div align="right">
				<?php
					if (isset($_SESSION['nama']))
					{
						echo $_SESSION['admin'];
						if ($_SESSION['gender']==1)
						{
							echo "<img src='img/1.png' width='20px' height='20px'>";
						}
						if ($_SESSION['gender']==0)
						{
							echo "<img src='img/0.png' width='20px' height='20px'>";
						}
						echo "<a href='modules/logout.php'>logout</a>";					
					}
				?>
				
			</div>
		</div>
	</div>
	
	<div id="navigasi">
		<div>
			<ul>
				<li class="menu"><a href="index.php">Home</a></li>
				<li class="menu"><a href="index.php?page=profil">Profil Anda</a></li>
				<li class="menu"><a href="index.php?page=daftar">Daftar Admin Baru</a></li>
				<li class="menu"><a href="index.php?page=host">Manajemen Host</a></li>
				<li class="menu"><a href="index.php?page=setting">Pengaturan</a></li>
				<li class="menu"><a href="index.php?page=read">Lihat Peringatan</a></li>		
			</ul>
		</div>
	</div>
	
	<div id="content">
		<div>
		<?php
			/* 	manipulasi bagian halaman sesuai dengan nilai yang dipilih
				perhatikan url (link), setelah namafile (index.php)
				diikuti dengan tanda ?, maka string selanjutnya adalah variable GET (page)
				yang diberi nilai setelah tanda assigment ( = )
			*/
		if(isset($_SESSION['nama']))
		{
			if (isset($_GET['page'])){ // untuk mengecek apakah nilai ter set (cek kondisi apakah link di click)
			
				switch ($_GET['page']){
			
					case "login" : include "login.php"; break; // menyertakan file 
					case "read" : include "daftar_alert.php"; break;
					case "profil" : include "profil.php"; break;
					case "host" : include "daftar_host.php"; break;
					case "edithost" : include "edit_host.php"; break;	
					case "hostbaru" : include "host_baru.php"; break;					
					case "setting" : include "setting.php"; break;
					case "daftar" : include "daftar.php"; break;
					case "edit" : include "edit_biodata.php"; break;
					case "detail" : include "detail_admin.php"; break;
				}
			}
			else{
				// halaman utama
				include "home.php";
			}
		}
		else
		{
			include "login.php";
		}
		?>
		</div>
	</div>
	
	<div id="footer">
		&copy; IDS Snort Monitoring UI
	</div>
	
</div>
<!-- end body-->
</body>
</html>
