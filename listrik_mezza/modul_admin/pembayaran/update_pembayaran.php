<?php
	include "koneksi.php";
	$kode= $_GET['kode'];
	$queryEdit = mysqli_query($connection,"SELECT * FROM tbl_pembayaran where id_bayar='$kode' limit 1")or die(mysqli_error());
	$dataEdit = mysqli_fetch_array($queryEdit);
?>
<div id="konten">
  <h1>Data bayar</h1>
  <form method="POST"
    action="media_admin.php?module=update_proses_pembayaran&amp;kode=<?php echo $dataEdit['id_bayar'];?>" align="center"
    onsubmit="return validasi(this)">
    <table cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td width="20%">id_pembayaran</td>
        <td>:</td>
        <td>
          <input type="text" name="input_id_bayar" size="40%" value=<?php echo $dataEdit['id_bayar'];?>>
        </td>
      </tr>
      <tr>
        <td width="20%">id_tagihan</td>
        <td>:</td>
        <td>
          <select name="input_id_tagihan" style="width: 70%;">
            <option value="" selected></option>
            <?php
						$sqlForeign = mysqli_query($connection,"SELECT * FROM tbl_tagihan")or die(mysqli_error());
						while($dataForeign=mysqli_fetch_array($sqlForeign)){
					?>
            <option value=<?php echo $dataForeign['id_tagihan']; ?> <?php 
							if($dataEdit['id_tagihan'] == $dataForeign['id_tagihan']){
								echo "selected";
							} 
						?>>
              <?php echo $dataForeign['id_tagihan'];?>
            </option>
            <?php
						}
					?>
          </select>
        </td>
      </tr>
      <tr>
        <td width="20%">tanggal</td>
        <td>:</td>
        <td>
          <input type="date" name="input_tanggal" size="40%" value=<?php echo $dataEdit['tanggal'];?>>
        </td>
      </tr>
      <tr>
        <td width="20%">bulan bayar</td>
        <td>:</td>
        <td>
          <input type="text" name="input_bulan_bayar" size="40%" value=<?php echo $dataEdit['bulan_bayar'];?>>
        </td>
      </tr>
      <tr>
        <td width="20%">biaya admin</td>
        <td>:</td>
        <td>
          <input type="text" name="input_badmin" size="40%" value=<?php echo $dataEdit['biaya_admin'];?>>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" name="tambah bayar" value="Update bayar">
          <input type="reset" name="reset" value="Reset">
        </td>
      </tr>
    </table>
  </form>


  <br>
  <form method="POST" action="" align="center" onsubmit="return validasi(this)">
    Pencarian :
    <input type="text" name="inputcari" size="40%">
    Kategori :
    <select name="inputkategori" style="width: 20%;">
      <option value="id_bayar">id bayar</option>
      <option value="id_tagihan">id tagihan</option>
      <option value="tanggal">tanggal</option>
      <option value="bulan_bayar">bulan bayar</option>
      <option value="biaya_admin">biaya admin</option>
    </select>
    <input name="btncari" type="submit" value="Cari" />
    <a href="modul_admin/pembayaran/laporan_pembayaran.php" target="blank">print</a>
  </form>
  <br>

  <table border="1" width="100%" class="tabel">
    <thead>
      <th>id_bayar</th>
      <th>id_tagihan</th>
      <th>tanggal</th>
      <th>bulan_bayar</th>
      <th>biaya_admin</th>
      <th colspan="2">Aksi</th>
    </thead>
    <tbody>
      <?php
		if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"select * from tbl_pembayaran 
					inner join tbl_tagihan on tbl_pembayaran.id_tagihan = tbl_tagihan.id_tagihan
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"select * from tbl_pembayaran 
					inner join tbl_tagihan on tbl_pembayaran.id_tagihan = tbl_tagihan.id_tagihan 
					ORDER BY id_bayar")or die (mysqli_error());
			}
			while($data=mysqli_fetch_array($sql)){  
		?>
      <tr>

        <td><?php echo $data['id_bayar']; ?> </td>
        <td><?php echo $data['id_tagihan']; ?> </td>
        <td><?php echo $data['tanggal']; ?> </td>
        <td><?php echo $data['bulan_bayar']; ?> </td>
        <td><?php echo $data['biaya_admin']; ?> </td>
        <td><a class="update"
            href="media_admin.php?module=update_pembayaran&amp;kode=<?php echo $data['id_bayar'];?>">Update</a>
        </td>
        <td><a class="hapus"
            href="media_admin.php?module=delete_pembayaran&amp;kode=<?php echo $data['id_bayar'];?>">Hapus</a>
        </td>
      </tr>
      <?php
			}
		?>
    </tbody>
  </table>
  <script type="text/javascript">
  function validasi(form) {
    if (form.input_id_bayar.value == "") {
      alert("id_bayar masih kosong!");
      form.input_id_bayar.focus();
      return (false);
    }
    if (form.input_id_tagihan.value == "") {
      alert("id_tagihan masih kosong!");
      form.inputid_tagihan.focus();
      return (false);
    }
    if (form.input_tanggal.value == "") {
      alert("tanggal masih kosong!");
      form.input_tanggal.focus();
      return (false);
    }
    if (form.input_bulan_bayar.value == "") {
      alert("bulan bayar masih kosong!");
      form.input_bulan_bayar.focus();
      return (false);
    }
    if (form.input_biaya_admin.value == "") {
      alert("biaya admin masih kosong!");
      form.input_biaya_admin.focus();
      return (false);
    }
    return (true);;
  }
  </script>