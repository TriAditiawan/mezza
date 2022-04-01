<?php
	include "koneksi.php";
	$kode= $_GET['kode'];
	mysqli_query($connection,"DELETE FROM tbl_pelanggan WHERE id_pelanggan='$kode'");
	header("location:media_admin.php?module=pelanggan");
?>