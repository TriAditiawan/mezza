<?php
	include "koneksi.php";

	$kode= $_GET['kode'];
$input_id_pelanggan = $_POST['input_id_pelanggan'];
	$input_no_meter = $_POST['input_no_meter'];
	$input_nama = $_POST['input_nama'];
	$input_alamat = $_POST['input_alamat'];
	$id_tarif = $_POST['input_id_tarif'];
	$query = "UPDATE tbl_pelanggan SET 
		id_pelanggan='$input_id_pelanggan',
		no_meter='$input_no_meter',
		nama='$input_nama',
		alamat='$input_alamat',
		id_tarif='$id_tarif'
		WHERE id_pelanggan='$kode'";

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