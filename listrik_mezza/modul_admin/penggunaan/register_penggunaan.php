<?php
	include "koneksi.php";

	$input_id_penggunaan = $_POST['input_id_penggunaan'];
	$input_id_pelanggan = $_POST['input_id_pelanggan'];
	$input_bulan = $_POST['input_bulan'];
	$input_tahun = $_POST['input_tahun'];
	$input_meter_awal = $_POST['input_meter_awal'];
	$input_meter_akhir = $_POST['input_meter_akhir'];
	
	$query = "INSERT into tbl_penggunaan values ('$input_id_penggunaan','$input_id_pelanggan','$input_bulan','$input_tahun','$input_meter_awal','$input_meter_akhir')";
	
	$cekquery = mysqli_query($connection,$query);

	if ($cekquery) {
?>

<script>
alert('Data berhasil di tambahkan!');
location = 'media_admin.php?module=penggunaan';
</script>

<?php
	}else{
?>
<script>
alert('Gagal di tambahkan!');
location = 'media_admin.php?module=penggunaan';
</script>
<?php
	}
?>