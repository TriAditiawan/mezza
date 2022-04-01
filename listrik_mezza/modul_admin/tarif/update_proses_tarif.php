<?php
	include "koneksi.php";

	$kode= $_GET['kode'];
	$id_tarif=$_POST['input_id_tarif'];
	$daya=$_POST['input_daya'];
	$tarif_perkwh=$_POST['input_tarif_perkwh'];
	$query = "UPDATE tbl_tarif SET
	id_tarif='$id_tarif',
	daya='$daya',
	tarif_perkwh='$tarif_perkwh'
	WHERE id_tarif='$kode'";

	$cekquery = mysqli_query($connection,$query);
	if ($cekquery) {
?>

<script>
alert('Data berhasil di tambahkan!');
location = 'media_admin.php?module=tarif';
</script>

<?php
		}else{
?>
<script>
alert('Gagal di tambahkan!');
location = 'media_admin.php?module=tarif';
</script>
<?php
		}
?>