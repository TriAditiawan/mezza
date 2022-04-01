<?php
	include "koneksi.php";
	$kode= $_GET['kode'];
	mysqli_query($connection,"DELETE FROM tbl_penggunaan WHERE id_penggunaan='$kode'");
	header("location:media_admin.php?module=penggunaan");
?>