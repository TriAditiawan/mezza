<?php
	include "koneksi.php";
	$kode= $_GET['kode'];
	mysqli_query($connection,"DELETE FROM tbl_pembayaran WHERE id_bayar='$kode'");
	header("location:media_admin.php?module=pembayaran");
?>