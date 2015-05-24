<?php
SESSION_START();
include "../config/connection.php";
SESSION_DESTROY();
header('location:../index.php?page=login');
?>	
