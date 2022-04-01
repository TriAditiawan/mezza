<?php
	include "koneksi.php";
	$kode= $_GET['kode'];
	mysqli_query($connection,"DELETE FROM tbl_tagihan WHERE id_tagihan='$kode'");
	header("location:media_admin.php?module=tagihan");
?>