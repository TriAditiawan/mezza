_<?php
	include "koneksi.php";

	$input_id_pelanggan = $_POST['input_id_pelanggan'];
	$input_no_meter = $_POST['input_no_meter'];
	$input_nama = $_POST['input_nama'];
	$input_alamat = $_POST['input_alamat'];
	$id_tarif = $_POST['input_id_tarif'];
	
	$query = "INSERT into tbl_pelanggan values ('$input_id_pelanggan','$input_no_meter','$input_nama','$input_alamat','$id_tarif')";
	
	$cekquery = mysqli_query($connection,$query);

	if ($cekquery) {
?>

<script>
alert('Data berhasil di tambahkan!');
location = 'media_admin.php?module=pelanggan';
</script>

<?php
	}else{
?>
<script>
alert('Gagal di tambahkan!');
location = 'media_admin.php?module=pelanggan';
</script>
<?php
	}
?>