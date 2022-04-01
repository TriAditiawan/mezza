<?php
	include "koneksi.php";
?>
<div id="konten">
  <h1>Data Pelanggan</h1>
  <form method="POST" action="media_admin.php?module=register_pelanggan" align="center"
    onsubmit="return validasi(this)">
    <table cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td width="20%">id_Pelanggan</td>
        <td>:</td>
        <td>
          <input type="text" name="input_id_pelanggan" size="40%">
        </td>
      </tr>
      <tr>
        <td width="20%">Nomor Meter</td>
        <td>:</td>
        <td><input type="text" name="input_no_meter" size="40%"></td>
      </tr>
      <tr>
        <td width="20%">Nama Pelanggan</td>
        <td>:</td>
        <td><input type="text" name="input_nama" size="40%"></td>
      </tr>
      <tr>
        <td width="20%">Alamat Pelanggan</td>
        <td>:</td>
        <td><input type="text" name="input_alamat" size="40%"></td>
      <tr>
        <td width="20%">Daya</td>
        <td>:</td>
        <td>
          <select name="input_id_tarif" style="width: 60%;">
            <option value="" selected></option>
            <?php
						$sqlForeign = mysqli_query($connection,"SELECT * FROM tbl_tarif")or die(mysqli_error());
						while($dataForeign=mysqli_fetch_array($sqlForeign)){
					?>
            <option value=<?php echo $dataForeign['id_tarif']?>> <?php echo $dataForeign['daya']?> </option>
            <?php
						}
					?>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" name="tambah_pelanggan" value="Tambah">
          <input type="reset" name="reset" value="Reset">
        </td>
      </tr>
    </table>
  </form>

  <br>
  <form method="POST" action="" align="center" onsubmit="return validasi(this)">
    Pencarian :
    <input type="text" name="input_cari" size="40%">
    Kategori :
    <select name="input_kategori" style="width: 20%;">
      <option value="id_pelanggan">Id_Pelanggan</option>
      <option value="no_meter">Nomor</option>
      <option value="nama">Nama</option>
      <option value="alamat">Alamat</option>
      <option value="daya">Daya</option>
    </select>
    <input name="btncari" type="submit" value="Cari" />
    <a href="modul_admin/pelanggan/laporan_pelanggan.php" target="blank">print</a>
  </form>
  <br>

  <table border="1" width="100%" class="tabel">
    <thead>
      <th>id_Pelanggan</th>
      <th>Nomor</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Daya</th>
      <th colspan="2">Aksi</th>
    </thead>
    <tbody>
      <?php
		if(isset($_POST['btncari'])){
				$kategori = $_POST['input_kategori'];
				$datacari = $_POST['input_cari'];
				$sql = mysqli_query($connection,"select * from tbl_pelanggan 
					inner join tbl_tarif on tbl_pelanggan.id_tarif = tbl_tarif.id_tarif
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"select * from tbl_pelanggan 
					inner join tbl_tarif on tbl_pelanggan.id_tarif = tbl_tarif.id_tarif 
					ORDER BY id_pelanggan")or die (mysqli_error());
			}
			while($data=mysqli_fetch_array($sql)){  
		?>
      <tr>
        <td><?php echo $data['id_pelanggan']; ?> </td>
        <td><?php echo $data['no_meter']; ?> </td>
        <td><?php echo $data['nama']; ?> </td>
        <td><?php echo $data['alamat']; ?> </td>
        <td><?php echo $data['id_tarif']; ?> </td>
        <td><a class="update"
            href="media_admin.php?module=update_pelanggan&amp;kode=<?php echo $data['id_pelanggan'];?>">Update</a>
        </td>
        <td><a class="hapus"
            href="media_admin.php?module=delete_pelanggan&amp;kode=<?php echo $data['id_pelanggan'];?>">Hapus</a>
        </td>
      </tr>
      <?php
			}
		?>
    </tbody>
  </table>

  <script type="text/javascript">
  function validasi(form) {
    if (form.input_id_pelanggan.value == "") {
      alert("id_Pelanggan masih kosong!");
      form.input_id_pelanggan.focus();
      return (false);
    }
    if (form.input_no_meter.value == "") {
      alert("Nomor Meter masih kosong!");
      form.input_no_meter.focus();
      return (false);
    }
    if (form.input_nama.value == "") {
      alert("Nama Pelanggan masih kosong!");
      form.input_nama.focus();
      return (false);
    }
    if (form.input_alamat.value == "") {
      alert("Alamat Pelanggan masih kosong!");
      form.input_alamat.focus();
    }
    return (false);.value == "") {
    alert("daya masih kosong!");
    form.input_id_tarif.focus();
    return (false);
  }
  return (true);
  }
  </script>