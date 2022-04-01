<?php
	include "koneksi.php";

	$input_id_tagihan = $_POST['input_id_tagihan'];
	$input_id_penggunaan = $_POST['input_id_penggunaan'];
	$input_bulan = $_POST['input_bulan'];
	$input_tahun = $_POST['input_tahun'];
	$input_jumlah_meter = $_POST['input_jumlah_meter'];
	$input_status = $_POST['input_status'];
	
	$query = "INSERT into tbl_tagihan values ('$input_id_tagihan','$input_id_penggunaan','$input_bulan','$input_tahun','$input_jumlah_meter','$input_status')";
	
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