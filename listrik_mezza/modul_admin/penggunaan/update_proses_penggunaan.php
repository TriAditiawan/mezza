<?php
	include "koneksi.php";

	$kode= $_GET['kode'];
		$input_id_penggunaan = $_POST['input_id_penggunaan'];
	$input_id_pelanggan = $_POST['input_id_pelanggan'];
	$input_bulan = $_POST['input_bulan'];
	$input_tahun = $_POST['input_tahun'];
	$input_meter_awal = $_POST['input_meter_awal'];
	$input_meter_akhir = $_POST['input_meter_akhir'];
	$query = "UPDATE tbl_penggunaan SET 
		id_penggunaan='$input_id_penggunaan',
		id_pelanggan='$input_id_pelanggan',
		bulan='$input_bulan',
		tahun='$input_tahun',
		meter_awal='$input_meter_awal',
		meter_akhir ='$input_meter_akhir'
		WHERE id_penggunaan='$kode'";

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