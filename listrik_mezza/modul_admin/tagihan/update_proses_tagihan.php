<?php
	include "koneksi.php";

	$kode= $_GET['kode'];
			$input_id_tagihan = $_POST['input_id_tagihan'];
	$input_id_penggunaan = $_POST['input_id_penggunaan'];
	$input_bulan = $_POST['input_bulan'];
	$input_tahun = $_POST['input_tahun'];
	$input_jumlah_meter = $_POST['input_jumlah_meter'];
	$input_status = $_POST['input_status'];
	$query = "UPDATE tbl_tagihan SET 
		id_tagihan='$input_id_tagihan',
		id_penggunaan='$input_id_penggunaan',
		bulan='$input_bulan',
		tahun='$input_tahun',
	jumlah_meter='$input_jumlah_meter',
		status ='$input_status'
		WHERE id_tagihan='$kode'";

	$cekquery = mysqli_query($connection,$query);

	if ($cekquery) {
?>
<script>
alert('Data berhasil di tambahkan!');
location = 'media_admin.php?module=tagihan';
</script>

<?php
		}else{
?>
<script>
alert('Gagal di tambahkan!');
location = 'media_admin.php?module=tagihan';
</script>
<?php
		}
?>