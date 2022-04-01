<?php
	include "koneksi.php";

	$id_user = $_POST['input_id_user'];
	$input_username = $_POST['input_username'];
	$input_password = $_POST['input_password'];
	$input_password=md5($input_password);
	$input_nama_user = $_POST['input_nama_user'];
	$query = "INSERT into tbl_user values ('$id_user','$input_username', '$input_password','$input_nama_user')";
	
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