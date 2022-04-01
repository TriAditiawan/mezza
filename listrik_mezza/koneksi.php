<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "db_listrik_mezzaluna";
	$connection = mysqli_connect($server, $username, $password,$database) or die ("Gagal konek ke server MySQL" .mysqli_error());
?>
