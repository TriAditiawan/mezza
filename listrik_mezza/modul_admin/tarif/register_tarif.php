<?php
	include "koneksi.php";

	$id_tarif = $_POST['input_id_tarif'];
	$daya = $_POST['input_daya'];
	$tarif_perkwh = $_POST['input_tarif_perkwh'];
	$query = "INSERT into tbl_tarif values ('$id_tarif', '$daya', '$tarif_perkwh')";
	
	$cekquery = mysqli_query($connection,$query);

	if ($cekquery) {
?>

	<script>
		alert('Data berhasil di tambahkan!');
		location='media_admin.php?module=tarif';
	</script>

<?php
	}else{
?>
	<script>
		alert('Gagal di tambahkan!');
		location='media_admin.php?module=tarif';
	</script>
<?php
	}
?>