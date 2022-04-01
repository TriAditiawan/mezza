<?php
	include "koneksi.php";
	$kode= $_GET['kode'];
	mysqli_query($connection,"DELETE FROM tbl_tarif WHERE id_tarif='$kode'");
	header("location:media_admin.php?module=tarif");
?>