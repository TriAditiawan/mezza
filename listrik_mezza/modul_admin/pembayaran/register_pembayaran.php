<?php
	include "koneksi.php";

	$input_id_bayar = $_POST['input_id_bayar'];
	$input_id_tagihan = $_POST['input_id_tagihan'];
	$input_tanggal = $_POST['input_tanggal'];
	$input_bulan_bayar = $_POST['input_bulan_bayar'];
	$input_badmin = $_POST['input_badmin'];
	
	$query = "INSERT into tbl_pembayaran values ('$input_id_bayar','$input_id_tagihan','$input_tanggal','$input_bulan_bayar','$input_badmin')";
	
	$cekquery = mysqli_query($connection,$query);

	if ($cekquery) {
?>

<script>
alert('Data berhasil di tambahkan!');
location = 'media_admin.php?module=pembayaran';
</script>

<?php
	}else{
?>
<script>
alert('Gagal di tambahkan!');
location = 'media_admin.php?module=pembayaran';
</script>
<?php
	}
?>