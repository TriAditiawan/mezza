<?php
	include "koneksi.php";

	$kode= $_GET['kode'];
	$id_user = $_POST['input_id_user'];

		$input_username = $_POST['input_username'];
	$input_password = $_POST['input_password'];
	$input_password=md5($input_password);
	$input_nama_user = $_POST['input_nama_user'];
	$query = "UPDATE tbl_user SET
	id_user='$id_user',
	username='$input_username',
	password='$input_password',
	nama_user='$input_nama_user'
	WHERE id_user='$kode'";

	$cekquery = mysqli_query($connection,$query);
	if ($cekquery) {
?>

<script>
alert('Data berhasil di tambahkan!');
location = 'media_admin.php?module=user';
</script>

<?php
		}else{
?>
<script>
alert('Gagal di tambahkan!');
location = 'media_admin.php?module=user';
</script>
<?php
		}
?>