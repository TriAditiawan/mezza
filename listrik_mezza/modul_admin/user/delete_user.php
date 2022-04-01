<?php
	include "koneksi.php";
	$kode= $_GET['kode'];
	mysqli_query($connection,"DELETE FROM tbl_user WHERE id_user='$kode'");
	header("location:media_admin.php?module=user");
?>